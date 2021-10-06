import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./views/Home";
import Register from "./views/Register";
import Login from "./views/Login";

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
        }
    ]
});

export default router;