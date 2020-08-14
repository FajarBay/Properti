@extends('layouts.auth')
@section('content')
<div class="wrapper" style="background-image: url('asset/img/14836.jpg'); background-size: cover;">
    <div class="inner">
        <div class="image-holder">
            <a href="/utama"><img src="asset/img/1.jpg" alt=""></a>
        </div>
        <form method="POST" action="{{ route('password.email') }}" style="padding-top: 100px">
            @csrf
            <div class="hidden" style="height:50px"></div>
            @if (session('status'))
                <div class="alert1 alert1-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h3>Ubah Kata Sandi</h3>
            <div class="form-wrapper">
                <input id="email" type="email" placeholder="Masukan Email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class="zmdi zmdi-email"></i>
            </div>
            @if(Session::has('message'))
                <div class="alert1 alert1-danger">{{Session::get('message')}}</div>
            @endif
            <button>Kirim</button>
        </form>
    </div>
</div>
@endsection