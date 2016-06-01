<div class="banner" <?php echo 'style="background-image:url('.$feat_img.');"'; ?>>
	<div class="mask"></div>
	<h1><?php the_title(); ?></h1>
	<div class="desc">
		<?php if( have_posts() ): the_post(); ?>
				
		<p><?php the_excerpt(); ?></p>	
		
		<?php endif; ?>
	</div>
</div>
