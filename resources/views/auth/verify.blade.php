
@extends('layouts.auth')
@section('content')
<div class="wrapper" style="background-image: url('{{ asset('asset/img/14836.jpg') }}'); background-size: cover;">
    <div class="inner">
        <div class="image-holder">
            <a href="/utama"><img src="{{ asset('asset/img/1.jpg') }}" alt=""></a>
        </div>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}" style="padding-top: 100px">
            @csrf
            <div class="hidden" style="height:50px"></div>
                @if (session('resent'))
                    <div class="alert1 alert1-success" role="alert1">
                        {{ __('Link verifikasi baru telah dikirimkan ke email anda!') }}
                    </div>
                @endif
            <h3>Verifikasi Email Anda</h3>
            <div class="form-wrapper">
                {{ __('Silahkan periksa email anda untuk verifikasi akun.') }}
                {{ __('Apabila anda tidak menerima email, silahkan kirim ulang.') }}
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kirim Ulang') }}</button>.
            </div>
        </form>
    </div>
</div>
@endsection