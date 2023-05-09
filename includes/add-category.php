<?php

add_filter('block_categories_all', function ($categories) {
	$categories[] = array(
		'slug'  => 'gutentheme',
		'title' => 'Gutentheme'
	);

	return $categories;
});
