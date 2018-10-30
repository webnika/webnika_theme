<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
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
	<div class="container">
		<section class="error-404 not-found">
			<div class="page-content">
				<h2 class="page-title"><?php esc_html_e( 'Omlouváme se, tato stránka nebyla nalezena.', 'webnika_theme' ); ?></h2>
				<div class="text-center">
					<p><?php esc_html_e( 'Pokračujte výběrem položky z navigace nebo zkuste vyhledávání', 'webnika_theme' ); ?></p>
					<div class="search">
						<p><?php get_search_form(); ?></p>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>

<?php
get_footer();
