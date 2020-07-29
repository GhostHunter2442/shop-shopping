

require('./bootstrap');
 
import VueRouter from "vue-router";
import router from "./routes";
import Vuex from 'vuex';
import Index from "./index.vue";
import storeDefinition from "./store";
import VueLazyload from 'vue-lazyload';
import Vue2Filters from 'vue2-filters';
import VueThaiAddressInput from 'vue-thai-address-input';

import 'vue-thai-address-input/dist/vue-thai-address-input.css';
import StarRating from 'vue-star-rating';
import vSelect from "vue-select";




window.Vue = require('vue');
// window.$ = require('jquery');
window.bus = new Vue();


Vue.use(Vue2Filters);
Vue.use(VueLazyload);
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(require('vue-moment'));
Vue.use(VueThaiAddressInput);
Vue.component("v-select", vSelect);

Vue.component('cart-detail', require('./components/Cartdetail.vue').default);
Vue.component('cart-count', require('./components/Cartcount.vue').default);
Vue.component('cart-favorite', require('./components/Cartfavorite.vue').default);
Vue.component('show-favorite', require('./components/Favorite.vue').default);
Vue.component('show-all', require('./components/Showall.vue').default);
Vue.component('check-out', require('./components/Checkout.vue').default);
Vue.component('track-out', require('./components/Trackout.vue').default);
Vue.component('check-payment', require('./components/Checkpayment.vue').default);
Vue.component('check-paymentomise', require('./components/Paymentomise.vue').default);
Vue.component('checkout-payment', require('./components/Checkoutpayment.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('shop-detail', require('./components/Shopdetail.vue').default);
Vue.component('top-price', require('./components/Topprice.vue').default);
Vue.component('show-discount', require('./components/Showdiscount.vue').default);
Vue.component('show-coupon', require('./components/Coupon.vue').default);

Vue.component('star-rating',StarRating);
const store_item = new Vuex.Store(storeDefinition);



const app = new Vue({
    el: '#app',
    router,
    store:store_item,
    components:{
        "index":Index,
    },
    data() {
        return {
        };
    },

    // mounted() {

    // },
    created(){
        this.$store.dispatch("addItem")
        this.$store.dispatch("addFavorite")

    },

    computed: {

    },
    methods: {
    },


});


