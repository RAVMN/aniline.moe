<?php get_header(); ?>
<article class="hentry">
	<header class="entry-header"><?php printf( __( 'Resultados para: %s', 'aniline' ), get_search_query() ); ?></header>
	<div class="entry-content">
<script>
  (function() {
    var cx = '009339717881616886039:286hdyr0wnc';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only queryParameterName="s"></gcse:searchresults-only>
	</div>
</article>
<?php get_footer(); ?>