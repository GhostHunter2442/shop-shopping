<template>
    <div>

         <div class=" checkout__form">
         <div class=" chackout__order__title">
                            <h2>โปรไฟล์ของฉัน</h2>
                        </div>
            <h4></h4>
             <form  @submit.prevent="submit" >
                       <div class="col-sm-12">
                 <div class="card-body ">
                    <div class="row">
                      <div class="col-lg-6 ">
                        <div class="checkout__input">
                            <p>ชื่อ - นามสกุล<span>*</span></p>
                            <input
                                type="text"
                                name="name"
                                v-model="profile.name"
                                placeholder="กรอกชือ"
                            />
                            <div class="invalide-feedback" id="name"> {{errors.get('name')}}</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>อีเมล<span>*</span></p>
                            <input
                                type="text"
                                name="mail"
                                v-model="profile.mail"
                                placeholder="กรอกเมล"
                                disabled
                            />
                            <div class="invalide-feedback" id="mail"></div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>วันเกิด<span>*</span></p>

                            <date-picker v-model="dateofbirth"   valueType="format"  placeholder="ปี/เดือน/เดือน"></date-picker>
                             <div class="invalide-feedback" id="name"> {{errors.get('dateofbirth')}}</div>
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>เพศ<span>*</span></p>
                           <div class="checkout__input__checkbox">
                               <div class="row">

                                     <div class="col-lg-3">
                                           <label  for="male">
                                                    <p class="card-title">ชาย</p>
                                                    <input type="radio"  id="male"   value="1"  v-model="removelines">
                                                     <!-- <div class="invalide-feedback" id="male"> {{errors.get('male')}}</div> -->
                                                    <span class="checkmark"></span>

                                             </label>

                                    </div>
                                    <div class="col-lg-3">
                                             <label for="female">
                                                    <p class="card-title">หญิง</p>
                                                    <input type="radio"  id="female" value="2"  v-model="removelines">
                                                    <span class="checkmark"></span>
                                             </label>
                                    </div>

                               </div>

                              </div>
                            <div
                                class="invalide-feedback"
                                id="holder_name"
                            ></div>
                        </div>
                    </div>
                    <div class="col-lg-3  ">
                      <button type="submit" class="primary-btn">ตกลง</button>
                       </div>
                     </div>


                </div>
            </div>
            </form>
             </div>
    </div>
</template>




<script>
import api  from '../config';
  import DatePicker from 'vue2-datepicker';
  import 'vue2-datepicker/index.css';
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
    components: { DatePicker },
    data(){
        return{
              removelines: '',
            picked:'',
            male:'',
            female:'',
            dateofbirth: "",
            userid:'',
            proid:'',
            profilelist:[],
            profile:{
                  name:"",
                  mail:"",
                //   dateofbirth:"",

            },
             errors: new Errors(),
        }

    },
     mounted() {
        this.getprofile();
    },
    methods:{
       async getprofile(){
            var simplebar = new Nanobar();

            await  axios.get(api.BASE_URL+"order/orderdetail/profile"
                 ).then(res=> {

                   res.data.userporfile.forEach(item => {
                           this.profile.name=item.name
                           this.profile.mail=item.email
                           this.userid=item.id
                         });
                   res.data.profile.forEach(item => {
                           this.dateofbirth=item.dateofbirth
                           this.proid=item.id
                           this.removelines=item.gender;

                         });


               }).catch(function (error) {
                    console.log(error);
                });

        },
         async  submit() {
                let formData = new FormData();
                const { name,mail} = this.profile;
                formData.append("name", name);
                formData.append("mail", mail);
                formData.append("dateofbirth", this.dateofbirth);
                formData.append("gender", this.removelines);
                await  axios.post(api.BASE_URL+"order/orderdetail/profile/update" ,formData,
                   {params:{userid: this.userid,proid: this.proid}}
                 ).then(response=> {
                               toastr['success']('เเก้ไข้เรียบร้อย','', {
                                        progressBar: true,
                                        timeOut: 1500,
                                        extendedTimeOut: 1500,
                                        hideDuration: 1500,
                                        progressBar: false,
                                        });

               }).catch(error => this.errors.record(error.response.data));
            },
    }

}
</script>
