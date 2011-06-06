<?php
$direct_path =  get_bloginfo('wpurl')."/wp-content/plugins/wp-featured-content-slider";
?>

<script type="text/javascript">
	jQuery('#featured_slider ul').cycle({ 
		fx: '<?php $effect = get_option('effect'); if(!empty($effect)) {echo $effect;} else {echo "scrollLeft";}?>',
		prev: '.feat_prev',
		next: '.feat_next',
		speed:  800, 
		timeout: <?php $timeout = get_option('timeout'); if(!empty($timeout)) {echo $timeout;} else {echo 4000;}?>, 
		pager:  null
	});
</script>

<style>

#featured_slider {
float: left;
margin: 10px 0px;
position: relative;
background-color: #fff;
box-shadow: 0px 3px 10px 4px #ddd;
margin: 4em 0px !important;
width: 976px;
height: 250px;
border: thin solid #E0E0E0;
}

#featured_slider ul, #featured_slider ul li {
list-style: none !important;
border: none !important;
float: left;
width: 970px;
height: 200px;
}

#featured_slider .img_right {
float: left;
width: 325px;
height: 250px;
margin-left:20px;
margin-right: 25px;
}

#featured_slider .img_right img {
float: left;
width: 325px;
height: 250px;
box-shadow: none !important;
border: none;
}

#featured_slider .content_left {
float: left;
color: #333;
width: 306px;

}

#featured_slider .excerpt p {
line-height: 22px !important;
color: #777777;
font: 1.7em;
margin-top: 55px !important;
text-align: left;
height: 200px;
}

#featured_slider .excerpt a {
	text-decoration: none;
	font: 1.7em;
}

#featured_slider .content_left h2 {
font-size: 3.5em !important;
margin-bottom: 20px;
width: 300px;
padding: 20px 10px 20px 20px;
}

#featured_slider .feat_prev {
background: transparent url(<?php echo $direct_path;?>/images/sprite.png) no-repeat;
background-position: 0px 0px;
width: 17px;
z-index: 10;
height: 16px;
position: absolute;
left: 20px;
cursor: pointer;
bottom: 30px;
float: left;
}

#featured_slider .feat_prev:hover {
background-position: 0px -16px;
}

#featured_slider .feat_next {
background: transparent url(<?php echo $direct_path;?>/images/sprite.png) no-repeat;
background-position: -17px 0px;
width: 17px;
z-index: 10;
height: 16px;
position: absolute;
left: 40px;
bottom: 30px;
cursor: pointer;
}

#featured_slider .feat_next:hover {
background-position: -18px -16px;
color: #b40033;
}

.feat_link {
float: right;
position: relative;
top: -5px;
}

.feat_link a {
float: left;
font-size: 9px;
color: #CCC;
}

</style>

<div id="featured_slider">
	

	<ul id="slider">

		<?php
		global $wpdb;
		
		$querystr = "
			SELECT wposts.* 
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id 
			AND wpostmeta.meta_key = 'feat_slider' 
			AND wpostmeta.meta_value = '1' 
			AND wposts.post_status = 'publish' 
			AND (wposts.post_type = 'post' OR wposts.post_type = 'pages' OR wposts.post_type ='project' )";
		
		$pageposts = $wpdb->get_results($querystr, OBJECT); ?>
		
		<?php if ($pageposts): ?>
			
			<?php global $post; ?>
			
			<?php foreach ($pageposts as $post): ?>
			
			<?php setup_postdata($post);
			
			$custom = get_post_custom($post->ID);
			
			$thumb = get_wp_generated_thumb("feat_slider");
			
		?>
		
		<li>
			<div class="content_left">
				<h2>
					<a href="<?php the_permalink();?>"> <?php the_title();?></a>
					
				</h2>
			</div>
			
			<div class="img_right">
				<a href="<?php the_permalink();?>">
					<img src="<?php echo $thumb;?>" />
					
				</a>
			</div>
			
			<div class="excerpt">
				<a href="<?php the_permalink();?>"> <?php the_excerpt();?> </a>
			<div/>
		</li>
		
		<?php endforeach; ?>
		
		<?php endif; ?>
	
	</ul>
	
	<div class="feat_next"></div>
	<div class="feat_prev"></div>
	
	
</div>
