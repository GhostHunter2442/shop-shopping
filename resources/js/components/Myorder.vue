<template>
    <div>
              <!-- Product Section Begin -->

         <div class=" checkout__form">
         <div class=" chackout__order__title">
                            <h2>การซื้อของฉัน</h2>
                        </div>
            <h4></h4>



                        <div class="product__myorder" >
                        <div class="row">
                              <div class="col-lg-12 col-md-8" >
                                <div class="chackout__order__table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="checkout__payment__head">
                                                    <p class="card-text"> เลขใบสั่งซื้อ </p>
                                                    </th>
                                                <th class="checkout__payment__center">
                                                    <p class="card-text"> ทำรายการ </p>
                                                    </th>
                                                <th ><p class="card-text">เลขพัสดุ</p></th>
                                                    <th ><p class="card-text">สถานะสินค้า</p></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="  order in listOrder.data"  :key="order.id">
                                                <td class="chackout__bank__item" >
                                                    <h5 @click="gotodetail(order.id)">{{order.id}}</h5>
                                                </td>

                                                <td class="chackout__bank__item_heard">
                                                        <h5> {{getcreateDate(order.created_at)}}</h5>
                                                </td>
                                                <td class="chackout__bank__item_track">
                                                        <h5 @click="gototrack(order.track_code)" v-if="order.track_code !='-'">{{order.track_code}}</h5>
                                                         <h5 v-else>{{order.track_code}}</h5>
                                                </td>
                                                    <td class="chackout__bank__item_center">
                                                        <h5 >{{getstatusOrder(order.status_order)}}</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <pagination :data="listOrder" :limit="limit"  v-on:pagination-change-page="getcartorder"  >
                                <span slot="prev-nav"><i class="fa fa-long-arrow-left"></i></span>
                                    <span slot="next-nav"><i class="fa fa-long-arrow-right"></i></span>
                                </pagination>
                            </div>
                        </div>
                     </div>
                         </div>
    <!-- Product Section End -->
    </div>
</template>
<script>
import moment from 'moment'
export default {

        mounted() {
            this.getcartorder();
       },

        data(){
             return {
               listOrder: {},
                limit:3,
                page: 1
             }

        },
          computed: {

         },
        methods:{
             getcreateDate(date) {
                  return moment(date).format('DD/MM/YYYY');
            },
               getstatusOrder(status) {

                     return  (status  == 1) ? "ยืนยันการสั่งซื้อ" :(status  == 2) ? "เตรียมจัดส่ง" :(status  == 4) ? "จัดส่งสินค้าเเล้ว" : 'ถูกยกเลิก' ;


              return status_order;
            },
            gotodetail(id){
                 this.$router.push({ name: 'orders', params: { id: id } })
            },
            gototrack(id){

                    this.$router.push({ name: 'track', params: { id: id } })
            },
            async getcartorder(page) {

                await  axios.get(APP_URL+"order/orderdetail/datamyorder?page=" +page).then(res => {
                  this.listOrder = res.data.order;


               }).catch(function (error) {
                    console.log(error);
                });
            },

        },


}

</script>
