/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-component', require('./components//LoginComponent.vue').default);


const app = new Vue({
    el: '#app',
});




// require('./bootstrap');
// window.Vue = require('vue').default;
// // import VueRouter from 'vue-router'
// // Vue.use(VueRouter)

// // import Header from './components/Header.vue';
// // import Login from './components/Login.vue';
// // import Register from './components/Register.vue';
// // import Posts from './components/Posts.vue';
// Vue.component('example-component', require('./components/ExampleComponent.vue'));//header

// Vue.component('login-component', require('./components/LoginComponent.vue').default);


// // const routes = [
// //     { path: '/login', component: Login },
// //     { path: '/register', component: Register },
// //     { path: '/posts', component: Posts }

// //   ]

// //   const router = new VueRouter({
// //    mode:history,
// //     routes // short for `routes: routes`
// //   })

// //   Vue.component('example-component', require('./components/ExampleComponent.vue').default);//header


// // Vue.component('example-component', require('./components/ExampleComponent.vue').default);//header
// // Vue.component('login', require('./components/Login.vue').default);
// // Vue.component('register', require('./components/Register.vue').default);
// // Vue.component('posts', require('./components/Posts.vue').default);


// const app = new Vue({
//     el: '#app',
//     // router,
//     // components:{
//     //     Header,Register,Posts
//     // },
// });
