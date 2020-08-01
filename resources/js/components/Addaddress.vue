<template>
    <div>
          <div class=" checkout__form">
             <div class="checkout__form_header_aderess">
              <ul>
           <li>   <h2>เพิ่มที่อยู่ใหม่</h2> </li>
          </ul>
             </div>
            <h4></h4>
                        <div class="col-lg-12 col-md-6">
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
import api  from '../config';
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

       },
        data(){
            return {
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

            }
        },
        methods:{
            onSearched(address) {
                  this.addresses.adress1 = address.subdistrict+', '+address.district+', '+address.province+', '+address.postalCode;
            },

            async submit() {
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
                await  axios.post(api.BASE_URL+"order/orderdetail/myorder/address/add" ,formData

                 ).then(response=> {
                    // console.log('บันทึกเรียบร้อย')
                    this.$router.back()
                    toastr['success']('บันทึกเรียบร้อย','', {
                progressBar: true,
                //   iconClass: 'toast-pink',
                timeOut: 1500,
                extendedTimeOut: 1500,
                 hideDuration: 1500,
                 progressBar: false,
                });

               })
               .catch(error => this.errors.record(error.response.data));
            },
        },

    }
</script>
