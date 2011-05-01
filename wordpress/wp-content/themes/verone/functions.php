<?php

function register_verone_menus() {
  register_nav_menus(
    array(
    	'header-menu' => __( 'Header Menu' ),
    	'sidebar-menu' => __( 'Sidebar Menu' ),
    	'blog-sidebar' => __( 'Blog Sidebar')
    )
  );
}

function verone_init() {
	
	register_verone_menus();
	
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_deregister_script('jquery-ui-core');
		wp_deregister_script('jquery-ui-tabs');
		wp_deregister_script('jquery-ui-sortable');
		wp_deregister_script('jquery-ui-draggable');
		wp_deregister_script('jquery-ui-droppable');
		wp_deregister_script('jquery-ui-selectable');
		wp_deregister_script('jquery-ui-resizable');
		wp_deregister_script('jquery-ui-dialog');
		
		wp_register_script('jquery', get_bloginfo('template_directory').'/js/jquery-1.5.2.min.js', false, '1.5.2');
		wp_register_script('jquery-ui', get_bloginfo('template_directory').'/js/jquery-ui-1.8.12.custom.min.js', 'jquery', '1.8.12');
		wp_register_script('hashgrid', get_bloginfo('template_directory').'/js/hashgrid.js', 'jquery', '5');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui');
		wp_enqueue_script('hashgrid');
	}
}

add_action( 'init', 'verone_init' );


function verone_nav_unlister( $menu ){
  return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'verone_nav_unlister' );


function verone_widgets_init() {
	if( function_exists('register_sidebar') ) {
		// Area 1, located at the top of the sidebar.
		register_sidebar( array(
			'name' => __( 'Home Content', 'verone' ),
			'id' => 'home-content-widget-area',
			'description' => __( 'This is where the home content goes', 'verone' ),
			'before_widget' => '<div id="%1$s" class="column %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		) );   
	   
		// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
		register_sidebar( array(
			'name' => __( 'Sidebar', 'verone' ),
			'id' => 'sidebar-widget-area',
			'description' => __( 'This is where the sidebar widgets go', 'verone' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	// Area 3. located below the secondary widget area in the sidebar.
		register_sidebar( array(
			'name' => __( 'Blog Sidebar', 'verone' ),
			'id' => 'blog-sidebar-widget-area',
			'description' => __( 'This is where the sidebar widgets for the blog go', 'verone' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}


add_action( 'widgets_init', 'verone_widgets_init' );






/* Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;




function my_fields($fields) {
	$fields['subject'] = '<p class="comment-form-subject"><label for="subject">' . __( 'Subject' ) . '</label><input id="subject" name="subject" type="text" value="' . esc_attr( $commenter['comment_author_subject'] ) . '" size="30" /></p>';
	
	return $fields;
}
add_filter('comment_form_default_fields','my_fields');






