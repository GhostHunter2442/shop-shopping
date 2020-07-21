@extends('layouts.frontend')
@section('content')
    <!-- Shoping Cart Section Begin -->
    @if (count($listCart) > 0)
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shoping__checkout">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">สินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ยอดรวม</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listCart as $indexKey => $cart)
                                <tr>

                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('storage/images/resize/'.$cart->picture)}}" alt="" width="60">
                                        <h5>{{ str_limit($cart->name,15)}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{ number_format($cart->price,2) }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" id="qty" value="{{ $cart->pivot->qty}}" >
                                                <input type="hidden" id="product_id" value="{{ $cart->pivot->product_id}}" >
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{ number_format($cart->sumqtr,2) }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                  <a href="{{ route('cart.delete',['product_id'=>$cart->id] ) }}">  <span class="fa fa-times"></span></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="shoping__checkout">
                        <h5>สรุปรายการสั่งซื้อ</h5>
                        <ul>
                            <li>ราคารวม <span>${{ number_format($sumPrice,2) }}</span></li>
                            <li>ส่วนลด <span>$0.00</span></li>
                            <li>ยอดสั่งซื้อรวม <span>${{ number_format($sumPrice,2) }}</span></li>
                        </ul>
                    <a href="{{ route('cart.confirm') }}" class="primary-btn">ดำเนินการต่อ</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 my-5">
                    <div class="shoping__cart__btns">
                    <a href="{{ route('welcome') }}" class="primary-btn cart-btn">กลับไปเลือกสินค้า</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>โค๊ดส่วนลด</h5>
                            <form action="#">
                                <input type="text" placeholder="ใส่โค๊ดส่วนลด">
                            <a  href="#" class="site-btn">ใช้งาน</a>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>สรุปรายการสั่งซื้อ</h5>
                        <ul>
                            <li>ราคารวม <span>${{ number_format($sumPrice,2) }}</span></li>
                            <li>ส่วนลด <span>$0.00</span></li>
                            <li>ยอดสั่งซื้อรวม <span>${{ number_format($sumPrice,2) }}</span></li>
                        </ul>
                    <a href="{{ route('cart.confirm') }}" class="primary-btn">ดำเนินการต่อ</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    @else
    <section class="shoping-cart spad">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-6 offset-md-5">
                    <div class="shoping__cart__table">
            <img src="{{asset('img/cart.png')}}" alt="" width="250">
        </div> <p>ไม่มีรายการสินค้าในตะกร้า</p>
            <p>คลิกปุ่มด้านนล่างเพื่อเลือกซื้อสินค้าต่อ</p>

        </div>
        </div>
    </div>
</div>
</section>
        @endif
    <!-- Shoping Cart Section End -->


    @endsection

