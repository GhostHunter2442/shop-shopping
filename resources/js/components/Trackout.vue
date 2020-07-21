<template>
    <div>
      <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="status__checkout">

						<div class="col-12 col-md-12 hh-grayBox pt45 pb20">
							<div class="row justify-content-between">
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p>ที่อยู่สำหรับการจัดส่ง </p>
								</div>
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p>รูปเเบบการจัดส่ง</p>
								</div>
								<div class="order-tracking">
									<span class="is-complete"></span>
									<p>วิธีชำระเงิน</p>
								</div>
                                	<div class="order-tracking">
									<span class="is-complete"></span>
									<p>ตรวจสอบเเละสั่งซื้อ</p>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
          <!-- Checkout Section Begin -->
    <section class="checkout spad" >
        <div class="container">

            <div class="checkout__form">
                <h4> เลือกรูปแบบการจัดส่ง</h4>

                    <div class="row">
                        <div class="col-lg-8 col-md-6 " >
                            <div class="check_track_payment">
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="border-payment">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-6 col-sm-8" v-for=" paylist in payment"  :key="paylist.id">
                                                <div class="show_track" >
                                                        <div class="card-body">
                                                            <div class="checkout__track__checkbox">
                                                                <div class="track">
                                                                <label  for="payment"  :for="paylist.id">
                                                                    <input type="radio" :id="paylist.id" :value="paylist.id"   v-model="paymentID">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                </div>
                                                            </div>
                                                            <img class="card-img-top" src="/shopping/public/img/Kerry.png" alt="Card image cap">
                                                                <p class="card-text">{{paylist.detail}}</p>
                                                        </div>
                                                </div>
                                          </div>
                                     </div>

                                    <div class="checkout__order_track">
                                        <div class="col-sm-12" v-if="paymentID!=''">
                                            <div  v-for=" list in payment"  :key="list.id">
                                                <div class="card-body" v-if="list.id == paymentID">
                                                <h5 class="card-title">{{list.detail}}</h5>
                                                  <div class="checkout_payment_track">
                                                        <p class="card-text">ตามราคารวมในตะกร้าสินค้า - จัดส่งภายใน   <label class="check-day">1 วันทำการ</label></p>
                                                            <ul>
                                                            <li> ซื้อสินค้าไม่เกิน (฿) 2,999.00<span> ค่าจัดส่ง (฿) 50.00 </span></li>
                                                              <li> ซื้อสินค้ามากกว่า (฿) 2,999.00<span>ค่าจัดส่ง (฿) 0.00</span></li>
                                                            </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      </div>
                            </div>
                            </div>

                            <div class="border-address my-3">

                               <div class="col-lg-12 col-md-8 ">

                                     <div class="row ">

                                            <div class="col-lg-6 col-md-6 col-sm-8">
                                                 <div class="header__address">
                                                <p class="card-text"> ที่อยู่สำหรับการจัดส่ง </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-8">
                                                  <div class="header__address">
                                                <p class="card-text"> เบอร์โทรศัพท์ </p>
                                                </div>
                                            </div>

                                     </div>
                                </div>
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="row ">
                                     <div class="col-lg-6 col-md-6 col-sm-8">
                                            <div class="card-body">
                                            <div class="payment__address">
                                             <p class="card-text">{{addressget.firstname}} {{addressget.lastname}}</p>
                                             <p class="card-text">{{addressget.adress2}}</p>
                                              <p class="card-text">{{addressget.adress3}}</p>
                                             <p class="card-text">{{addressget.adress1}}</p>
                                             <p class="card-text">{{addressget.email}}</p>
                                             <p class="card-text">{{addressget.other}}</p>
                                             </div>
                                          </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-8">
                                                 <div class="card-body">
                                                        <div class="show_track_detail">
                                                            <ul>
                                                            <li><i class="fa fa-phone"></i>{{addressget.phonenumber}}</li>
                                                            </ul>
                                                              <p class="card-text">ใช้สำหรับติดต่อก่อนจัดส่งสินค้า กรุณาตรวจสอบความถูกต้อง</p>
                                                        </div>
                                                 </div>
                                               </div>
                                        </div>

                                </div>
                             </div>

                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>สินค้าในตะกร้าสินค้า</h4>
                                <div class="checkout__order__products">สินค้า <span>รวม</span></div>
                                <ul  v-for=" list in listCart"  :key="list.id">
                                    <li>{{ list.name | truncate(15)}}<span>{{ list.price*list.pivot.qty | currency("฿")  }}</span></li>

                                </ul>
                                <div class="checkout__order__subtotal">ราคารวม <span>{{ totalPrice | currency("฿") }}</span></div>
                                <div class="checkout__order__total">ยอดสั่งซื้อรวม <span>{{ totalPrice | currency("฿") }}</span></div>



                                <!-- <button   class="primary-btn">ดำเนินการต่อ</button> -->
                                 <a href="javascript:;"   v-on:click="gotopayment()" class="primary-btn"> ดำเนินการต่อ </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    </div>
</template>
<script>
export default {
        props:['id'],
        mounted() {
            this.getcartdetail();
            this.getaddressid();
       },

        data(){
             return {
              listCart: [],
              addressget:{},
              paymentID:'',
                 payment: [
                            {id: 1, detail: 'Kerry-โอนผ่านธนาคาร'},
                            {id: 2, detail: 'Kerry-เก็บเงินปลายทาง'},
                            {id: 3, detail: 'Kerry-บัตรเครดิต'},
                        ],
             }

        },
          computed: {
                  totalPrice() {
                    return this.listCart.reduce(
                        (total, list) => total + (list.price*list.pivot.qty),
                        0
                    );
                },
         },
        methods:{
            async getcartdetail() {
              
                await  axios.get("/shopping/public/cartdetail/detail").then(res => {
                  this.listCart = res.data.listcarts;

               }).catch(function (error) {
                    console.log(error);
                });
            },
            async getaddressid() {
                await  axios.get("/shopping/public/cart/checkout/addressid/"+this.id).then(res => {
                  this.addressget = res.data;
               }).catch(function (error) {
                    console.log(error);
                });
            },
            gotopayment(){
                  if(this.paymentID !=''){
                         window.location.href = "http://localhost/shopping/public/cart/checkout/payment/"+this.id+'/'+this.paymentID;
                  }
                  else{
                       const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'เลือกรูปแบบการจัดส่ง'
                    })
                  }
            },
        }

}

</script>
