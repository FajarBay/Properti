@extends('layouts.auth')
@section('content')
<div class="wrapper" style="background-image: url('{{ asset('asset/img/14836.jpg') }}'); background-size: cover;">
    <div class="inner">
        <div class="image-holder">
            <a href="/utama"><img src="{{ asset('asset/img/1.jpg') }}" alt=""></a>
        </div>
        <form method="POST" action="{{ route('password.update') }}" style="padding-top: 100px">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="hidden"></div>
            <h3>Ubah Kata Sandi</h3>
            <div class="form-wrapper">
                <input id="email" type="email" placeholder="Masukan Email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <input id="password" type="password" placeholder="Masukan Kata Sandi" class="form-control" name="password" required autocomplete="new-password">
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <input id="password-confirm" type="password" placeholder="Ulangi Kata Sandi" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <i class="zmdi zmdi-email"></i>
            </div>
            @if(Session::has('message'))
                <div class="alert1 alert1-danger">{{Session::get('message')}}</div>
            @endif
            <button>Ubah Kata Sandi</button>
        </form>
    </div>
</div>
@endsection


