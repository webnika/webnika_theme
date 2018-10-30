<div class="boxes-list">
    <?php 
    $page_id = 4;
    ?>

    <div class="container">
    <h2><?php the_field('home_recommendation_title',$page_id); ?></h2>
    <?php 
    $args = array(
        'parent' => 1440,
        'post_type' => 'page',
        'post_status' => 'publish',
        'orderby' => 'menu_order title', 
    	'order' => 'ASC',
    	'sort_column' => 'menu_order'
    ); 
    $pages = get_pages($args);  ?>
    <?php
    foreach( $pages as $page ) {
    ?>
         <div class="col-md-3 col-sm-3 item">
            <a href="<?php echo  get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>">
            	<span class="thumbnail"><?php echo get_the_post_thumbnail($page->ID, 'small-thumb'); ?></span>
            	<h3 class="title"><?php echo $page->post_title; ?></h3>
            </a>
        </div>
    <?php
     }  
    ?>
    <div class="clearfix"></div>
    </div>
    <?php wp_reset_postdata(); ?>
</div>