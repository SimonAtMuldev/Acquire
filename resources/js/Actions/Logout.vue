<template>
    <div class="flex-1 items-center">
        <img alt="Logout" src="/img/logout.gif">
    </div>

</template>

<script>
    export default {
        name: "Logout",

        created() {
            axios.post('/logout', {})
                .finally(err => {
                    window.location = '/login';
                })
        }
    }
</script>

<style scoped>

</style>
