<?php get_header(); ?>

	<?php if ( 'anime' == get_post_type() ) : /** Anime y temporadas*/ ?>
<header class="page-header"><div class="caja">
		<form id="cambiotemporada" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"> <?php wp_dropdown_categories( 'orderby=name&order=DESC&name=temporada&taxonomy=temporada&value_field=slug' ); ?> <input type="submit" value="Ir" /></form>
		<?php wp_nav_menu( array( 'theme_location' => 'abc-menu' ) ); ?>
</div></header>
<div id="content" class="site-content masonry" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-featured-image">
		<?php if ( has_post_thumbnail() ) { ?>
			<figure>
<spin><?php 
$meta_kanji = types_render_field("titulo-kanji", array("output"=>"html"));
if ( !empty($meta_kanji) ) {printf("Japonés: %s",$meta_kanji);}

$meta_latino = types_render_field("titulo-latino", array("output"=>"html"));
if ( !empty($meta_latino) ) {printf("Español: %s",$meta_latino);}

$meta_capstotales = types_render_field("capitulos-totales", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_capstotales) ) {echo $meta_capstotales;}

$meta_productor = types_render_field("productor-animacion", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_productor) ) {echo $meta_productor;}

$meta_origen = types_render_field("origen-animacion", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_origen) ) {echo $meta_origen;}

$meta_estado = types_render_field("estado", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_estado) ) {echo $meta_estado;}

$meta_tipo = types_render_field("tipo", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_tipo) ) {echo $meta_tipo;}

$meta_estreno = types_render_field("fecha-de-estreno", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_estreno) ) {echo $meta_estreno;}

$meta_termino = types_render_field("fecha-de-termino", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_termino) ) {echo $meta_termino;}
?></spin>
	<a href="<?php the_permalink() ?>"><img src="<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id(), $size = 'medium');
echo $image[0];
?>" /></a>
			</figure> <?php } ?></div>

	<header class="entry-header">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</header>
	<div class="entry-summary"><?php the_excerpt(); ?></div>
	<footer class="entry-meta clearfix">
		<span class="entry-fecha"><a href="<?php the_permalink(); ?>">Leer más</a></span>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>

</div><!-- #content .site-content -->



	<?php else : /** Noticias y otros */ ?>
<div id="content" class="site-content masonry" role="main">

<article id="area-principal" class="hentry">
	<header class="entry-header">Noticias recientes</header>
<div class="entry-summary"><table>
	<?php while ( have_posts() ) : the_post(); ?>
<tr><td>
<a href="<?php the_permalink() ?>">
<?php if ( has_post_thumbnail() ) { ?>
	<img class="alignleft" src="<?php
	add_filter( 'jetpack_photon_image_downsize_array', 'macgamer_jetpack_photon_image_downsize_array' );
	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), array(110,130) );
	remove_filter( 'jetpack_photon_image_downsize_array', 'macgamer_jetpack_photon_image_downsize_array' );
	echo $image[0];
	?>?resize=110,130" />
	<?php } ?>
<strong><?php the_title(); ?></strong></a><br><?php the_excerpt(); ?>
<?php aniline_posted_on(); ?><span class="entry-fecha"><a href="<?php the_permalink(); ?>">Leer más</a></span><br><br>
</td></tr>
	<?php endwhile; ?>
</table></div>
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
<?php endif; ?>

<?php aniline_content_nav( 'nav-below' ); ?>
<?php get_footer(); ?>
