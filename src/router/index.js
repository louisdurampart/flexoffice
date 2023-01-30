import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Selection_Batiment from '../views/BatimentView.vue'
import Creation from '../views/CreationView.vue'
import Selection_Bureau from '../views/BureauView.vue'
import Monprofil from '../views/MonProfilView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/Selection_Batiment',
    name: 'Selection_Batiment',
    component: Selection_Batiment
    
  },
  {
    path: '/Creation',
    name: 'Creation',
    component: Creation
    
  },
  {
    path: '/Selection_Bureau',
    name: 'Selection_Bureau',
    component: Selection_Bureau
    
  },
  {
    path: '/Reservation',
    name: 'Reservation',
    component: () => import(/* webpackChunkName: "about" */ '../views/ReservationView.vue')
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/Monprofil',
    name: 'Monprofil',
    component: Monprofil
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
