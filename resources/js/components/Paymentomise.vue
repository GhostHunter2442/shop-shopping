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

                  <form  @submit.prevent="submit" id="checkout-form">
                       <!-- <input type="hidden" name="omise_token" v-model="omise_token" > -->
                    <div class="row">
                        <!-- บัตรเครดิต -->
                        <div class="col-lg-8 col-md-6 ">
                               <div class="check_track_payment">
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="border-payment">
                                    <div class="checkout__order_payment">
                                        <div class="col-sm-12" >

                                                <div class="card-body" >
                                                <h5 class="card-title">ชำระเงินด้วยบัตรเครดิต</h5>
                                                 <h4></h4>
                                                        <div class="col-lg-12">
                                                            <div class="checkout__input">
                                                                <p>หมายเลขบัตร<span>*</span></p>
                                                                <input type="text"  name="number" data-omise="number" v-model="card.number" placeholder="กรอกเลขบัตร 16 ตัว"  >
                                                                 <div class="invalide-feedback" id="number">
                                                                </div>
                                                            </div>
                                                          </div>

                                                        <div class="col-lg-12">
                                                            <div class="checkout__input">
                                                                <p>ชื่อบัตร<span>*</span></p>
                                                                <input type="text"  name="holder_name"  data-omise="holder_name" v-model="card.name" placeholder="ชื่อบัตร"  >
                                                                 <div class="invalide-feedback" id="holder_name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                 <div class="col-lg-12 col-md-8 ">
                                                      <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <p>วันหมดอายุ<span>*</span></p>

                                                                  <div class="row">

                                                                        <div class="col-lg-6">
                                                                            <input type="text"  name="expiration_month"  data-omise="expiration_month" v-model="card.expiration_month" placeholder="MM"  >
                                                                             <div class="invalide-feedback" id="expiration_month">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <input type="text"  name="expiration_year"   data-omise="expiration_year" v-model="card.expiration_year" placeholder="YY"  >
                                                                            <div class="invalide-feedback" id="expiration_year">
                                                                            </div>
                                                                       </div>

                                                                 </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <p>รหัสหลังบัตร <CODE></CODE><span>*</span></p>
                                                                <input type="text"  name="security_code" data-omise="security_code"  v-model="card.security_code" placeholder="CVV/CVV2">
                                                                 <div class="invalide-feedback" id="security_code">
                                                                  </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                 </div>
                                                   <div class="col-lg-12 col-md-8 ">
                                                     <div class="invalidefeedback" id="error_code"></div>
                                                    </div>
                                             </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- บัตรเครดิต -->

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>สินค้าในตะกร้าสินค้า</h4>
                                <div class="checkout__order__products">สินค้า <span>รวม</span></div>
                                <ul  v-for=" list in listCart"  :key="list.id">
                                    <li>{{ list.name | truncate(15)}}<span>{{ list.price*list.pivot.qty | currency("฿")  }}</span></li>
                                </ul>
                                <div class="checkout__order__subtotal_other">
                                     <ul>
                                    <li>ราคารวม<span>{{ totalPrice | currency("฿") }}</span></li>
                                     <li>ส่วนลด<span>{{ checkdiscount(discount) | currency("฿") }}</span></li>
                                      <li>ค่าบริการเพิ่มเติม<span>{{ otherprice | currency("฿") }}</span></li>
                                       <li>ค่าจัดส่ง<span>{{ checkdelivery(totalPrice) | currency("฿") }}</span></li>
                                   </ul>
                                </div>

                                <div class="checkout__order__total">ยอดสั่งซื้อรวม <span>{{ (totalPrice+otherprice+checkdelivery(totalPrice))-checkdiscount(discount) | currency("฿") }}</span></div>
                               <button type="submit"   class="primary-btn">ยืนยันสั่งซื้อสินค้า</button>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    </div>
</template>

<script>
export default {
      props:['paymentid','addressid','bankid','discount'],
        mounted() {
             this.$aes.setKey('base64:GoQmYiFHbf+sgZ0bUNykIasFDHHSvzbNNQ8b397iXQw=')
            this.getcartdetail();
       },

        data(){
             return {
            bankURL:APP_URL+'img/',
            listCart: [],

              card :{
                  name:"",
                  number:"",
                  expiration_month:"",
                  expiration_year:"",
                  security_code:"",
              },
               imagepayURL: null,
             }

        },

          computed: {
              otherprice(){
                   return this.listCart.reduce(
                        (total, list) => (total + (list.price*list.pivot.qty)*0.04),
                        0
                    );
              },
              totalPrice() {
                    return this.listCart.reduce(
                        (total, list) => total + (list.price*list.pivot.qty),
                        0
                    );
                },
         },
        methods:{
                checkdiscount(discount){

                return this.$aes.decrypt(discount)
               },
                 checkdelivery(totalprice){
                return totalprice<3000 ? 50 :0;
               },
            async getcartdetail() {


                await  axios.get(APP_URL+"cartdetail/detail").then(res => {
                  this.listCart = res.data.listcarts;

               }).catch(function (error) {
                    console.log(error);
                });
            },
             submit(){
                    let pricetotal = ((this.totalPrice+this.otherprice+this.checkdelivery(this.totalPrice))-this.$aes.decrypt(this.discount))*100;

                   if(this.totalPrice>600){
                     let addressid = this.addressid;
                    let bankid = this.bankid;
                    let paymentid =  this.paymentid;
                    Omise.setPublicKey("pkey_test_5kbvkp0spzbihnxs9tc");
                        Omise.createToken("card", this.card, function (statusCode, response) {

                                if (response.object == "error") {

                                let message_text = "";
                                if(response.object == "error") {
                                    let re = /\s*(?:,|$)\s*/
                                    let nameList = response.message.split(re)
                                     console.log(nameList)

                                        for (let i = 0; i < nameList.length; i++) {
                                            console.log(nameList[i]);
                                            message_text = message_text+'&#8226; '+nameList[i]+'</br>';
                                        }
                                        $("#error_code").html(message_text);
                                 }


                            }
                                else {
                                   let omise_token=response.id;

                                       let formData = new FormData();
                                        formData.append("omiseToken",  omise_token);
                                        formData.append("pricetotal",   pricetotal);
                                        formData.append("addressid", addressid);
                                        formData.append("bankid", bankid);
                                         formData.append("paymentid", paymentid);

                                    axios.post(APP_URL+"cart/checkout/confirmcard",formData,
                                        ).then(response=> {

                                               window.location.href = APP_URL+'order/orderdetail/myorder';
                                    }).catch(function (error) {
                                        console.log(error);
                                    });
                                 }
                          });


                   }else{
                       toastr['info']('ยอดการสั่งซื้อไม่ถึงเกณฑ์','', {
                        progressBar: true,
                        timeOut: 1500,
                        extendedTimeOut: 1500,
                        hideDuration: 1500,
                        progressBar: false,
                        });
                   }


            },
        },


}

</script>


