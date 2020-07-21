<template>
    <div>
        <div class=" checkout__form" >
            <div class="checkout__form_header_aderess">
                <ul>
                    <li>
                        <h2>หมายเลขพัสดุ: {{ id }}</h2>
                    </li>
                </ul>
            </div>
            <h4></h4>
            <div class="col-lg-12 col-md-6 my-3" >
                <div class="row">

                    <div class="col-sm-12 col-md-3" >

                        <div class="show_status_track" v-if="loaddata">
                             <p class="card-text">{{trackdata.signed_by}}</p>
                            <div class="history-tl-container">
                            <ul class="tl" >
                            <li class="tl-item" ng-repeat="item in retailer_history" v-for="track in listtrackdata "  :key="track.checkpoint_time">

                                <div class="item-title">{{ track.message }}</div>
                                <div class="item-detail">{{ track.location }}</div>
                                <div class="timestamp">
                                     {{getcreateDate(track.checkpoint_time)}}<br>Time {{getcreateTime(track.checkpoint_time)}}
                                </div>
                            </li>
                            </ul>
                            </div>
                        </div>
                         <div class="load_status_track" v-if="loading">
                           <div class="load-6">
                                <div class="letter-holder">
                                <div class="l-1 letter">L</div>
                                <div class="l-2 letter">o</div>
                                <div class="l-3 letter">a</div>
                                <div class="l-4 letter">d</div>
                                <div class="l-5 letter">i</div>
                                <div class="l-6 letter">n</div>
                                <div class="l-7 letter">g</div>
                                <div class="l-8 letter">.</div>
                                <div class="l-9 letter">.</div>
                                <div class="l-10 letter">.</div>
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
       this.gettrack();
    },
    data() {
        return {

            trackdata:{},
            loaddata:false,
            loading:true,

        };
    },
    computed: {
    listtrackdata() {
      return _.orderBy(this.trackdata.checkpoints, 'checkpoint_time', 'desc');
       }
    },
    methods: {
          getcreateDate(date) {
                  return moment(String(date)).format('D/MM/yyyy');
            },
            getcreateTime(time) {
                  return moment(String(time)).format('HH:mm');
            },
             async gettrack() {

                await  axios.get("http://localhost/shopping/public/order/orderdetail/track",
               {params:{track_number:this.id}}
                ).then(res => {
                  this.trackdata=res.data.data.tracking;
                  this.loaddata=true;
                  this.loading= false;

               }).catch(function (error) {
                    console.log(error);
                });
            },

    }
};
</script>
