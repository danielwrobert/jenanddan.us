<template>
    <div class="photo-grid">
        <photo
			v-for="item in gallery"
			:key="item.id"
			:thumbnail="item.media_details.sizes.thumbnail.source_url"
			:full="item.media_details.sizes.full.source_url"
			:slug="item.slug"
		/>
    </div>
</template>

<script>
import axios from 'axios';
import Photo from '@/components/Photo.vue';

export default {
	name: 'photo-grid',
	components: {
		photo: Photo
	},
	data() {
		return {
			banner: '',
			gallery: [],
			errors: [],
		}
	},
	created() {
		this.fetchData();
	},
	methods: {
		fetchData() {
			// axios.all( [
			// 	axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media?per_page=100&parent=26' ),
			// 	axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media/20' ),
			// ] )
			// .then( axios.spread( ( gallery, banner ) => {
			// 	this.gallery = gallery.data;
			// 	this.banner = banner.data;
			// } ) )
			// .catch( e => {
			// 	this.errors.push( e );
			// } );

			axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media?per_page=100&parent=26' )
			.then( response => {
				this.gallery = response.data;
			} )
			.catch( e => {
				this.errors.push( e );
			} );
		},
	},
}
</script>

<style scoped>

</style>