<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Be_The_Change
 */

?>

<div class="container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'webnika_theme' ),
					'after'  => '</div>',
				) );
			?>
		</div>
	</article><!-- #post-## -->

	<?php the_post_navigation(); ?>
</div>