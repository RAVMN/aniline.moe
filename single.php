<?php get_header(); ?>
<div id="content" class="site-content masonry" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<article id="area-principal" class="hentry">
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
$meta_kanji = get_post_meta( get_the_ID(), 'wpcf-titulo-kanji', true );
if ( !empty($meta_kanji) ) {echo '<div class="wpcf-field">Título japonés: ' . $meta_kanji . '</div>';}
$meta_coreano = get_post_meta( get_the_ID(), 'wpcf-titulo-coreano', true );
if ( !empty($meta_coreano) ) {echo '<div class="wpcf-field">Título coreano: ' . $meta_coreano . '</div>';}
$meta_chino = get_post_meta( get_the_ID(), 'wpcf-titulo-chino', true );
if ( !empty($meta_chino) ) {echo '<div class="wpcf-field">Título chino: ' . $meta_chino . '</div>';}
$meta_latino = get_post_meta( get_the_ID(), 'wpcf-titulo-latino', true );
if ( !empty($meta_latino) ) {echo '<div class="wpcf-field">Título latino: ' . $meta_latino . '</div>';}
$meta_capitulos = get_post_meta( get_the_ID(), 'wpcf-capitulos-totales', true );
if ( !empty($meta_capitulos) ) {echo '<div class="wpcf-field">Capítulos: ' . $meta_capitulos . '</div>';}
$meta_productor = get_post_meta( get_the_ID(), 'wpcf-productor-animacion', true );
if ( !empty($meta_productor) ) {echo '<div class="wpcf-field">Productor: ' . $meta_productor . '</div>';}

$meta_origen_animacion = types_render_field("origen-animacion", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_origen_animacion) ) {echo $meta_origen_animacion;}
/*$meta_origen = get_post_meta( get_the_ID(), 'wpcf-origen-animacion', true );
if ( !empty($meta_origen) ) {echo '<div class="wpcf-field">Origen: ' . $meta_origen . '</div>';}*/

$meta_estado = types_render_field("estado", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_estado) ) {echo $meta_estado;}
/*$meta_estado = get_post_meta( get_the_ID(), 'wpcf-estado', true );
if ( !empty($meta_estado) ) {echo '<div class="wpcf-field">Estado: ' . $meta_estado . '</div>';}*/

$meta_tipo = types_render_field("tipo", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_tipo) ) {echo $meta_tipo;}
/*$meta_tipo = get_post_meta( get_the_ID(), 'wpcf-tipo', true );
if ( !empty($meta_tipo) ) {echo '<div class="wpcf-field">Tipo: ' . $meta_tipo . '</div>';}*/

$meta_estreno = types_render_field("fecha-de-estreno", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_estreno) ) {echo $meta_estreno;}

$meta_termino = types_render_field("fecha-de-termino", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_termino) ) {echo $meta_termino;}

/*$meta_estreno = get_post_meta( get_the_ID(), 'wpcf-fecha-de-estreno', true );
if ( !empty($meta_estreno) ) {echo '<div class="wpcf-field">Fecha de estreno: ' . date( 'j/m/Y' , strtotime( $meta_estreno ) ) . '</div>';}
$meta_termino = get_post_meta( get_the_ID(), 'wpcf-fecha-de-termino', true );
if ( !empty($meta_termino) ) {echo '<div class="wpcf-field">Fecha de término: ' . date( 'j/m/Y' , strtotime( string $meta_termino ) ) . '</div>';}*/

$meta_otros_nombres = types_render_field("otros-nombres", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_otros_nombres) ) {echo $meta_otros_nombres;}
/*$meta_otros_nombres = get_post_meta( get_the_ID(), 'wpcf-otros-nombres', true );
if ( !empty($meta_otros_nombres) ) {echo '<div class="wpcf-field">Otros nombres: ' . $meta_otros_nombres . '</div>';}*/

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

<?php endwhile; ?>

<?php get_template_part('sidebar'); ?>

	<?php aniline_content_nav( 'cajaboton' ); ?>
	<?php comments_template( '', false ); ?>

</div>
<?php get_footer(); ?>