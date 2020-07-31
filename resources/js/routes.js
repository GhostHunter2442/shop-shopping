import VueRouter from "vue-router";
import myorder from "./components/Myorder.vue";
import myprofile from "./components/Profile.vue";
import myaddress from "./components/Address.vue";
import modifypass from "./components/Modifypass.vue";
import addaddress from "./components/Addaddress.vue";
import editaddress from "./components/Editaddress.vue";
import order from "./components/Orderdetail.vue";
import tracking from "./components/Tracking.vue";
const routes =[
            {
                path: "/shopping/public/order/orderdetail/myorder",
                component: myorder,
                name: "order",

            },
            {
                path: "/shopping/public/order/orderdetail/myorder/profile",
                component: myprofile,
                name: "profile",

           },
           {
                path: "/shopping/public/order/orderdetail/myorder/address",
                component: myaddress,
                name: "address",

          },
          {
                path: "/shopping/public/order/orderdetail/myorder/modify",
                component: modifypass,
                name: "password",

         },
         {
                path: "/shopping/public/logout",
                name: "logout",

         },
         {
            path: "/shopping/public/order/orderdetail/myorder/address/add",
            name: "addaddress",
            component:addaddress
         },
         {
            path: "/shopping/public/order/orderdetail/myorder/address/edit/:id",
            name: "editaddress",
            component:editaddress,
            props: true
         },
         {
            path: "/shopping/public/order/orderdetail/myorder/detail/:id",
            name: "orders",
            component:order,
            props: true
         },
         {
            path: "/shopping/public/order/orderdetail/myorder/track/:id",
            name: "track",
            component:tracking,
            props: true
         }
 ];

var router = new VueRouter({
    routes,
    mode:"history"
  });

  router.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    if (to.name) {
        // Start the route progress bar.

        // console.log('start')

    }
    next()
  })

  router.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
    // console.log('stop')
    // NProgress.done()
  })
  export default router;
