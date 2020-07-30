<template>
    <div>
        <section
            class="breadcrumb-section set-bg"
            data-setbg="/shopping/public/img/breadcrumb.jpg"
        >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <!-- <h2>Contact Us</h2> -->
                            <div class="breadcrumb__option">
                                <!-- <a href="./index.html">รายการสินค้า</a> -->
                                <h5>G-SHOCK</h5>
                                <span
                                    >Its full form is Gravitaitional
                                    Shock.</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                  <h5>โค๊ดส่วนลด</h5>
                <div class="col-lg-12 my-3">
                    <div class="coupon__cart__table">
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-8 col-sm-12" v-for="(list)  in  couponList"  :key="list.id">
                                <div
                                    class="coupon"
                                    :data-employeename="list.percen+'%'"
                                >
                                   <span class="dis_head">{{list.name}}</span> <br>
                                   <span class="dis">  ส่วนลด {{list.percen}}% (ลดสูงสุด {{parseInt(list.discount)}} บาท) </span><br>
                                    <div class="coupon_name">
                                    <span class="code">{{list.code}}</span>
                                     <button class="copy-btn"  v-if="canCopy" @click="copy(list.code)">คัดลอก</button>
                                    </div>
                                      <span class="scissors">✂</span>
                                     <span class="code_small">ใช้ได้ถึง {{getcreateDate(list.end_datetime)}}</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import moment from 'moment'
    export default {
        data(){
            return {
                couponList:[],
                canCopy:false
            }
        },
        mounted(){
            this.getcoupong();
            this.canCopy = !!navigator.clipboard;
        },


        methods: {
              getcreateDate(date) {
                  return moment(date).format('DD/MM/YYYY');
            },
            async copy(s) {
            await navigator.clipboard.writeText(s);
                         toastr['success']('คัดลอกเรียบร้อย !','', {
                                    progressBar: true,
                                    timeOut: 1500,
                                    extendedTimeOut: 1500,
                                    hideDuration: 1500,
                                    progressBar: false,
                                    });


            },
               async getcoupong(){

                   await  axios.get("/shopping/public/promotions/getcoupon").then(res => {
                    this.couponList = res.data;
                    }).catch( error => {
                     console.log(error);
                    });
              },
        }


    }
</script>

