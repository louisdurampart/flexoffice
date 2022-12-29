import Vue from 'vue'
import './plugins/bootstrap-vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import 'roboto-fontface/css/roboto/roboto-fontface.css'
import '@mdi/font/css/materialdesignicons.css'
import router from './router'
import i18n from './i18n'
import axios from 'axios'
import VueSession from 'vue-session'
import store from "./store";

Vue.use(VueSession)
Vue.prototype.$http = axios

var app = new Vue({
  store,
  el: '#app',
  components: { App },
  template: '<App/>',
  vuetify,
  router,
  i18n,
  render: h => h(App),
 
}).$mount('#app')
Vue.config.productionTip = false

