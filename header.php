<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

<!--HEADER-->
<div class="header_wrap layer_wrapper">
<!--HEADER STARTS-->
    <div class="header">
        <div class="center">
            <div class="head_inner">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="site-logo" src="/wp-content/themes/aniline/logo.png"/></a>
<div class="name-box">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><p class="site-name">Aniline</p></a>
<span class="site-tagline">Noticias en línea</span>
</div>
            
<!--MOBILE MENU-->	<a id="simple-menu" href="#sidr"><i class="fa-bars"></i></a>
		<div id="topmenu"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?></div>        
    </div>
    </div>
    </div>
<!--HEADER ENDS-->
</div><!--layer_wrapper class END-->

<div id="main" class="section clearfix">