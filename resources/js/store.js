import api from '../js/config';
export default{
      state:{
           countItem:0,
           favorite:0,
           discount:0
      },
       mutations: {
          setcount(state,value){
            state.countItem=value
          },
          setfavorite(state,value){
            state.favorite=value
          }

      },
      getters:{
           getcount(state){
               return state.countItem
           },
           getfavorite(state){
            return state.favorite
        }
      },
      actions:{
        async  addItem(contex,value){
            let cart= [];
            let totlaitem=0;
            await axios.get(api.BASE_URL+"api/cartdetail/detail"
                         ).then(response => {
                              cart = response.data;
                          }).catch( error => {
                         console.log( error.response)
                         });
                         if(cart !=""){
                             totlaitem= cart.reduce((total, product) => total + product.pivot.qty,0);
                         }

              contex.commit('setcount',value=totlaitem)
          },
          async addFavorite(contex,value){
            let favorite= [];
            let totlaitem=0;
            await  axios.get(api.BASE_URL+"api/cartdetail/getallfavorite"
                         ).then(response => {
                            favorite = response.data;
                          }).catch( error => {
                         console.log( error.response)
                         });
                         if(favorite !=""){
                             totlaitem= favorite.reduce((total, product) => total + product.pivot.qty,0);
                        }

              contex.commit('setfavorite',value=totlaitem)
          },

      },
      modules:{

      }
};
