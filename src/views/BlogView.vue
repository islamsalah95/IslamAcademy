<template>
    <div class="Blog">
        <main class="main-content">
            <div class="fullwidth-block inner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-10">
                            <div class="content">
                                <h2 class="entry-title">Blog</h2>

                                
                                <playlist-Component
                                :palylistId="palylistId"
                               ></playlist-Component>


                            </div>
                        </div>
                     
                    </div>
                </div>
            </div> 

            
        </main> 
    </div>
</template>
<script>
 import playlistComponent from "../components/playlistComponent.vue";

 export default {
    data() {
    return {
        name:'Blog',
        palylistId:this.$route.params.palylistId
    }
   },

    components:{
         playlistComponent
},

methods:{
    
}

  }
</script>