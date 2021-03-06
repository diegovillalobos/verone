<ul id="sidebar2" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'post-sidebar-widget-area' ) ) : ?>
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
	<?php endif; // end primary widget area ?>
</ul>