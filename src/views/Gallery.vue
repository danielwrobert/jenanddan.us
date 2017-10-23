<template>
	<div class="photos">
		<div class="banner" v-if="banner" :style="{ 'background-image': 'url(' + banner.guid.rendered + ')' }">
			<div class="banner-text">
				<h2>Photos</h2>
			</div>
		</div>
		<div class="content-container">
			<tiny-hearts />
			<nav class="gallery-nav">
				<ul>
					<li><router-link to="/photos/engagement">Engagement Photos</router-link></li>
					<li><router-link to="/photos/wedding">Wedding Photos</router-link></li>
				</ul>
			</nav>
			<router-view></router-view>
			<span class="content-bottom-divider"></span>
        </div>
	</div>
</template>

<script>
import axios from 'axios';
import TinyHearts from '@/components/TinyHearts';
import PhotoGrid from '@/components/PhotoGrid';

export default {
	name: 'photos',
	components: {
		photoGrid: PhotoGrid,
		tinyHearts: TinyHearts
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
	.gallery-nav {
		ul {
			display: flex;
			flex-direction: row;
			justify-content: center;
			padding: 0;
			text-align: center;
		}
		li {
			list-style-type: none;
			margin: 0 0.5rem;
		}
		a {
			background: $blue;
			border-radius: 5px;
			color: $peach;
			display: block;
			font-family: $header_font;
			font-size: 1.8rem;
			letter-spacing: 0.1rem;
			padding: 0.5rem 1.5rem;
			text-decoration: none;
			text-transform: uppercase;

			&.router-link-active,
			&:hover {
				background: lighten($blue, 10%);
				color: #fff;
			}
		}
	}
</style>

