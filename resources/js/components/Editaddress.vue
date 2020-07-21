<template>
    <div>
            <div class=" checkout__form">
             <div class="checkout__form_header_aderess">
              <ul>
           <li>   <h2>เเก้ไขที่อยู่</h2> </li>
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
     props:['id'],
        mounted() {
         this.getaddress();
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
              async getaddress(){
                await  axios.get("http://localhost/shopping/public/order/orderdetail/address",
                 {params:{id:this.id}}
                   ).then(res=> {
                      let item=res.data.address;
                            this.addresses.firstname = item.firstname
                            this.addresses.lastname=item.lastname
                            this.addresses.email=item.email
                            this.addresses.phonenumber=item.phonenumber
                            this.addresses.adress1=item.adress1
                            this.addresses.adress2=item.adress2
                            this.addresses.adress3= (item.adress3  == null) ? "" : item.adress3;
                            this.addresses.other= (item.other  == null) ? "" : item.adress3;

               }).catch(function (error) {
                    console.log(error);
                });

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
                await  axios.post("http://localhost/shopping/public/order/orderdetail/myorder/address/edit" ,formData,
                {params:{id:this.id}}
                 ).then(response=> {
                    // console.log('บันทึกเรียบร้อย')
                     this.$router.back()
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
                        icon: 'success',
                        title: 'บันทึกเรียบร้อย'
                    })
               })
               .catch(error => this.errors.record(error.response.data));
            },

        },

    }
</script>
