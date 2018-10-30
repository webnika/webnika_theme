<div class="container">
	<div class="row columns">
		<?php
		// check if the flexible content field has rows of data
		if( have_rows('columns') ):
		     // loop through the rows of data
		    while ( have_rows('columns') ) : the_row();
		        if( get_row_layout() == '3_columns' ):
	    	?>
	    		<div class="col-md-4 col-sm-4 item-1">
	    			<div class="item">
	    				<?php the_sub_field('column_1'); ?>
					</div>
	    		</div>
	    		<div class="col-md-4 col-sm-4 item-2">
	    			<div class="item">
	    				<?php the_sub_field('column_2'); ?>
					</div>
	    		</div>
	    		<div class="col-md-4 col-sm-4 item-3">
	    			<div class="item">
	    				<?php the_sub_field('column_3'); ?>
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