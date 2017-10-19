/** @format */
import Vue from 'vue';
import Router from 'vue-router';
import Home from '@/views/Home';
import Story from '@/views/Story';
import Details from '@/views/Details';
import Photos from '@/views/Photos';

Vue.use( Router );

export default new Router( {
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home,
		},
		{
			path: '/our-story',
			name: 'story',
			component: Story,
		},
		{
			path: '/wedding-details',
			name: 'details',
			component: Details,
		},
		{
			path: '/photos',
			name: 'photos',
			component: Photos,
		},
	],
} );
