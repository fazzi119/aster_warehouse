<script>
    function confirmDelete(e, nama) {
        e.preventDefault();
        swal({
            title: 'Apakah anda yakin?',
            text: 'Menghapus ' + nama,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $(e.target).closest('form').submit();
            }
        });
    }

    function confirmBack(e, nama, qty) {
        e.preventDefault();
        swal({
            title: 'Apakah anda yakin?',
            text: 'Mengembalikan ' + nama + ' dengan jumlah ' + qty,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $(e.target).closest('form').submit();
            }
        });
    }
</script>
