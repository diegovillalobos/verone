<?php

/////////////////
// home_template
/////////////////

function wpphamlp_home_template($template) {
  $haml_template = locate_template(array('home.haml.php', 'index.haml.php'));
  if(!empty($haml_template)) {
    $template = $haml_template;	
  }
  return $template;
}
add_filter('home_template', 'wpphamlp_home_template');

/////////////////////
// category_template
/////////////////////

function wpphamlp_category_template($template) {
  if(empty($template)) {
    $cat_ID = absint( get_query_var('cat') );
    $category = get_category( $cat_ID );
 
    $templates = array();
 
    if ( !is_wp_error($category) )
      $templates[] = "category-{$category->slug}.haml.php";

    $templates[] = "category-$cat_ID.haml.php";
    $templates[] = "category.haml.php";
 
    $template = locate_template($templates);
    return $template;
  }
}
add_filter('category_template', 'wpphamlp_category_template');

/////////////////
// page_template
/////////////////

function wpphamlp_page_template($template) {
    if(empty($template)) {
    	global $wp_query;

	    $id = (int) $wp_query->get_queried_object_id();
    	$template = get_post_meta($id, '_wp_page_template', true);
	    $pagename = get_query_var('pagename');

    	if ( !$pagename && $id > 0 ) {
	    	// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
    		$post = $wp_query->get_queried_object();
	    	$pagename = $post->post_name;
    	}

	    if ( 'default' == $template )
		    $template = '';

    	$templates = array();
    	if ( !empty($template) && !validate_file($template) )
	    	$templates[] = $template;
       	if ( $pagename )
		    $templates[] = "page-$pagename.haml.php";
    	if ( $id )
	    	$templates[] = "page-$id.haml.php";
    	$templates[] = "page.haml.php";

	    return locate_template($templates);
    }
}
add_filter('page_template', 'wpphamlp_page_template');

///////////////////
// author_template
///////////////////

function wpphamlp_author_template() {
    if(empty($template)) {
    	$author_id = absint( get_query_var( 'author' ) );
	    $author = get_user_by( 'id', $author_id );
    	$author = $author->user_nicename;

    	$templates = array();

	    if ( $author )
    		$templates[] = "author-{$author}.haml.php";
	    if ( $author_id )
    		$templates[] = "author-{$author_id}.haml.php";
    	$templates[] = 'author.haml.php';

	    $template = locate_template( $templates );
    	return $template;
    }
}
add_filter('author_template', 'wpphamlp_author_template');

////////////////
// 404_template
////////////////

function wpphamlp_404_template($template) {
  return wpphamlp_get_query_template('404', $template);
}
add_filter('404_template', 'wpphamlp_404_template');

////////////////////
// archive_template
////////////////////

function wpphamlp_archive_template($template) {
    return wpphamlp_get_query_template('archive', $template);
}
add_filter('archive_template', 'wpphamlp_archive_template');

/////////////////
// date_template
/////////////////

function wpphamlp_date_template() {
	return wpphamlp_get_query_template('date');
}
add_filter('date_template', 'wpphamlp_date_template');

//////////////////
// paged_template
//////////////////

function wpphamlp_paged_template($template) {
    return wpphamlp_get_query_template('paged', $template);
}
add_filter('paged_template', 'wpphamlp_paged_template');

////////////////////
// single_template
////////////////////

function wpphamlp_single_template($template) {
    return wpphamlp_get_query_template('single', $template);
}
add_filter('single_template', 'wpphamlp_single_template');

////////////////////
// search_template
////////////////////

function wpphamlp_search_template($template) {
    return wpphamlp_get_query_template('search', $template);
}
add_filter('search_template', 'wpphamlp_search_template');

///////////////////////
// attachment_template
///////////////////////

function wpphamlp_attachment_template() {
	global $posts;
	$type = explode('/', $posts[0]->post_mime_type);
	if ( $template = wpphamlp_get_query_template($type[0]) )
		return $template;
	elseif ( $template = wpphamlp_get_query_template($type[1]) )
		return $template;
	elseif ( $template = wpphamlp_get_query_template("$type[0]_$type[1]") )
		return $template;
	else
		return wpphamlp_get_query_template('attachment');
}
add_filter('attachment_template', 'wpphamlp_attachment_template');

///////////////////////////
// comments_popup_template
///////////////////////////

function wpphamlp_comments_popup_template($template) {
    if(empty($template)) {
    	$template = locate_template(array("comments-popup.haml.php"));
    }
    return $template;
}
add_filter('comments_popup_template', 'wpphamlp_comments_popup_template');

//TODO: comments_template 
 
function wpphamlp_get_query_template($type, $template = '') {
  if(empty($template)) {
    $template = locate_template(array("{$type}.haml.php"));
    return $template;
  }
}
