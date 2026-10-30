  <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @if (session('success') || session('error') || session('warning') || $errors->any())
      <div hidden>
          @foreach (['success', 'error', 'warning'] as $flashType)
              @if (session($flashType))
                  <span data-flash-{{ $flashType }}>{{ session($flashType) }}</span>
              @endif
          @endforeach
          @if ($errors->any())
              <div data-toast-errors>{{ implode(' ', $errors->all()) }}</div>
          @endif
      </div>
  @endif
  <script src="{{ asset('public/user/js/toast-notifications.js?v=1.0') }}" defer></script>
  @if (config('services.google_maps.api_key'))
      <script src="{{ asset('public/user/js/address-autocomplete.js?v=1.1') }}" data-google-maps-api-key="{{ config('services.google_maps.api_key') }}" defer></script>
  @endif
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.15.1/build/js/intlTelInput.min.js"></script>
  <script src="{{ asset('public/user/js/dashboard-enhancements.js?v=1.0') }}"></script>



    <!-- Custom JavaScript -->

    <script src="{{ asset('public/backend/js/script.js') }}"></script>
  





</body>



</html>