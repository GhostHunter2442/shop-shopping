<template>
    <div>
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
           <!-- Featured Section Begin -->
    <section v-if="favoriteList.data =='' " class="shoping-cart spad">

            <div class="container justify-content-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-6 offset-md-5">
                            <div class="shoping__cart__table">
                                <!-- <img src="{{asset('img/cart.png')}}" alt="" width="250"> -->
                                   <!-- <img  src="img/cart.png"  width="200"> -->
                            </div>
                            <p>ไม่มีรายการที่ท่านสนใจ</p>
                            <!-- <p>คลิกปุ่มด้านนล่างเพื่อเลือกซื้อสินค้าต่อ</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section class="featured spad" v-else-if="favoriteList.data !== '' ">


        <div class="container">
        <h5>รายการที่ท่านชื่นชอบทั้งหมด {{$store.getters.getfavorite}} รายการ</h5>
            <div class="row featured__filter my-4">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" v-for="(list,index)  in  favoriteList.data"  :key="list.id">
                    <div class="featured__item" >
                        <div class="featured__item__pic set-bg" >
                              <a :href="shopURL+list.id+'/detail'">
                                 <img v-lazy="imageUrl+list.picture" lazy="loading">
                             </a>
                              <div class="featured__close__pic">

                                        <div class="close-container"  v-on:click="delfavorite(list.id,index)">
                                        <div class="leftright"></div>
                                        <div class="rightleft"></div>
                                        </div>
                              </div>
                            <ul class="featured__item__pic__hover">
                                 <li><a href="javascript:;"  v-on:click="adddetail(list.id)"><button  class="site-btn"><i class="fa fa-shopping-cart"></i> เพิ่มไปยังรถเข็น</button></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ list.name | truncate(20)}}</a></h6>
                            <h5>{{ list.price | currency("฿")}}</h5>
                        </div>
                    </div>
                </div>
            </div>

                    <pagination :data="favoriteList" :limit="limit"  v-on:pagination-change-page="getfavorite">
                    <span slot="prev-nav"><i class="fa fa-long-arrow-left"></i></span>
                    <span slot="next-nav"><i class="fa fa-long-arrow-right"></i></span>
                    </pagination>
        </div>
    </section>
    </div>
</template>
<script>
    export default {
        data(){
            return {
               limit:3,
               shopURL:'/shopping/public/shop/',
               imageUrl: "/shopping/public/storage/images/",
               favoriteList:{},


            }
        },
        mounted(){
            this.getfavorite();
        },
computed: {

             totalQuantity() {
                        if(!this.favoriteList.data){
                        return 0;
                        }
                       return this.favoriteList.data.reduce(
                        (total, listfav) => total + listfav.pivot.qty,
                        0
                    );
                },
         },
        methods:{
            async getfavorite(page=1){

                   await  axios.get("/shopping/public/favorite/detail/getdata?page=" +page).then(res => {
                    this.favoriteList = res.data;
                    }).catch( error => {
                     console.log(error.response);
                    });
              },
               async adddetail(id){
                 let qrt =1;
                        await  axios.get("/shopping/public/cartdetail/adddetail/"+id+"/"+qrt).then(response => {

                                    // bus.$emit('add-to-cart');
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
                                        title: 'เพิ่มสินค้าเรียบร้อย'
                                    })
                        }).catch(function(error) {
                            if (error.response && error.response.status === 401) {
                            window.location.href = "login";
                            }
                        });
             },
            async delfavorite(id,index){
                await axios.get("/shopping/public/favorite/detail/getdata/delfavorite/"+id).then(res => {
                          
                            this.getfavorite();
                            this.$store.dispatch("addFavorite")
                            this.favoriteList.data.splice(index,1);
                        }).catch( error => {
                                    console.log(error.res);
                        });
             }

        }


    }
</script>

