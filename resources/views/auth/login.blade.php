<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>NCICTSO | LOGIN</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        /* Responsive CSS for logo */
        img {
            max-width: 100%;
            height: auto;
        }
    </style>

</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="container-fluid px-0">
            <div class="row">

                <!-- Login logo -->
                <div class="col-lg-6 login-wrap">
                    <div class="login-sec">
                        <div class="log-img">
                            <img class="img-fluid" src="assets/img/ncictso.png" alt="Logo">
                        </div>
                    </div>
                </div>
                <!-- /Login logo -->

                <!-- Login Content -->
                <div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo" style="display: flex; justify-content: space-between; align-items: center;">
                                        <a href="index.html"><img src="assets/img/top-logo.png" alt="" style="width: 510px;"></a>
                                        <a href="index.html"><img src="assets/img/ncictso.png" alt="" style="width: 150px;"></a>
                                    </div>
                                    <h2>Login</h2>
                                    @error('msg')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <!-- Form -->
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div class="form-group">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="alert alert-danger" />
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />

                                            <x-input-error :messages="$errors->get('password')" class="login-danger" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="forgotpass">
                                            <div class="remember-me">
                                                <label for="remember_me" class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                                    <input id="remember_me" type="checkbox" name="radio" name="remember">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif
                                        </div>
                                        <div class="form-group login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Login Content -->

                <!-- /Login Content -->

            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.6.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Feather Js -->
    <script src="assets/js/feather.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
</body>

</html>