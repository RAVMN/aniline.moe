<?php
/** Custom template tags for this theme */

if ( ! function_exists( 'aniline_content_nav' ) ) :
/** Display navigation to next/previous pages when applicable */
function aniline_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous )
			return;	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() ) );
	if ( is_single() ); ?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="clearfix">
	<?php if ( is_single() ) : ?>
		<?php previous_post_link( '<div class="nav-previous">%link</div>', __( 'Anterior' , 'aniline') ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', __( 'Siguiente', 'aniline') ); ?>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() ) ) : // navigation for home and archive pages ?>
		<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Página anterior', 'aniline' ) ); ?></div>
		<?php endif; ?>
		<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Página siguiente', 'aniline' ) ); ?></div>
		<?php endif; ?>
	<?php endif; ?>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif;

if ( ! function_exists( 'aniline_posted_on' ) ) :
/** Prints HTML with meta information for the current post-date/time and author. */
function aniline_posted_on() {
	printf( __( 'Publicado el <a href="%1$s" rel="bookmark"><time datetime="%2$s">%3$s</time></a>', 'aniline' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ) );
}
endif;
