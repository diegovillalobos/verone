<ol class="commentlist">
	<?php $args = array(
						'avatar_size'  		=> 32,
						'type' 					=> 'all',
						'reverse_top_level'	=> true,
						'style'					=> 'ol',
						'callback'				=> 'verone_comment'
						);
	 ?>
	 <?php wp_list_comments( $args ); ?>
</ol>		

	<?php comment_form(array( 
		    				'comment_notes_before' => '',
						   'comment_notes_after'  => '',
						   'id_form'              => 'commentform',
						   'id_submit'            => 'submit',
						   'title_reply'          => __( 'Leave a Reply' ),
						   'title_reply_to'       => __( 'Leave a Reply to: %s' ),
						   'cancel_reply_link'    => __( 'Cancel reply' ),
						   'label_submit'         => __( 'Comment' ),
							)); 
	?>
<div id="comments">


			
	

</div><!-- #comments -->