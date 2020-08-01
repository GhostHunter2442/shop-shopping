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
                <h4>เลือกวิธีการชำระเงิน</h4>
                    <div class="row">
                        <div class="col-lg-8 col-md-6 " v-if="paymentid ==1">
                            <div class="check_track_payment">
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="border-payment">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-4" v-for=" banklist in bank"  :key="banklist.id">
                                                <div class="show_payment" >
                                                        <div class="card-body">
                                                            <div class="checkout__payment__checkbox">
                                                                <div class="track">
                                                                <label  for="payment"  :for="banklist.id">
                                                                    <input type="radio" :id="banklist.id" :value="banklist.id"   v-model="bankID">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                </div>
                                                            </div>
                                                            <img class="card-img-top" :src="bankURL+banklist.bankpic" alt="Card image cap">
                                                                <p class="card-text">{{banklist.name}} </p>
                                                        </div>
                                                </div>
                                          </div>
                                     </div>

                                    <div class="checkout__order_track">
                                        <div class="col-sm-12"  v-if="bankID!=''">
                                            <div  v-for=" list in bank"  :key="list.id">
                                                <div class="card-body" v-if="list.id == bankID">
                                                <h5 class="card-title">โอนเงินผ่านบัญชีธนาคาร{{list.name}}</h5>
                                                  <div class="checkout_payment_track">
                                                        <p class="card-text">ชำระค่าสินค้าด้วยการโอนเงินผ่านบัญชีธนาคารที่ระบุไว้ด้านล่าง โดยคุณสามารถทำธุรกรรมผ่านตู้ ATM หรือช่องทางการชำระเงินอื่นๆ ของธนาคารที่คุณสะดวก
                                                            กรุณาทำการโอนและแจ้งการชำระเงินภายในเวลาที่ร้านค้ากำหนด เพื่อไม่ให้สินค้าที่คุณสั่งซื้อหลุดไป</p>

                                                    <div class="chackout__bank__table">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th class="checkout__payment__head">
                                                                     <p class="card-text"> ธนาคาร </p>
                                                                     </th>
                                                                    <th class="checkout__payment__center">
                                                                     <p class="card-text"> ชื่อบัญชี </p>
                                                                     </th>
                                                                    <!-- <th><p class="card-text"> ชื่อบัญชี </p></th> -->
                                                                    <th ><p class="card-text">หมายเลขบัญชี</p></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr >
                                                                    <td class="chackout__bank__item">
                                                                      <h5> {{list.detail}} </h5>
                                                                      <p class="card-text">{{list.subdetail}}</p>
                                                                    </td>

                                                                    <td class="chackout__bank__item_heard">
                                                                         <h5>  {{list.account}}</h5>
                                                                    </td>
                                                                    <td class="chackout__bank__item_center">
                                                                         <h5>   {{list.accountid}}</h5>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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

                    <!-- ชำระเงินปลายทาง -->
                    <div class="col-lg-8 col-md-6 " v-if="paymentid ==2">
                            <div class="check_track_payment">
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="border-payment">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-4" >
                                                <div class="show_payment" >
                                                        <div class="card-body">

                                                            <img class="card-img-top" :src="bankURL+'cashondelivery.png'" alt="Card image cap">
                                                                <p class="card-text">ชำระเงินปลายทาง </p>
                                                        </div>
                                                </div>
                                          </div>
                                     </div>

                                    <div class="checkout__order_track">
                                        <div class="col-sm-12" >
                                            <div >
                                                <div class="card-body" >
                                                <h5 class="card-title">ชำระเงินแบบเก็บเงินปลายทาง</h5>
                                                  <div class="checkout_payment_track">
                                                        <p class="card-text">ชำระเงินสำหรับการสั่งซื้อกับเจ้าหน้าที่จัดส่งได้โดยตรง ในวันที่คุณได้รับสินค้า
                                                        กรุณาเตรียมเงินให้พอดีกับยอดที่ต้องชำระเพื่อความสะดวกรวดเร็ว</p>
                                                        <h4></h4>
                                                        <p class="card-text-detail">ค่าบริการเพิ่มเติม 3.00% + (฿) 10.00</p>
                                                        <p class="card-text-detail">ยอดชำระขั้นต่ำ (฿) 200.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <!-- ชำระเงินปลายทาง -->
                     <!-- บัตรครดิต -->
                    <div class="col-lg-8 col-md-6 " v-if="paymentid ==3">
                            <div class="check_track_payment">
                                <div class="col-lg-12 col-md-8 ">
                                    <div class="border-payment">
                                    <div class="row ">
                                        <div class="col-lg-3 col-md-3 col-sm-4" >
                                                <div class="show_payment" >
                                                        <div class="card-body">

                                                            <img class="card-img-top" :src="bankURL+'craditcart.png'" alt="Card image cap">
                                                                <p class="card-text">ชำระเงินด้วยบัตรเครดิต/เดบิต </p>
                                                        </div>
                                                </div>
                                          </div>
                                     </div>

                                    <div class="checkout__order_track">
                                        <div class="col-sm-12" >
                                            <div >
                                                <div class="card-body" >
                                                <h5 class="card-title">ชำระเงินด้วยบัตรเครดิต/เดบิต</h5>
                                                  <div class="checkout_payment_track">
                                                        <p class="card-text">ยืนยันการสั่งซื้อและชำระเงินได้ทันทีในคราวเดียว เมื่อคุณเลือกวิธีชำระค่าสินค้าแบบ ชำระเงินด้วยบัตรเครดิต/เดบิต ที่มีความปลอดภัยสูงสุด
                                                         <br>
                                                        ทันทีที่คุณกดปุ่มชำระค่าสินค้าด้านล่าง ระบบจะพาคุณไปยังหน้าของ กรอกข้อมูบบัตร เพื่อทำการชำระเงิน</p>
                                                        <h4></h4>
                                                        <p class="card-text-detail">ค่าบริการเพิ่มเติม 4.00%</p>
                                                        <p class="card-text-detail">ยอดชำระขั้นต่ำ (฿) 600.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <!-- บัตรครดิต -->

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
                                        <li>ค่าจัดส่ง<span>{{ checkdelivery(totalPrice) | currency("฿") }}</span></li>
                                   </ul>
                                </div>
                                <div class="checkout__order__total">ยอดสั่งซื้อรวม <span>{{ (totalPrice-checkdiscount(discount))+checkdelivery(totalPrice) | currency("฿") }}</span></div>



                             <a href="javascript:;"   v-on:click="gotocheckout()" class="primary-btn"> ดำเนินการต่อ </a>
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
      props:['paymentid','addressid','discount'],
        mounted() {
             this.$aes.setKey('base64:GoQmYiFHbf+sgZ0bUNykIasFDHHSvzbNNQ8b397iXQw=')
            this.getcartdetail();
            this.getbanks();
       },

        data(){
             return {
            bankURL:APP_IMG+'bank/',
            listCart: [],
              bankID:'',

             bank:[]
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
                checkdiscount(discount){

                return this.$aes.decrypt(discount)
               },
                 checkdelivery(totalprice){
                return totalprice<3000 ? 50 :0;
               },
               async getbanks() {

                await  axios.get(APP_URL+"cart/checkout/banks").then(res => {
                  this.bank = res.data;

               }).catch(function (error) {
                    console.log(error);
                });
            },
            async getcartdetail() {
                 
                await  axios.get(APP_URL+"cartdetail/detail").then(res => {
                  this.listCart = res.data.listcarts;

               }).catch(function (error) {
                    console.log(error);
                });
            },
           async  gotocheckout(){
                  if(this.paymentid ==1){
                     if(this.bankID !=''){
                        window.location.href = APP_URL+'cart/checkout/checkoutpament/'
                         +this.paymentid+'/'+this.addressid+'/'+this.bankID+'/'+this.discount;
                     }
                     else{
                           toastr['info']('เลือกวิธีการชำระเงิน','', {
                        progressBar: true,
                        timeOut: 1500,
                        extendedTimeOut: 1500,
                        hideDuration: 1500,
                        progressBar: false,
                        });

                     }
                  }
                  else if(this.paymentid ==2){
                        window.location.href = APP_URL+'cart/checkout/checkoutpament/'
                           +this.paymentid+'/'+this.addressid+'/0/'+this.discount;
                  }
                   else if(this.paymentid ==3){
                        window.location.href = APP_URL+'cart/checkout/paymentomise/'
                        +this.paymentid+'/'+this.addressid+'/0/'+this.discount;
                  }
            },
        },


}

</script>
