import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from '../components/login/Login'
import Logout from '../components/login/Logout'
import Signup from '../components/login/Signup'
import Forum from '../components/Forum/Forum'
import singlequestion from '../components/Forum/singlequestion'

const routes = [
    { path: '/login', component: Login, name:'Login'},
    { path: '/logout', component: Logout, name:'Logout'},
    { path: '/signup', component: Signup, name:'Signup'},
    { path: '/forum', component: Forum, name:'Forum'},
    { path: '/question/:slug', component: singlequestion, name:'SingleQuestion'},
  ]


  const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
  })

  export default router