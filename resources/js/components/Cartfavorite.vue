<template>
      <span>{{$store.getters.getfavorite}}</span>
</template>
<script>
    export default {
        // props:['cartfavorite'],

        data(){
            return {
                //  carfavorite:3
            }
        },

        created() {
            console.log('Component mounted.')
        },

    }
</script>
