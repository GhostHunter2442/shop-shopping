<template>
    <!-- <span>{{cartcount}}</span> -->
      <span>{{$store.getters.getcount}}</span>
</template>
<script>
    export default {
        // props:['cartcount'],

        data(){
            return {
                // cartcount:3
            }
        },

        created() {
            console.log('Component mounted.')
        },

    }
</script>
