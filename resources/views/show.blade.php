@extends('layouts.frontend')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-5">
        <div class="sidebar">
            <div class="sidebar__item">
                <h4>ประเภทสินค้า</h4>
                <ul>
                    <li>
                    @foreach ($categoryAll as $c)
                    <a href="{{ route('welcome.show',['id'=>$c->id]) }}">{{$c->name}}
                    @foreach($total_product as $t)
                    @if ($c->id == $t->category_id  ) ({{$t->total}})

                    @endif

                     @endforeach
                    @endforeach

                </a>
                </li>
                </ul>
            </div>

            <div class="sidebar__item">
                <h4>ราคา</h4>
                <div class="price-range-wrap">
                    <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                        data-min="800" data-max="10000">
                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    </div>
                    <div class="range-slider">
                        <div class="price-input">
                            <input type="text" id="minamount">
                            <input type="text" id="maxamount">
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar__item sidebar__item__color--option">
                <h4>ผู้ใช้งาน</h4>

                <div class="sidebar__item__color sidebar__item__color--red">
                    <label for="red">
                        ผู้หญิง
                        <input type="radio" id="red">
                    </label>
                </div>

                <div class="sidebar__item__color sidebar__item__color--green">
                    <label for="green">
                        ผู้ชาย
                        <input type="radio" id="green">
                    </label>
                </div>
            </div>
            <div class="sidebar__item">
                <h4>สินค้าขายดี</h4>
                @foreach ($categoryAll as $c)
                <div class="sidebar__item__size">
                    <label for="large">
                        {{$c->name}}
                        <input type="radio" id="large">
                    </label>
                </div>
                @endforeach
            </div>
            <div class="sidebar__item">
                <div class="latest-product__text">
                    <h4>ขายล่าสุด</h4>
                    <div class="latest-product__slider owl-carousel">

                        <div class="latest-prdouct__slider__item">
                            @foreach ($product_last_price as $p_last)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('img/latest-product/lp-4.jpg')}}"   alt="">
                                </div>
                                <div class="latest-product__item__text">
                                <h6>{{$p_last->name}}</h6>
                                    <span>฿{{$p_last->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>

                    <div class="latest-prdouct__slider__item">
                        @foreach ($product_last_price as $p_last)
                        <a href="#" class="latest-product__item">
                            <div class="latest-product__item__pic">
                                <img src="{{asset('img/latest-product/lp-4.jpg')}}"   alt="">
                            </div>
                            <div class="latest-product__item__text">
                            <h6>{{$p_last->name}}</h6>
                                <span>฿{{$p_last->price}}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="col-lg-9 col-md-7"> {{-- ส่วนสินค้าลดราคา กับ ทั้งหมด --}}
           <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title product__discount__title">
                <h2>{{$category->name}}</h2>

                </div>
                {{-- <h6><span>{{ $count_product}}</span> รายการ</h6> --}}
            </div>
            </div>

        {{-- ส่วนขอสินขาที่ขายทั้งหมด --}}
        <div class="row">
       @foreach($category->products as $pro)
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/'.$pro->picture)}}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="{{ route('cart.store',['product_id'=>$pro->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                    <h6><a href="#">{{$pro->name}}</a></h6>
                    <h5>฿{{ $pro->price}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        </div> {{-- ส่วนขอสินขาที่ขายทั้งหมด --}}
        <div class="product__pagination">
            <a href="#"> </a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div> {{-- ส่วนสินค้าลดราคา กับ ทั้งหมด --}}



</div>

@endsection

@section('sweetaler2script')

<script>


</script>

@endsection
