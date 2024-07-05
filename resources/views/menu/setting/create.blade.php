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
                                        href="{{ url('setting') }}" role="tab" aria-selected="true">Isi Form</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ url('setting') }}" class="btn btn-danger btn-sm"><i class="fas fa-reply"></i>
                                Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('setting') }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="hello@aster.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-1">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Roles</label>
                                        <select name="roles" class="form-control" id="roles">
                                            <option hidden> pilih </option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
