@extends('layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between">
            <h4 class="page-title">{{ $title }} <div>{{ $subtitle }}</div>
            </h4>

            <x-form-search action="{{ url('master/barang') }}" />

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="display:flex; align-items: center;">

                                <x-button-export href="{{ route('barang-export') }}" />

                                <x-button-modal-import data="{{ $subtitle }}" action="{{ route('barang-import') }}" />

                            </div>
                            <a href="{{ url('master/barang/create') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-plus"></i> Tambah</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $item)
                                        <tr>
                                            <td>
                                                <div>
                                                    <div class="avatar avatar-xl">
                                                        <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                                            class="avatar-img rounded">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <div style="display: flex; justify-content: center;">
                                                    <button href="#" class="btn btn-primary btn-sm mr-1"
                                                        data-toggle="modal" data-target="#modalshow{{ $item->id }}"><i
                                                            class="fas fa-eye"></i></button>

                                                    <a href="{{ url('master/barang/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ url('master/barang/' . $item->id) }}" method="post">
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
                                        @include('menu.master.barang.show')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $barang->onEachSide(0)->links() }}
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <p style="margin: 0;">
                        Showing {{ $barang->firstItem() }} to {{ $barang->lastItem() }} of {{ $barang->total() }} entries
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
