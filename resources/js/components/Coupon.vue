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
                            <div class="form-group col-lg-6 col-md-8 col-sm-12">
                                <div
                                    class="coupon"
                                    data-employeename="15%"
                                >
                                   <span class="dis_head"> RALUNAR MID YEAR SALE</span> <br>
                                   <span class="dis">  ส่วนลด 15% (ลดสูงสุด 200 บาท) </span><br>
                                    <div class="coupon_name">
                                    <span class="code">{{code}}</span>
                                     <button class="copy-btn"  v-if="canCopy" @click="copy(code)">คัดลอก</button>
                                    </div>
                                      <span class="scissors">✂</span>
                                     <span class="code_small">ใช้ได้ถึง 31 ก.ค. 2020</span>
                                </div>
                            </div>
                           <div class="form-group col-lg-6 col-md-8 col-sm-12">
                                <div
                                    class="coupon"
                                    data-employeename="15%"
                                >
                                   <span class="dis_head"> RALUNAR MID YEAR SALE</span> <br>
                                   <span class="dis">  ส่วนลด 15% (ลดสูงสุด 200 บาท) </span><br>
                                    <div class="coupon_name">
                                    <span class="code">{{code}}</span>
                                     <button class="copy-btn"  v-if="canCopy" @click="copy(code)">คัดลอก</button>
                                    </div>
                                      <span class="scissors">✂</span>
                                     <span class="code_small">ใช้ได้ถึง 31 ก.ค. 2020</span>
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

    export default {
        data(){
            return {
                code:'RALUMID15',
                canCopy:false
            }
        },
        mounted(){
            this.canCopy = !!navigator.clipboard;
        },


        methods: {
            async copy(s) {
            await navigator.clipboard.writeText(s);
            // alert('Copied!');
                    this.$store.dispatch("addItem")
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
                        title: 'คัดลอกเรียบร้อย!'
                    })
            }
        }


    }
</script>

