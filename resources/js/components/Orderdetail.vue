<template>
    <div>
        <div class=" checkout__form" v-for="  invoice in invoiceorder"  :key="invoice.id">
            <div class="checkout__form_header_aderess">
                <ul>
                    <li>
                        <h2>คำสั่งซื้อ #{{ id }}</h2>
                    </li>
                </ul>
            </div>
            <h4></h4>
            <div class="col-lg-12 col-md-6 my-3" >
                <div class="row">
                    <div class="col-sm-12 " >
                        <div class="show_status_order" >
                            <h3>{{ statusorder(invoice.status_order) }}</h3>
                               <p class="card-text">สั่งเมื่อ:  {{ getcreateDate(invoice.created_at) }}</p>
                                 <p class="card-text"> จัดส่งวันที่: {{ getsentDate(invoice.created_at)}} - {{ getsentsum(invoice.created_at)}}</p>
                        </div>
                    </div>
                </div>
             </div>
              <div class="col-lg-12 col-md-6 my-3" >
                <div class="row">
                    <div class="col-sm-12 " >
                            <div class="show_status_orderdetail" v-for="  address in addressorder"  :key="address.id">
                                 <div class="show_track_detail">
                                      <ul>
                                       <h3> <i class="fa fa-map-marker stroke-transparent " ></i> ที่อยู่จัดส่ง</h3>
                                       </ul>
                                  </div>
                               <p class="card-text">{{address.firstname}} {{address.lastname}}</p>
                                 <p class="card-text">{{address.phonenumber}}</p>
                                  <p class="card-text">{{address.adress2}} {{address.adress3}}{{address.adress1}}</p>
                            </div>
                    </div>
                </div>
             </div>
              <h4></h4>
               <div class="col-lg-12 col-md-6 my-3" >
                <div class="row">
                    <div class="col-sm-12 " >
                         <div class="show_status_orderdetail" >
                                 <div class="show_track_detail">
                                      <ul>
                                       <h3> <i class="fa fa-cube stroke-transparent"></i> จัดส่งโดย</h3>
                                       </ul>
                                  </div>
                                <p class="card-text">KeryExpress Thailand</p>

                            </div>
                    </div>
                </div>
             </div>
               <h4></h4>
               <div class="col-lg-12 col-md-6 my-3" >
                <div class="row">
                    <div class="col-sm-12 " >
                         <div class="show_status_orderdetail" >
                                 <div class="show_track_detail">
                                      <ul>
                                       <h3> <i class="fa fa fa-money stroke-transparent"></i> วิธีชำระเงิน </h3>
                                       </ul>
                                  </div>

                                <p class="card-text">{{checkpay(invoice.paymentid)}}</p>
                                 <div class="show__img" v-if="invoice.paypic !='nopic.png'">
                                        <img :class="{ full: fullWidthImage }" @click="fullWidthImage = !fullWidthImage" :src="imageUrlslip+invoice.paypic"  alt="" />
                                 </div>

                            </div>

                    </div>
                </div>
             </div>
              <h4></h4>
               <div class="col-lg-12 col-md-6 my-3" >
                <div class="row">
                    <div class="col-sm-12 " >
                         <div class="show_status_orderdetail" >
                                 <div class="show_track_detail">
                                      <ul>
                                       <h3> <i class="fa fa-file stroke-transparent"></i> สินค้าของคุณ</h3>
                                       </ul>
                                  </div>
                            </div>
                              <!-- table -->
                            <div class="order__cart__table">
                                <table>
                                    <tbody>
                                        <tr v-for="  product in productorder"  :key="product.product_id">
                                            <td class="shoping__cart__item">

                                               <img :src="imageUrl+product.picture"  width="90">
                                                <h5 >{{product.name}}<br><p class="card-text">จำนวน: {{product.qty}}<br>ราคา: {{product.price}}</p></h5>

                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- tble -->
                    </div>
                </div>
             </div>
              <h4></h4>

               <div class="col-lg-12 col-md-6" >
                  <div class="row" >
                       <div class=" col-lg-6 col-md-6" >
                        </div>
                           <div class=" col-lg-6 col-md-6" >
                        <div class="order__checkout ">
                                <ul>
                                    <li>ราคารวม <span >{{ invoice.price | currency("฿")}}</span  > </li>
                                    <li>ส่วนลด <span>$0.00</span></li>
                                    <li>ยอดสั่งซื้อรวม <span class="totolprice"> {{ invoice.price | currency("฿")}}</span></li>
                                </ul>
                        </div>
                        </div>

               </div>
               </div>
                <h4></h4>
                  <div class="col-lg-12 col-md-6 my-3" >
                <div class="row">
                    <div class="col-sm-12 " >
                         <div class="show_status_orderdetail" >
                                 <div class="show_track_detail">
                                      <ul>
                                       <h3> <i class="fa fa-cogs stroke-transparent"></i> จัดการคำสั่งซื้อ</h3>
                                       </ul>
                                  </div>
                                   <div class="col-sm-5 " >
                                       <div class="calcel_order">
                                             <div class="card">
                                        <div class="card-body">

                                            <a href="javascript:;" class="close"></a><br><br>

                                          <span>ยกเลิกคำสั่งซื้อ</span>
                                          <p>  ไม่สามารถยกเลิกได้เมื่ออยู่ระหว่างการจัดส่ง</p>

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
</template>
<script>
import moment from 'moment'
export default {
    props: ['id'],
    mounted(){
         this.getorder();
    },
    data() {
        return {
            imageUrl: "http://localhost/shopping/public/storage/images/resize/",
            imageUrlslip: "http://localhost/shopping/public/storage/images/slipbank/",
            invoiceorder:{},
            productorder:[],
            addressorder:{},
            fullWidthImage: false
        };
    },
    methods: {
          getcreateDate(date) {
                  return moment(date).format('DD/MM/YYYY');
            },
            getsentDate(date){
                   let m = moment(date);
                return (m.add(1, 'days').format('DD'));
            },
            getsentsum(date){
                  let m = moment(date);
                return (m.add(3, 'days').format('DD/MM/YYYY'));
            },
          checkpay(status) {
                return  (status  == 1) ? "จ่ายเงินผ่านธนาคาร" :(status  == 2) ? "เก็บเงินปลายทาง" : "ชำระผ่านบัตรเครดิต" ;
            },
           statusorder(status) {
                return  (status  == 1) ? "ยืนยันการสั่งซื้อ" :(status  == 2) ? "จัดส่งสินค้าเเล้ว" : "ถูกยกเลิก" ;
            },
         async getorder() {

                await  axios.get("http://localhost/shopping/public/order/orderdetail/profile/getorder",
               {params:{invoice_id:this.id}}
                ).then(res => {

                    //   res.data.forEach(item => {
                          // this.invoiceorder.push(res.data);
                        //  });

                  this.invoiceorder=res.data.invoice;
                  this.productorder = res.data.product;
                  this.addressorder = res.data.address;
                 // console.log(res.data)

               }).catch(function (error) {
                    console.log(error);
                });
            },
    }
};
</script>
