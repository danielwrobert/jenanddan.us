/** @format */
import Vue from 'vue';
import Router from 'vue-router';
import Home from '@/views/Home';
import Story from '@/views/Story';

Vue.use( Router );

export default new Router( {
	routes: [
		{
			path: '/',
			name: 'Home',
			component: Home,
		},
		{
			path: '/our-story',
			name: 'Our Story',
			component: Story,
		},
	],
} );
