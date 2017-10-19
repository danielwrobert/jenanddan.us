<template>
	<div class="home">
		<div class="banner" v-if="banner" :style="{ 'background-image': 'url(' + banner.guid.rendered + ')' }">
			<div class="banner-text">
				<h1>Dan & Jen</h1>
				<h2>11.04.2013</h2>
			</div>
		</div>
		<div class="content-container" v-if="content" v-html="content.content.rendered"></div>
	</div>
</template>

<script>
import axios from 'axios';

export default {
	data() {
		return {
			name: 'Home',
			banner: '',
			content: [],
			errors: []
		}
	},
	created() {
		this.fetchData();
	},
	methods: {
		fetchData() {
			// axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/pages/3' )
			// 	.then( response => {
			// 		this.content = response.data;
			// 	} )
			// 	.catch( e => {
			// 		this.errros.push( e );
			// 	} );
			axios.all( [
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/pages/3' ),
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media/4' ),
			] )
			.then( axios.spread( ( content, banner ) => {
				this.banner = banner.data;
				this.content = content.data;
			} ) )
			.catch( e => {
				this.errors.push( e );
			} );
		}
	},
}
</script>

<style scoped lang="scss">
	.banner {
		align-items: center;
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		color: #fff;
		display: flex;
		flex-direction: row;
		height: calc(100vh - 55px);
		justify-content: center;

		.banner-text {
			text-align: center;
		}

		h1 {
			font-family: $script_font;
			font-size: 15rem;
			margin-bottom: 4rem;
			text-shadow: 1px 1px 1px rgba(0,0,0,0.7)
		}
		h2 {
			font-size: 5rem;
			text-shadow: 1px 1px 1px rgba(0,0,0,0.7)
		}
	}
</style>