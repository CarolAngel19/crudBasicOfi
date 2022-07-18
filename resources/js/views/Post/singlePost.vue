<template>
    <div @submit="save" class="card me-auto" style="width: 18rem; height: 18rem;">
        <img :src="post.image" class="card-img-top" alt="image post">
        <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.description }}</p>
            <button type="submit" class="btn btn-warning"><b>Actualizar</b></button>
            <button type="submit" class="btn btn-danger"><b>Eliminar</b></button>
        </div>
    </div>
</template>

<script>
export default {
    name: "singlePost",
    props:['post']
    

}
</script>

<style>

</style>