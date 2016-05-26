<?php 

/*----------------------------------------------------------
		ACF Options
----------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-options',
		'capability' 	=> 'edit_posts',
		'parent_slug' 	=> '',
		'position'		=> false,
		'icon_url'		=> false,
		'redirect' 	=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Social Media',
		'menu_title' 	=> 'Social Media',
		'menu_slug' 	=> 'theme-social-media',
		'capability' 	=> 'edit_posts',
		'parent_slug' 	=> 'theme-options',
		'position'		=> false,
		'icon_url'		=> false,
	));
	
}

?>
