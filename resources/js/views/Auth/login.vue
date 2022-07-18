<template><br>
<form @submit.prevent="hundleLogin">

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" style="width: 60%;" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="user.email">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Contraseña</label>
        <input type="password" class="form-control" style="width: 60%;" id="exampleInputPassword1" v-model="user.password">
    </div>
    
    <button type="submit" class="btn btn-primary">Aceptar</button>
</form>
  
</template>

<script>
import axios from 'axios';
import Auth from "../../helpers/auth";
export default {
    name: 'login',
    data(){
        return {
            user:{
                email: '',
                password: '',
            }
        }
    },
    methods:{
        async hundleLogin(){
            try{
                const res = await axios.post('/Auth/login', this.user)
                if(res.data.login) {
                    console.log(res.data.user)
                    Auth.set(res.data.user.emial, res.data.user.name)
                    window.location.replace('/')    
                }
                

            }catch (e) {+
                alert('error')
                console.log(e, res)
            }
        }
    } 

}
</script>

<style>

</style>