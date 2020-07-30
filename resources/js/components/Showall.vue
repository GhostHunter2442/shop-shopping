<template>
<div>

    <div class="row">
    <div class="col-lg-3 col-md-5">
        <div class="sidebar">
                  <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>ประเภทสินค้า</span>
                        </div>
                        <ul >

                            <li v-for="catlist in  categorylist"  :key="catlist.id">
                                  <input type="radio" :id="catlist.id" class="productID" :value="catlist.id"  v-model="getcatagoryID">
                                  <label :for="catlist.id" >{{catlist.name}}
                                      <span v-for="prolist in  totalpro"  :key="prolist.category_id" >
                                   <span v-if="prolist.category_id==catlist.id"> ({{prolist.total}}) </span>
                                    </span>
                                  </label>
                            </li>

                        </ul>
                    </div>
                     <div class="sidebar__item my-4">
                            <h4>รายการสินค้าขายดี</h4>
                            <div class="sidebar__item__size" v-for="catlist in  categorylist"  :key="catlist.id">
                                <label for="large">
                                      <a :href="topPriceURL+catlist.id">{{catlist.name}}</a>
                                    <!-- topPriceURL -->

                                    <input type="radio" id="large">
                                </label>
                            </div>

                        </div>
                          <div class="sidebar__item my-4" >
                            <div class="latest-product__text" >
                                <h4>สินค้าขายล่าสุด</h4>
                                <div class="latest-product__slider " v-for="last in  lastprice"  :key="last.id">
                                     <!-- owl-carousel -->

                                    <div class="latest-prdouct__slider__item">
                                        <a :href="shopURL+last.product.slug" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img  v-bind:src="imageUrlresize+last.product.picture" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{last.product.name | truncate(10)}}</h6>
                                                <span>{{last.product.price | currency("฿")}}</span>
                                            </div>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>

        </div>

    </div>
       <div class="col-lg-9 col-md-7">
    <section class="hero hero-normal" >
    <div class="container" >
        <div class="row">

            <div class="col-lg-12">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="" onsubmit="return false;">
                            <div   class="hero__search__categories" >
                                สินค้าทั้งหมด
                                <span class="arrow_carrot-down"></span>
                            </div>

                            <input type="text" ref="inputRef" v-model="keywords" placeholder="ค้นหาสินค้า">
                            <button  class="site-btn">ค้นหา</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg my-4" v-bind:data-setbg="imageUrlbanner" v-if="showbanner">
                        <div class="hero__text">
                            <span>smart watch</span>
                            <h2>Apple Watch <br />100% </h2>
                            <p>ฟรีบริการจัดส่ง</p>
                            <a href="#" class="site-btn">ซื้อเลย</a>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</section>
 <div class="container" >

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8" v-for="list in  showdata.data"  :key="list.id" >

                <div class="product__item" >

                        <div class="product__item__pic set-bg" >


                            <a :href="shopURL+list.slug">
                            <img v-lazy="imageUrl+list.picture" lazy="loading">
                            </a>
                               <div class="product__new__wrawper" v-if=" getcreateDate(list.created_at) == timestamp" >
                                  <div class="item_wrawper">ใหม่</div>
                                </div>
                                   <!-- <div class="product__new__percent">-20%</div> -->
                        <ul class="product__item__pic__hover">

                             <li>
                                   <span  :class="addclass(list.stock)">
                                 <a href="javascript:;"  v-on:click="adddetail(list.id)"  class="site-btn"><i class="fa fa-shopping-cart"></i> เพิ่มไปยังรถเข็น</a>
                                 </span>
                            </li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                    <h6><a href="#"> {{ list.name | truncate(25)}}</a></h6>
                    <h5> {{ list.price | currency("฿")}}  </h5>
                    <!-- <span class="review">{{ list.price | currency("฿")}}  </span> <h4> -50%</h4> -->
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

<pagination :data="showdata" :limit="limit"  v-on:pagination-change-page="showalldata"  >
<span slot="prev-nav"><i class="fa fa-long-arrow-left"></i></span>
	<span slot="next-nav"><i class="fa fa-long-arrow-right"></i></span>
</pagination>
</div>
</div>
</div>
</div>
</template>

