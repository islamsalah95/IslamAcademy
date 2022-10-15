<template>
  <div id="app">
    <header class="site-header">
      <div class="container">
        <a href="index.html" id="branding">
          <!-- <img src="../public/frontend/dummy/8ff38594d35a475f92b6893eb68c7cce.png" alt="Site Title"> -->
         <h4 style="color:#FC5829">Islam Academy</h4>
          <!-- <small class="site-description">Knowladge</small> -->
        </a> <!-- #branding -->
        
        <nav class="main-navigation">
          <button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
          <ul class="menu">
            <li class="menu-item"><router-link to="/">courses</router-link></li>
            <li class="menu-item"><router-link to="/About">About</router-link></li>
            <!-- <li class="menu-item"><router-link to="/Gallery">Gallery</router-link></li> -->
            <li  v-if="isLogin" class="menu-item"><router-link to="/CartView">Cart</router-link></li>
           
            <li v-if="isLogin" class="menu-item"><router-link to="/PayingsView">Payings</router-link></li>

            <li v-if="!isLogin" class="menu-item"><router-link to="/LoginComponent">Login</router-link></li>
            
            <li v-if="isLoginAdmin==='admin'" class="menu-item"><router-link to="/AddCoursesComponent">AddCourses</router-link></li>

            <li v-if="isLoginAdmin==='admin'" class="menu-item"><router-link to="/AddPlaylistComponent">AddPlaylist</router-link></li>

            <li v-if="!isLogin" class="menu-item"><router-link to="/RegisterComponent">Registert</router-link></li>


            <li v-if="isLogin" class="menu-item">
              <a type="button"  @click="logout()" class="text-danger">logout</a>
            </li>

            <li  v-if="userName" class="menu-item">
              <a type="button" class="text-primary">{{userName}}</a>     
            </li>

     

          </ul> 
        </nav> 
        <div class="mobile-menu"></div>
      </div>
    </header>

   
   
    <router-view/>



    <footer class="site-footer">
      <div class="container">
        <!-- <img src="../public/frontend/dummy/logo-footer.png" alt="Site Name"> -->
        <h1 style="color:#FC5829">Islam Academy</h1>

        <address>
          <p>50, Thiruvoodal Street, Thiruvannamalai. <br><a href="tel:9488487853">+91 94884 87853</a> <br> <a href="mailto:srikrishnacommunication55@gmail.com">srikrishnacommunication55@gmail.com</a></p> 
        </address> 
        
        <form action="#" class="newsletter-form">
          <input type="email" placeholder="Enter your email to join newsletter...">
          <input type="submit" class="button cut-corner" value="Subscribe">
        </form> <!-- .newsletter-form -->
        
        <div class="social-links">
          <a href="#"><i class="fa fa-facebook-square"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-google-plus"></i></a>
          <a href="#"><i class="fa fa-pinterest"></i></a>
        </div> <!-- .social-links -->
        
        <p class="copy">Islan Acadmy @ Copyright 2016. All right reserved. Designed by <a href="http://srikrishnacommunication.com/Giridesigns.html">Giri Designs</a></p>
      </div>
    </footer> <!-- .site-footer -->
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
 export default {
 data(){
  return {
    isActive: true,
    token: localStorage.getItem("token"),
    name:this.$store.state.userName,
    type:this.$store.state.type

  };
 },
 methods: {
logout(){
  axios.defaults.headers.common["Accept"] = "application/json";
  axios.defaults.headers.common["Authorization"] =this.token;
  axios.get('http://127.0.0.1:8000/api/logoutAll')
  .then((response)=>{
    if (response.data.success) {
      Swal.fire({
              position: "top-end",
              icon: "success",
              title: "logout has been success",
              showConfirmButton: false,
              timer: 1500,
            });
          }
 
          return  [
    localStorage.setItem('name',''),
    localStorage.setItem('token',''),
    localStorage.setItem('type','')

        ];

  })
  .catch((error)=>{console.log(error)})
  // window.location.reload()
  return this.$router.push("/LoginComponent");
},    getUser() {
        window.location.reload()
    }
 },computed:{

isLogin(){
  return this.$store.getters.isAuth ;
},

isLoginAdmin(){
  return this.$store.getters.isAdmin ;
},userName(){
  return this.$store.getters.userName ;
},


 }


}
</script>


<style>
  .red {
    color: #fd5927; 
  }


</style>