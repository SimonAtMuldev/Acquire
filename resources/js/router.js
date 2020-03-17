import Vue from 'vue';
import VueRouter from "vue-router";
import Logout from "./Actions/Logout";
import Game from "./components/Game";


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/', component: Home,
            meta: { title: 'Home' }
        }, {
            path: '/game', component: Game,
            meta: { title: 'Game' }
        }, {
            path: '/logout', component: Logout
           }
    ],
    mode: 'history'
});
