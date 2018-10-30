<?php
global $post;

get_header(); ?>

<section class="page archiv">
	<header class="page-header">
		<h2>Archiv</h2>
	</header>

	<div class="page-content">
		<div class="container">

			<div class="program-wrap">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			    	<div class="program-item">
			    		<h4 class="has-perex">
			    			<?php if(get_field('program_url')): ?>
			    			<a href="<?php echo $url; ?>" target="_blank">
			    			<?php endif; ?>
			    				<?php the_title(); ?>
			    			<?php if(get_field('program_url')): ?>
							&rarr;
							</a>
							<?php endif; ?>
						</h4>
						<?php if(get_field('rezie')): ?>
							<p class="organizer">
				        		<?php the_field('rezie'); ?>
				        	</p>
			        	<?php endif; ?>

			        	<?php if(get_field('program_organizer')): ?>
				        	<p class="organizer">
				        		<?php the_field('program_organizer'); ?>
				        	</p>
			        	<?php endif; ?>

			        	<div class="perex">
			        		<?php the_field('program_perex'); ?>
			    			<?php if(get_field('program_url')): ?>
			        			<div class="url"><a href="<?php echo $url; ?>" target="_blank">odkaz na pořad</a></div>
			    			<?php endif; ?>
			    		</div>
			        </div>
			    <?php
			    	endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

</section>
<?php
get_footer();
?>
