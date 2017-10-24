<template>
	<nav role="navigation">
		<ul id="nav_list">
			<router-link tag="li" to="/" exact>
				<a>Home</a>
			</router-link>
			<router-link tag="li" to="/story">
				<a>Our Story</a>
			</router-link>
			<router-link tag="li" to="/details">
				<a>Wedding Details</a>
			</router-link>
			<router-link tag="li" to="/photos">
				<a>Photo Gallery</a>
			</router-link>
		</ul>
	</nav>
</template>

<script>
export default {
	name: 'navigation',
}
</script>

<style lang="scss">
	@import "../assets/stylesheets/_navigation.scss";
</style>