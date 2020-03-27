<article id="area-lateral" class="hentry">
	<header class="entry-header">¡Bienvenido a Aniline!</header>
	<div class="entry-content clearfix">
		<p style="text-align: justify;">Noticias de anime y japón en español.</p>
		<p style="text-align: justify;">¡Esperamos ser de tu agrado!</p>
		<center><img src="http://i.imgur.com/hlvr8uR.gif"/></center>
<?php /** https://i2.wp.com/www.aniline.moe/wp-content/uploads/cropped-logodelta-1.png */ ?>
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