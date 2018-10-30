<?php 
global $post;
$post_id = $post->ID;
?>

<div class="cooperation-content">
   <?php
	$args = array(
		'post_type'   => 'cooperation',
		'post_status' => 'publish',
		'orderby' => 'menu_order title', 
		'order' => 'ASC',
	 );
	 
	$team = new WP_Query( $args );
	if( $team->have_posts() ) :
	?>
	  <div class="row justify-content-center align-items-center">
	    <?php
	      while( $team->have_posts() ) :
	        $team->the_post();
	        ?>
	          <div class="col-md-4 col-sm-6 text-center item">
	          <?php 

				$image = get_field('partner_logo');

				if( !empty($image) ): ?>
					<div class="img">
						<a href="<?php the_field('partner_url'); ?>" target="_blank">
							<img class="grow" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<div class="link"><?php the_field('partner_url'); ?></div>
						</a>
					</div>

				<?php endif; ?>
	          </div>
	        <?php
	      endwhile;
	      wp_reset_postdata();
	    ?>
	  </div>
	<?php
	else :
	  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
	endif;
	?>
    <div class="clearfix"></div>
    <?php wp_reset_postdata(); ?>
</div>