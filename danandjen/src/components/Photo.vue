<template>
    <figure class="gallery-item" v-for="photo in photos" :key="photo.id">
        <a :href="photo.media_details.sizes.full.source_url" @click.prevent="toggleModal( photo )">
            <img :src="photo.media_details.sizes.thumbnail.source_url" :alt="photo.slug">
        </a>
        <p v-show="modalIsVisible">Toggle message</p>
    </figure>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

</style>