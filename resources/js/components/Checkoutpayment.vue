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
                                                                 <div class="invalide-feedback" id="picturepay"> {{errors.get('picturepay')}}</div>
                                                             <img v-if="imagepayURL" :src="imagepayURL" height="300"   class="mt-3" />

                                                            </div>
                                                          </div>

                                                 <div class="col-lg-12 col-md-8 ">

                                                     <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <p>จำนวน<span>*</span></p>
                                                                <input type="text"  name="pricepay"  v-model="bankform.pricepay" placeholder="จำนวน"  >
                                                                 <div class="invalide-feedback" id="pricepay"> {{errors.get('pricepay')}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <p>เลขที่บัญชี (4 ตัวท้าย)<span>*</span></p>
                                                                <input type="text"  name="accoutnpay" v-model="bankform.accoutnpay" placeholder="4 ตัวท้าย">
                                                                  <div class="invalide-feedback" id="accoutnpay"> {{errors.get('accoutnpay')}}</div>
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
                                   <div class="checkout__order__subtotal_other">
                                     <ul>
                                    <li>ราคารวม<span>{{ totalPrice | currency("฿") }}</span></li>
                                      <li>ส่วนลด<span>{{ checkdiscount(discount) | currency("฿") }}</span></li>
                                       <li v-if="paymentid==2">ค่าบริการเพิ่มเติม<span>{{ checkassery(totalPrice) | currency("฿") }}</span></li>
                                        <li>ค่าจัดส่ง<span>{{ checkdelivery(totalPrice) | currency("฿") }}</span></li>
                                   </ul>
                                </div>
                                <div class="checkout__order__total">ยอดสั่งซื้อรวม <span>{{ (totalPrice-checkdiscount(discount))+checkdelivery(totalPrice)+checkassery(totalPrice) | currency("฿") }}</span></div>

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
  class Errors{
    constructor(){
        this.errors = {};
    }
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    record(errors){
        this.errors = errors.errors;
    }
}
export default {
      props:['paymentid','addressid','bankid','discount'],
        mounted() {
              this.$aes.setKey('base64:GoQmYiFHbf+sgZ0bUNykIasFDHHSvzbNNQ8b397iXQw=')
            this.getcartdetail();
            // this.getshopdetil()
       },

        data(){
             return {
            bankURL:'/shopping/public/img/',
            listCart: [],
            items:[],
              shopdata:{},
              listLength:0,
            getpaymentid:'',
              bankform: {
                picturepay:"",
                pricepay:"",
                accoutnpay:"",
              },
               imagepayURL: null,
                  errors: new Errors(),
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
               checkassery(totalprice){
                    if(this.paymentid==2){
                        var percen = ((totalprice*3)/100)+10;
                    }
                    else{
                         var percen=0;
                    }
                 return percen;
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


                await  axios.get("/shopping/public/cartdetail/detail").then(res => {
                  this.listCart = res.data.listcarts;
                      res.data.listcarts.forEach(item => {
                            this.items.push(item);
                        });


               }).catch(function (error) {
                    console.log(error);
                });
            },
            async gotocomfirm(){

                await  axios.get("/shopping/public/cartdetail/detail").then(res => {
                      const product_check_stock = [];
                      var mylist = res.data.listcarts;
                      var count=0;

                        for(var i=0; i< mylist.length; i++){
                        if(mylist[i]['stock']>0){
                            product_check_stock.push(true);
                        }
                        else{
                            product_check_stock.push(mylist[i]['id']);
                        }
                      }
                    product_check_stock.forEach(item => {
                                    if(item==true){
                                       count+=1;
                                    }
                        });
                     if(count==mylist.length){

                            this.pricetotal = (this.totalPrice-this.$aes.decrypt(this.discount))+this.checkdelivery(this.totalPrice)+this.checkassery(this.totalPrice);

                                    let formData = new FormData();
                                    const { pricepay,accoutnpay} = this.bankform;
                                    formData.append("picturepay",  this.bankform.picturepay);
                                    formData.append("pricepay", pricepay);
                                    formData.append("accoutnpay", accoutnpay);
                                    formData.append("paymentid", this.paymentid);
                                    formData.append("addressid", this.addressid);
                                     formData.append("bankid", this.bankid);
                                    formData.append("totalPrice", this.pricetotal);
                                     axios.post("http://localhost/shopping/public/cart/checkout/confirm",formData,
                                                ).then(response=> {

                                                window.location.href = "http://localhost/shopping/public/order/orderdetail/myorder";

                                            }).catch(error => this.errors.record(error.response.data));
                     }else{
                            product_check_stock.forEach(item => {
                            if(item!=true){
                                     mylist.forEach(item_mylist => {
                                          if(item==item_mylist.id){
                                                 

                                                  let showicon='info';
                                                  let showtitle = item_mylist.name+' ถูกสั่งซื้อไปเเล้ว กรุณาทำรายการใหม่';
                                                  this.showalert(showicon,showtitle);
                                          }

                                     });
                              }
                            });

                      }

                        }).catch(function (error) {
                                console.log(error);
                            });




            },
       showalert(showicon,showtitle) {
                toastr[showicon](showtitle,'', {
                progressBar: true,
                timeOut: 1500,
                extendedTimeOut: 1500,
                 hideDuration: 1500,
                 progressBar: false,
                });

        },
        },


}

</script>


