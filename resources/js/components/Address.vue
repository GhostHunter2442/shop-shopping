<template>
    <div>

         <div class=" checkout__form">
             <div class="checkout__form_header_aderess">
              <ul>
           <li>   <h2>ที่อยู่จัดส่ง</h2>
           <span> <router-link  class="linkadd" :to="{name :'addaddress'}"><i class="fa fa-plus-circle"></i> เพิ่มที่อยู่ใหม่  </router-link></span></li>
          </ul>
             </div>
            <h4></h4>

                        <div class="col-lg-12 col-md-8 my-6" v-if="showaddress_one">
                            <div class="row">

                                <div class="col-sm-6 " v-for=" (addlist,index) in addressList"  :key="addlist.id">
                                    <div class="show_address" >
                                                <div class="checkout__input__checkbox">
                                                    <label for="payment" :for="addlist.id">
                                                        <p class="card-title">{{ addlist.firstname}} {{ addlist.lastname}}</p>
                                                        <input type="radio"   :id="addlist.id" :value="addlist.id"   v-model="addressID" @click="chekmark(addlist.id)">
                                                        <span class="checkmark" ></span>
                                                    </label>
                                                </div>
                                                <p class="card-text">{{ addlist.adress2}} {{ addlist.adress3}}</p>
                                                <p class="card-text">{{ addlist.adress1}} </p>
                                                <div class="show_track_detail">
                                                    <ul>

                                                     <li @click="edit(addlist.id)"><i class="fa fa-pencil"></i> เเก้ไข</li>
                                                    <li @click="del(addlist.id,index,addlist.firstname)"><i class="fa fa-trash"></i> ลบ</li>
                                                    </ul>
                                                </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="col-lg-12 col-md-6" v-else-if="showaddress_two">
                    <form  @submit.prevent="submit" >
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
                              <button type="submit"   class="primary-btn">ตกลง</button>
                      </form>
                        </div>
                </div>
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
        mounted() {
        this.getaddress();
       },
        data(){
            return {

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

            }
        },
        methods:{
            onSearched(address) {
                  this.addresses.adress1 = address.subdistrict+', '+address.district+', '+address.province+', '+address.postalCode;
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
                         this.showaddress_one =true;
                         this.showaddress_two =false;
                     }else{
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
                        this.getaddress();
               })
               .catch(error => this.errors.record(error.response.data));
            },
            edit(id){
                this.$router.push({ name: 'editaddress', params: { id: id } })
            },
             del(id,index,firstname){
                 console.log(id+firstname)
                    Swal.fire({
                    title: 'ต้องการลบข้อมูล?',
                    text: 'คุณต้องการลบ '+firstname+' !',
                    showCancelButton: true,
                    confirmButtonColor: '#62cfc1',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',

                    }).then((result) => {
                    if (result.value) {
                          axios.get(APP_URL+"order/orderdetail/del",
                           {params:{id:id}}
                          ).then(response => {
                               console.log(response.data);
                                this.addressList.splice(index,1);
                        }).catch( error => {
                            let showicon='warning';
                            let showtitle ='ที่อยู่ถูกใช้งานในการจัดส่ง';
                            this.showalert(showicon,showtitle);

                        });
                    }else {
                        console.log('cancel')
                    }
                    })
             },
             chekmark(id){
                       axios.get(APP_URL+"order/orderdetail/checkmark",
                       {params:{id:id}}
                          ).then(response => {
                               console.log(response.data);

                        }).catch( error => {
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

