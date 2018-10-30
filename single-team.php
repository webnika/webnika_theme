<?php
global $post;

get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php $image = get_field('mainVisual_img'); ?>

	<section class="main-visual-bg-wrap">
		<div class="container">
			<div class="main-visual-bg" style="background-image: url(<?php echo $image; ?>);">
				<div class="main-visual-bg-content">
					<div class="name">
						<h2><?php the_title();?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php 
	  $tabSection = 0;
	  $tabLabel = 0;
	  $tabContent = 0;
	  $image = get_field('tab_img_bg');
	?>

	<section id="single-team-content" class="content">
		<div class="container">
			<div class="content">
				<article class="row team-content-topContent">
					<div class="col-md-8 team-mainText">
						<?php the_field("teamMember_introduction"); ?>

						<p class="h5">Podívejte se na mé portfolio a nebo mě kontaktujte.</p>
						<a id="btn-portfolio" href="#portfolio" class="btn btn-primary">Portfolio</a> 
		
						<a href="<?php echo get_site_url(); ?>/kontakt" class="btn btn-light">Kontaktujte mě</a>
					</div>

					<div class="col-md-4 team-shortText">
						<div class="team-shortText-content"><?php the_field('teamMember_shortText'); ?></div>
					</div>
				</article>
			</div>

			<!-- GALLERY -->
			<div class="gallery">
				<?php 
				$images = get_field('gallery');
				$size = 'medium'; // (thumbnail, medium, large, full or custom size)

				if( $images ): ?>
				    <?php the_field('gallery'); ?>
				<?php endif; ?>
			</div>

			<div id="portfolio">
				<div id="tabs" class="tabs tab-section">
					<h2><?php the_field("tabs_title"); ?></h2>
					  <div class="tab-container">
						  <nav class="tab-nav">
						   <?php if(have_rows('tabs')):?>
						    <?php while(have_rows('tabs')): the_row(); 
						    ?>

						    <a href="#tab-content--<?php echo $tabLabel++; ?>"><?php the_sub_field('tab_label'); ?></a>
						    <?php endwhile; ?>
						   <?php endif; ?>
						  </nav>

						  <?php if(have_rows('tabs')): ?>
						    <?php while(have_rows('tabs')): the_row(); ?>
						     <div id="tab-content--<?php echo $tabContent++; ?>" class="tab-content-wrap">
						     	<div class="tab-content">

									<?php 
									$terms = get_sub_field('tab_content');

								 
									if( $terms ): ?>
										<?php 
										foreach( $terms as $term ): 
										 // set up a new query for each category, pulling in related posts.
											$term_slug = $term->slug;
											$_posts = new WP_Query( array(
								                'post_type'         => 'programs',
								                'posts_per_page'    => -1,
								                'tax_query' => array(
								                    array(
								                        'taxonomy' => 'programs_category',
								                        'field'    => 'slug',
								                        'terms'    => $term_slug,
								                    ),
								                ),
								            ));
								            if( $_posts->have_posts() ) :
										        while ( $_posts->have_posts() ) : $_posts->the_post();

										    	$url = get_field('program_url');
									        ?>

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
					        					<p class="organizer">
							                		<?php the_field('rezie'); ?>
							                	</p>
							                	<p class="organizer">
							                		<?php the_field('program_organizer'); ?>
							                	</p>
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

									    endforeach; 
								    ?>
							    	<?php
										
									  endif; ?>
							 	</div>
						 	</div>
					    	<?php endwhile; ?>
					  	<?php endif; ?>
				  	</div>
				</div>
		  	</div>
		</div>
	</section>

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'components/post/content', get_post_format() );

	endwhile; // End of the loop.
	?>

</main>
<?php
get_footer();
?>

