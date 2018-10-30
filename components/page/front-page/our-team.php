<?php 
global $post;
$post_id = $post->ID;
?>

<div class="our-team team">
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
          			<div class="grow"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
	          		<div class="name"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div>
		          	<div class="job"><?php the_field('teamMember_job'); ?></div>
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