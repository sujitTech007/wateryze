(function () {
    const script = document.currentScript;
    const apiKey = script && script.dataset.googleMapsApiKey;
    const fields = Array.from(document.querySelectorAll('[data-google-address-autocomplete]'));

    if (!apiKey || fields.length === 0) {
        return;
    }

    window.gm_authFailure = function () {
        console.error('Google Maps rejected the configured API key.');
        showUnavailableMessage();
    };

    const mapsScript = document.createElement('script');
    mapsScript.src = 'https://maps.googleapis.com/maps/api/js?key='
        + encodeURIComponent(apiKey)
        + '&libraries=places&callback=wateryzePlacesReady&loading=async&v=weekly';
    mapsScript.async = true;

    window.wateryzePlacesReady = initializeAutocomplete;

    mapsScript.addEventListener('error', function (error) {
        console.error('Google Maps JavaScript API failed to load.', error);
        showUnavailableMessage();
    });

    document.head.appendChild(mapsScript);

    function initializeAutocomplete() {
        const places = window.google?.maps?.places;
        if (!places?.AutocompleteSuggestion || !places?.AutocompleteSessionToken) {
            console.error('The Google Maps script loaded without the Places library.');
            showUnavailableMessage();

            return;
        }

        fields.forEach(function (field) {
            attachAutocomplete(field, places);
        });
    }

    function attachAutocomplete(field, places) {
        const wrapper = field.parentElement;
        const suggestionList = document.createElement('div');
        const status = document.createElement('div');
        suggestionList.id = 'google-address-suggestions-' + Math.random().toString(36).slice(2);
        let sessionToken = null;
        let timer = null;
        let latestRequest = 0;
        let applyingSelection = false;

        wrapper.style.position = 'relative';
        field.setAttribute('autocomplete', 'off');
        field.setAttribute('aria-autocomplete', 'list');
        field.setAttribute('aria-controls', suggestionList.id);
        field.setAttribute('aria-expanded', 'false');
        suggestionList.hidden = true;
        suggestionList.setAttribute('role', 'listbox');
        suggestionList.style.cssText = 'position:absolute;top:100%;left:0;right:0;z-index:1080;max-height:300px;overflow-y:auto;background:#fff;border:1px solid #ced4da;border-radius:0 0 .375rem .375rem;box-shadow:0 .5rem 1rem rgba(0,0,0,.15);';
        status.className = 'form-text';
        status.setAttribute('aria-live', 'polite');
        wrapper.append(suggestionList, status);

        field.addEventListener('input', function () {
            if (applyingSelection) {
                return;
            }

            clearAutofilledComponents(field);
            clearTimeout(timer);
            latestRequest++;
            suggestionList.replaceChildren();
            suggestionList.hidden = true;
            field.setAttribute('aria-expanded', 'false');
            const query = field.value.trim();

            if (query.length < 3) {
                return;
            }

            timer = window.setTimeout(function () {
                fetchSuggestions(query, latestRequest);
            }, 250);
        });

        field.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                suggestionList.hidden = true;
                field.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('click', function (event) {
            if (!wrapper.contains(event.target)) {
                suggestionList.hidden = true;
                field.setAttribute('aria-expanded', 'false');
            }
        });

        async function fetchSuggestions(query, requestId) {
            try {
                sessionToken ??= new places.AutocompleteSessionToken();
                const result = await places.AutocompleteSuggestion.fetchAutocompleteSuggestions({
                    input: query,
                    sessionToken: sessionToken,
                });

                if (requestId !== latestRequest || query !== field.value.trim()) {
                    return;
                }

                suggestionList.replaceChildren();
                (result.suggestions || []).forEach(function (suggestion) {
                    const prediction = suggestion.placePrediction;
                    if (!prediction) {
                        return;
                    }

                    const option = document.createElement('button');
                    option.type = 'button';
                    option.setAttribute('role', 'option');
                    option.setAttribute('aria-selected', 'false');
                    option.className = 'w-100 border-0 bg-white text-start px-3 py-2';
                    option.textContent = prediction.text.toString();
                    option.addEventListener('mouseenter', function () {
                        option.classList.add('bg-light');
                    });
                    option.addEventListener('mouseleave', function () {
                        option.classList.remove('bg-light');
                    });
                    option.addEventListener('click', function () {
                        selectPrediction(prediction, requestId);
                    });
                    suggestionList.appendChild(option);
                });

                if (suggestionList.childElementCount > 0) {
                    const attribution = document.createElement('div');
                    attribution.className = 'text-end px-2 py-1 bg-white';
                    const logo = document.createElement('img');
                    logo.src = 'https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3.png';
                    logo.alt = 'Powered by Google';
                    logo.width = 120;
                    logo.height = 14;
                    attribution.appendChild(logo);
                    suggestionList.appendChild(attribution);
                }

                suggestionList.hidden = suggestionList.childElementCount === 0;
                field.setAttribute('aria-expanded', String(!suggestionList.hidden));
            } catch (error) {
                console.error('Google Places could not return address suggestions.', error);
                showUnavailableMessage(status);
            }
        }

        async function selectPrediction(prediction, requestId) {
            try {
                const place = prediction.toPlace();
                await place.fetchFields({
                    fields: ['addressComponents', 'formattedAddress'],
                });

                if (requestId !== latestRequest) {
                    return;
                }

                const components = {};
                (place.addressComponents || []).forEach(function (component) {
                    component.types.forEach(function (type) {
                        components[type] = component;
                    });
                });

                const street = [
                    components.street_number?.longText,
                    components.route?.longText,
                ].filter(Boolean).join(' ');
                const address = field.hasAttribute('data-google-address-full')
                    ? place.formattedAddress
                    : (street || place.formattedAddress);

                applyingSelection = true;
                field.value = address || prediction.text.toString();
                field.dispatchEvent(new Event('input', { bubbles: true }));
                field.dispatchEvent(new Event('change', { bubbles: true }));
                markAutofilled(field, 'address');
                updateComponent(field, 'city', firstValue(components, ['locality', 'postal_town', 'sublocality_level_1']));
                updateComponent(field, 'province', firstValue(components, ['administrative_area_level_1']));
                updateComponent(field, 'country', firstValue(components, ['country']));
                const postalCode = firstValue(components, ['postal_code']);
                const postalSuffix = firstValue(components, ['postal_code_suffix']);
                updateComponent(field, 'postal_code', postalCode && postalSuffix ? postalCode + '-' + postalSuffix : postalCode);
                applyingSelection = false;
                suggestionList.hidden = true;
                suggestionList.replaceChildren();
                field.setAttribute('aria-expanded', 'false');
                status.textContent = '';
                sessionToken = null;
            } catch (error) {
                applyingSelection = false;
                console.error('Google Places could not retrieve the selected address.', error);
                showUnavailableMessage(status);
            }
        }
    }

    function updateComponent(addressField, component, value) {
        if (!value) {
            return;
        }

        const form = addressField.closest('form');
        const target = form?.querySelector('[data-google-address-component="' + component + '"]')
            || findNamedComponent(form, component);
        if (!target) {
            return;
        }

        if (target instanceof HTMLSelectElement) {
            const option = Array.from(target.options).find(function (candidate) {
                return candidate.value.toLowerCase() === value.toLowerCase()
                    || candidate.textContent.trim().toLowerCase() === value.toLowerCase();
            });
            if (option) {
                target.value = option.value;
            } else {
                target.add(new Option(value, value, true, true));
            }
        } else {
            target.value = value;
        }

        markAutofilled(target, component);
        target.dispatchEvent(new Event('input', { bubbles: true }));
        target.dispatchEvent(new Event('change', { bubbles: true }));
    }

    function findNamedComponent(form, component) {
        if (!form) {
            return null;
        }

        const aliases = {
            city: ['city', 'locality'],
            province: ['province', 'state', 'region'],
            country: ['country'],
            postal_code: ['postal_code', 'postal-code', 'zip', 'zipcode', 'zip_code'],
        };
        const names = aliases[component] || [];

        return Array.from(form.querySelectorAll('input[name], textarea[name], select[name]'))
            .find(function (element) {
                return names.includes(element.name.toLowerCase());
            }) || null;
    }

    function firstValue(components, types) {
        for (const type of types) {
            if (components[type]) {
                return components[type].longText;
            }
        }
        return '';
    }

    function markAutofilled(element, component) {
        element.dataset.googleAutofilledComponent = component;
    }

    function clearAutofilledComponents(addressField) {
        const form = addressField.closest('form');
        if (!form) {
            return;
        }

        form.querySelectorAll('[data-google-autofilled-component]').forEach(function (element) {
            if (element === addressField || element.dataset.googleAutofilledComponent === 'address') {
                return;
            }
            element.value = '';
            delete element.dataset.googleAutofilledComponent;
            element.dispatchEvent(new Event('input', { bubbles: true }));
            element.dispatchEvent(new Event('change', { bubbles: true }));
        });
    }

    function showUnavailableMessage(status) {
        const message = 'Google Places address suggestions could not load. Check GOOGLE_MAPS_API_KEY, enable Maps JavaScript API and Places API (New), confirm billing is active, and verify the site referrer restrictions. You can still enter the address manually.';
        if (status) {
            status.textContent = message;
            return;
        }

        fields.forEach(function (field) {
            if (field.parentElement.querySelector('[data-google-address-status]')) {
                return;
            }
            const help = document.createElement('div');
            help.className = 'form-text';
            help.dataset.googleAddressStatus = '';
            help.textContent = message;
            field.parentElement.appendChild(help);
        });
    }
})();
