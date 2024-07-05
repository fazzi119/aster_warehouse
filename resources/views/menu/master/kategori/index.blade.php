@extends('layouts.app')
@section('konten')
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between">
            <h4 class="page-title">{{ $title }} <div>{{ $subtitle }}</div>
            </h4>

            <x-form-search action="{{ url('master/kategori') }}" />

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('master/kategori/create') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-plus"></i> Tambah</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="table table-striped table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->info }}</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <div style="display: flex; justify-content: center;">
                                                    <button href="#" class="btn btn-primary btn-sm mr-1"
                                                        data-toggle="modal" data-target="#modalshow{{ $item->id }}"><i
                                                            class="fas fa-eye"></i></button>

                                                    <a href="{{ url('master/kategori/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ url('master/kategori/' . $item->id) }}" method="post">
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
                                        @include('menu.master.kategori.show')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $kategori->onEachSide(0)->links() }}
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <p style="margin: 0;">
                        Showing {{ $kategori->firstItem() }} to {{ $kategori->lastItem() }} of {{ $kategori->total() }}
                        entries
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
