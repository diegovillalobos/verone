<?php 
/* This is the header for out theme */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>

<meta  charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php
/*
	 * Print the <title> tag based on what is being viewed.
	 */
   global $page, $paged;


	wp_title( ':' ,true, 'right' );
	
// Add the blog name.
	bloginfo( 'name' );

// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() ) )
	echo " : $site_description";

?></title>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="navigation">
<div id="title">
<!-- Whats going on here is: 
		-Array: "heading tag", which is going to mean that its in the home page (is_home()) or (||) in the static front page 			(is_front_page) the display the title as h1 and div.
		-Then it says: output (echo) "heading tag"
		-span: its making a link of the title, so when you click on it, it foes to the home url (echo home_url(/)), and its 				displaying it as the title of the page (bloginfo(name)
		-Then its outputing "heading tag"-->

			
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h4' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 								'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
					</span>
				</<?php echo $heading_tag; ?>>
</div>

<div id="access" role="navigation">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</div>

</div>

<div id="search" class="widget-container widget_search">
	<?php get_search_form(); ?>
</div>




</body>


