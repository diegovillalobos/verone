
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="entry-title"	
		<?php the_title('<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . 			 '" rel="bookmark">', '</a></h2>'); ?>
</div>
		
		<p class="byline">
				<abbr class="published" title="<?php the_time(__('l, F jS, Y, g:i a', 'example')); ?>"><?php the_time(__('m d 				 y', 'example')); ?></abbr>
		</p>


<div class="entry-content">
	<?php the_content(__('Continue reading', 'example')); ?>
	<?php wp_link_pages('before=<p class="pages">' . __('Pages:','example') . '&after=</p>'); ?>
</div>


</div>

	<?php endwhile; ?>

<?php else : ?>

	<p class="no-posts"><?php _e('Sorry, no posts matched your criteria', 'example'); ?></p>
	

<?php endif; ?>

