<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>


<section id="projects">
	
	

	<ul id="sidebar-portfolio" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-widget-area' ) ) : ?>
			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'verone' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
					
			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'verone' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
				<?php endif; ?>
	</ul>

	<?php $loop = new WP_Query( array( 'post_type' => 'project' ) ); ?>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
	
		<a href="<?php the_permalink(); ?>" class="entry-content-portfolio">
			<?php
				if ( has_post_thumbnail() )
					the_post_thumbnail();
				the_title( '<h2>', '</h2>');
				the_excerpt();
			?>
		</a>
	<?php endwhile; ?>

</section>


<?php get_footer(); ?>