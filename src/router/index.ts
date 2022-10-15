import Vue from 'vue'
import VueRouter, { RouteConfig } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import DwonloadView from '../views/DwonloadView.vue'
import GalleryView  from '../views/GalleryView.vue'
import BlogView     from '../views/BlogView.vue'
import PayingsView from '../views/PayingsView.vue'
import CartView from '../views/CartView.vue'
import VisaCardComponent from '../components/VisaCardComponent.vue'

import LoginComponent from '../components/auth/LoginComponent.vue'
import RegisterComponent from '../components/auth/RegisterComponent.vue'
import VerifyComponent from '../components/auth/VerifyComponent.vue'
import AddCoursesComponent from '../components/AddCoursesComponent.vue'
import AddPlaylistComponent from '../components/AddPlaylistComponent.vue'
import NotAutorization from '../components/NotAutorization.vue'


Vue.use(VueRouter)

const routes: Array<RouteConfig> = [
  {
    path: 'home',
    name: 'home',
    component: HomeView
    ,meta: { Auth: false },

  },
  {
    path: '/About',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
    ,meta: { Auth: false },

  },
  {
    path: '/',
    name: 'Download',
    component: DwonloadView
    ,meta: { Auth: false },

  },
  {
    path: '/Gallery',
    name: 'Gallery',
    component: GalleryView
    ,meta: { Auth: false },

  },
  {
    path: '/Blog/:palylistId',
    name: 'Blog',
    component: BlogView
    ,meta: { Auth: true },
  },
  {
    path: '/NotAutorization',
    name: 'NotAutorization',
    component: NotAutorization
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const token=localStorage.getItem('token')
      if (!token) {
        
     return  next('/LoginComponent')

      }else{ return  next() }
    },

  },
  {
    path: '/PayingsView',
    name: 'PayingsView',
    component: PayingsView
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const token=localStorage.getItem('token')
      if (!token) {
        
     return  next('/LoginComponent')

      }else{ return  next() }
    },

  },
  {
    path: '/CartView',
    name: 'CartView',
    component: CartView
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const token=localStorage.getItem('token')
      if (!token) {
        
     return  next('/LoginComponent')

      }else{ return  next() }
    },


  },
  {
    path: '/VisaCardView',
    name: 'VisaCardView',
    component: CartView
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const token=localStorage.getItem('token')
      if (!token) {
        
     return  next('/LoginComponent')

      }else{ return  next() }
    },


  },{
    path: '/VisaCardComponent',
    name: 'VisaCardComponent',
    props:true,
    component: VisaCardComponent
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const token=localStorage.getItem('token')
      if (!token) {
        
     return  next('/LoginComponent')

      }else{ return  next() }
    },


    
  },
  {
    path: '/LoginComponent',
    name: 'LoginComponent',
    component: LoginComponent
    ,meta: { Auth: false },

  },
  {
    path: '/RegisterComponent',
    name: 'RegisterComponent',
    component: RegisterComponent
    ,meta: { Auth: false },

  },
  {
    path: '/VerifyComponent',
    name: 'VerifyComponent',
    component: VerifyComponent
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const token=localStorage.getItem('token')
      if (!token) {
        
     return  next('/LoginComponent')

      }else{ return  next() }
    },


  },
  {
    path: '/AddCoursesComponent',
    name: 'AddCoursesComponent',
    component: AddCoursesComponent
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const userType=localStorage.getItem('type')
      if (userType !=='admin') {
        
     return  next('/NotAutorization')

      }else{ return  next() }
    },

  },
  {
    path: '/AddPlaylistComponent',
    name: 'AddPlaylistComponent',
    component: AddPlaylistComponent
    ,meta: { Auth: true },
    beforeEnter: (to, from,next) => {
      // reject the navigation
      const token=localStorage.getItem('token')
      if (!token) {
        
     return  next('/NotAutorization')

      }else{ return  next() }
    },


  },

  { path: '/:notFound(.*)'}

]



const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})


// router.beforeEach(async (to,from,next) => {
 
//   if (to.meta.Auth && ) {
//     // redirect the user to the login page
//     return { name: '/LoginComponent' }
//   }

//     return   next()

// });



export default router
