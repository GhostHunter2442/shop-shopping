<template>
    <div>



          <section class="breadcrumb-section set-bg" data-setbg="http://localhost/shopping/public/img/breadcrumb.jpg">
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
            <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row" >
                <div class="col-lg-6 col-md-6">
                    <!-- <div class="product__details__pic" v-for="prolist in  shopdata"  :key="prolist.id"> -->
                         <div class="product__details__pic" >
                        <div class="product__details__pic__item" >
                            <img class="product__details__pic__item--large"
                              :src="getdata"   alt="">


                        </div>
                        <div  class="product__details__pic__slider owl-carousel">

                            <img :data-imgbigurl="itempicture"
                                :src="itempicture" alt="">
                            <img :data-imgbigurl="itempicture1"
                                :src="itempicture1" alt="">
                            <img :data-imgbigurl="itempicture2"
                                :src="itempicture2" alt="">
                                 <img :data-imgbigurl="itempicture3"
                                :src="itempicture3" alt="">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" >
                    <div class="product__details__text"  >
                        <h3>{{shopdata.name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 รีวิว)</span>
                        </div>
                        <div class="product__details__price" >{{shopdata.price | currency("฿")}}  <br> <span class="review">{{ shopdata.price | currency("฿")}}  </span> <h4> -50%</h4></div>

                        <p>รับประกันของแท้และสินค้าทุกชิ้นมีใบประกัน</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                     <a href="javascript:;" class="dec qtybtn" ><span class="fa fa-minus" v-on:click="updateCart('subtract')"></span></a>
                                     <input type="text" v-model="quantity"  oninput = "value=value.replace(/[^\d]/g,'')">
                                     <a href="javascript:;" class="inc qtybtn" ><span class="fa fa-plus" v-on:click="updateCart('add')"></span></a>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;"  class="primary-btn" v-on:click="addtocart()"><i class="fa fa-shopping-cart"></i>เพิ่มสินค้า</a>
                        <a href="javascript:;" class="heartload" v-on:click="addtofavorite()">
                            <span  > <div v-if="heart" class="heart"></div>
                                      <div v-if="heartset" class="heartset"></div>
                        <div class="lds-heart-contianer" v-if="loadingheart">
                        <div class="lds-heart"><div></div></div>
                        </div>
                            </span>


                        </a>
                        <ul>

                            <li><b>สินค้าคงหลือ</b> <span>{{shopdata.stock}} inc.</span></li>
                            <li><b>การจัดสั่ง</b> <span>1-2 วันจัดส่ง <samp>Free pickup today</samp></span></li>
                            <li><b>น้ำหนัก</b> <span>0.5 kg</span></li>
                            <li><b>เเชร์</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="false">รายละเอียดสินค้า</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">รีวิว <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                <span v-html="shopdata.detail"></span>

                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>รีวิว</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>รายการที่เกี่ยวข้อง</h2>
                    </div>
                </div>
            </div>
                <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" v-for="(list)  in concerned"  :key="list.id">

                <div class="product__item" >
                        <div class="product__item__pic set-bg" >
                            <a :href="shopURL+list.slug">
                            <img v-lazy="imageproURL+list.picture" lazy="loading">
                            </a>

                               <!-- <div class="product__new__wrawper" v-if=" getcreateDate(list.created_at) == timestamp" >
                                  <div class="item_wrawper">ใหม่</div>
                                </div> -->

                        <ul class="product__item__pic__hover">
                              <li><a href="javascript:;"  v-on:click="adddetail(list.id)"><button  class="site-btn"><i class="fa fa-shopping-cart"></i> เพิ่มไปยังรถเข็น</button></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                    <h6><a href="#"> {{ list.name | truncate(25)}}</a></h6>
                    <h5> {{ list.price | currency("฿")}}  </h5>
                    <span class="review">{{ list.price | currency("฿")}}  </span> <h4> -50%</h4>
                     <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 รีวิว)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- Related Product Section End -->
    </div>
</template>

<script>

