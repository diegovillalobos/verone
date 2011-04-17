

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			<li id="search" class="widget-container widget_search">
				<span class="search"><?php echo( 'search'); ?></span>				
				<?php get_search_form(); ?>
				</li>

			
		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

