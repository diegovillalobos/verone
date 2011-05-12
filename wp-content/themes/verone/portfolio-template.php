<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<section id="portfolio">

		<?php
				$query = new WP_Query( 'category_name=portfolio' );
					while ( $query->have_posts() ) : $query->the_post();
					echo '<h2 class="portfolio-title">';
					the_title();
					echo '</h2>';
					echo '<p class="portfolio-main">' ;
					the_content();
					echo '</p>' ;
						endwhile;
					wp_reset_postdata();
		?>		

	<?php get_sidebar(); ?>

	<div id="portfolio" class="portfolio_navigation" >
			<?php if ( ! dynamic_sidebar( 'portfolio-content-widget-area' ) ) : ?>
			<?php endif; ?>
		
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
			<div id="post_<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="entry-image"> <?php echo wp_get_attachment_image( 1 ); ?> </div>		
				
			
			</div>
		
		<?php endwhile; ?>
		
		<?php else : ?>
		
			<p class="no-posts"><?php _e('Sorry, no posts matched your criteria', 'example'); ?></p>
			
		
		<?php endif; ?>
	
	
	</div>
	
</section>

<?php get_footer(); ?>