@extends('layouts.register.register-main')

@section('content')
    <div class="container mt-4">
        <main class="form-signin">
            <form method="POST" action="/register">
                @csrf
                {{-- <input type="hidden" name="role" value="umum"> --}}
                <div class="row justify-content-center">

                    <div class="col-sm-7">
                        <a href="/">
                            <img class="mb-2" src="/img/logo.png" alt="" width="150">
                        </a>
                    </div>


                </div>
                <h1 class="h4 mb-2 fw-normal text-center">Get your Nice spot Village</h1>
                <br>
                <h1 class="h6 sm-7 fw-normal text-center">Register Akun</h1>

                <div class="form-floating">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                        name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="Username">{{ __('Nama') }}</label>
                </div>

                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="email">{{ __('E-Mail Address') }}</label>
                </div>
                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">{{ __('Password') }}</label>
                </div>
                <br>
                <div class="form-floating">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                    <label for="confirm password">{{ __('Confirm Password') }}</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Register') }}</button>
            </form>
            <small class="d-block text-start mt-6">Sudah punya akun? <a href="/login">Login?</a></small>
        </main>
    </div>
@endsection
