<template>
    <div>
    <section class="breadcrumb-section set-bg" :data-setbg="herder_img">
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


    <section class="featured spad" >


        <div class="container">
        <h5>รายการสินค้าลดราคาทั้งหมด</h5>
             <div class="row  my-4">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" v-for="(list)  in  discountList.data"  :key="list.id">

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


                    <pagination :data="discountList" :limit="limit"  v-on:pagination-change-page="getdiscount">
                    <span slot="prev-nav"><i class="fa fa-long-arrow-left"></i></span>
                    <span slot="next-nav"><i class="fa fa-long-arrow-right"></i></span>
                    </pagination>
        </div>
    </section>
    </div>
</template>
<script>
import api  from '../config';
import moment from 'moment'
    export default {
        data(){
            return {
               limit:3,
               herder_img:api.BASE_URL+'img/breadcrumb.jpg',
               shopURL:api.BASE_URL+'shop/',
               imageUrl: api.BASE_URL_IMG,
               discountList:{},
               timestamp: '',
               btnDisabled:'isEnabled' //isDisabled
            }
        },
        mounted(){
            this.getdiscount();
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
            async getdiscount(page=1){

                   await  axios.get(api.BASE_URL+"show/getshowdiscount?page=" +page).then(res => {
                    this.discountList = res.data;

                    }).catch( error => {
                     console.log(error.response);
                    });
              },
               async adddetail(id){
                 let qrt =1;
                        await  axios.get(api.BASE_URL+"cartdetail/adddetail/"+id+"/"+qrt).then(response => {

                                    toastr['success']('เพิ่มสินค้าเรียบร้อย','', {
                                    progressBar: true,
                                    timeOut: 1500,
                                    extendedTimeOut: 1500,
                                    hideDuration: 1500,
                                    progressBar: false,
                                    });


                        }).catch(function(error) {
                            if (error.response && error.response.status === 401) {
                            window.location.href = "login";
                            }
                        });
             },

        }


    }
</script>

