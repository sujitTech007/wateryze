(function () {
    const phoneInput = document.getElementById('phone');
    const countryCodeInput = document.getElementById('country_code');
    const phoneCountryInput = document.getElementById('phone_country');
    const countryCodeLabel = document.getElementById('country-code-label');
    const phoneError = document.getElementById('phone-error');

    if (!phoneInput || !countryCodeInput || !phoneCountryInput || typeof window.intlTelInput !== 'function') {
        return;
    }

    const previousDialCode = countryCodeInput.value.replace(/^\+/, '');
    const countries = window.intlTelInput.getCountryData();
    const matchingCountry = countries.find(function (country) {
        return country.iso2 === phoneCountryInput.value;
    }) || countries.find(function (country) {
        return country.dialCode === previousDialCode;
    });

    const phoneInputPlugin = window.intlTelInput(phoneInput, {
        initialCountry: matchingCountry ? matchingCountry.iso2 : 'in',
        separateDialCode: true,
        nationalMode: true,
        countrySearch: true,
        loadUtils: function () {
            return import('https://cdn.jsdelivr.net/npm/intl-tel-input@25.15.1/build/js/utils.js');
        }
    });

    countryCodeInput.type = 'hidden';
    countryCodeInput.required = false;
    countryCodeLabel.hidden = true;

    function updateCountryCode() {
        const selectedCountry = phoneInputPlugin.getSelectedCountryData();

        if (selectedCountry && selectedCountry.dialCode) {
            countryCodeInput.value = '+' + selectedCountry.dialCode;
            phoneCountryInput.value = selectedCountry.iso2;
        }

        phoneInput.setCustomValidity('');
        phoneError.textContent = '';
    }

    phoneInput.addEventListener('countrychange', updateCountryCode);
    phoneInput.addEventListener('input', function () {
        phoneInput.setCustomValidity('');
        phoneError.textContent = '';
    });
    updateCountryCode();

    phoneInput.form.addEventListener('submit', async function (event) {
        event.preventDefault();

        if (!phoneInput.form.reportValidity()) {
            return;
        }

        try {
            await phoneInputPlugin.promise;
        } catch (error) {
            phoneError.textContent = 'Phone validation could not load. Check your connection and try again.';
            phoneInput.setCustomValidity(phoneError.textContent);
            phoneInput.reportValidity();
            return;
        }

        if (!phoneInputPlugin.isValidNumber()) {
            phoneError.textContent = 'Enter a valid phone number for the selected country.';
            phoneInput.setCustomValidity(phoneError.textContent);
            phoneInput.reportValidity();
            return;
        }

        phoneInput.setCustomValidity('');
        phoneInput.form.submit();
    });
})();
