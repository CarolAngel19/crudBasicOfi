<template>
    <section>
        <form-post v-if="auth.username"></form-post>

        <div class="d-flex justify-content-center">
            <post v-for="(post, index) in posts" :key="index" :post="post"></post>
        </div>
        
    </section>
    
</template>


<script>
import Auth from "../helpers/auth";
import Post from "./Post/singlePost";
import Form from "./Post/form";

export default {
    name: "home",
    props:['categories', 'posts'],
    components:{
        Post,
        'form-post':Form
    },

    data() {
        return{
            auth:'',
            user:{
                name: '',
                apellido:'',
                edad:'',

            }   
        }
    },
    mounted(){
        Auth.initialize()
        this.auth = Auth.data
    },

    methods:{

        
    }
}

</script>

<style>

</style>


