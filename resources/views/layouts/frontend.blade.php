<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>  {{ config('app.name')}}</title>


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/themecss/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/themecss/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/themecss/elegant-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/themecss/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('css/themecss/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/themecss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/themecss/slicknav.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/toastr.css')}}">

    <style>


    </style>
</head>

<body>

   <div id="app">
 <!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
@include('partials.mobile')
<!-- Humberger End -->

<!-- Header Section Begin -->

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> data@colorlib.com</li>
                            <li> <span>บริการจัดส่งฟรีเมื่อซื้อสินค้าครบตามเงื่อนไข</span></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>

                        </div>
                           <!-- Authentication Links -->
                           @guest
                        <div class="header__top__right__social">
                             <a href="{{ route('login') }}"><i class="fa fa-user"></i> เข้าสู่ระบบ </a>
                        </div>
                        @if (Route::has('register'))
                        <div class="header__top__right__auth">
                            <a href="{{ route('register') }}"> ลงทะเบียน</a>
                        </div>
                        @endif
                        @else
                        <div class="header__top__right__language">

                            <div>{{ Auth::user()->name }} </div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                @role('admin') <li><a href="{{ route('home')}}">Dashboard</a></li>@endrole
                                <li><a href="{{ route('order.index')}}">การซื้อขอฉัน</a></li>
                                <li><a href="{{ route('favorite.index')}}">สินค้าโปรด</a></li>
                                <li>  <a href="{{ route('logout')}}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    ออกจากระบบ</a></li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                       </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav_fix_bar">
    <div class="container ">

        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="{{asset('img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                    <li class=" {{ request()->routeIs('welcome') ? 'active' :''  }}">
                        <a href="{{ route('welcome')}}">หน้าเเรก</a></li>
                        <li ><a href="./shop-grid.html">ซื้อสินค้า</a></li>
                        <li><a href="#">สินค้าลดราคา</a></li>
                        <li ><a href="#">ส่วนลด</a></li>
                    <li class=" {{ request()->routeIs('contact.index') ? 'active' :''  }}">
                        <a href="{{ route('contact.index')}}">ติดต่อเรา</a></li>
                          {{-- <a href="{{ route('keyry.index')}}">kerry api</a></li> --}}

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                    @auth  <li><a href="{{ route('favorite.index')}}"><i class="fa fa-heart"></i> <cart-favorite > </cart-favorite> </a></li>@endauth

                    {{-- <li><a href="{{ route('cart.cartdetail') }}" ><i class="fa fa-shopping-cart"></i>  @auth   <cart-count  :cartcount="totalItems" > </cart-count> @endauth</a></li> --}}
                    <li><a href="{{ route('cart.cartdetail') }}" ><i class="fa fa-shopping-cart"></i>  @auth   <cart-count> </cart-count> @endauth</a></li>

            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Hero Section End -->



<!-- Product Section Begin สวน content ทั้งหมด-->
<section class="hero">
    <div class="container">
        @yield('content')

    </div> {{-- end div app --}}
</section>
<!-- Product Section End -->
</div>
<!-- Footer Section Begin -->
@include('partials.footer')
<!-- Footer Section End -->
<script>

</script>

<script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>
    <script src="{{ asset('js/app.js')}}"></script>

    <script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    {{-- <script src="{{ asset('js/vue2-filters.min.js')}}"></script> --}}

    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <!-- Js Plugins -->
    <script src="{{ asset('js/themejs/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('js/themejs/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/themejs/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('js/themejs/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/themejs/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/themejs//main.js')}}"></script>


    {{-- @yield('sweetaler2script') --}}


</body>

</html>
