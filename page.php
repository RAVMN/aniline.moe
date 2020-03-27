<?php get_header(); ?>
<div id="content" class="site-content masonry" role="main">

<?php while ( have_posts() ) : the_post(); ?>
<article id="area-principal" class="hentry">
	<header class="entry-header"><?php the_title(); ?></header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
<?php endwhile; ?>

<?php get_template_part('sidebar'); ?>

</div>
<?php get_footer(); ?>