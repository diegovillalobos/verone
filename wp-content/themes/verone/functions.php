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










function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');



function my_fields($fields) {
	$fields['subject'] = '<p class="comment-form-subject"><label for="subject">' . __( 'Subject' ) . '</label><input id="subject" name="subject" type="text" value="' . esc_attr( $commenter['comment_author_subject'] ) . '" size="30" /></p>';
	$fields['url'] = '';
	return $fields;
}
add_filter('comment_form_default_fields','my_fields');




function verone_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :   
    	?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	     <div id="comment-<?php comment_ID(); ?>">
		      
		      <?php if ($comment->comment_approved == '0') : ?>
	         <em><?php _e('Your comment is awaiting moderation.') ?></em>
	         <br />
		      <?php endif; ?>
		
		      <div class="comment-meta commentmetadata">
			      <span class="comment-author vcard">
		         <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
		     	   </span>
		     	   <?php printf(__('<cite class="comment_author"> %s</cite>'), get_comment_author_link()) ?>
			      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				      <?php printf(__('On %1$s :'), get_comment_date('M d y'),  get_comment_time()) ?>
			      </a> 
			      
			      
		      </div>
		
		      <?php comment_text() ?>
		
	     </div>
	   </li>
		<?php
		break;
	endswitch;
}



if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}





add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'project',
		array(
			'labels' => array(
				'name'				 => __( 'Projects' ),
				'singular_name'		 => __( 'Project' ),
				'add new'			 =>	__('Add New'),
				'add_new_item'		 => __('Add new Project'),
				'edit'				 => __('Edit'),
				'edit_item'			 => __('Edit This Project'),
				'new_item'			 => __('New Project'),
				'view'				 => __('View Project'),
				'view_item'			 => __('View Project'),
				'search_items'		 => __('Search Projects'),
				'not_found'			 => __('No Projects Found'),
				'not_found_in_trash' => __('No Projects found in Trash'),
			),
			'public' 		 		=> true,
			'has_archive'		    => true,
			'exclude_from_search'	=> false,
			'hierarchical'			=> true,
			'query_var' 			=> true, 
			'supports'				=> array( 'title', 'editor', 'comments', 'trackbacks', 'excerpt', 'thumbnail' ),
			'taxonomies'			=> array( 'post_tag', 'category'),
			'can_export'			=> true,
			
		)
	);
}




?>












