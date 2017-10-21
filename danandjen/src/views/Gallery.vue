<template>
	<div class="photos">
		<div class="banner" v-if="banner" :style="{ 'background-image': 'url(' + banner.guid.rendered + ')' }">
			<div class="banner-text">
				<h2>Photos</h2>
			</div>
		</div>
		<div class="content-container">
			<photo-grid />
        </div>
	</div>
</template>

<script>
import axios from 'axios';
import PhotoGrid from '@/components/PhotoGrid';

export default {
	name: 'gallery',
	components: {
		photoGrid: PhotoGrid
	},
	data() {
		return {
			banner: '',
			errors: [],
		}
	},
	created() {
		this.fetchData();
	},
	methods: {
		fetchData() {
			axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media/20' )
			.then( response => {
				this.banner = response.data;
			} )
			.catch( e => {
				this.errors.push( e );
			} );
		},
	},
}
</script>

<style lang="scss">
	.banner {
		align-items: center;
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		color: #fff;
		display: flex;
		flex-direction: row;
		height: calc(50vh - 55px);
		justify-content: center;

		.banner-text {
			text-align: center;
		}

		h2 {
			font-size: 5rem;
			text-shadow: 1px 1px 1px rgba(0,0,0,0.7);
		}
    }
    .photo-grid {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        grid-gap: 0.5rem;
    }
    figure.gallery-item {
        margin: 0;
    }
</style>

