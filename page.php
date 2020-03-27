<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<article <?php post_class(); ?>>
	<header class="entry-header"><?php the_title(); ?></header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>