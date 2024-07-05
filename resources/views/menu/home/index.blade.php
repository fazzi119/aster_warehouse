@extends('layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ $title }}</h4>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <x-card-st icon="flaticon-layers-1" type="primary" title="Data Master" count="5" />
            </div>
            <div class="col-sm-6 col-md-3">
                <x-card-st icon="flaticon-box" type="secondary" count="{{ $barangCount }}" title="Barang Digudang" />
            </div>
            <div class="col-sm-6 col-md-3">
                <x-card-st icon="flaticon-technology-1" type="warning" count="{{ $rakCount }}" title="Rak" />
            </div>
            <div class="col-sm-6 col-md-3">
                <x-card-st icon="flaticon-box-3" type="info" count="{{ $masukCount }}" title="Barang Masuk" />
            </div>
            <div class="col-sm-6 col-md-3">
                <x-card-st icon="flaticon-delivery-truck" type="danger" count="{{ $keluarCount }}"
                    title="Barang Keluar" />
            </div>
            <div class="col-sm-6 col-md-3">
                <x-card-st icon="flaticon-users" type="success" count="{{ $userCount }}" title="Total Users" />
            </div>
        </div>
    </div>
@endsection
