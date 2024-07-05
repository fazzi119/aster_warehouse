@extends('layouts.app')

@section('konten')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Daftar {{ $title }}</h4>
        </div>
        <div class="row">
            @foreach ($rak as $item)
                <div class="col-6">
                    <x-card-rak href="{{ url('rak/' . $item['id']) }}" rak="{{ $item['rak'] }}"
                        count="{{ $item['count'] }}" />
                </div>
            @endforeach
        </div>
    </div>
@endsection
