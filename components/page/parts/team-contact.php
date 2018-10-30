<?php 
global $post;
$post_id = $post->ID;
?>

<div class="team team-contact">
	<div class="boxes-list">
	   <?php
		$args = array(
			'post_type'   => 'team',
			'post_status' => 'publish',
			'orderby' => 'menu_order title', 
			'order' => 'ASC',
		 );
		 
		$team = new WP_Query( $args );
		if( $team->have_posts() ) :
		?>
		  <div class="row team-list">
		    <?php
		      while( $team->have_posts() ) :
		        $team->the_post();
		        ?>
		          <div class="col text-center">
		          	<?php the_post_thumbnail(); ?>
		          	<div class="name"><?php the_title(); ?></div>
		          	<div class="email"><strong><?php the_field('teamMember_email'); ?></strong></div>
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
    </div>
    <?php wp_reset_postdata(); ?>
</div>