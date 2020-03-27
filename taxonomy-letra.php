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

<?php get_template_part('sidebar'); ?>

</div>
<?php get_footer(); ?>