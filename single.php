<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<article class="hentry">
	<header class="entry-header"><?php the_title(); ?></header>

<?php	if ( 'anime' == get_post_type() ) : ?>
<div class="post-metadata">
	<?php if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img src="<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id(),$size = 'full');
echo $image[0];
?>" /></a>
	<?php } ?>
<spon><?php 
$meta_titulo_kanji = types_render_field("titulo-kanji", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_titulo_kanji) ) {echo $meta_titulo_kanji;}
$meta_titulo_coreano = types_render_field("titulo-coreano", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_titulo_coreano) ) {echo $meta_titulo_coreano;}
$meta_titulo_chino = types_render_field("titulo-chino", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_titulo_chino) ) {echo $meta_titulo_chino;}
$meta_titulo_latino = types_render_field("titulo-latino", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_titulo_latino) ) {echo $meta_titulo_latino;}
$meta_capitulos_totales = types_render_field("capitulos-totales", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_capitulos_totales) ) {echo $meta_capitulos_totales;}
$meta_productor_animacion = types_render_field("productor-animacion", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_productor_animacion) ) {echo $meta_productor_animacion;}
$meta_origen_animacion = types_render_field("origen-animacion", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_origen_animacion) ) {echo $meta_origen_animacion;}
$meta_estado = types_render_field("estado", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_estado) ) {echo $meta_estado;}
$meta_tipo = types_render_field("tipo", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_tipo) ) {echo $meta_tipo;}
$meta_fecha_estreno = types_render_field("fecha-de-estreno", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_fecha_estreno) ) {echo $meta_fecha_estreno;}
$meta_fecha_termino = types_render_field("fecha-de-termino", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_fecha_termino) ) {echo $meta_fecha_termino;}
$meta_otros_nombres = types_render_field("otros-nombres", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_otros_nombres) ) {echo $meta_otros_nombres;}
?></spon>
</div>
<?php endif; ?>

<div class="entry-content">
	<?php the_content(); ?>
<div class="compartir">Compartir<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank"><img src="/wp-content/uploads/botones/facebook.png" title="Facebook" class="compartir" alt="Compartir en Facebook"/></a><a href="http://twitter.com/share?url=<?php the_permalink() ?>&amp;text=<?php the_title(); ?>" target="_blank"><img src="/wp-content/uploads/botones/twitter.png" title="Twitter" class="compartir" alt="Twittear sobre esto"/></a></div>
</div>

<footer class="entry-meta">
<?php	if ( 'post' == get_post_type() ) : ?>
		<div class="entry-fecha"><?php aniline_posted_on(); ?></div>
<?php	endif;
	the_terms( $post->ID, 'temporada', 'Temporada: ', ', ', ' ' );
		the_terms( $post->ID, 'genero', 'Género: ', ', ', ' ' );
		the_terms( $post->ID, 'category', 'Sección: ', ', ', ' ' );
	edit_post_link( __( 'Editar', 'aniline' ) ); ?>
</footer>
</article>

	<?php aniline_content_nav( 'nav-below' ); ?>
	<?php comments_template( '', false ); ?>

<?php endwhile; ?>
<?php get_footer(); ?>