<script>
import autocomplete from 'autocompleter';
import 'autocompleter/autocomplete.min.css';
import moment from 'moment'
export default {

 mounted(){
    //  console.log(this.showdata.created_at)
     this.getNow();
    this.showalldata();
    this.getautocomplate();
    this.getcatagory();
    this.getlastprice();
    this.isActive = true;
},

beforeDestroy(){ //เคลียรข้อมูลหลังเลิกใช้
   this.autocompleteRef.destroy()
},

   data() {
        return {

              shopURL:'/shopping/public/shop/',
              topPriceURL:'/shopping/public/show/topprice/',
              itemsgetafory:'',
              getcatagoryID:'',
              showdata:{},
              lastprice:[],
              categorylist:[],
              totalpro:[],
              productlast:[],
              imageUrl: "storage/images/",
              imageUrlresize: "storage/images/resize/",
              imageUrlbanner: "img/hero/banner.jpg",
              keywords:'',
              productId: 0,
              showbanner:true,
              isActive: false,
              timestamp: '',
              limit:3,
              page: 1,
              btnDisabled:'isEnabled' //isDisabled

        }

    },

  watch:{

          keywords(after,before){
            this.showalldata();
              this.getcatagoryID = '';
          },
          getcatagoryID(after,before){
             this.isActive = true;
            this.showbanner = false ;
            this.showalldata();
              var simplebar = new Nanobar();
               simplebar.go(100);
          }
  },
   computed: {

    },
     methods: {
            addclass(stock){
                return  stock < 1 ? 'isDisabled' :'isEnabled';
            },
             discount(price,discount){
            var percen=(100 - parseInt(discount))/100;
            var dis= (parseInt(price)/(percen));
            return  parseInt(dis);
         },
            getautocomplate(){
                axios.get("show/autocomplate").then(res => {
                        const listOfObjects = res.data.map(({id,name}) => {
                                return {
                                    id: id,
                                    label:  `${(name).substr(0,20)}`
                                }
                         })
                        // console.log(this.$refs.inputRef);
                        this.autocompleteRef = autocomplete({
                            input:this.$refs.inputRef,
                                minLength:2,
                                emptyMsg:'ไม่พบข้อมูล',
                            fetch(text, update){

                                const pattern = new RegExp(text,'i')
                                    const suggestions = listOfObjects.filter(({label})=>{
                                        return pattern.test(label)
                                    })

                                    update(suggestions)

                            },
                            onSelect:({id, label})=>{

                                this.productId = id;
                                this.keywords= label;

                            }
                        })
                });

            },
            async  showalldata(page){
                this.loading = true;
                await  axios.get("showall?page=" +page ,
                {params:{keywords:this.keywords,getcatagoryID:this.getcatagoryID}}
                ).then(res => {
                      this.showdata = res.data;
                }).catch( error => {
                       console.log(error.response);
                });

            },
             async getlastprice(){
                this.loading = true;
                await  axios.get("show/lastprice"
                ).then(res => {
                      this.lastprice = res.data;

                }).catch( error => {
                       console.log(error);
                });

            },
             getcreateDate(datemont) {
                 return moment(String(datemont)).format('MM')

            },
            getNow() {
                    const today = new Date();
                    const mont = ((today.getMonth() + 1) < 10 ? '0' : '') + (today.getMonth() + 1);
                    const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    const dateTime = date +' '+ time;
                    this.timestamp = mont;
                },
            async  getcatagory(){
                await  axios.get("show/category").then(res => {
                    this.categorylist = res.data.category;
                    this.totalpro= res.data.total_product;
                    this.productlast = res.data.last_price;
                }).catch( error => {
                     console.log(error.response);
                });
            },
            async adddetail(id){
                 let qrt =1;

                        await  axios.get("cartdetail/adddetail/"+id+"/"+qrt).then(response => {
                                //   bus.$emit('add-to-cart',response.data);
                                    // bus.$emit('add-to-cart');
                                      this.$store.dispatch("addItem")

                                  let showicon='success';
                                  let showtitle ='เพิ่มสินค้าเรียบร้อย';
                                  this.showalert(showicon,showtitle);
                                   
                        }).catch(function(error) {
                            if (error.response && error.response.status === 401) {
                            window.location.href = "login";
                            }
                             else if (error.response && error.response.status ===403) {

                                   let showicon='warring';
                                  let showtitle ='ไม่มีสิทธิการสั่งซื้อสินค้า';
                                  this.showalert(showicon,showtitle);


                            }
                        });
            },
              showalert(showicon,showtitle) {
                toastr[showicon](showtitle,'', {
                progressBar: true,
                //   iconClass: 'toast-pink',
                timeOut: 1500,
                extendedTimeOut: 1500,
                 hideDuration: 1500,
                 progressBar: false,
                });

        },
    },



};
</script>

<style scope>
input.productID{
    display: none;
}
label {
  cursor: pointer;
}
input.productID:checked + label{
color:#1eddc4;

}
 img[lazy=loading]{
  width: 30px;
  height: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -13px;
  margin-left: -13px;
  border-radius: 70px;
  animation: loader 0.8s linear infinite;
  -webkit-animation: loader 0.9s linear infinite;
  }
</style>

