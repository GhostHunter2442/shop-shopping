<template>
   <div>
    <section class="breadcrumb-section set-bg" data-setbg="/shopping/public/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                      
                        <div class="breadcrumb__option">

                             <h5>G-SHOCK</h5>
                            <span>Its full form is Gravitaitional Shock.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <section class="featured spad"  v-for="(top)  in  toppriceList"  :key="top.id">
           <div class="container justify-content-center"  v-if="top.products == '' ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-6 offset-md-5">
                            <div class="shoping__cart__table">
                            </div>
                            <p>ไม่มีรายการ</p>
                        </div>
                    </div>
                </div>
            </div>

        <div class="container" v-else>
        <h5> สินค้าขายดี {{top.name}}</h5>

             <div class="row  my-4">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" v-for="(list)  in  top.products"  :key="list.id">

                <div class="product__item" >
                        <div class="product__item__pic set-bg" >
                             <a :href="shopURL+list.slug">
                            <img v-lazy="imageUrl+list.picture" lazy="loading">
                            </a>

                               <div class="product__new__wrawper" v-if=" getcreateDate(list.created_at) == timestamp" >
                                  <div class="item_wrawper">ใหม่</div>
                                </div>

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
    </div>
</template>
<script>
import moment from 'moment'
    export default {
        props:['cat_id'],
        data(){
            return {
            //    limit:3,
               shopURL:'/shopping/public/shop/',
               imageUrl: "/shopping/public/storage/images/",
               toppriceList:{},
            //    toppriceList:[],
               timestamp: '',
               btnDisabled:'isEnabled' //isDisabled
            }
        },
        mounted(){
            this.gettopprice();
              this.getNow();
        },
        methods:{
               addclass(stock){
                return  stock < 1 ? 'isDisabled' :'isEnabled';
             },
         discount(price,discount){
            var percen=(100 - parseInt(discount))/100;
            var dis= (parseInt(price)/(percen));
            return  parseInt(dis);
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
            async gettopprice(){

                   await  axios.get("/shopping/public/show/gettopprice/"+this.cat_id).then(res => {
                    // this.gettopprice = res.data;
                    // var myname=res.data.name;
                    this.toppriceList=res.data;
                    console.log(res.data)
                    }).catch( error => {
                     console.log(error.response);
                    });
              },
               async adddetail(id){
                 let qrt =1;
                        await  axios.get("/shopping/public/cartdetail/adddetail/"+id+"/"+qrt).then(response => {

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

        }


    }
</script>
