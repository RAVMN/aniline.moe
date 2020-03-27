<?php get_header(); ?>
<div id="content" class="site-content masonry" role="main">

<article id="area-principal" class="hentry">

	<header class="entry-header">Últimas publicaciones</header>
<div class="entry-summary"><table>
<?php global $post;
$args = array( 'numberposts' => 6, 'post_type' => 'post');
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post); ?>
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
<div class="blog_mo"><a href="<?php the_permalink();?>">+ Seguir leyendo</a></div>
</td></tr>
<?php endforeach; wp_reset_query(); ?>
</table></div>
</article>

<?php get_template_part('sidebar'); ?>

</div>

<?php get_footer(); ?>