<?php get_header(); ?>

<div id="content">
	
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="entry-image"> <?php echo wp_get_attachment_image( 1 ); ?> </div>
			
			
			<div class="entry-content">
				<?php the_content('read more'); ?>
				<?php wp_link_pages('before=<p class="pages">' . __('Pages:','example') . '&after=</p>'); ?>
			</div>
		
		</div>
	
	<?php endwhile; ?>
	
	<?php else : ?>
	
		<p class="no-posts"><?php _e('Sorry, no posts matched your criteria', 'example'); ?></p>
		
	
	<?php endif; ?>


</div>
	
	
<?php get_sidebar(); ?>