import Vue from 'vue'
import VueRouter from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import axios from 'axios'
import App from './App.vue'
import LoginComponent from './pages/Login/LoginComponent'
import HomeComponent from './pages/Home/HomeComponent'
import FormNew from './pages/Anuncio/FormNew'
import Detalhes from './pages/Detalhes/detalhes'


Vue.config.productionTip = false
Vue.use(VueRouter)


axios.defaults.baseURL = 'http://localhost:8000';

const routes = [

  { path: '/login', name: 'login', component: LoginComponent },
  { path: '/home', name: 'home', component: HomeComponent },
  { path: '/formnew', name: 'formnew', component: FormNew },
  { path: '/detalhes', name: 'detalhes', component: Detalhes },

]

const router = new VueRouter({
  mode: 'history',
  routes,

})

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
