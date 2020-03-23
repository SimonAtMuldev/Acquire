<template>
    <div class="h-screen bg-white">
        <nav class="">

        </nav>

        <h1>{{ title }}</h1>
        <router-link to="/logout" class="flex items-center py-2 hover:text-blue-600 text-sm">
            <IcoLogout />
            <div class="tracking-wide pl-3">Logout</div>
        </router-link>

        <router-link to="/logout">
            <div class="flex-1">

                <IcoLogout class="flex w-3"/>Logout
            </div>

        </router-link>
    </div>
</template>

<script>
    import IcoLogout from "../icons/icoLogout";

    export default {
        name: "App",

        components: { IcoLogout },


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
