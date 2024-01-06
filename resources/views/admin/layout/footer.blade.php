<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js">
</script>

{{-- <script src="{{ asset('script.js') }}"></script> --}}
<script>

    function allowOnlyNumbers(event) {
      const charCode = (event.which) ? event.which : event.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 37 && charCode !== 39) {
          event.preventDefault();
      }
     
    }
    </script>
    <script>
        function submitForm(form) {
            if (form instanceof HTMLFormElement) {
                form.submit();
            }
        }
    </script>
<script>
    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    // New code for success message
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    // Initialize Toastr
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true
        };
    });

</script>
