import "./bootstrap"
import Vue from "vue"
import BootstrapVue from 'bootstrap-vue'
import App from '@/js/views/App'
import "bootstrap-vue/dist/bootstrap-vue.css"
import router from '@/js/routes'


Vue.use(BootstrapVue)
new Vue({
    router,
    render: h => h(App)
  }).$mount("#app");

