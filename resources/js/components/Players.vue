<template>
    <div>
        <div v-if="loading" class="w-full h-screen"><img src="/img/loading2.gif" alt="Loading"></div>

        <div v-else>

            <div v-if="users.length === 0">
                <p>No users exist.</p>
            </div>
        </div>
        <div v-for="user in users" :key="user.id">
            <div class="pl-4">
                <p class="text-blue-400 font-bold">{{ user.name }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Players",

        data: function() {
            return{
                loading: true,
                users: [],
            }
        },

        methods: {

        },

        created() {
            axios.get('/api/players')
                .then(function (response) {
                    this.users = response.data.data;
                    this.loading = false;
                })
                .catch(function (error) {
                    alert('Unable to fetch users.');

                });

            }
    }
</script>

<style scoped>

</style>
