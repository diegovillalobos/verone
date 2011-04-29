<?php get_header(); ?>

<section id="searchpage">			

<?php if ( have_posts() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Search Results for: <span class="search-title">%s</span>' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				<?php
				 get_template_part( 'index', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria, <br /> Please try again with some different keywords.' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
</section>			

<?php get_sidebar(); ?>
<?php get_footer(); ?>