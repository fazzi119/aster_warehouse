<!DOCTYPE html>
<html lang="en">

<head>
    <x-header />

    @include('layouts.style')

</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <div class="login-header">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Register failed!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="logo-container">
                    <img src="{{ asset('assets/img/aster.png') }}" alt="Logo" width="200" height="100">
                </div>

                <h3 class="text-center">Silakan Login</h3>
            </div>
            <div class="login-form">
                <form action="{{ url('/') }}" method="POST">
                    @csrf
                    <div class="form-group form-floating-label">
                        <input id="username" name="email" type="email" class="form-control input-border-bottom"
                            required>
                        <label for="username" class="placeholder">Email</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control input-border-bottom"
                            required>
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Remember Me</label>
                        </div>

                        {{-- <a href="#" class="link float-right">Forget Password ?</a> --}}
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" href="#" class="btn btn-primary btn-rounded btn-login">Sign
                            In</button>
                    </div>
                    <div class="login-account">
                        <span class="msg">Don't have an account yet ?</span>
                        <a href="#" id="show-signup" class="link">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>

        @include('auth.register')
    </div>

    @include('layouts.script')

</body>
