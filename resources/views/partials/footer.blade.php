<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="{{asset('img/logo.png')}}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: {{  App\General::where('id',1)->first()->adress }}</li>
                        <li>Phone: {{  App\General::where('id',1)->first()->phonenumber }}</li>
                        <li>Email: {{  App\General::where('id',1)->first()->email }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>ข้อมูลเพิ่มเติม</h6>
                    <ul>

                        <li><a href="{{ route('coupon.index')}}">ส่วนลดโปรโมชั่น</a></li>
                        <li><a href="{{ route('welcome.showdiscount')}}">สินค้าลดราคา</a></li>

                    </ul>
                    <ul>
                        <li><a href="{{ route('welcome')}}">หน้าเเรก</a></li>
                        <li><a href="{{ route('contact.index')}}">ติดต่อเรา</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>รับสมัครข่าวสารของเรา</h6>
                    <p>Get E-mail updates </p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">รับข่าวสาร</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> {{  App\General::where('id',1)->first()->name }} <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://dataghosthunter.com" target="_blank"> Data GhostHunter</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="{{asset('img/payment-item-pay.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

