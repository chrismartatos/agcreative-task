<?php
/*
Template Name: Template - Home
*/
?>

<?php get_header(); ?>

<div id="content" class="page-<?php print $post->post_name; ?>">
<?php 
$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full");
$feat_img = $img_src[0];

if(!empty($feat_img)):
?>

	<?php 
		//Get banner
		include('elements/banner.php'); 
	?>
	
<?php else: ?>
	
	<?php 
		//Get article
		include('elements/article.php'); 
	?>

<?php endif; ?>

<div class="container">
<?php 
	the_content();
?>
</div>

</div><!--END #content -->

<?php get_footer(); ?>
