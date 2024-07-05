<div class="modal fade" id="modalshow{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=""></form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control" value="{{ $item->barang->nama }}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kode</label>
                <input type="text" class="form-control" value="{{ $item->barang->kode }}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Lokasi</label>
                <input type="text" class="form-control"
                    value="{{ $item->rak->rak }}{{ $item->nomor->nomor }}, {{ $item->baris->baris }}" disabled>
            </div>
            @if ($item->barang->image)
                <div class="form-group">
                    <label for="exampleFormControlInput1">Gambar</label><br>
                    <img src="{{ asset('storage/' . $item->barang->image) }}" alt="" width="480px"
                        height="200px">
                </div>
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Vendor</label>
                <input type="text" class="form-control" value="{{ $item->vendor->nama }}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kategori</label>
                <input type="text" class="form-control" value="{{ $item->kategori->nama }}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">stok Masuk</label>
                <input type="text" class="form-control" value="{{ $item->qty }} {{ $item->satuan->nama }}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Keterangan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" disabled>{{ $item->info }}</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
