<template>
    <figure class="gallery-item">
        <a :href="full" @click.prevent="toggleModal">
            <img :src="thumbnail" :alt="slug" />
        </a>
        <div class="modal" v-show="modalIsVisible">
            <div class="modal-background" @click="toggleModal"></div>
            <button class="modal-close" aria-label="close" @click="toggleModal">X</button>
            <div class="modal-content">
                <img :src="full" :alt="slug" />
            </div>
        </div>
    </figure>
</template>

<script>
    export default {
        name: 'photo',
        props: [ 'thumbnail', 'full', 'slug' ],
        data() {
            return {
                modalIsVisible: false
            }
        },
        methods: {
            toggleModal() {
                this.modalIsVisible = ! this.modalIsVisible;
            }
        },
    }
</script>

<style scoped>

</style>