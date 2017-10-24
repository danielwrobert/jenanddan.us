/** @format */
import Vue from 'vue';
import Router from 'vue-router';
import Home from '@/views/Home';
import Story from '@/views/Story';
import Details from '@/views/Details';
import Gallery from '@/views/Gallery';
import PhotoGrid from '@/components/PhotoGrid';

Vue.use( Router );

export default new Router( {
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home,
		},
		{
			path: '/story',
			name: 'story',
			component: Story,
		},
		{
			path: '/details',
			name: 'details',
			component: Details,
		},
		{
			path: '/photos',
			name: 'photos',
			component: Gallery,
			redirect: '/photos/engagement',
			children: [
				{
					path: '/photos/engagement',
					component: PhotoGrid,
					props: { shoot: 'engagement' }
				},
				{
					path: '/photos/wedding',
					component: PhotoGrid,
					props: { shoot: 'wedding' }
				},
			]
		},
	],
} );
