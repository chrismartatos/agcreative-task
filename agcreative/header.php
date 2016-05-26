<!DOCTYPE html>
<html lang="en">
<head>
		<title><?php  if(is_home())
					  {
					     echo "";
					   }
					   elseif(is_404()){
					     echo "404 (Page Not Found) - ";
					   } 
					   elseif(is_page())
					   {
						   echo the_title();
						   echo " - ";
					   }
					   echo bloginfo('name');?></title>   
		                                                 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<div id="page">
	
<header id="header">	
	<div class="container">
		
		<!--Logo-->
		<a href="<?php bloginfo('wpurl'); ?>" title="<?php bloginfo('name'); ?>" class="ag-logo"></a>
		
		<!--Main Nav-->
		<nav id="main-nav" class="site-nav">
			<?php 
				wp_nav_menu( array(
					'menu' => 'Main Menu',
					'container'=> ''
				));
			?>
		</nav>
		
		<!--Mobile Nav - Hamburger-->
		<nav id="mobile-nav">
			<a id="hamburger" class="hamburger" href="#">
				<div class="wrap">
					<div class="line-wrap">
						<span class="line line-1"></span>
						<span class="line line-2"></span>
						<span class="line line-3"></span>
					</div>
				</div>
			</a>
		</nav>
	</div>
</header>