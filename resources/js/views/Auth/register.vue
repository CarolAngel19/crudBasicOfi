<template><br>
<form @submit.prevent="hundleRegister">
    <div class="mb-6">
        <label for="name" class="form-label">Nombre</label>
        <input type="name" class="form-control" id="name" style="width: 60%;" autocomplete="off" v-model="user.name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Gmail</label>
        <input type="email" class="form-control" id="email" style="width: 60%;" autocomplete="off" v-model="user.email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label" >Contraseña</label>
        <input type="password" class="form-control" id="password" style="width: 60%;" autocomplete="off" v-model="user.password">
    </div>
    <button type="submit" class="btn btn-primary">Aceptar</button>
</form>
  
</template>

<script>
import axios from 'axios';


export default {
    name: "register",
    data(){
        return {
            user:{
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods:{
        async hundleRegister(){
            try{
                const res = await axios.post('/Auth/register', this.user)
                if(res){
                    alert('Register Success')
                    window.location.redirect('/Auth/login') 
                }    
            }catch (res){
                console.log(res);
            } 
        }
    }

}
</script>

<style>

</style>