<template>
    <div class="relative">
        <nav class="bg-blue-900 px-4">
            <div class="flex pt-2 pb-4 items-center justify-between">
                <div> <!-- Navbar Left -->
                    <img src="/img/acquire-white.svg" alt="ACQUIRE" class="h-10">
                </div> <!-- Navbar Left -->

                <div class="relative">
                    <div @click="UserMenuOPen = !UserMenuOPen"  class="flex items-center">
                        <Gravatar :email="user.email"
                                  class="avatar"
                        />
                    </div>
                    <button v-if="UserMenuOPen" @click="UserMenuOPen = false"
                            class="fixed top-0 right-0 bottom-0 left-0 w-full h-full"></button>
                    <div v-if="UserMenuOPen"
                        class="UserMenu">

                        <div class="pb-2 font-bold text-blue-200">
                            My Details
                        </div>
                        <hr>
                        <div class="py-2">
                            <p class="font-bold">Hi {{ user.name }}</p>
                            <p>e-mail: {{ user.email }}</p>
                        </div>

                        <router-link :to="{ name: 'game' }">
                            <div class="UserMenuItem">
                                New Game
                            </div>
                        </router-link>

                        <hr>

                        <router-link to="/logout">
                            <div class="UserMenuItem">
                                Logout
                            </div>
                        </router-link>



                    </div><!-- User Menu -->

                </div>


                <div class="sm:hidden"> <!-- Navbar Right -->

                    <button @click="isOpen = !isOpen" type="button"
                            class="block text-gray-400 hover:text-white focus:text-white focus:outline-none">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path v-if="isOpen" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                            <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                        </svg>
                    </button>
                </div> <!-- Navbar Right -->
            </div> <!-- Navbar -->


            <div :class="isOpen ? 'block' : 'hidden' " class="px-2 pt-4">
                <a href="#" class="block px-2 py-1 text-white font-semibold hover:bg-gray-800 rounded">About</a>
                <a href="#" class="block mt-1 px-2 py-1 text-white font-semibold hover:bg-gray-800 rounded">New Game</a>
                <a href="#" class="block mt-1 px-2 py-1 text-white font-semibold hover:bg-gray-800 rounded">Statistics</a>
                <router-link to="/logout"
                             class="flex items-end text-red-700 hover:text-blue-600 text-sm">
                    <IcoLogout class="flex h-4 pl-2"/>

                </router-link>
            </div><!-- Burger Menu-->


        </nav>


            <h1>{{ title }}</h1>

            <router-link to="/">
                root
            </router-link>

            <router-view></router-view>


        <footer>

        </footer>


    </div>

</template>

<script>
    import IcoLogout from "../icons/icoLogout";
    import Gravatar from "../partials/Gravatar";


    export default {
        name: "App",

        components: { IcoLogout, Gravatar },

        props: [
            'user'
        ],

        created() {
            this.title = this.$route.meta.title;

            window.axios.interceptors.request.use(
                (config) => {
                    if(config.method === 'get') {
                        config.url = config.url + '?api_token=' + this.user.api_token;
                    } else {
                        config.data = {
                            ...config.data,
                            api_token: this.user.api_token,
                        };
                    }

                    return config;
                }
            )
        },

        data: function () {
            return {
                title: '',
                isOpen: false,
                UserMenuOPen: false,
            }
        },

        watch: {
            $route(to, from) {
                this.title = to.meta.title;
            },

            title() {
                document.title = this.title + ' | Acquire - Online Board Game'
            }
        }


    }
</script>

<style scoped>

</style>
