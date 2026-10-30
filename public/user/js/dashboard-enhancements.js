(function () {
    function submitAfterConfirmation(form) {
        if (!form.dataset.confirm) {
            HTMLFormElement.prototype.submit.call(form);
            return;
        }
        if (!window.Swal || typeof window.Swal.fire !== 'function') {
            console.error('SweetAlert2 did not load; the requested action was not submitted.');
            return;
        }

        window.Swal.fire({
            title: form.dataset.confirmTitle || 'Are you sure?',
            text: form.dataset.confirm,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: form.dataset.confirmButton || 'OK, delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            focusCancel: true
        }).then(function (result) {
            if (result.isConfirmed) {
                HTMLFormElement.prototype.submit.call(form);
            }
        });
    }

    document.addEventListener('submit', function (event) {
        const form = event.target.closest('form[data-confirm]');

        if (!form || form.querySelector('[data-phone-picker]')) {
            return;
        }

        event.preventDefault();
        submitAfterConfirmation(form);
    });

    const phoneInputs = Array.from(document.querySelectorAll('[data-phone-picker]'));

    if (phoneInputs.length === 0) {
        return;
    }

    if (typeof window.intlTelInput !== 'function') {
        const forms = Array.from(new Set(phoneInputs.map(function (input) {
            return input.form;
        })));

        forms.forEach(function (form) {
            form.addEventListener('submit', function (event) {
                const input = phoneInputs.find(function (phone) {
                    return phone.form === form && phone.value.trim();
                });

                if (!input) {
                    submitAfterConfirmation(form);
                    return;
                }

                event.preventDefault();
                input.setCustomValidity('The phone country selector could not load. Check your connection and try again.');
                input.reportValidity();
            });
        });

        return;
    }

    const phoneInstances = phoneInputs.map(function (input) {
        const countryCode = input.dataset.phoneCode
            ? document.getElementById(input.dataset.phoneCode)
            : null;
        const countryIso = input.dataset.phoneCountry
            ? document.getElementById(input.dataset.phoneCountry)
            : null;
        const dialCode = (countryCode ? countryCode.value : '').replace(/^\+/, '');
        const countryData = window.intlTelInput.getCountryData();
        const country = countryData.find(function (item) {
            return countryIso && item.iso2 === countryIso.value;
        }) || countryData.find(function (item) {
            return dialCode && item.dialCode === dialCode;
        });
        const phone = window.intlTelInput(input, {
            initialCountry: country ? country.iso2 : 'ca',
            separateDialCode: true,
            nationalMode: true,
            countrySearch: true,
            loadUtils: function () {
                return import('https://cdn.jsdelivr.net/npm/intl-tel-input@25.15.1/build/js/utils.js');
            }
        });
        const error = input.closest('.col-md-6, .col-12')?.querySelector('[data-phone-error]') || null;

        if (!countryCode && input.value.trim().startsWith('+')) {
            phone.setNumber(input.value);
        }

        function syncCountry() {
            const selectedCountry = phone.getSelectedCountryData();

            if (selectedCountry && selectedCountry.dialCode) {
                if (countryCode) {
                    countryCode.value = '+' + selectedCountry.dialCode;
                }
                if (countryIso) {
                    countryIso.value = selectedCountry.iso2;
                }
            }
        }

        input.addEventListener('countrychange', syncCountry);
        input.addEventListener('input', function () {
            input.setCustomValidity('');
            if (error) {
                error.textContent = '';
            }
        });
        syncCountry();

        return { input: input, phone: phone, countryCode: countryCode, countryIso: countryIso, error: error, syncCountry: syncCountry };
    });

    const forms = Array.from(new Set(phoneInputs.map(function (input) {
        return input.form;
    })));

    forms.forEach(function (form) {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            for (const entry of phoneInstances.filter(function (phone) {
                return phone.input.form === form;
            })) {
                entry.syncCountry();

                if (!entry.input.value.trim()) {
                    continue;
                }

                try {
                    await entry.phone.promise;
                } catch (error) {
                    entry.input.setCustomValidity('Phone validation could not load. Check your connection and try again.');
                    if (entry.error) {
                        entry.error.textContent = entry.input.validationMessage;
                    }
                    entry.input.reportValidity();
                    return;
                }

                if (!entry.phone.isValidNumber()) {
                    entry.input.setCustomValidity('Enter a valid phone number for the selected country.');
                    if (entry.error) {
                        entry.error.textContent = entry.input.validationMessage;
                    }
                    entry.input.reportValidity();
                    return;
                }

                entry.input.setCustomValidity('');
                if (!entry.countryCode && !entry.countryIso) {
                    entry.input.value = entry.phone.getNumber();
                }
            }

            submitAfterConfirmation(form);
        });
    });
})();
