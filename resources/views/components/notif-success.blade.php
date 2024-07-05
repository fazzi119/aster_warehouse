@if (session('success'))
    <script>
        swal("Good job!", {
            icon: "success",
            text: "{{ session('success') }}",
            buttons: {
                confirm: {
                    className: "btn btn-success",
                },
            },
        });
    </script>
@endif
@if (session('error'))
    <script>
        swal("Oops!", {
            icon: "error",
            text: "{{ session('error') }}",
            buttons: {
                confirm: {
                    className: "btn btn-danger",
                },
            },
        });
    </script>
@endif
