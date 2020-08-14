@extends('layouts.auth')

@section('content')
<div class="wrapper" style="background-image: url('asset/img/14836.jpg'); background-size: cover;">
    <div class="inner">
        <div class="image-holder">
            <a href="/utama"><img src="asset/img/1.jpg" alt=""></a>
        </div>
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <form method="POST" action="{{ route('login') }}" style="padding-top: 70px">
                @csrf
            <h3>Masuk</h3>
            <div class="form-wrapper">
                <input type="text" placeholder="Alamat Email" name="email" oninvalid="this.setCustomValidity('Masukan email yang valid')"
                oninput="setCustomValidity('')" class="form-control" value="{{ old('email') }}" required>
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Kata Sandi" oninvalid="this.setCustomValidity('Email atau kata sandi salah')"
                oninput="setCustomValidity('')" name="password" class="form-control" required>
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Ingat Saya</label>
                @if (Route::has('password.request'))
                <a class="btn btn-link a" style="float:right" href="/reset">Lupa Kata Sandi?</a>
                @endif
                {{-- {{ route('password.request') }} --}}
            </div>
            <button>{{ __('Masuk') }}</button><br>
            <p class="text-center">Belum punya akun? <a class="a" href="{{ route('register') }}">Daftar sekarang</a></p>
        </form>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
