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

<style scoped lang="scss">
.modal {
    align-items: center;
    display: flex;
    height: 100vh;
    justify-content: center;
    left: 0;
    position: fixed;
    top: 0;
    width: 100vw;
}
.modal-background {
    background: rgba(10, 10, 10, 0.86);
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
}
.modal-content {
    position: relative;
    z-index: 1;

    img {
        border: none;
        max-height: calc(100vh - 40px);
    }
}
.modal-close {
    background: none;
    border: none;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    flex-grow: 0;
    flex-shrink: 0;
    font-size: 1.6rem;
    height: 32px;
    position: fixed;
    right: 20px;
    top: 20px;
    user-select: none;
    width: 32px;
    z-index: 2;

    &:hover {
        background: rgba(10, 10, 10, 0.96);
    }
}
</style>