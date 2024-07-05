<script>
    $(document).ready(function() {
        var $namaBarang = $('#select2-nama');
        var $kodeBarang = $('#select2-kode');

        // Ambil data barang dari server
        $.ajax({
            url: '{{ route('select.Barang') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var barangData = data.map(function(item) {
                    return {
                        id: item.kode,
                        text: item.nama
                    };
                });

                // Inisialisasi Select2 untuk nama barang
                $namaBarang.select2({
                    placeholder: 'Pilih Nama Barang',
                    data: barangData
                }).on('select2:select', function(e) {
                    var namaData = e.params.data;
                    $kodeBarang.val(namaData.id).trigger('change.select2');
                });

                // Inisialisasi Select2 untuk kode barang
                $kodeBarang.select2({
                    placeholder: 'Pilih Kode Barang',
                    data: barangData
                }).on('select2:select', function(e) {
                    var kodeData = e.params.data;
                    $namaBarang.val(kodeData.text).trigger('change.select2');
                });
            }
        });
    });
</script>
<script>
    $('#select2-rak').select2();
    $('#select2-nomor').select2();
    $('#select2-baris').select2();
    $('#select2-vendor').select2();
</script>
