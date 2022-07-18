import './bootstrap';

import * as Vue from "vue"
import swal from 'sweetalert';
import index from "./views/home"
import login from "./views/Auth/login"
import register from "./views/Auth/register"

const app = Vue.createApp()

app.component('index', index)
app.component('login', login)
app.component('register', register)
app.mount('#app')
