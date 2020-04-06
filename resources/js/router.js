import Vue from 'vue';
import VueRouter from "vue-router";
import Logout from "./Actions/Logout";
import Game from "./views/Game";
import Lobby from "./views/Lobby"
import Players from "./components/Players";
import Welcome from "./views/Welcome";


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/game',
            component: Game,
            meta: { title: 'Game' },
            name: 'game'
        },
        {
            path: '/lobby', component: Lobby,
            meta: { title: 'Lobby' },
            name: 'lobby'
        },
        {
            path: '/players', component: Players,
            meta: { title: 'Players List' },
            name: 'players'
        },

        { path: '/logout', component: Logout  },
        { path: '/',  component: Welcome }


    ],
    mode: 'history'
});
