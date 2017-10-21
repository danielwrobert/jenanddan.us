<template>
    <div class="photo-grid">
        <thumbnail v-for="photo in photos" :key="photo.id" />
    </div>
</template>

<script>
import axios from 'axios';
import Photo from '@/components/Photo.vue';

export default {
	data() {
		return {
			name: 'Photos',
			banner: '',
			photos: [],
			errors: [],
			modalIsVisible: false
		}
	},
	components: {
		thumbnail: Photo
	},
	created() {
		this.fetchData();
	},
	methods: {
		fetchData() {
			axios.all( [
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media?per_page=100&parent=26' ),
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media/20' ),
			] )
			.then( axios.spread( ( photos, banner ) => {
				this.photos = photos.data;
				this.banner = banner.data;
			} ) )
			.catch( e => {
				this.errors.push( e );
			} );
		},
		toggleModal( photo ) {
			this.modalIsVisible = ! this.modalIsVisible;
		}
	},
}
</script>

<style scoped>

</style>