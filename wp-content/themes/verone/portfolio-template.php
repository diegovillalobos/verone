<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>

<section id="projects" >

	<?php $loop = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => 10 ) ); ?>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
		
	
	
		<div class="entry-content-portfolio">
			<?php
				 the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>');
				if ( has_post_thumbnail() ) {
					 the_post_thumbnail( array(290, 100) );
					} 
				 the_excerpt('<a href="<?php echo get_permalink(); ?>"> [ Read More → ]</a>'); 
				 
			?>
		</div>
	<?php endwhile; ?>

</section>


<?php get_footer(); ?>