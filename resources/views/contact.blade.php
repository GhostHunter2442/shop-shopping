@extends('layouts.frontend')

@section('content')

    <!-- Breadcrumb Section Begin -->

    <!-- Breadcrumb Section End -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <!-- <h2>Contact Us</h2> -->
                        <div class="breadcrumb__option">
                            <!-- <a href="./index.html">รายการสินค้า</a> -->
                             <h5>G-SHOCK</h5>
                            <span>Its full form is Gravitaitional Shock.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach ($generals as $item)
<div class="row my-5">



    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
            <span class="icon_phone"></span>
            <h4>Phone</h4>
        <p>{{ $item->phonenumber }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
            <span class="icon_pin_alt"></span>
            <h4>Address</h4>
            <p>{{ $item->adress }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
            <span class="icon_clock_alt"></span>
            <h4>Open time</h4>
            <p>{{ $item->open_time }} - {{ $item->close_time }}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
            <span class="icon_mail_alt"></span>
            <h4>Email</h4>
        <p>{{$item->email }}</p>
        </div>
    </div>

</div>


<div class="map">

@if (!empty($item->map_fram))
@php  echo nl2br($item->map_fram)   @endphp
<div class="map-inside">
    <i class="icon_pin"></i>
    <div class="inside-widget">
        <h4>ประเทศไทย</h4>
        <ul>
            <li>Phone: {{ $item->phonenumber }}</li>
            <li>Add: {{ $item->adress }}</li>
        </ul>
    </div>
</div>
</div>
@endif

@endforeach

@endsection
