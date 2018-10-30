<?php
/*
Template Name: Stránka - Kontakt
*/
?>

<?php get_header(); ?>

<section class="page">
	<?php get_template_part( 'components/header/page', 'header' ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-content">

				<!-- Kontakty : Hlavni email -->
				<div class="container">
					<div class="row justify-content-center">
						<div class="badge badge-secondary">
							<?php the_field('contact_mainEmail'); ?>
						</div>
					</div>
				</div>

				<!-- Kontakty : Tym -->
				<div class="container">
					<div class="row justify-content-center">
						<?php get_template_part( 'components/page/parts/team', 'contact' ); ?>
					</div>
				</div>
			</div>

			<!-- Kontakty : Formular -->
			<?php $image = get_field('contact_form_bg'); ?>
			<div class="contactForm-wrap" style="background-image: url(<?php echo $image; ?>);">
				<div class="container">
					<div class="row justify-content-center">
						<!-- Kontaktni formular -->
						<div class="col-md-8 content">
							<h3 class="text-center has-perex">Napište nám</h3>
							<div class="perex">Rychle a pohodlně</div>
							<div class="contact-form">
								<?php 
									$contact_form = get_field('contact_form');
									echo do_shortcode( $contact_form ); 
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>

</section>


<?php
get_footer(); 
?>