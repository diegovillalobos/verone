<?php

function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ), 'extra-menu' => __( 'Extra Menu' ))
  );
}

add_action( 'init', 'register_my_menus' );


// For the sidebar 
if ( function_exists('register_sidebar') )
    register_sidebar();
   

function verone_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'verone' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'verone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );   
   
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'verone' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'verone' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'verone_widgets_init' );

?>