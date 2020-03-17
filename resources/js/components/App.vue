<template>
    <div class="h-screen bg-white">
        <h1>{{ title }}</h1>

        <div>
            <router-link to="/logout" class="flex items-center py-2 hover:text-blue-600 text-sm">
                <pic-logout />
                <div class="tracking-wide pl-3">Logout</div>
            </router-link>
        </div>
    </div>
</template>

<script>
    import PicLogout from "./PicLogout";

    export default {
        name: "App",

        components: [ PicLogout ],

        created() {
            this.title = this.$route.meta.title;
        },

        data: function () {
            return {
                title: '',
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
