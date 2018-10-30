
<?php
/**
 * Front page template
 */

get_header(); ?>

	<?php $image = get_field('mainVisual_img'); ?>
	<section class="main-visual-bg-wrap">
		<div class="container">
			<div class="main-visual-bg" style="background-image: url(<?php echo $image; ?>);">
			<div class="main-visual-bg-content">
					<h2>Režie - Pomocná režie - Asistent režie <br/>
					Zajištění hostesek, figurantek a diváků</h2>
			</div>
		</div>
	</section>

	<!-- REFERENCE -->
	<section id="references">
		<div class="container">
			<h2><span><?php the_field('home_references_title'); ?></span></h2>
			<?php get_template_part( 'components/page/front-page/references', '' ); ?>
		</div>
	</section>

	<!-- NAS TYM -->
	<section id="our-team-wrap">
		<div class="container">
			<h2><?php the_field('home_ourTeam_title'); ?></h2>
			<?php get_template_part( 'components/page/front-page/our-team', '' ); ?>
		</div>
	</section> <!-- #our-team -->
	


<?php 
get_footer();
?>




