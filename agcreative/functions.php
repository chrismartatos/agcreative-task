<?php
	
/*-------------------------------------------------------------------------------
	Content
---------------------------------------------------------------------------------
	1. Documentation
	2. Remove code from head
	3. Register Menus
	4. Basics
	5. Register Scripts
	6. Register CSS
	7. Big Fix for shortcodes
	8. Add Custom Post Type
	9. Add Taxonomies
	10. Shortcode Projects
================================================================================*/
	


/*--------------------------------------------------------------------------------------------------------------------------
	1. Documentation
--------------------------------------------------------------------------------------------------------------------------*/
function theme_doc()
{
	include("admin/admin-shortcodes.php");
}

function addCustomMenuItem()
{
	add_theme_page('Documentation', 'Documentation', 'edit_posts', 'theme-doc', 'theme_doc');
}
add_action('admin_menu', 'addCustomMenuItem');



/*-----------------------------------------------------------------------------------------------------
	2. Remove code from head
-----------------------------------------------------------------------------------------------------*/
add_action('widgets_init', 'my_remove_recent_comments_style');

function my_remove_recent_comments_style() 
{
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 

remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );



/*-----------------------------------------------------------------------------------------------------
	3. Menus - Options
-----------------------------------------------------------------------------------------------------*/
register_nav_menus(array(
	'main_nav' => 'Main Menu',
	'footer_nav' => 'Footer Menu'
));



/*-----------------------------------------------------------------------------------------------------
	4. Basics
-----------------------------------------------------------------------------------------------------*/
// Enable The Post Thumbnail
add_theme_support( 'post-thumbnails' ); 

// Enable Widgets
register_sidebar();



/*-----------------------------------------------------------------------------------------------------
	5. JS - footer - Register Scripts
-----------------------------------------------------------------------------------------------------*/
function front_end_scripts()
{
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', array(), null, true );
    wp_register_script( 'front-end-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), null, true );
    wp_register_script( 'front-end-script', get_template_directory_uri() . '/js/main.js', array( 'front-end-plugins' ), null, true );
    wp_enqueue_script( 'front-end-script' );
}

add_action( 'wp_enqueue_scripts', 'front_end_scripts' );



/*-----------------------------------------------------------------------------------------------------
	6. CSS styles - header
-----------------------------------------------------------------------------------------------------*/
function front_end_styles()
{
	wp_register_style( 'front-end-normalize', get_template_directory_uri() . '/css/reset.css', array(), null, 'all' );
    wp_register_style( 'front-end-styles', get_template_directory_uri() . '/css/styles.css', array(), null, 'all' );
    wp_register_style( 'front-end-plugins', get_template_directory_uri() . '/css/plugins.css', array(), null, 'all' );
    wp_register_style( 'front-end-media-queries', get_template_directory_uri() . '/css/media-queries.css', array(), null, 'all' );
 
    
    wp_enqueue_style( 'front-end-normalize' );
    wp_enqueue_style( 'front-end-styles' );
    wp_enqueue_style( 'front-end-plugins' );
    wp_enqueue_style( 'front-end-media-queries' );
}

add_action( 'wp_enqueue_scripts', 'front_end_styles' );



/*-------------------------------------------------------------------------------------------------------
	7. Remove p from shortcodes(Fix bug)
--------------------------------------------------------------------------------------------------------*/
function wpex_clean_shortcodes($content){   
$array = array (
    '<p>[' => '[', 
    ']</p>' => ']', 
    ']<br />' => ']'
);
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');



/*-------------------------------------------------------------------------------------------------------
	8. Custom Posts Type - Projects - By <///: https://github.com/chrismartatos/wp-add-cpt
--------------------------------------------------------------------------------------------------------*/
function create_custom_posts() 
{
	  $singular = 'Projects'; /*Change Variables values*/
	  
	  $plural = 'Projects'; /*Change Variables values*/
	  
	  $slug = 'projects'; /*Change Variables values*/
	  
	  $post_type = 'projects'; /*Change Variables values*/
	  
	  $supports = array('title', 'excerpt', 'author', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes'); 
	  
	  
	  $labels = array(
		'name' => _x( $plural, 'post type general name'),
		'singular_name' => _x( $singular, 'post type singular name'),
		'add_new' => _x('Add New', strtolower( $singular ) ),
		'add_new_item' => __('Add New '. $singular),
		'edit_item' => __('Edit '. $singular ),
		'new_item' => __('New '. $singular ),
		'view_item' => __('View '. $singular),
		'search_items' => __('Search '. $plural),
		'not_found' =>  __('No '. $plural .' found'),
		'not_found_in_trash' => __('No '. $plural .' found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => $plural
	
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'rewrite' => Array('slug'=> $slug ),
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'supports' => $supports
		
	  );
	  
	  register_post_type( $post_type, $args );
}
	
add_action( 'init', 'create_custom_posts' );



/*-------------------------------------------------------------------------------------------------------
	9. Register Taxonomies to Custom Post Types Projects
--------------------------------------------------------------------------------------------------------*/

function create_taxonomies() 
{
    register_taxonomy(
        'location',
        'projects',
        array(
            'labels' => array(
                'name' => 'Location',
                'add_new_item' => 'Add New Location',
                'new_item_name' => "New Location"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
    
    register_taxonomy(
        'category',
        'projects',
        array(
            'labels' => array(
                'name' => 'Category',
                'add_new_item' => 'Add New Category',
                'new_item_name' => "New Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}


add_action( 'init', 'create_taxonomies', 0 );



/*-------------------------------------------------------------------------------------------------------
		10. Shortcode: Get Projects
--------------------------------------------------------------------------------------------------------*/

function projects_shortcode($atts) 
{
	//Options
    extract(shortcode_atts(array(
            'limit'    => '-1',
            'location'  => '',
            'category'  => '',
            ), $atts));

    global $post;
    
    //Query Options
    $args = array(
    'posts_per_page' => $limit, 
    'orderby' => 'post_date',
    'post_type' => 'projects',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'location',
            'field' => 'slug',
            'terms' => array($location)
        ),
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array($category)
        ),
    ));
    
    //Query for projects    
    $get_projects = NEW WP_Query($args);
	
	//Wrapper
	$output .= '<div class="container"><div class="row wrap-projects">';
	
	//Loop
    while($get_projects->have_posts()) 
    {
        $get_projects->the_post();
        $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
		$feat_img = $img_src[0];
        
        $output .= '<a href="#" class="project-post one-third column" data-url="'.get_permalink().'" style="background-image:url('.$feat_img.');"><div class="hover-wrap">';
        $output .= '<h3>'.get_the_title().'</h3>';
        $output .= '<div class="post-excerpt">'.get_the_excerpt().'</div>';
        $output .= '<div class="meta">'.get_post_meta( $post->ID, 'Awards', true).'</div>';
        $output .= '</div></a>';
    };
    
    $output .= '</div></div>';
    
    //Important: Reset wp query
    wp_reset_query();
    
    return $output;
}

add_shortcode('projects', 'projects_shortcode');