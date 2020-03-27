<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
get_header(); ?>

<header class="page-header"><div class="caja">
	<form id="cambiotemporada" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"> <?php wp_dropdown_categories( 'orderby=name&order=DESC&name=temporada&taxonomy=temporada&value_field=slug' ); ?> <input type="submit" value="" /></form>
	<?php wp_nav_menu( array( 'theme_location' => 'abc-menu' ) ); ?>
</div></header>

<div id="letrasstyle">
<div class="section clearfix hentry">
	<header class="entry-header">
		Listado alfabético - <?php echo $term->name; ?>
	</header>

<div class="entry-content">
<table>
<tr>
	<th>Título</th>
	<th>Sinopsis</th>
	<th class="letrasmore">Tipo</th>
	<th class="letrasmore">Estreno</th>
</tr>

<?php if ( have_posts() ) : ?>	<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>"><tr>
	<th><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
	<td><?php the_excerpt(); ?></td>
	<td class="letrasmore"><?php 
		$meta_tipo = types_render_field("tipo", array("output"=>"html")); echo $meta_tipo; ?></td>
	<td class="letrasmore"><?php 
		$meta_estreno = types_render_field("fecha-de-estreno", array("output"=>"html")); echo $meta_estreno; ?></td>
</tr></article>
	<?php endwhile; ?>

<?php else : ?> <?php get_template_part( '404' ); ?> <?php endif; ?>
</table>
</div>
</div></div>
<?php get_footer(); ?>