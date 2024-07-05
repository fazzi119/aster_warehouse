<div class="container container-signup animated fadeIn">
    <h3 class="text-center">Sign Up</h3>
    <div class="login-form">
        <form action="{{ url('register') }}" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group form-floating-label">
                <input id="fullname" name="nama" type="text" class="form-control input-border-bottom" required>
                <label for="fullname" class="placeholder">Username</label>
            </div>
            <div class="form-group form-floating-label">
                <input id="email" name="email" type="email" class="form-control input-border-bottom" required>
                <label for="email" class="placeholder">Email</label>
            </div>
            <div class="form-group form-floating-label">
                <input id="passwordsignin" name="password" type="password" class="form-control input-border-bottom"
                    required>
                <label for="passwordsignin" class="placeholder">Password</label>
                <div class="show-password">
                    <i class="flaticon-interface"></i>
                </div>
            </div>
            <div class="form-group form-floating-label">
                <input id="confirmpassword" name="confirmpassword" type="password"
                    class="form-control input-border-bottom" required>
                <label for="confirmpassword" class="placeholder">Confirm Password</label>
                <div class="show-password">
                    <i class="flaticon-interface"></i>
                </div>
                <span id="password-error" style="color: red;"></span>
            </div>
            <div class="row form-sub m-0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="agree" id="agree">
                    <label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
                </div>
            </div>
            <div class="form-action">
                <a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
                <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign Up</button>
            </div>
        </form>
    </div>
</div>
