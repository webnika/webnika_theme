<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Be_The_Change
 */

get_header(); ?>

<!-- ZAJIMAVOSTI -->
<div id="interest">
<?php
	// vypisuji obsah z uvodni strany
	$page_id = 4; // Vypisuji obsah úvodní stránky
?>
	<div class="container">
		<div class="row columns">
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('columns',$page_id) ):
			     // loop through the rows of data
			    while ( have_rows('columns',$page_id) ) : the_row();
			        if( get_row_layout() == '3_columns' ):
		    	?>
		    		<div class="col-md-4 col-sm-4 item-1">
		    			<div class="item">
		    				<?php the_sub_field('column_1',$page_id); ?>
						</div>
		    		</div>
		    		<div class="col-md-4 col-sm-4 item-2">
		    			<div class="item">
		    				<?php the_sub_field('column_2',$page_id); ?>
						</div>
		    		</div>
		    		<div class="col-md-4 col-sm-4 item-3">
		    			<div class="item">
		    				<?php the_sub_field('column_3',$page_id); ?>
						</div>
		    		</div>
		    	<?php 
			        endif;
			    endwhile;
			else :
			    // no layouts found
			endif;
			?>
		</div>
	</div>
<?php
// reset post data (important!)
wp_reset_postdata();
?>
</div> <!-- #interest -->


	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'components/page/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</main>

	<?php
	get_footer(); 
	?>

