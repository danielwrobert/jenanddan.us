<template>
	<div id="app">
		<header>
			<navigation />
		</header>
		<keep-alive>
			<router-view/>
		</keep-alive>
		<footer>
			<p>&copy; 2014 Daniel W. Robert. All Rights Reserved.</p>
		</footer>
	</div>
</template>

<script>
import Navigation from '@/components/Navigation.vue'

export default {
	name: 'app',
	components: {
		navigation: Navigation
	}
}
</script>

<style lang="scss">
	footer {
		// background: transparent image-url("bg_skyline_small.png") center top no-repeat;
		margin-top: 2.5rem;
		padding-top: 2.5rem;
		text-align: center;

		@include breakpoint(small) {
			padding-top: 9.5rem;
			// background-image: image-url("bg_skyline.png");
		}

		p {
			background: $blue;
			color: $peach;
			font-size: 1.2rem;
			margin: 0;
			padding: 1.5rem 0;
		}
	}
</style>
