<template>
    <div>



        <section class="breadcrumb-section set-bg" :data-setbg="herder_img">
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
                        <div class="product__details__rating" >

                                <star-rating :inline="true" :read-only="true" :show-rating="false" :star-size="20" v-model="totalrate" :increment="0.1" ></star-rating>
                                  <span class="show-view">({{showuser}} รีวิว)</span>
                        </div>
                        <div class="product__details__price" >{{shopdata.price | currency("฿")}}  <br>
                        <div v-if="shopdata.discount!=null">
                        <span class="review">{{ discount(shopdata.price,shopdata.discount) | currency("฿")}}  </span> <h4> -{{shopdata.discount}}%</h4>
                        </div>
                        </div>

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
                       <span :class="btnDisabled"> <a href="javascript:;"  class="primary-btn-cart" @click.prevent="addtocart" ><i class="fa fa-shopping-cart"></i>เพิ่มสินค้า</a></span>
                        <a href="javascript:;" class="heartload" v-on:click="addtofavorite()">
                            <span  > <div v-if="heart" class="heart"></div>
                                      <div v-if="heartset" class="heartset"></div>
                        <div class="lds-heart-contianer" v-if="loadingheart">
                        <div class="lds-heart"><div></div></div>
                        </div>
                            </span>
                        </a>
                        <ul>

                            <li><b>สินค้าคงหลือ</b> <span >{{shopdata.stock}} inc.</span></li>
                            <li><b>การจัดสั่ง</b> <span>1-2 วันจัดส่ง <samp>Free pickup today</samp></span></li>
                            <li><b>น้ำหนัก</b> <span>{{shopdata.weight}} kg</span></li>
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
                                    aria-selected="false">รีวิว <span>({{showuser}})</span></a>
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
                                    <div class="row">
                                         <div class="col-md-4 col-sm-8 ">
                                               <star-rating v-model="rating" :increment="0.5" :star-size="40" text-class="custom-text"></star-rating>
                                             </div>
                                        <div class="select_invoice col-md-3 col-sm-6 my-2" v-if="this.checkper==true">
                                             <v-select :options="invoice_order" v-model="selected"></v-select>
                                        </div>
                                    </div>
                                </div>
                                <button @click="setRating" class="primary-btn my-3">ให้คะเเนน</button>
                                <h3 class="heading">รีวิว</h3>
                                <div class="review-rating">
                                   <div class="left-review">
                                        <div class="review-title" >{{totalrate}}</div>
                                        <div class="review-star">
                                            <star-rating :inline="true" :read-only="true" :show-rating="false" :star-size="20" v-model="totalrate" :increment="0.1" active-color="#000000"></star-rating>
                                        </div>
                                        <div class="review-people"><i class="fa fa-user"></i> {{totaluser}} total</div>
                                    </div>
                                     <div class="rigth-review">
                                         <div class="row-bar">
                                             <div class="left-bar">5</div>
                                             <div class="right-bar">
                                                 <div class="bar-container">
                                                     <div class="bar-5" style="width:0%;"></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row-bar">
                                             <div class="left-bar">4</div>
                                             <div class="right-bar">
                                                 <div class="bar-container">
                                                     <div class="bar-4" style="width:0%;"></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row-bar">
                                             <div class="left-bar">3</div>
                                             <div class="right-bar">
                                                 <div class="bar-container">
                                                     <div class="bar-3" style="width:0%;"></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row-bar">
                                             <div class="left-bar">2</div>
                                             <div class="right-bar">
                                                 <div class="bar-container">
                                                     <div class="bar-2" style="width:0%;"></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row-bar">
                                             <div class="left-bar">1</div>
                                             <div class="right-bar">
                                                 <div class="bar-container">
                                                     <div class="bar-1" style="width:0%;"></div>
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
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
                        <ul class="product__item__pic__hover">
                              <li>
                                  <!-- <a href="javascript:;"  v-on:click="adddetail(list.id)"><button  class="site-btn"><i class="fa fa-shopping-cart"></i> เพิ่มไปยังรถเข็น</button></a> -->
                                 <span  :class="addclass(list.stock)">
                                 <a href="javascript:;"  v-on:click="adddetail(list.id)"  class="site-btn"><i class="fa fa-shopping-cart"></i> เพิ่มไปยังรถเข็น</a>
                                 </span>
                             </li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                    <h6><a href="#"> {{ list.name | truncate(25)}}</a></h6>
                    <h5> {{ list.price | currency("฿")}}  </h5>
                    <div v-if="list.discount!=null">
                    <span class="review">{{ discount(list.price,list.discount) | currency("฿")}}  </span> <h4> -{{list.discount}}%</h4>
                    </div>
                     <div class="product__details__rating" v-for="rate in list.ratings"  :key="rate.product_id">

                          <star-rating :inline="true" :read-only="true" :show-rating="false" :star-size="12" v-model="rate.total" :increment="0.1" ></star-rating>
                             <span class="show-view-rate">({{rate.qty}} รีวิว)</span>

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
<style>
/* .add-product{
      display: block;
} */
</style>
<script>
import api  from '../config';
import "vue-select/dist/vue-select.css";
export default {
    data() {
         return {
            herder_img:api.BASE_URL+'img/breadcrumb.jpg',
             imageproURL:api.BASE_URL_IMG,
             shopURL:api.BASE_URL+'shop/',
             shopdata:{},
             concerned:[],
             invoice_order:[],
             selected:'เลือกคำสั่งซื้อ',
             rating:0,
             totalrate:0,
             totaluser:0,
             showuser:0,
             getdata:'',
             itempicture:'',
             itempicture1:'',
             itempicture2:'',
             itempicture3:'',
             itempicture4:'',
             tempnopic:api.BASE_URL_IMG+'nopic.png',
             quantity:1,
             loadingheart:false,
             heartset:false,
             heart:true,
             checkper: true,
             stock:'',
             btnDisabled:'isEnabled' //isDisabled

          }
     },  mounted(){
          this.gettofavorite();
          this.getshopdetil();
          this.getProductConcerned();
          this.getRating();
          this.getInvoice();
        },

     props:['id','cat_id'],
     methods: {
         addclass(stock){
                return  stock < 1 ? 'isDisabled' :'isEnabled';
             },
         discount(price,discount){
            var percen=(100 - parseInt(discount))/100;
            var dis= (parseInt(price)/(percen));
            return  parseInt(dis);
         },
        async  getRating(){

              await  axios.get(api.BASE_URL+"api/cartdetail/rating/"+this.id
                   ).then(res => {
                        var maydata =res.data.data;
                        this.totaluser= maydata.length;
                        this.showuser=maydata.length;

                        var sum = 0;
                        for(var i = 0; i < maydata.length; i++){
                            sum += parseFloat(maydata[i]['rating']);

                            }
                         var avg= sum/maydata.length;
                         if(Number.isNaN(avg)){
                            this.totalrate = 0;
                         }else{
                            this.totalrate = parseFloat(avg.toFixed(1));
                         }


                         var bar1=0;
                         var bar2=0;
                         var bar3=0;
                         var bar4=0;
                         var bar5=0;

                         for(var j = 0; j < maydata.length; j++){
                          if(parseInt(maydata[j]['rating'])=='5'){
                                 bar5 += 1;

                             }
                             if(parseInt(maydata[j]['rating'])=='4'){
                                 bar4 += 1;

                             }
                              if(parseInt(maydata[j]['rating'])=='3'){
                                 bar3 += 1;
                             }
                              if(parseInt(maydata[j]['rating'])=='2'){
                                 bar2 += 1;
                             }
                              if(parseInt(maydata[j]['rating'])=='1'){
                                 bar1 += 1;
                             }

                         }

                         $('.bar-1').css('width',bar1+'%');
                         $('.bar-2').css('width',bar2+'%');
                         $('.bar-3').css('width',bar3+'%');
                         $('.bar-4').css('width',bar4+'%');
                         $('.bar-5').css('width',bar5+'%');
                         }).catch(error => {
                             console.log(error)

                          });
         },
       async  setRating(){

                if(this.checkper == true){
                      if(this.selected!='เลือกคำสั่งซื้อ' && this.selected!=null){
                       await  axios.get(api.BASE_URL+"api/cartdetail/rating",
                            {params:{product:this.id,rating:this.rating,invoice_id:this.selected}}
                            ).then(res => {
                                let showicon='success';
                            let showtitle ='ให้คะเเนนเรียบร้อย';
                            this.getRating();
                            this.showalert(showicon,showtitle);
                                }).catch(error => {
                                    console.log(error)

                                });
                      }
                      else{
                           let showicon='warning';
                            let showtitle ='เลือกคำสั่งซื้อ';
                            this.showalert(showicon,showtitle);
                      }

                }
                else{
                    window.location.href = api.BASE_URL+'login';
                    }

         },
      async getInvoice(){

                    await  axios.get(api.BASE_URL+"api/cartdetail/getinvoice",
                      {params:{product_id:this.id}}
                       ).then(res => {
                           if(res.data!=false){
                            var myinvoice= res.data;
                             this.invoice_order=myinvoice;
                           }

                         }).catch(error => {
                             console.log(error)

                          });



         },
        updateCart(updateType) {
            if (updateType === 'subtract') {
                    if (this.quantity !== 1) {
                        this.quantity--;
                    }
                    } else {
                    this.quantity++;
            }
         },

         async addtocart(event) {
                if(this.checkper == true){
                    if(this.quantity >0){

                                if(this.quantity > this.shopdata.stock){
                                        let showicon='warning';
                                        let showtitle ='จำนวนสินค้าไม่เพียงพอ';
                                        this.showalert(showicon,showtitle);
                                }
                                else{
                        this.btnDisabled = true;
                                    let showicon='success';
                                    let showtitle ='เพิ่มสินค้าเรียบร้อย';
                                            await  axios.get(api.BASE_URL+"cartdetail/adddetail/"+this.id+"/"+this.quantity).then(response => {
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
                     window.location.href = api.BASE_URL+'login';
                }

          },
          async getshopdetil(){


                 await axios.post(api.BASE_URL+"shop/shopdetail/"+this.id).then(res => {
                    this.shopdata = res.data;
                    this.getdata =  this.imageproURL + res.data.picture;
                    this.itempicture =  this.imageproURL + res.data.picture;
                    this.itempicture1= this.imageproURL + res.data.picture_detail_one;
                    this.itempicture2= this.imageproURL + res.data.picture_detail_two;
                      this.itempicture3= this.imageproURL + res.data.picture_detail_three;
                      this.stock=res.data.stock
                       if( this.stock< 1){
                          this.btnDisabled='isDisabled' ;//isDisabled
                       }

                }).catch(error => {
                     console.log(res.data.errors)
                    });
           },
               async getProductConcerned(){
                 await axios.post(api.BASE_URL+"shop/concerned/"+this.cat_id+'/'+this.id).then(res => {
                        this.concerned=res.data;
                }).catch(error => {
                     console.log(res.data.errors)
                    });
           },
           async adddetail(id){
                 let qrt =1;
                        await  axios.get(api.BASE_URL+"cartdetail/adddetail/"+id+"/"+qrt).then(response => {
                                     this.$store.dispatch("addItem")
                                    let showicon='success';
                                    let showtitle ='เพิ่มสินค้าเรียบร้อย';
                                   this.showalert(showicon,showtitle);
                        }).catch(function(error) {
                            if (error.response && error.response.status === 401) {
                            window.location.href = api.BASE_URL+'login';
                            }
                        });
             },

         async  gettofavorite() {

                   await  axios.get(api.BASE_URL+"api/cartdetail/getfavorite/"+this.id
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

                          this.loadingheart=true;
                               await  axios.get(api.BASE_URL+"cartdetail/favorite/"+this.id,
                               ).then(response => {
                                this.favoriteList = response.data;
                                  this.loadingheart=false;

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
                  window.location.href = api.BASE_URL+'login';

                 }


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
     }
 };
</script>
<style>



</style>
