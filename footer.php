<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Be_The_Change
 */

?>

<!-- KONTAKT / MAPA  -->
<div id="contact">
 	<?php 
    $args = array(
        'post_type' => 'tools',
        'field' => 'id',
        'terms' => 959
    );
    $recent = new WP_Query($args);
    if($recent->have_posts()) : while($recent->have_posts()): $recent->the_post();
	?>
		<?php 
		$location = get_field('map');
		?>
		<div class="container">
			<div class="content">
				<div class="address">
					 <?php the_field('map_address'); ?>
				</div>
			</div>
		</div>
		<!-- Mapa -->
		<?php
		if( !empty($location) ):
		?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
    <?php endif; ?>
</div> 

	<footer id="footer" class="site-footer" role="contentinfo">
		<?php get_template_part( 'components/footer/site', 'info' ); ?>
	</footer>
</div>

<!-- SCROLL TOP BUTTON -->
<div id="scroll-top"></div>

<?php wp_footer(); ?>

</body>
</html>
