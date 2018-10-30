<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Be_The_Change
 */

?>

<section class="no-results not-found">
	<div class="page-header">
		<h4 class="page-title"><?php esc_html_e( 'Bohužel jsme nenalezli to, co jste hledali.', 'webnika_theme' ); ?></h4>
	</div>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'webnika_theme' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="text-center"><?php esc_html_e( 'Nebyly nalezeny žádné výsledky. Můžete zkusit vyhledat něco jiného.', 'webnika_theme' ); ?></p>
			<div class="search text-center"><?php get_search_form();?></div>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'webnika_theme' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div>
</section><!-- .no-results -->