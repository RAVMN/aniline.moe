<?php get_header(); ?>
<div id="content" class="site-content masonry" role="main">

<article id="area-principal" class="hentry">
	<header class="entry-header">¡Chuta! No lo encontramos...</header>
	<div class="entry-content">
		<p>ごめんなさい<br>No pudimos encontrar nada en esta dirección.</p>
	</div>
</article>



<article id="area-lateral" class="hentry">
	<header class="entry-header">¡Bienvenido a Aniline!</header>
	<div class="entry-content clearfix">
		<p style="text-align: justify;">Noticias y fichas de anime en español.</p>
		<p style="text-align: justify;">¡Esperamos ser de tu agrado!</p>
		<p style="text-align: center;">Síguenos en <a href="https://www.facebook.com/anilinemoe" target="_blank"><strong>Facebook</strong></a> o <strong><a href="https://twitter.com/anilinemoe" target="_blank">Twitter</a></strong>, donde algún día (eventualmente) tendremos contenido :p</p>
		<p>Agradecemos a:</p>
		<p style="text-align: center;"><a href="http://adf.ly/2283512/http://aniwox.com/" target="_blank">Aniwox</a> &#8211; <a href="http://adf.ly/2283512/http://animeflv.net/" target="_blank">AnimeFLV</a> &#8211; <a href="http://adf.ly/2283512/http://jkanime.net/" target="_blank">JKAnime</a> -<a href="http://adf.ly/2283512/http://reyanime.com/" target="_blank">ReyAnime</a> &#8211; <a href="http://adf.ly/2283512/http://www.animeid.tv/" target="_blank">AnimeID</a> &#8211; <a href="http://adf.ly/2283512/http://www.crunchyroll.com" target="_blank">Crunchyroll</a></p>
	</div>
</article>

<?php
$args=array('post_type' => 'anime', 'posts_per_page' => 1, 'orderby' => 'rand', 'ignore_sticky_posts'=> 1, 'meta_key' => '_thumbnail_id',);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
  while ($my_query->have_posts()) : $my_query->the_post();
$image = wp_get_attachment_image_src( get_post_thumbnail_id(),$size = 'full');
?>

<article id="post-<?php the_ID(); ?>" class="hentry">
	<header class="entry-header"><?php the_title(); ?></header>
	<div class="single-featured-image"><a href="<?php the_permalink() ?>"><img src="<?php echo $image[0]; ?>" /></a></div>
</article>
<?php endwhile; } wp_reset_query(); ?>

</div>
<?php get_footer(); ?>