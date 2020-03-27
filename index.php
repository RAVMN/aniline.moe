<?php get_header(); ?>

	<?php if ( 'anime' == get_post_type() ) : /** Anime y temporadas*/ ?>
<header id="menuabc">
		<form id="cambiotemporada" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"> <?php wp_dropdown_categories( 'orderby=name&order=DESC&name=temporada&taxonomy=temporada&value_field=slug' ); ?> <input type="submit" value="Ir" /></form>
		<?php wp_nav_menu( array( 'theme_location' => 'abc-menu' ) ); ?>
</header>
<div id="content" class="site-content " role="main">
<div class="elmason">
<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-featured-image">
		<?php if ( has_post_thumbnail() ) { ?>
			<figure>
	<a href="<?php the_permalink() ?>"><img src="<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id(),$size = '' );
echo $image[0];
?>" /></a>
			</figure> <?php } ?></div>

	<header class="entry-header">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</header>
	<div class="entry-summary"><?php the_excerpt(); ?>
	
<div class="entry-meta"><?php 
$meta_productor = get_post_meta( get_the_ID(), 'wpcf-productor-animacion', true );
if ( !empty($meta_productor) ) {echo '<div class="wpcf-field">Productor: ' . $meta_productor . '</div>';}
$meta_origen = types_render_field("origen-animacion", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_origen) ) {echo $meta_origen;}
$meta_tipo = types_render_field("tipo", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_tipo) ) {echo $meta_tipo;}
$meta_estreno = types_render_field("fecha-de-estreno", array("output"=>"html","show_name"=>"true"));
if ( !empty($meta_estreno) ) {echo $meta_estreno;}
?></div>
	
	</div>
	<footer class="entry-meta clearfix">
        	<span class="entry-fecha"><a href="<?php the_permalink(); ?>">Leer más</a></span>
  	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>
</div><!-- elmason -->
</div><!-- #content .site-content -->



	<?php else : /** Noticias y otros */ ?>
<div id="content" class="site-content masonry" role="main">

<article id="area-principal" class="hentry">
	<header class="entry-header">Lo último sobre <?php single_cat_title() ?></header>
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
<?php /*<?php aniline_posted_on(); ?><span class="entry-fecha"></span> */?>
<div class="blog_mo"><a href="<?php the_permalink();?>">+ Seguir leyendo</a></div></td></tr>
	<?php endwhile; ?>
</table></div>
</article>

<?php get_template_part('sidebar'); ?>

</div>
<?php endif; ?>

<?php aniline_content_nav( 'cajaboton' ); ?>
<?php get_footer(); ?>
