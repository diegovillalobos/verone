<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>


	<div id="content">
		<div id="portfolio_columns">
			<?php if ( ! dynamic_sidebar( 'portfolio-content-widget-area' ) ) : ?>
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