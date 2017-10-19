<template>
	<nav role="navigation">
		<ul id="nav_list">
			<router-link tag="li" to="/" exact>
				<a>Home</a>
			</router-link>
			<router-link tag="li" to="/our-story">
				<a>Our Story</a>
			</router-link>
			<router-link tag="li" to="/wedding-details">
				<a>Wedding Details</a>
			</router-link>
			<router-link tag="li" to="/photos">
				<a>Photos</a>
			</router-link>
		</ul>
	</nav>
</template>

<script>
export default {
	name: 'MainNav',
	// Not really used at the moment:
	data() {
		return {
			links: [
				{ title: 'Home', slug: '/' },
				{ title: 'Our Story', slug: '/our-story' },
				{ title: 'Wedding Details', slug: '/wedding-details' },
				{ title: 'Photos', slug: '/photos' }
			]
		}
	}
}
</script>

<style lang="scss">
	@import "../assets/stylesheets/_navigation.scss";
</style>