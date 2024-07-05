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
                        <form action="{{ url('master/satuan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <x-input-group name="nama" type="text" label="Nama satuan"
                                placeholder="Isi Nama satuan" />

                            <x-input-textarea label="Keterangan" name="info" rows="5" />

                            <div class="card-action d-flex justify-content-end">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="ml-3 btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
