<?php get_header(); ?>

<section id="middle">
	
	<div id="blog_sidebar"> <?php if ( ! dynamic_sidebar( 'blog-sidebar-widget-area' ) ) : ?>
			<?php endif; ?>
	</div>
	
		<div id="content">	
		
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives:</span> <span class="archive-title">%s</span>'), get_the_date() ); ?>
							<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives:</span> <span class="archive-title">%s</span>'), get_the_date( 'F Y' ) ); ?>
							<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: <span class="archive-title">%s</span>'), get_the_date( 'Y' ) ); ?>
							<?php else : ?>
						<?php _e( 'Blog Archives'); ?>
						<?php endif; ?>
					</h1>
							
					<h2 class="entry-title">	
									<?php 
									the_title('<a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') .	 										'" rel="bookmark">', '</a>');
									 ?>
					</h2>
							
					<div class="entry-image"> 
						<?php echo wp_get_attachment_image( 1 ); ?> 
					</div>	
							
					<p class="meta-info">
						<abbr class="published" title="<?php the_time('m d y'); ?>"><?php the_time(__('m d y', 'example')); ?>
						</abbr>
					</p>
									
					<div class="entry-content">
						<?php 
							 get_posts( $args = array(
											'numberposts' => 2,
											'orderby' => 'post_date'));
						   the_content('read more');
						   wp_link_pages('before=<p class="pages">' . __('Pages:','example') . '&after=</p>')		
						 ?>
					</div>		
							
					<div class="comments-notice">
						<?php
							comments_popup_link( __( 'Leave a comment', '1 Comment', '% Comments' ) );
						?>	
					</div>	
							
						
															
				</div>
				<?php endwhile; ?>
					
					<?php else : ?>
				
					<p class="no-posts"><?php _e('Sorry, no posts matched your criteria', 'verone'); ?></p>
					
	
		<?php endif; ?>
		</div>	
</section>


<div id="posts_nav_archive">
	<span class="previous-post-link"><?php previous_post('%', ' Previous Post', 'no'); ?> </span>			
	<span class="next-post-link"><?php next_post('%', 'Next Post ', 'no'); ?></span>	
</div>	


<?php get_footer() ?>