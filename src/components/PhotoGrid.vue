<template>
    <div class="photo-grid" v-if="0 < gallery[shoot].length">
        <photo
			v-for="item in gallery[shoot]"
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
	props: [ 'shoot' ],
	components: {
		photo: Photo
	},
	data() {
		return {
			gallery: {
				engagement: [],
				wedding: []
			},
			errors: [],
		}
	},
	created() {
		this.fetchData();
	},
	methods: {
		fetchData() {
			axios.all( [
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media?per_page=100&parent=82' ),
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media?per_page=100&parent=80' ),
			] )
			.then( axios.spread( ( engagement, wedding ) => {
				this.gallery.engagement = engagement.data;
				this.gallery.wedding = wedding.data;
			} ) )
			.catch( e => {
				this.errors.push( e );
			} );
		},
	},
}
</script>

<style scoped lang="scss">
	.photo-grid {
		margin-bottom: 4rem;
		padding: 3rem 0;
	}
</style>