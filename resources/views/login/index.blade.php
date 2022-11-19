@extends('layouts.login.login-main')

@section('content')
    <div class="container mt-4">
        <main class="form-signin">
            @if (session()->has('sukses'))
                <div class="alert alert-succes alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="/login">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-sm-7">
                        <img class="mb-1" src="/img/logo.png" alt="" width="150">
                    </div>
                </div>
                <h1 class="h4 mb-3 fw-normal text-center">Get your Nice spot Village</h1>
                <br>
                <h1 class="h6 sm-6 fw-normal text-center">Login</h1>

                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    <label for="username">{{ __('E-Mail Address') }}</label>
                </div>
                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="floatingPassword">{{ __('Password') }}</label>
                </div>
                <small class="d-block text-end mt-6">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </small>
                <div class="checkbox mb-1">
                    <br>
                    <label>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}
                    </label>
                </div>
                <button id="btn" class="w-100 btn btn-lg btn-primary login" type="submit"><a href="/beranda"></a>
                    {{ __('Login') }}</button>


            </form>
            <small class="d-block text-start mt-6">Belum punya akun ? <a href="/register">Register</a></small>
        </main>
    </div>
@endsection
