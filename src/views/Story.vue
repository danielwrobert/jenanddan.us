<template>
	<div class="our-story">
		<div class="banner" v-if="banner.guid" :style="{ 'background-image': 'url(' + banner.guid.rendered + ')' }">
			<div class="banner-text">
				<h2>Our Story</h2>
			</div>
		</div>
		<div class="content-container">
			<tiny-hearts />
			<div class="content" v-if="content.content" v-html="content.content.rendered"></div>
			<span class="content-bottom-divider"></span>
		</div>
	</div>
</template>

<script>
import axios from 'axios';
import TinyHearts from '@/components/TinyHearts';

export default {
	name: 'story',
	components: {
		tinyHearts: TinyHearts
	},
	data() {
		return {
			banner: {},
			content: {},
			errors: []
		}
	},
	created() {
		this.fetchData();
	},
	methods: {
		fetchData() {
			axios.all( [
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/pages/14' ),
				axios.get( 'https://danandjen.mystagingwebsite.com/wp-json/wp/v2/media/23' ),
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
			text-shadow: 1px 1px 1px rgba(0,0,0,0.7)
		}
	}
</style>
