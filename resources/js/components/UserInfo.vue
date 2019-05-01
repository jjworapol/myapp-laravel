<template>
    <div v-if="user" class="card" style="width: 18rem;">
        <img v-bind:src="url" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-primary">{{ user.data.name }}</h5>
            <p class="card-text">{{ user.data.email }}</p>
            <p class="card-text">{{ userId }}</p>
        </div>
    </div>

    <!--<div v-if="user" class="contOainer">-->
        <!--<h3>{{title}}</h3>-->
        <!--<p>{{user.name}}</p>-->
        <!--<p>{{user.email}}</p>-->
        <!--<p>{{user.role}}</p>-->
    <!--</div>-->
</template>

<script>
    import {Config} from '../config.js'; //pull im
    export default {

        name: "UserInfo.vue",
        data:function(){
            return{
                title: 'User',
                user :null
            };
        },
        props:['userId'],
        mounted: function() {
            axios.get(Config.API_URL + 'users/' +this.userId)
                .then(response => {
                    this.user = response.data;
                })
                .catch(e => {
                    console.error(e)
                });
            },
            watch: {
                userId: function (newId) {
                    axios.get(Config.API_URL + 'users/' + newId)
                        .then(response => {
                            this.user = response.data;
                        })
                        .catch(e => {
                            console.error(e)
                        });
                    this.url = Config.IMAGE_URL + newId;
                }
            }

            // axios.get('http://127.0.0.1:8000/api/users/'+this.userId)
        //     .then(response =>{
        //         console.log(response);
        //         this.user = response.data.data; //keep data to model user
        //     })
        //     .catch(err=>{
        //         console.error(err);
        //     })
        // // console.log($this.userId)


    }
</script>

<style scoped>

</style>