import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/js/views/Home'
import Register from '@/js/views/Register'
import Login from '@/js/views/Login'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        }
    ]
});

export default router;