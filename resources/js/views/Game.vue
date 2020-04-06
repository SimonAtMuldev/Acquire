<template>
    <div>
        <h1>Views game content</h1>
        <div>
            <P>DROPDOWN</P>
            <select name="users" id="users" v-model="user" @change="getUsers">
                <option value="0">Select Player</option>
                <option v-for="data in users" :value='data.id'>{{ data.name }}</option>
            </select>
        </div>

        <router-link to="/logout"
                     class="flex items-end text-red-700 hover:text-blue-600 text-sm">
            <h2>Logout</h2>
            <p>
                Data
            </p>
        </router-link>

        <p>

            {{ squares }}

        </p>
    </div>
</template>

<script>
    export default {
        name: "Game",

        data: function() {

            // $square ="<div>SQ</div>";
            // $squares = new Array(196).fill().map( s => new Ssquare() ); // 14x14
            // $squares = ['A1', 'A2'];


            return {
                winner: null,
                currentTurn: 1,
                InProgress: true,
                movesMade: 0,  // Moves counter, 5 moves should equal to 5 fills
                squares: ['A1', 'A2'],
                player1: true,
                player2: false,
                player3: false,
                player4: false,
                users: [],
                user: '',
                game: 0
            }
        },


        mounted() {
            console.log('mounted');
        },

        methods: {
            getUsers: function(){
                axios.get('api/users')
                .then(function(response) {
                    this.users = response.data;
                }.bind.data)
            }
        }

    }
</script>

<style scoped>

</style>
