@extends('layouts.auth')
@section('content')
<div class="wrapper" style="background-image: url('asset/img/14836.jpg'); background-size: cover;">
    <div class="inner">
        <div class="image-holder">
            <img src="asset/img/1.jpg" alt="">
        </div>
        <form method="POST" action="{{ url('verify') }}" style="padding-top: 100px">
            @csrf
            <div class="hidden" style="height:50px"></div>
            <h3>Verifikasi Akun</h3>
            <div class="form-wrapper">
                <input type="text" placeholder="Masukan Kode" class="form-control" name="code" required>
                @if(Session::has('message'))
                <div class="alert1 alert1-danger">{{Session::get('message')}}</div>
                @endif
                <i class="zmdi zmdi-email"></i>
            </div>
            @if ($errors->has('code'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
            <div class="form-check">
                <a class="a" href="">Kirim kode baru</a>
                <input type="hidden" name="phone" value="$request['phone']">
            </div>
            <button>KIRIM
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please verify code from your phone number to active account') }}</div>

                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-danger">{{Session::get('message')}}</div>
                    @endif
                    <form method="POST" action="{{ url('verify') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required>

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim') }}
                                </button>

                           
                            </div>
                        </div>
 
                    </form>
                </div>
                <div class="card-footer">
                    <a href="">Reduest new code</a>
                    <input type="hidden" name="phone" value="$request['phone']">
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection