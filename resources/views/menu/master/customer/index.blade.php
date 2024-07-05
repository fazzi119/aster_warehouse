@extends('layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between">
            <h4 class="page-title">{{ $title }} <div>{{ $subtitle }}</div>
            </h4>

            <x-form-search action="{{ url('master/customer') }}" />

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <div style="display:flex; align-items: center;">
                                <a href="{{ route('customer-export') }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-file-excel"></i> Export</a>

                                <button data-toggle="modal" data-target="#modalimport" class="btn btn-info btn-sm ml-3"><i
                                        class="fas fa-file-import"></i> Import</button>
                                <x-modal-import data="{{ $subtitle }}" action="{{ route('customer-import') }}" />

                            </div> --}}
                            <a href="{{ url('master/customer/create') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-plus"></i> Tambah</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="table table-striped table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kontak</th>
                                        <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->kontak }}</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <div style="display: flex; justify-content: center;">
                                                    <button href="#" class="btn btn-primary btn-sm mr-1"
                                                        data-toggle="modal" data-target="#modalshow{{ $item->id }}"><i
                                                            class="fas fa-eye"></i></button>

                                                    <a href="{{ url('master/customer/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ url('master/customer/' . $item->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="confirmDelete(event, '{{ $item->nama }}')"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('menu.master.vendr.show')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $customer->onEachSide(0)->links() }}
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <p style="margin: 0;">
                        Showing {{ $customer->firstItem() }} to {{ $customer->lastItem() }} of {{ $customer->total() }}
                        entries
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
