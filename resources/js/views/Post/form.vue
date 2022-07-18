<template>
    <section>
        <div class="d-flex justify-content-center align-items-center">
            <form class="d-flex flex-column my-3" @submit.prevent="handleSave" style="width: 40rem">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" v-model="post.title">
                    <label for="title">Title</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="description" v-model="post.description">
                    <label for="description">Description</label>
                </div><br>
                <div class="form-floating">
                    <input type="file" class="form-control" id="image" @change="previewImage">
                    <label for="image">Image</label>
                </div>
                <img class="img-fluid w-25" :src="image">
                <br>
                <div class="d-flex justify-content-center justify-content-center">
                    <button class="btn btn-outline-success" type="submit">Publicar</button>
                </div>
            </form>
        </div>
       
    </section>
</template>

<script>
import { WebpackOptionsApply } from 'webpack'

export default {
    name: "form",
    data(){
        return {
            post: {
                title:'',
                description:'',
                image:'',

            }
        }
    },
    methods:{
        handleSave(){
            let data = new FormData() 
            data.append('title', this.post.title)
            data.append('description', this.post.description)
            data.append('image', this.post.image, this.post.image.name)

            axios.post('/Post/save', data).then(res=>{
                if(res.data.saved){
                    swal('Success', 'The post saved successfully', 'success')
                }
            })
        },
        previewImage(e){
            if(e.target.files[0]){
                this.post.image = e.target.files[0]
                this.image = URL.createObjectURL(this.post.image)
                console.log(e)
            }

        }
    }

}
</script>

<style>

</style>