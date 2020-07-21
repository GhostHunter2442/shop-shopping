<template>
    <div>
         <div id="preloder" v-if="loading">
    <div class="loader"></div>
</div>
    <section class="breadcrumb-section set-bg" data-setbg="/shopping/public/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <!-- <h2>Contact Us</h2> -->
                        <div class="breadcrumb__option">
                            <!-- <a href="./index.html">รายการสินค้า</a> -->
                             <h5>G-SHOCK</h5>
                            <span>Its full form is Gravitaitional Shock.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Shoping Cart Section Begin -->
          <section v-if="listCart =='' " class="shoping-cart spad">

            <div class="container justify-content-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-6 offset-md-5">
                            <div class="shoping__cart__table">
                                <!-- <img src="{{asset('img/cart.png')}}" alt="" width="250"> -->
                                   <!-- <img  src="img/cart.png"  width="200"> -->
                            </div>
                            <p>ไม่มีรายการสินค้าในตะกร้า</p>
                            <!-- <p>คลิกปุ่มด้านนล่างเพื่อเลือกซื้อสินค้าต่อ</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section  v-else-if="listCart !== '' " class="shoping-cart spad">
            <div class="container">
                   <h5>จำนวนสินค้าในตระกร้า {{$store.getters.getcount}} รายการ</h5>

                <div class="row">

                    <div class="col-lg-8">
                        <div class="shoping__checkout">
                            <div class="shoping__cart__table">

                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product">
                                               <p class="card-text"> สินค้า </p>
                                            </th>
                                            <th > <p class="card-text"> ราคา </p></th>
                                            <th><p class="card-text"> จำนวน </p></th>
                                            <th ><p class="card-text"> ยอดรวม </p></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(list,index) in  listCart"  :key="list.id" >
                                            <td class="shoping__cart__item">

                                      <img v-bind:src="imageUrl+list.picture"  width="60">
                                                <h5 >{{ list.name | truncate(20)}}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                               {{ list.price | currency("฿")}}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                       <div class="pro-qty">
                                                            <a href="javascript:;" class="dec qtybtn" v-on:click="downdetail(list.id,index)"><span class="fa fa-minus"></span></a>
                                                             <input type="text" v-model="list.pivot.qty"  >
                                                            <a  href="javascript:;" class="inc qtybtn"  v-on:click="adddetail(list.id,index)">
                                                      <span   class="fa fa-plus" ></span>
                                                          </a>
                                                </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                               {{ list.price*list.pivot.qty | currency("฿")  }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="javascript:;" v-on:click="deldetail(list.id,index,list.name)"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shoping__checkout">
                            <h5>สรุปรายการสั่งซื้อ</h5>
                            <ul>
                                <li>ราคารวม <span  >{{ totalPrice | currency("฿") }}</span  > </li>
                                <li>ส่วนลด <span>$0.00</span></li>
                                <li>ยอดสั่งซื้อรวม <span class="totolprice">{{ totalPrice | currency("฿") }}</span></li>
                                 <li><p>มูลค่าสินค้ารวม (ยังไม่คิดค่าจัดส่ง)</p> </li>
                            </ul>

                            <!-- <a href="javascript:;" v-on:click="confirm()"  class="primary-btn">ดำเนินการต่อ</a> -->
                             <a href="/shopping/public/cart/checkout/cartcheckout"   class="primary-btn">ดำเนินการต่อ</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 my-3">
                        <div class="shoping__cart__btns">
                            <a :href="baseUrl" class="primary-btn cart-btn"
                                >กลับไปเลือกสินค้า</a
                            >
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>โค๊ดส่วนลด</h5>
                                <form action="#">
                                    <input
                                        type="text"
                                        placeholder="ใส่โค๊ดส่วนลด"
                                    />
                                    <a href="#" class="site-btn">ใช้งาน</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Shoping Cart Section End -->
    </div>

</template>

<script>

export default {

mounted() {
        this.getUserData();
    },
data() {
        return {
             listCart: [],
             baseUrl:'http://localhost/shopping/public/',
             message: '',
             imageUrl: "storage/images/resize/",
             imageUrl_: "storage/images/",
             countitem:[],
             loading:false,


        };
    },
computed: {

                  totalPrice() {
                    return this.listCart.reduce(
                        (total, list) => total + (list.price*list.pivot.qty),
                        0
                    );
                },
         },
methods: {

      async  getUserData() {

          await  axios.get("cartdetail/detail").then(response => {
                 this.listCart = response.data.listcarts;


            }).catch(function (error) {
                    console.log(error);
                });
        },
          async  adddetail(id,index){


                       this.listCart.forEach( async item => {
                            if(item.id == id){
                                    if(item.pivot.qty < 5){

                                          this.loading=true;
                                           let qrt =1;
                               await  axios.get("cartdetail/adddetail/"+id+"/"+qrt).then(response => {
                                            this.$store.dispatch("addItem")
                                            this.listCart = response.data;
                                            this.loading=false;
                                }).catch( error => {
                                        console.log(error.response);
                                });
                                    }
                                    else{
                                           console.log('เพิ่มขอ้มูลไม่ได้เเล้ว')
                                    }
                            }

                     });

            },
         async  downdetail(id,index){
              let qrt =1;
              for (let i = 0; i < this.listCart.length; i++) {
                   if (this.listCart[i].id === id) {
                        if (this.listCart[i].pivot.qty > 1) {
                             this.loading=true;
                                await  axios.get("cartdetail/downdetail/"+id+"/"+qrt).then(response => {
                                     this.$store.dispatch("addItem")
                                    this.listCart = response.data;
                                     this.loading=false;
                                 }).catch( error => {
                                    console.log(error.response);
                                });
                        }
                        else{
                            console.log('สินค้าไม่ควรน้อยกว่า 1 รายการ');
                        }
                         break;
                 }
              }
                    },

        deldetail(id,index,name){
                    Swal.fire({
                    title: 'ต้องการลบข้อมูล?',
                    text: 'คุณต้องการลบ '+name+' !',
                    // icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#62cfc1',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',

                    }).then((result) => {
                    if (result.value) {
                          axios.get("cartdetail/deldetail/"+id).then(response => {
                                this.$store.dispatch("addItem")
                                this.listCart.splice(index,1);
                        }).catch( error => {
                                    console.log(error.response);
                        });
                    }else {
                        console.log('cancel')
                    }
                    })

    }
    }
};
</script>

<style>


</style>
