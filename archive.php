<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Be_The_Change
 */

get_header(); 
?>
<div class="container">

	<div class="content-wrap">
		<div class="row">
			<main id="main" role="main" class="blog-page col-md-9 col-sm-9">

			<?php if (have_posts()):
					global $post;
					global $wp_query;
					$post_counter = 0;
					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query(); 
					$wp_query->query('posts_per_page=6'.'&paged='.$paged);
			
					while ($wp_query->have_posts()) : $wp_query->the_post(); 
					$post_counter++;
				?>

				   <article id="post-<?php the_ID(); ?>" class="item">
	                	<div class="row contet-wrap">
		                    <div class="img col-md-4 col-sm-4">
		                    	<a href="<?php the_permalink() ?>" rel="bookmark">
		                        <?php 
		                            if ( has_post_thumbnail() ) {
		                                the_post_thumbnail();
		                            }
		                            else {
		                                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
		                                    . '/assets/images/thumbnail-default.jpg" />';
		                            }
		                        ?>
		                        </a>
		                    </div>
		                    <div class="col-md-offset-1 col-sm-offset-1 col-md-7 col-sm-7">
		                    	<div class="content">
				                	<h2>
			                    	 	<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
			                        </h2>
		                    		<div class="info-category">
		                        	 	<ul>
				                    	<?php 
				                    	foreach((get_the_category()) as $category) { 
				                    		echo '<li>'. $category->cat_name . '</li>'; 
			                    		} 
			                    		?> 
			                    		</ul>
				                    </div>
				                    <div class="info-date">
			                    		<?php echo get_the_date(); ?>
			                        </div>
			                        <div class="clearfix"></div>
		                            <div class="perex"><?php the_excerpt("více"); ?></div>
		                            <a class="btn btn-primary" href="<?php the_permalink() ?>">Více</a>
                            	</div>
		                    </div>
			           </div>
	                </article><!-- #post-## -->
	            <?php endwhile; ?>
            	<!-- Pagination -->
		 		<div class="pagination-nav"><?php wpbeginner_numeric_posts_nav(); ?></div>
				<?php wp_reset_query(); ?>

				<?php else :

					get_template_part( 'components/post/content', 'none' );

				endif; ?>

			</main>

			<aside class="col-md-3 col-sm-3 sidebar widget-area" role="complementary">
				<?php get_sidebar(); ?>
			</aside>	
		</div>
	</div>
</div>
<?php
get_footer();
