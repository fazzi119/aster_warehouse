@extends('layouts.app')

@section('konten')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ $title }}</h4>
        </div>
        @if (auth()->user()->hasRole('storeman'))
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <a href="{{ url('barangkeluar/create') }}" style="text-decoration: none;">
                            <x-card-st icon="flaticon-line" type="primary" title="Kirim Stok Gudang" count="" />
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatables" class="table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tanggal Keluar</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Qty Out</th>
                                <th>Tujuan</th>
                                @if (auth()->user()->hasRole('storeman'))
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($barangKeluar->count() > 0)
                                @foreach ($barangKeluar as $item)
                                    <tr>
                                        <td>{{ $item->tgl_keluar }}</td>
                                        <td>{{ $item->barang->nama }}</td>
                                        <td>{{ $item->barang->kode }}</td>
                                        <td>{{ $item->qty }} {{ $item->satuan->nama }}</td>
                                        <td>{{ $item->customer->nama }}</td>
                                        @if (auth()->user()->hasRole('storeman'))
                                            <td style="text-align: center; vertical-align: middle;">
                                                <div style="display: flex; justify-content: center;">
                                                    <button href="#" class="btn btn-primary btn-sm mr-1"
                                                        data-toggle="modal" data-target="#modalshow{{ $item->id }}"><i
                                                            class="fas fa-eye"></i></button>

                                                    <form action="{{ url('barangkeluar/' . $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            onclick="confirmBack(event, '{{ $item->barang->nama }}', '{{ $item->qty }}')"
                                                            class="btn btn-warning btn-sm mr-1"><i
                                                                class="fas fa-retweet"></i></button>
                                                    </form>

                                                    {{-- <a href="{{ url('barangkeluar/' . $item->id . '/edit') }}"
                                                                    class="btn btn-warning btn-sm mr-1"><i
                                                                        class="fas fa-retweet"></i></a> --}}


                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    @include('menu.barang_keluar.show')
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
