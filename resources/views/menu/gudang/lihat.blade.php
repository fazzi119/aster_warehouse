<!DOCTYPE html>
<html lang="en">

<head>
    <x-header />

    @include('layouts.style')
</head>

<body>
    <div class="wrapper">
        <!--
    Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
  -->



        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header d-flex justify-content-between">
                        <h4 class="page-title">{{ $title }} Rak {{ $rak->rak }}
                        </h4>


                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                </div>

                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Kode</th>
                                                        <th>lokasi</th>
                                                        <th>Stok</th>
                                                        <th style="text-align: center; vertical-align: middle;">Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($gudang->count() > 0)
                                                        @foreach ($gudang as $item)
                                                            <tr>
                                                                <td>{{ $item->barang->nama }}</td>
                                                                <td>{{ $item->barang->kode }}</td>
                                                                <td>{{ $item->rak->rak }}{{ $item->nomor->nomor }},
                                                                    {{ $item->baris->baris }}
                                                                </td>
                                                                <td>{{ $item->jumlah }} {{ $item->satuan->nama }}</td>

                                                                <td style="text-align: center; vertical-align: middle;">
                                                                    <div
                                                                        style="display: flex; justify-content: center;">
                                                                        <button href="#"
                                                                            class="btn btn-primary btn-sm mr-1"
                                                                            data-toggle="modal"
                                                                            data-target="#modalshow{{ $item->id }}"><i
                                                                                class="fas fa-eye"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @include('menu.gudang.show')
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="6" class="text-center">No data found</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            {{-- {{ $gudang->onEachSide(0)->links() }} --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <p style="margin: 0;">
                                        {{-- Showing {{ $gudang->firstItem() }} to {{ $gudang->lastItem() }} of {{ $gudang->total() }} entries --}}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        @include('layouts.script')
        <script>
            $(document).ready(function() {
                $('#basic-datatables').DataTable({});

                $('#multi-filter-select').DataTable({
                    "pageLength": 5,
                    initComplete: function() {
                        this.api().columns().every(function() {
                            var column = this;
                            var select = $(
                                    '<select class="form-control"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d + '">' + d +
                                    '</option>')
                            });
                        });
                    }
                });


            });
        </script>
</body>

</html>
