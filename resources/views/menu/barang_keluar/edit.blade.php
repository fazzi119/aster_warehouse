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
                            <h4 class="card-title">Kembalikan ke Gudang</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('barangkeluar/' . $barangkeluar->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group form-group-default">
                                        <label for="tanggal">Tanggal Keluar</label>
                                        <input type="date" value="{{ $barangkeluar->tgl_keluar }}" class="form-control"
                                            id="tanggal" name="tgl_keluar">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group form-group-default">
                                        <label for="nama">Nama Barang</label>
                                        <select class="form-control select2" id="select2-nama" name="barang_id">
                                            <option value="{{ $barangkeluar->barang_id }}">{{ $barangkeluar->barang->nama }}
                                            </option>
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
                                            <option value="{{ $barangkeluar->barang_id }}">{{ $barangkeluar->barang->kode }}
                                            </option>
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
                                            <option value="{{ $barangkeluar->rak_id }}">{{ $barangkeluar->rak->rak }}
                                            </option>
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
                                            <option value="{{ $barangkeluar->nomor_id }}">
                                                {{ $barangkeluar->nomor->nomor }}</option>
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
                                            <option value="{{ $barangkeluar->baris_id }}">
                                                {{ $barangkeluar->baris->baris }}</option>
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
                                            <option value="{{ $barangkeluar->vendor_id }}">
                                                {{ $barangkeluar->vendor->nama }}</option>
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
                                            <option value="{{ $barangkeluar->kategori_id }}">
                                                {{ $barangkeluar->kategori->nama }}</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Stok Keluar</label>
                                        <input type="number" value="{{ $barangkeluar->qty }}" name="qty"
                                            class="form-control" placeholder="isi total">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Satuan</label>
                                        <select class="form-control" id="select2-satuan" name="satuan_id">
                                            <option value="{{ $barangkeluar->satuan_id }}">
                                                {{ $barangkeluar->satuan->nama }}</option>
                                            @foreach ($satuan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group form-group-default">
                                        <label>Tujuan Barang</label>
                                        <select class="form-control" id="select2-customer" name="customer_id">
                                            <option value="{{ $barangkeluar->customer_id }}">
                                                {{ $barangkeluar->customer->nama }}</option>
                                            @foreach ($customer as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group form-group-default">
                                        <label for="exampleFormControlTextarea1">Keterangan</label>
                                        <textarea name="info" id="exampleFormControlTextarea1" rows="5" class="form-control">{{ $barangkeluar->info }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card-action d-flex justify-content-end">
                                        <a href="{{ url('barangkeluar') }}" class="btn btn-danger">Back</a>
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
