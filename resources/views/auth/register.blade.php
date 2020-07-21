@extends('layouts.frontend')

@section('content')

<div class="product__details__tab">
    <ul class="nav nav-tabs" role="tablist">

        <li class="nav-item">
            <div class="section-title related__product__title">
                <h3>ลงทะเบียน</h3>
            </div>
        </li>
    </ul>
</div>
<div class="checkout__form">
    <div class="col-lg-12 col-md-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                        <form novalidate method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input id="name" type="text" placeholder="{{ __('ชื่อของคุณ') }}"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input id="email" type="email" placeholder="{{ __('อีเมล') }}"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input id="password" type="password" placeholder="{{ __('รหัสผ่าน') }}"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input id="password-confirm" type="password" class="form-control"  placeholder="{{ __('ยืนยันรหัสผ่านอีกครั้ง') }}"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="site-btn btn-block">
                                        {{ __('ลงทะเบียน') }}
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6 offset-md-3">
                                    <a href="{{url('/')}}/login/facebook" class="info-btn btn-block btn-facebook">
                                        &nbsp;&nbsp;&nbsp; <i class="fa fa-facebook"></i> &nbsp;  {{ __('ลงทะเบียนด้วย Facbook') }}
                                      </a>
                                </div>
                            </div>
                        </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
