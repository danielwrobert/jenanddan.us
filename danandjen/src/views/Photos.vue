<template>
	<div class="photos">
		<div class="banner" v-if="banner" :style="{ 'background-image': 'url(' + banner.guid.rendered + ')' }">
			<div class="banner-text">
				<h2>{{ name }}</h2>
			</div>
		</div>
		<div class="content-container" v-if="photos">
			<!-- TODO: Need to break out photo grid into separate component so toggle can be tied to individulal photo in loop -->
            <div class="photo-grid">
                <figure class="gallery-item" v-for="photo in photos" :key="photo.id">
					<a :href="photo.media_details.sizes.full.source_url" @click.prevent="toggleModal( photo )">
						<img :src="photo.media_details.sizes.thumbnail.source_url" :alt="photo.slug">
					</a>
					<p v-show="modalIsVisible">Toggle message</p>
                </figure>
            </div>
        </div>
	</div>
</template>

<script>
import axios from 'axios';

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
	created() {
		this.fetchData();
	},
	methods: {
		fetchData() {
			axios.all( [
				// axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/pages/26' ),
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
			// console.log( e.target );
			this.modalIsVisible = ! this.modalIsVisible;
		}
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
        // display: inline-block;
        // margin: 0.5rem;
        margin: 0;
    }
</style>