export default {
    data() {
         return {
             csrfToken: null ,
            imageproURL:'/shopping/public/storage/images/',

             shopURL:'/shopping/public/shop/',
             shopdata:{},
             concerned:[],
             getdata:'',
             itempicture:'',
             itempicture1:'',
             itempicture2:'',
             itempicture3:'',
             itempicture4:'',
             tempnopic:'/shopping/public/storage/images/nopic.png',
             quantity:1,
             loadingheart:false,
             heartset:false,
             heart:true,
             checkper: true,

          }
     },
       mounted(){
          this.getshopdetil();
          this.gettofavorite();
          this.getProductConcerned();
        },

     props:['id','cat_id'],
     methods: {
        updateCart(updateType) {
            if (updateType === 'subtract') {
                    if (this.quantity !== 1) {
                        this.quantity--;
                    }
                    } else {
                    this.quantity++;
            }
         },

         async addtocart() {
                if(this.checkper == true){
                    if(this.quantity >0){
                                if(this.quantity > this.shopdata.stock){
                                        let showicon='error';
                                        let showtitle ='จำนวนสินค้าไม่เพียงพอ';
                                        this.showalert(showicon,showtitle);
                                }
                                else{

                                    let showicon='success';
                                    let showtitle ='เพิ่มสินค้าเรียบร้อย';
                                            await  axios.get("/shopping/public/cartdetail/adddetail/"+this.id+"/"+this.quantity).then(response => {
                                                    // bus.$emit('add-to-cart');
                                                     this.$store.dispatch("addItem")
                                                     this.showalert(showicon,showtitle);
                                            }).catch(error => {


                                                //  if (error.response && error.response.status ===403) {
                                                        let showicon='warning';
                                                        let showtitle ='ไม่มีสิทธิการสั่งซื้อสินค้า';
                                                        this.showalert(showicon,showtitle);
                                                    // }
                                                });
                                }
                    }else{
                            let showicon='warning';
                            let showtitle ='จำนวนสินค้าต้องมากกว่า 1 รายการ';
                            this.showalert(showicon,showtitle);
                    }
                }
                else{
                     window.location.href = "/shopping/public/login";
                }

          },
          async getshopdetil(){


                 await axios.post("/shopping/public/shop/shopdetail/"+this.id).then(res => {
                    this.shopdata = res.data;
                    this.getdata =  this.imageproURL + res.data.picture;
                    this.itempicture =  this.imageproURL + res.data.picture;
                    this.itempicture1= this.imageproURL + res.data.picture_detail_one;
                    this.itempicture2= this.imageproURL + res.data.picture_detail_two;
                      this.itempicture3= this.imageproURL + res.data.picture_detail_three;
                }).catch(error => {
                     console.log(res.data.errors)
                    });
           },
               async getProductConcerned(){
// console.log(this.cat_id)
                 await axios.post("/shopping/public/shop/concerned/"+this.cat_id).then(res => {
                        this.concerned=res.data;
                        //  console.log( this.concerned)
                }).catch(error => {
                     console.log(res.data.errors)
                    });
           },
           async adddetail(id){
                 let qrt =1;
                        await  axios.get("/shopping/public/cartdetail/adddetail/"+id+"/"+qrt).then(response => {
                                     this.$store.dispatch("addItem")
                                    let showicon='success';
                                    let showtitle ='เพิ่มสินค้าเรียบร้อย';
                                   this.showalert(showicon,showtitle);
                        }).catch(function(error) {
                            if (error.response && error.response.status === 401) {
                            window.location.href = "/shopping/public/login";
                            }
                        });
             },

         async  gettofavorite() {

                   await  axios.get("/shopping/public/api/cartdetail/getfavorite/"+this.id
                   ).then(response => {

                                  if(response.data.favorite !== false){

                                          this.checkper =true;

                                           if(response.data.favorite != null){
                                                this.heart=false;
                                                this.heartset=true;
                                           }
                                           else{
                                                 this.heart=true;
                                                this.heartset=false;
                                           }
                                    }
                                    else{
                                        this.heart=true;
                                        this.heartset=false;
                                        this.checkper =false;
                                    }
                         }).catch(error => {
                             console.log(error.response)

                          });
           },

         async  addtofavorite() {

                 if(this.checkper != false){
                    // console.log('เพิ่มข้อมูลได้')
                          this.loadingheart=true;
                               await  axios.get("/shopping/public/cartdetail/favorite/"+this.id,
                               ).then(response => {
                                this.favoriteList = response.data;
                                  this.loadingheart=false;
                                //   console.log(response.data.id)
                                    if(response.data.id !== undefined){
                                        this.$store.dispatch("addFavorite")
                                         this.heart=false;
                                         this.heartset=true;
                                    }
                                    else{
                                        this.$store.dispatch("addFavorite")
                                          this.heart=true;
                                          this.heartset=false;
                                    }

                                }).catch( error => {
                                    console.log(error.response);
                                });
                 }else{
                  window.location.href = "/shopping/public/login";
                //    console.log('เพิ่มข้อมูลไม่ได้')
                 }


        },
        showalert(showicon,showtitle) {
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
                        icon: showicon,
                        title: showtitle
                    })
        },
     }
 };
</script>
<style>



</style>
