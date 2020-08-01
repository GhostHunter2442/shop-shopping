<template>
    <div>
                <div class=" checkout__form">
         <div class=" chackout__order__title">
                            <h2>เปลี่ยนรหัสผ่าน</h2>
                        </div>
            <h4></h4>
         <form  id="myForm" @submit.prevent="submit" >
            <div class="col-sm-12">
                <div class="card-body">


                      <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>รหัสผ่านเดิม<span>*</span></p>
                            <input
                                type="password"
                                name="currentpassword"
                                 v-model="password.currentpassword"
                                placeholder="กรอกรหัสผ่านเดิม"

                            />
                            <div class="invalide-feedback" id="currentpassword">{{errors.get('currentpassword')}}</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>รหัสผ่านใหม่<span>*</span></p>
                            <input
                                type="password"
                                name="newpassword"
                                 v-model="password.newpassword"
                                placeholder="กรอกรหัสผ่านใหม่"
                            />
                            <div class="invalide-feedback" id="newpassword">{{errors.get('newpassword')}}</div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>ยืนยันรหัสผ่าน<span>*</span></p>
                            <input
                                type="password"
                                name="comfirmpassword"
                                 v-model="password.comfirmpassword"
                                placeholder="ยืนยันรหัสผ่าน"
                            />
                            <div class="invalide-feedback" id="comfirmpassword" > {{errors.get('comfirmpassword')}}</div>
                        </div>
                    </div>
                      <div class="col-lg-3  ">
                      <button type="submit" class="primary-btn" >ตกลง</button>
                       </div>
                </div>
            </div>
        </form >
        </div>
    </div>
</template>
<script>
import api  from '../config';
import Errors from "../Form";
export default {
    components: { Errors },

        data(){
             return {
                password: {
                    currentpassword:"",
                    newpassword:"",
                    comfirmpassword:""
                },
                  errors: new Errors(),
             }

        },
          computed: {

         },
        methods:{

              async submit() {
                //    console.log('daaa')
                    let formData = new FormData();
                // const { currentpassword,newpassword,comfirmpassword} = this.password;
                formData.append("currentpassword", this.password.currentpassword);
                formData.append("newpassword", this.password.newpassword);
                formData.append("comfirmpassword", this.password.comfirmpassword);
                await  axios.post(api.BASE_URL+"order/orderdetail/modifypass" ,formData,
                 ).then(response=> {
                this.errors.constructor();
               this.password.currentpassword ='';
                this.password.newpassword = '' ;
                this.password.comfirmpassword='';
                             toastr['success']('เเก้ไข้เรียบร้อย','', {
                                        progressBar: true,
                                        timeOut: 1500,
                                        extendedTimeOut: 1500,
                                        hideDuration: 1500,
                                        progressBar: false,
                                        });

               }).catch(error => this.errors.record(error.response.data));

            },


        },


}

</script>
