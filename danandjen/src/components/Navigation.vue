<template>
	<nav role="navigation">
		<ul id="nav_list">
			<router-link tag="li" to="/" exact>
				<a>Home</a>
			</router-link>
			<router-link tag="li" to="/our-story">
				<a>Our Story</a>
			</router-link>
		</ul>
	</nav>
</template>

<script>
export default {
	name: 'MainNav',
	data() {
		return {
			links: [
				'Home',
				'Our Story',
				'Wedding Details',
				'Location',
				'Photos'
			]
		}
	}
}
</script>

<style lang="scss">
	@import "../assets/stylesheets/_navigation.scss";
</style>