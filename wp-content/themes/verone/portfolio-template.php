<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<section id="middle">

		<?php
				$query = new WP_Query( 'category_name=portfolio' );
					while ( $query->have_posts() ) : $query->the_post();
					echo '<h2 class="portfolio-title">';
					the_title();
					echo '</h2>';
					echo '<p>' ;
					the_excerpt();
					echo '</p>' ;
						endwhile;
					wp_reset_postdata();
		?>		

		
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