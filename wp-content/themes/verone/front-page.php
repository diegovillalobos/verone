<?php get_header(); ?>
<section id="middle">
	
<?php
$featured_category_id = 8;
$number_of_posts = 5;

$args = array('showposts'=>$number_of_posts, 'cat'=>$featured_category_id);

$slideshow_query = new WP_Query($args);

?>

<div id="slideshow">
	<?php
		$duplicates = array();
		while ($slideshow_query->have_posts()) : $slideshow_query->the_post();
		$duplicates[] = $id;
		
		if (has_post_thumbnail()) {
	?>
	
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
		<?php    the_post_thumbnail('slideshow-image'); ?>
		</a>
	</div>
		<?php    }
		endwhile;
		?>
</div>  <!-- end of #slideshow -->
	
	
	
	
	<div id="content">
		
		<div id="home_columns">
			<?php if ( ! dynamic_sidebar( 'home-content-widget-area' ) ) : ?>
			<?php endif; ?>
		</div>
		
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
			<div id="post_<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="entry-image"> <?php echo wp_get_attachment_image( 1 ); ?> </div>
				
				
				<div class="entry-content">
					<?php the_content(__('Continue reading', 'verone')); ?>
					<?php wp_link_pages('before=<p class="pages">' . __('Pages:','example') . '&after=</p>'); ?>

				</div>
			
			</div>
		
		<?php endwhile; ?>
		
		<?php else : ?>
		
			<p class="no-posts"><?php _e('Sorry, no posts matched your criteria', 'example'); ?></p>
			
		
		<?php endif; ?>
	
	
	</div>
</section>

<?php get_footer(); ?>
