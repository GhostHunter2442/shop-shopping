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
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p>วิธีชำระเงิน</p>
								</div>
                                	<div class="order-tracking completed">
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
                <h4> ตรวจสอบและสั่งซื้อ</h4>
                    <div class="row">
                            <div class="col-lg-8 col-md-6 " v-if="paymentid ==1">
                               <div class="check_track_payment">
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="border-payment">
                                    <div class="checkout__order_payment">
                                        <div class="col-sm-12" >

                                                <div class="card-body" >
                                                <h5 class="card-title">อัพโหลดหลักฐานการชำระเงิน</h5>
                                                 <h4></h4>
                                                        <div class="col-lg-12">
                                                            <div class="checkout__input">
                                                                <p>อัพโหลดรูปภาพ<span>*</span></p>
                                                                  <div class="fileUpload">
                                                                <input type="file"  name="picturepay" @change="onFileSelected" placeholder="อัพโหลดรูปภาพ" class="upload">
                                                                   <span>เลือกไฟล์</span>
                                                               </div>
                                                         <img v-if="imagepayURL" :src="imagepayURL" height="300"   class="mt-3" />

                                                            </div>
                                                          </div>

                                                 <div class="col-lg-12 col-md-8 ">

                                                     <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <p>จำนวน<span>*</span></p>
                                                                <input type="text"  name="pricepay"  v-model="bankform.pricepay" placeholder="จำนวน"  >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <p>เลขที่บัญชี (4 ตัวท้าย)<span>*</span></p>
                                                                <input type="text"  name="accoutnpay" v-model="bankform.accoutnpay" placeholder="4 ตัวท้าย">
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <!-- เก้บเงินปลายทาง-->
                        <div class="col-lg-8 col-md-6 " v-if="paymentid ==2">
                               <div class="check_track_payment">
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="border-payment">
                                    <div class="checkout__order_payment">
                                        <div class="col-sm-12" >

                                                <div class="card-body" >
                                                <h5 class="card-title">จัดส่งสินค้าในรูปเเบบเก็บเงินปลายทาง</h5>
                                                   <p class="card-text-detail">เมื่อท่านตรวจสอบความถูกต้องเเล้ว กดปุ่มยืนยันสั่งซื้อสินค้า ได้เลย </p>


                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- เก้บเงินปลายทาง-->
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>สินค้าในตะกร้าสินค้า</h4>
                                <div class="checkout__order__products">สินค้า <span>รวม</span></div>
                                <ul  v-for=" list in listCart"  :key="list.id">
                                    <li>{{ list.name | truncate(15)}}<span>{{ list.price*list.pivot.qty | currency("฿")  }}</span></li>
                                </ul>
                                <div class="checkout__order__subtotal">ราคารวม <span>{{ totalPrice | currency("฿") }}</span></div>
                                <div class="checkout__order__total">ยอดสั่งซื้อรวม <span>{{ totalPrice | currency("฿") }}</span></div>
                             <a href="javascript:;"   v-on:click="gotocomfirm()" class="primary-btn"> ยืนยันสั่งซื้อสินค้า </a>
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
      props:['paymentid','addressid','bankid'],
        mounted() {
            this.getcartdetail();
       },

        data(){
             return {
            bankURL:'/shopping/public/img/',
            listCart: [],
            getpaymentid:'',
              bankform: {
                picturepay:"",
                pricepay:"",
                accoutnpay:"",
              },
               imagepayURL: null,
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
            createtoken(){
                   console.log('createttt')
           },
            onFileSelected(event) {
               const reader = new FileReader();
               reader.onload = event => {
                 this.imagepayURL = event.target.result;
              };
              reader.readAsDataURL(event.target.files[0]);
              this.bankform.picturepay = event.target.files[0];
            },
            async getcartdetail() {
                  console.log(this.getpaymentid)
                  console.log(this.addressid)
                  console.log(this.bankid)

                await  axios.get("/shopping/public/cartdetail/detail").then(res => {
                  this.listCart = res.data.listcarts;

               }).catch(function (error) {
                    console.log(error);
                });
            },
             gotocomfirm(){

                this.pricetotal = this.totalPrice;
                        let formData = new FormData();
                        const { pricepay,accoutnpay} = this.bankform;
                        formData.append("picturepay",  this.bankform.picturepay);
                        //  formData.append("pricepaydeliver", pricepay);
                        formData.append("pricepay", pricepay);
                        formData.append("accoutnpay", accoutnpay);
                        formData.append("paymentid", this.paymentid);
                        formData.append("addressid", this.addressid);
                         formData.append("bankid", this.bankid);
                        formData.append("totalPrice", this.pricetotal);

                        console.log(formData)
                         axios.post("http://localhost/shopping/public/cart/checkout/confirm",formData,
                                    ).then(response=> {
                                //  console.log(response.data)
                                    window.location.href = "http://localhost/shopping/public/order/orderdetail/myorder";
                                    //  window.location.href = response.data;
                                }).catch(function (error) {
                                    console.log(error);
                                });

            },
        },


}

</script>


