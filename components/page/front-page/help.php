<?php
$page_id = 4;
?>
<div class="box-bg ">
	<div class="container content">
		<h2>
			<?php the_field('home_help_title',$page_id);?><br/>
			<span class="perex"><?php the_field('home_help_subtitle',$page_id);?></span>
		</h2>
		<?php
		// check if the repeater field has rows of data
		if( have_rows('home_help_content',$page_id) ): 
		?>
			<!-- BOXES -->
		    <?php
		    while ( have_rows('home_help_content',$page_id) ) : the_row(); 
				$post_counter++;  
			?>
		        <div class="col-md-6 col-sm-6 item">
	            	<div class="content">
	            		<?php the_sub_field('home_help_content_item1');?>
            		</div>
	            	<div class="footer">
	            		<a class="btn btn-primary" href="<?php the_sub_field('home_help_content_item1_url');?>">Chci zjistit více</a>
            		</div>
		        </div>
		        <div class="col-md-6 col-sm-6 item">
		       		<div class="content">
	            		<?php the_sub_field('home_help_content_item2');?>
            		</div>
	            	<div class="footer">
	            		<a class="btn btn-primary" href="<?php the_sub_field('home_help_content_item2_url');?>">Chci zjistit více</a>
            		</div>
		        </div>
		    <?php endwhile; ?>
		<?php
		else :

		    // no rows found

		endif;

		?>
		<div class="clearfix"></div>
	</div>
</div>
<?php wp_reset_postdata(); ?>