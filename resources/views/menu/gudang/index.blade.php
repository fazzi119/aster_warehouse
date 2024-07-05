@extends('layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between">
            <h4 class="page-title">{{ $title }} Rak {{ $rak->rak }}
            </h4>

            <x-form-search action="{{ url('rak/' . $rak->id) }}" />

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="display:flex; align-items: center;">
                                <x-button-export href="{{ route('barang-export') }}" />

                                @if (auth()->user()->hasRole('superadmin|admin'))
                                    <x-button-modal-import data="{{ $title }}"
                                        action="{{ route('barang-import') }}" />
                                @endif
                            </div>
                            @if (auth()->user()->hasRole('superadmin|admin'))
                                <a href="{{ url('gudang/create') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-plus"></i>
                                    Tambah</a>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="table table-striped table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>lokasi</th>
                                        <th>Stok</th>
                                        <th style="text-align: center; vertical-align: middle;">Aksi</th>
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
                                                    <div style="display: flex; justify-content: center;">
                                                        <button href="#" class="btn btn-primary btn-sm mr-1"
                                                            data-toggle="modal"
                                                            data-target="#modalshow{{ $item->id }}"><i
                                                                class="fas fa-eye"></i></button>

                                                        @if (auth()->user()->hasRole('superadmin|admin'))
                                                            <a href="{{ url('gudang/' . $item->id . '/edit') }}"
                                                                class="btn btn-warning btn-sm mr-1"><i
                                                                    class="fas fa-edit"></i></a>

                                                            <form action="{{ url('gudang/' . $item->id) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit"
                                                                    onclick="confirmDelete(event, '{{ $item->barang->nama }}')"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        @endif
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
@endsection
