import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./views/Home.vue";
import Register from "./views/Register";
import Login from "./views/Login";
import User from "./views/User";
import store from "./store";
import PageNotFound from "./views/PageNotFound"
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [{
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/user",
            name: "user",
            component: User,
            beforeEnter:(to,from,next)=>{
                if(store.state.userLoggedIn == false){
                    next(false)
                }else{
                    next()
                }
            }
        },
        { path: "*", component: PageNotFound }
    ]
});

export default router;