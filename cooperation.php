<?php
/*
Template Name: Stránka - Spolupracujeme
*/
?>

<?php get_header(); ?>

<section class="page">
	<?php get_template_part( 'components/header/page', 'header' ); ?>

	<div class="page-content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- Spolupracujeme : Loga partnerů -->
			<div class="container">
				<div class="row justify-content-center">
					<?php get_template_part( 'components/page/parts/cooperation', 'content' ); ?>
				</div>
			</div>

		</article>
	</div>
</section>


<?php
get_footer(); 
?>