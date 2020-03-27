<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
get_header(); ?>

<header id="menuabc">
	<form id="cambiotemporada" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"> <?php wp_dropdown_categories( 'orderby=name&order=DESC&name=temporada&taxonomy=temporada&value_field=slug' ); ?> <input type="submit" value="Ir" /></form>
	<?php wp_nav_menu( array( 'theme_location' => 'abc-menu' ) ); ?>
</header>

<div id="content" class="site-content masonry" role="main">

<article id="area-principal" class="hentry">
	<header class="entry-header">Listado alfabético - <?php echo $term->name; ?></header>
<div class="entry-content"><table>
<tr>
	<th>Título</th>
	<th>Sinopsis</th>
	<th class="letrasmore">Tipo</th>
	<th class="letrasmore">Estreno</th>
</tr>

<?php while ( have_posts() ) : the_post(); ?>
<tr>
	<th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
	<td><?php the_excerpt(); ?></td>
	<td class="letrasmore"><?php 
		$meta_tipo = types_render_field("tipo", array("output"=>"html")); echo $meta_tipo; ?></td>
	<td class="letrasmore"><?php 
		$meta_estreno = types_render_field("fecha-de-estreno", array("output"=>"html")); echo $meta_estreno; ?></td></tr>
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
<?php get_footer(); ?>