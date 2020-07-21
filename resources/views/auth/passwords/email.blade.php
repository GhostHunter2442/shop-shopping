@extends('layouts.frontend')

@section('content')
<div class="product__details__tab">
    <ul class="nav nav-tabs" role="tablist">

        <li class="nav-item">
            <div class="section-title related__product__title">
                <h3>รีเซ็ตรหัสผ่านของคุณ</h3>
            </div>
        </li>
    </ul>
</div>
<div class="checkout__form">
    <div class="col-lg-12 col-md-12">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3">
                                <input id="email" type="email"  placeholder="{{ __('อีเมล') }}"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit"  class="site-btn btn-block">
                                    {{ __('ส่งรหัสผ่าน') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
