@extends('layouts.auth')
@section('content')
<div class="wrapper" style="background-image: url('asset/img/14836.jpg'); background-size: cover;">
    <div class="inner">
        <div class="image-holder">
            <img src="asset/img/1.jpg" alt="">
        </div>
        @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif
        <form method="POST" action="{{ url('verify') }}" style="padding-top: 100px">
            @csrf
            <div class="hidden" style="height:50px"></div>
            <h3>Ubah Kata Sandi</h3>
            <div class="form-wrapper">
                <input type="text" placeholder="Masukan Kata Sandi" class="form-control" name="code" required>
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Ulangi Kata Sandi" class="form-control" name="code" required>
                <i class="zmdi zmdi-email"></i>
            </div>
            @if ($errors->has('code'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
            <button>Ubah Password
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>
@endsection