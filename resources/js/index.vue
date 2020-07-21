<template>
    <div>
 <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">

                 <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>บัญชีของฉัน </span>
                        </div>
                        <ul >

                               <li><a href="#"> <router-link  :to="{name :'profile'}">โปรไฟล์ของฉัน</router-link></a></li>
                                <li><a href="#"><router-link  :to="{name :'address'}">ที่อยู่จัดส่ง</router-link></a></li>
                                <li><a href="#">  <router-link  :to="{name :'order'}">การสั่งซื้อ</router-link></a></li>
                                <li><a href="#"><router-link  :to="{name :'password'}">เปลี่ยนรหัสผ่าน</router-link></a></li>

                        </ul>
                    </div>
                </div>
                  <div class="col-lg-9 col-md-7">
                  <router-view></router-view>
                  </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    </div>
</template>
<style>
</style>
