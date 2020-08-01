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
								<div class="order-tracking ">
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
                <h4>ชื่อและที่อยู่สำหรับการจัดส่งสินค้า</h4>
            <form  @submit.prevent="submit" >
                    <div class="row">
                          <div class="col-lg-8 col-md-6" v-if="showaddress_defalse">
                            <div class="row">

                            </div>
                            </div>
                          <div class="col-lg-8 col-md-6" v-if="showaddress_one">
                            <div class="row">
                                <div class="col-sm-6 " v-for=" addlist in addressList"  :key="addlist.id">
                                    <div class="show_address" >
                                                <div class="checkout__input__checkbox">
                                                    <label for="payment" :for="addlist.id">
                                                        <p class="card-title">{{ addlist.firstname}} {{ addlist.lastname}}</p>
                                                        <input type="radio"   :id="addlist.id" :value="addlist.id"   v-model="addressID">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                </div>

                                                 <p class="card-text">{{ addlist.adress2}} {{ addlist.adress3}}</p>

                                                 <p class="card-text">{{ addlist.adress1}} </p>
                                                  <!-- <div class="show_track_detail">
                                                            <ul>
                                                            <li><i class="fa fa-pencil"></i>เเก้ไข</li>
                                                             <li><i class="fa fa-trash"></i>ลบ</li>
                                                            </ul>
                                                 </div> -->
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="col-lg-8 col-md-6" v-else-if="showaddress_two">
                              <div class="show_address" >
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>ชื่อ<span>*</span></p>
                                        <input type="text"  name="firstname" v-model="addresses.firstname" placeholder="ชื่อผู้รับสินค้า"  >
                                        <div class="invalide-feedback">
                                            {{errors.get('firstname')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>นามสกุล<span>*</span></p>
                                        <input type="text"  name="lastname" v-model="addresses.lastname" placeholder="นามสกุลผู้รับสินค้า">
                                         <div class="invalide-feedback">
                                            {{errors.get('lastname')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>อีเมล<span>*</span></p>
                                <input type="text"  name="email" v-model="addresses.email" placeholder="อีเมล">
                                 <div class="invalide-feedback">
                                            {{errors.get('email')}}
                                  </div>
                            </div>
                               <div class="checkout__input">
                                <p>หมายเลขโทรศัพท์<span>*</span></p>
                                <input type="text" name="phonenumber" v-model="addresses.phonenumber" placeholder="หมายเลขโทรศัพท์">
                                <div class="invalide-feedback">
                                            {{errors.get('phonenumber')}}
                                  </div>
                            </div>
                            <div class="checkout__input">
                                <p>ระบุรหัสไปรษณีย์ หรือ ตำบล / แขวง<span>*</span></p>
                            <thai-address-input type="search" name="adress1" v-model="addresses.adress1"  @selected="onSearched" placeholder="ระบุรหัสไปรษณีย์ หรือ ตำบล / แขวง"></thai-address-input>
                            <div class="invalide-feedback">
                                            {{errors.get('adress1')}}
                                  </div>
                            </div>
                            <div class="checkout__input">
                                <p>ทีอยู่<span>*</span></p>
                                <input type="text" name="adress2" v-model="addresses.adress2" placeholder="ที่อยู่บรรทัดที่ 1 : บ้านเลขที่ , หมู่ที่ , ชื่ออาคาร" class="checkout__input__add">
                                 <div class="invalide-feedback">
                                            {{errors.get('adress2')}}
                                  </div>
                                <input type="text" name="adress3" v-model="addresses.adress3" placeholder="ที่อยู่บรรทัดที่ 2 : ซอยถนน">
                            </div>
                            <div class="checkout__input">
                                <p>รายละเอียดเพิ่มเติม</p>
                                <input type="text" name="other" v-model="addresses.other"
                                    placeholder="รายละเอียดเพิ่มเติม">
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
                                 <div class="checkout__order__subtotal_other">
                                     <ul>
                                    <li>ราคารวม<span>{{ totalPrice | currency("฿") }}</span></li>
                                      <li>ส่วนลด<span>{{ checkdiscount(discount) | currency("฿") }}</span></li>
                                   </ul>
                                </div>
                                <div class="checkout__order__total">ยอดสั่งซื้อรวม <span>{{ totalPrice-checkdiscount(discount) | currency("฿") }}</span></div>



                                <button type="submit"   class="primary-btn">ดำเนินการต่อ</button>
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
        props:['discount'],
        mounted() {
        this.$aes.setKey('base64:GoQmYiFHbf+sgZ0bUNykIasFDHHSvzbNNQ8b397iXQw=')
        this.getcartdetail();
        this.getaddress();
       },

        data(){
            return {
              listCart: [],
              addressList:[],
              addresses: {
                firstname:"",
                lastname:"",
                email:"",
                phonenumber:"",
                adress1:"",
                adress2:"",
                adress3:"",
                other:"",

              },
                errors: new Errors(),
                showaddress_one:false,
                showaddress_two:false,
                showaddress_defalse:true,
                addressID:0,
                 total_discount:0

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
            onSearched(address) {
                  this.addresses.adress1 = address.subdistrict+', '+address.district+', '+address.province+', '+address.postalCode;
            },
            async getcartdetail() {
               

                await  axios.get(APP_URL+"cartdetail/detail").then(res => {
                  this.listCart = res.data.listcarts;

               }).catch(function (error) {
                    console.log(error);
                });
            },
             async getaddress() {

                await  axios.get(APP_URL+"cart/checkout/address").then(res => {
                      this.addressList = res.data

                       res.data.forEach(item => {
                              if(item.stdefalse == 1){
                                  this.addressID=item.id;

                              }
                         });
                     if(this.addressList != ''){
                         this.showaddress_defalse =false;
                         this.showaddress_one =true;
                         this.showaddress_two =false;

                     }else{

                            this.showaddress_defalse =false;
                            this.showaddress_one =false;
                            this.showaddress_two =true;
                     }

               }).catch(function (error) {
                    console.log(error);
                });
            },
            async  submit() {
                let formData = new FormData();
                const { firstname,lastname,email,phonenumber,adress1,adress2,adress3,other} = this.addresses;
                formData.append("firstname", firstname);
                formData.append("lastname", lastname);
                formData.append("email", email);
                formData.append("phonenumber", phonenumber);
                formData.append("adress1", adress1);
                formData.append("adress2", adress2);
                formData.append("adress3", adress3);
                formData.append("other", other);

                await  axios.post(APP_URL+"cart/checkout/address/adddata" ,formData,
                {params:{addressID:this.addressID}}
                 ).then(response=> {
                    //   console.log(response.data.addressid.id);
                      window.location.href = APP_URL+'cart/checkout/track/'+response.data.addressid.id+'/'+this.discount;
               })
               .catch(error => this.errors.record(error.response.data),
                //  console.log('errrrrr')
                );
            },
        },

    }
</script>
