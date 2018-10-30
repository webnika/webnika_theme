<?php
get_header(); 
?>

<main id="main" class="site-main page" role="main">
	<header class="page-header">
		<h2>Náš tým</h2>
		<p class="page-header-perex">Poznejte členy našeho týmu</p>
	</header>

	<div class="page-content team">
		<div class="container">
			<?php
			$args = array(
				'post_type'   => 'team',
				'post_status' => 'publish',
				'orderby' => 'menu_order title', 
				'order' => 'ASC',
			 );
				 
			$query= new WP_Query( $args );

			 if( $query->have_posts() ) :?>
				<div class="row justify-content-center align-items-center team-list">
				<?php
				  while( $query->have_posts() ) : $query->the_post(); 
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

		    <!-- GALLERY -->
			<div class="gallery">
				<h2>Tým Jana Fronce v akci</h2>
				<?php 
				$post_id = 1941;
				$images = get_field('gallery', $post_id);
				$size = 'medium'; // (thumbnail, medium, large, full or custom size)

				if( $images ): ?>
				    <?php the_field('gallery', $post_id); ?>
				<?php endif; ?>
			</div>
	    </div>
    </div>
</main>

<?php
get_footer(); 
?>