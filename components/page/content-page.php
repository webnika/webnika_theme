<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Be_The_Change
 */

?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="container main-content">
			<?php if(get_field('page_perex')): ?>
			<!-- PEREX stránky -->
			<h3 class="perex">
				<?php the_field('page_perex'); ?>
			</h3>
			<?php endif; ?>
			<!-- Box pro zvyrazneni inforamci -->
			<?php 
			if (get_field('box_higlight')):
			?>
				<div class="box-primary box-higlight col-md-12">
					<?php if(get_field('box_image')): ?>
						<div class="col-md-9">
					<?php endif; ?>
						<?php the_field('box_higlight', $post_id); ?>
					<?php if(get_field('box_image')): ?>
						</div>
					<?php endif; ?>
					<?php if(get_field('box_image')): ?>
						<div class="col-md-3">
							<img class="img-wrap img-circle" src="<?php the_field('box_image', $post_id); ?>" alt="" title=""/>
						</div>
					<?php endif; ?>
				</div>
			<?php 
			endif;
			?>

			<!-- OBSAH -->
			<?php the_content(); ?>

			<?php 
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'webnika_theme' ),
					'after'  => '</div>',
				) );
			?>
		</div>
	</div>

	<!-- BOX - Pozadi -->
	<?php
		if(get_field('boxBg_content')): 
	?>
		<?php $image = get_field('boxBg_img',$post_id); ?>
		<div id="values" class="box-bg" style="background: url(<?php echo $image; ?>) no-repeat center bottom;">
			<div class="container content">
				<h3><?php the_field('boxBg_title'); ?></h3>
				<?php the_field('boxBg_content'); ?>
			</div>
		</div>
	<?php 
	endif;
	?>

	<?php if(is_page(8)): ?>
		<!-- Page "O nás", NAS TYM -->
		<?php if( have_rows('our_team') ): ?>
			<div id="our-team">
				<h3><?php the_field('ourTeam_title'); ?></h3>
				<div class="container">
					<div class="row">
						<?php 
					 	// loop through the rows of data
					    while ( have_rows('our_team') ) : the_row();
					    	$post_counter++;
					    	$image = get_sub_field('teamMember_img');
						?>
							<div class="col-md-4 item">
					        	<img class="img-rounded" src="<?php echo $image; ?>" title="<?php the_sub_field('teamMember_name'); ?>" />
					        	<h4 class="text-center"><?php the_sub_field('teamMember_name'); ?></h4>
								<div class="job text-center"><?php the_sub_field('teamMember_job'); ?></div>
			      				<div class="content"><?php the_sub_field('teamMember_text'); ?></div>
							</div>
							<?php if ($post_counter%3 == 0): ?>
				        		<div class="clearfix"></div>
				    		<?php endif; ?>
						<?php
					    endwhile;
						?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<footer class="entry-footer text-center">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'webnika_theme' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer>
</article><!-- #post-## -->