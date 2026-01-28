@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if(typeof toastr !== 'undefined') {
                toastr.success("{{ session('success') }}");
            }
        });
    </script>
@endif

@if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if(typeof toastr !== 'undefined') {
                toastr.error("{{ session('error') }}");
            }
        });
    </script>
@endif

@if(session('info'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if(typeof toastr !== 'undefined') {
                toastr.info("{{ session('info') }}");
            }
        });
    </script>
@endif

@if(session('warning'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if(typeof toastr !== 'undefined') {
                toastr.warning("{{ session('warning') }}");
            }
        });
    </script>
@endif

@if (isset($errors) && $errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if(typeof toastr !== 'undefined') {
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            }
        });
    </script>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if(typeof toastr !== 'undefined') {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000",
            };
        }
    });
</script>
