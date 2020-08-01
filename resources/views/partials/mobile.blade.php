<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{asset('img/logo.png')}}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            @auth   <li><a href="{{ route('favorite.index')}}"><i class="fa fa-heart"></i><cart-favorite > </cart-favorite></a></li>@endauth
            <li><a href="{{ route('cart.cartdetail') }}" ><i class="fa fa-shopping-cart"></i>  @auth   <cart-count> </cart-count> @endauth</a></li>
           
        </ul>

    </div>
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
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class=" {{ request()->routeIs('welcome') ? 'active' :''  }}">
                <a href="{{ route('welcome')}}">หน้าเเรก</a></li>
                <li class=" {{ request()->routeIs('welcome.showdiscount') ? 'active' :''  }}">
                    <a href="{{ route('welcome.showdiscount')}}">สินค้าลดราคา</a>
                </li>
                <li class=" {{ request()->routeIs('coupon.index') ? 'active' :''  }}">
                    <a  href="{{ route('coupon.index')}}">ส่วนลดโปรโมชั่น</a>
                </li>
                <li class=" {{ request()->routeIs('contact.index') ? 'active' :''  }}">
                    <a href="{{ route('contact.index')}}">ติดต่อเรา</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> {{  App\General::where('id',1)->first()->email }}</li>
            <li>บริการจัดส่งฟรีเมื่อซื้อสินค้าครบตามเงื่อนไข</li>
        </ul>
    </div>
</div>
