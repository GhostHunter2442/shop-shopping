@extends('layouts.frontend')

@section('content')



        <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item">
                    <div class="section-title related__product__title">
                        <h3>เข้าสู่ระบบ</h3>
                    </div>
                </li>
            </ul>
        </div>
        <div class="checkout__form">
        <div class="col-lg-12 col-md-12">
        <div class="container">


            <div class="row justify-content-center">

                <div class="col-md-8">


                        <form novalidate method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                {{-- <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}
                                </label> --}}

                                <div class="col-md-6 offset-md-3">
                                    <input id="email" type="email" placeholder="อีเมล"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}
                                </label> --}}

                                <div class="col-md-6  offset-md-3">
                                    <input id="password" type="password"  placeholder="รหัสผ่าน"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-6 offset-md-7">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('ลืมรหัสผ่าน ?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="site-btn btn-block">
                                        {{ __('เข้าสู่ระบบ') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <a href="{{url('/')}}/login/facebook" class="info-btn btn-block btn-facebook">
                                        &nbsp;&nbsp;&nbsp; <i class="fa fa-facebook"></i> &nbsp;  {{ __('เข้าสู่ระบบด้วย Facbook') }}
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
