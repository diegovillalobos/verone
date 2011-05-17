<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<section id="middle">

		
		<?php
				$query = new WP_Query( 'category_name=portfolio' );
					while ( $query->have_posts() ) : $query->the_post();
					the_post_thumbnail();
					the_title();
						endwhile;
					wp_reset_postdata();
		?>		

		<?php get_sidebar(); ?>

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
		<?php the_post_thumbnail(); ?>

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