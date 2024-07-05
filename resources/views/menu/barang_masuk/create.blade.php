@extends('layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between">
            <h4 class="page-title">{{ $title }}</h4>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Tambah {{ $subtitle }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('barangmasuk') }}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-6">
                                    <div class="form-group form-group-default">
                                        <label for="nama">Nama Barang</label>
                                        <select class="form-control select2" id="select2-nama" name="barang_id">
                                            <option hidden>Pilih nama barang</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form-group-default">
                                        <label for="kode">Kode Barang</label>
                                        <select class="form-control select2" id="select2-kode">
                                            <option hidden>Pilih Kode Barang</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label>Rak</label>
                                        <select class="form-control" id="select2-rak" name="rak_id">
                                            <option hidden>Pilih Rak</option>
                                            @foreach ($rak as $item)
                                                <option value="{{ $item->id }}">{{ $item->rak }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label>Nomor</label>
                                        <select class="form-control" id="select2-nomor" name="nomor_id">
                                            <option hidden>Pilih Nomor</option>
                                            @foreach ($nomor as $item)
                                                <option value="{{ $item->id }}">{{ $item->nomor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label>Baris</label>
                                        <select class="form-control" id="select2-baris" name="baris_id">
                                            <option hidden>Pilih Baris</option>
                                            @foreach ($baris as $item)
                                                <option value="{{ $item->id }}">{{ $item->baris }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Vendor</label>
                                        <select class="form-control" id="select2-vendor" name="vendor_id">
                                            <option hidden>Pilih Vendor</option>
                                            @foreach ($vendor as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Kategori</label>
                                        <select class="form-control" id="select2-kategori" name="kategori_id">
                                            <option hidden>Pilih Kategori</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Stok Masuk</label>
                                        <input type="number" name="qty" class="form-control" placeholder="isi total">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Satuan</label>
                                        <select class="form-control" id="select2-satuan" name="satuan_id">
                                            <option hidden>Pilih Satuan</option>
                                            @foreach ($satuan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group form-group-default">
                                        <label for="exampleFormControlTextarea1">Keterangan</label>
                                        <textarea name="info" id="exampleFormControlTextarea1" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card-action d-flex justify-content-end">
                                        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="ml-3 btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
