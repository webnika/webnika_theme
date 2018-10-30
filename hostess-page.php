<?php
/*
Template Name: Stránka - Hostesky / Figurantky / Diváci
*/

get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php $image = get_field('mainVisual_img'); ?>

	<section class="main-visual-bg-wrap">
		<div class="container">
			<div class="main-visual-bg" style="background-image: url(<?php echo $image; ?>);">
				<div class="main-visual-bg-content">
					<div class="name">
						<h2><?php the_title();?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<section id="hostess-content" class="content">
		<div class="container">
			<article class="row hostess-content-topContent">
				<div class="col-md-6 hostess-mainText">
					<?php the_field('hostesky_mainText'); ?>
					<?php 
					if ( is_page(array('1545','1547'))):  
					?>
						<a id="btn-hosteskyFigurantky" href="#hostesky-figurantky" class="btn btn-default">Naše hostesky a figurantky</a>
					<?php else: ?>
						<a href="/kontakt" class="btn btn-default">Kontaktujte nás</a>
					<?php endif; ?>
				</div>

				<div class="col-md-6 hostess-shortText">
					<div class="hostess-shortText-content"><?php the_field('hostesky_shortText'); ?></div>
				</div>
			</article>

			<!-- CAROUSEL -->
			<div class="carousel">
				<?php
				$images = get_field('carousel');
				// check if the repeater field has rows of data
				if( $images ): ?>
			    	<div class="swiper-container">
						<div class="swiper-wrapper">
					        <?php foreach( $images as $image ): ?>
					            <div class="swiper-slide">
					            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
					            </div>
					        <?php endforeach; ?>
					        <div class="clearfix"></div>
					    </div>
					    <!-- Add Arrows -->
					    <div class="swiper-button-next"></div>
					    <div class="swiper-button-prev"></div>
					    <!-- Add Pagination -->
						<div class="swiper-pagination"></div>
				    </div>
				<?php endif; ?>
			</div>

			<?php 
			if ( is_page(array('1545','1547'))): 
			?>
			<!-- HOSTESS LIST -->
			<div id="hostesky-figurantky" class="hostess-list">
				<h2>Naše hostesky a figurantky</h2>
				<?php
					$args = array(
					    'post_type' => 'hostesky_figurantky',
					    'post_status' => 'publish',
				    	'orderby' => 'menu_order title', 
						'order' => 'ASC'
					);
			 
					$hostess = new WP_Query( $args );
					if( $hostess->have_posts() ) :
				?>
		  		<div class="row">
			    <?php
			      while( $hostess->have_posts() ) :
			        $hostess->the_post();
			        ?>
			          <div class="col-md-4 col-sm-6 text-center item">
			          	<div class="gallery"><?php the_field('galleryHostess'); ?></div>
		          		<div class="name"><?php the_title(); ?></div>
			          </div>
			        <?php
			      endwhile;
			      wp_reset_postdata();
			    ?>
		  		</div>
				<?php
				else :
				endif;
				?>
	    		<div class="clearfix"></div>
			</div>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
	  	</div>
	</section>

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'components/post/content', get_post_format() );

	endwhile; // End of the loop.
	?>

</main>
<?php
get_footer();
?>

