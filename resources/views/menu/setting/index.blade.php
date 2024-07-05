@extends('layouts.app')
@section('konten')
    <div class="page-inner">
        <h4 class="page-title">{{ $title }}</h4>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-with-nav">
                    <div class="card-header">
                        <div class="row row-nav-line">
                            <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab"
                                        href="{{ url('setting') }}" role="tab" aria-selected="true">Daftar Admin</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            @if (auth()->user()->hasRole('superadmin|admin'))
                                <a href="{{ url('setting/create') }}" class="btn btn-primary btn-sm"><i
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
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->getRoleNames() }}</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <div style="display: flex; justify-content: center;">

                                                        @if (auth()->user()->hasRole('superadmin|admin'))
                                                            <a href="{{ url('setting/' . $item->id . '/edit') }}"
                                                                class="btn btn-warning btn-sm mr-1"><i
                                                                    class="fas fa-edit"></i></a>

                                                            <form action="{{ url('setting/' . $item->id) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit"
                                                                    onclick="confirmDelete(event, '{{ $item->nama }}')"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
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
            <div class="col-md-4">
                <div class="card card-profile card-secondary">
                    <div class="card-header" style="background-image: url('{{ asset('assets/img/blogpost.jpg') }}')">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <span
                                    class="avatar-title rounded-circle border border-white">{{ substr(Auth::user()->nama, 0, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name">{{ Auth::user()->nama }}</div>
                            <div class="job">{{ Auth::user()->email }}</div>
                            <div class="desc">{{ Auth::user()->roles->pluck('name')[0] }}</div>
                            <div class="view-profile">
                                <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
