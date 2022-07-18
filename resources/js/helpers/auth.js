export default {
    data:{
        username:null,
        email:null,
    },
    initialize(){
        this.data.email = localStorage.getItem('email')
        this.data.username = localStorage.getItem('username')
        
    },

    set(email, username) {
        localStorage.setItem('email', email)
        localStorage.setItem('username', username)
        this.initialize()
    },

    remove() {
        localStorage.removeItem('email')
        localStorage.removeItem('username')
        this.initialize()
    },

}
