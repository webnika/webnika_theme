<!-- MAIN VISUAL IMAGE -->
<?php 
global $post;
$post_id = $post->ID;

if (get_field('mainVisual_img') ) {
	$image = get_field('mainVisual_img',$post_id); 
}
?>

<div class="main-visual-bg">
	<!-- MAIN VISUAL CONTENT -->
	
</div>

<?php wp_reset_query(); ?>