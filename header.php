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

<header id="csscabecera"><div class="section clearfix">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Aniline</a>
	<nav class="cssmenu"><?php wp_nav_menu(array('theme_location'=>'primary','depth'=>'2')); ?></nav>
</div></header>

<div id="main" class="section clearfix">