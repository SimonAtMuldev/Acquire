<template>
    <div>
        <v-gravatar :email="email" :size="35" :default="retro"
                    class="rounded-full border border-gray-900 border-2 shadow-outline" />
    </div>
</template>

<script>
    export default {
        name: "Gravatar",

        props: [
            'email',
        ],

        data: function (){
            return {
                retro: ''
            }
        }
    }
</script>

<style scoped>

</style>
