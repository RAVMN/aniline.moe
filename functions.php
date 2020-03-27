<?php
/** Aniline functions and definitions */

if ( ! function_exists( 'aniline_setup' ) ) :

/** Sets up theme defaults and registers support for various WordPress features.
 * Note that this function is hooked into the after_setup_theme hook, which runs before the init hook.
 * The init hook is too late for some features, such as indicating support post thumbnails. */

function aniline_setup() {
	require( get_template_directory() . '/inc/template-tags.php' );	/** Custom template tags for this theme. */
	require( get_template_directory() . '/inc/options-functions.php' ); /** Functions to enable the options */
	require( get_template_directory() . '/inc/customizer.php' ); /** Customizer additions */

	/** Ajustes interfaz */
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	function aniline_wp_title( $title, $sep ) {
		global $page;
		$title .= get_bloginfo( 'name' );
		return $title; }
	add_filter( 'wp_title', 'aniline_wp_title', 10, 2 );
	register_nav_menus( array(
		'primary' => 'Primary Menu',
		'abc-menu' => 'Alfabeto', ) );
	add_theme_support( 'post-thumbnails' ); }

endif; // aniline_setup
add_action( 'after_setup_theme', 'aniline_setup' );

/** Enqueue scripts and styles */
function aniline_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style('optimizer-icons',get_template_directory_uri().'/fonts/font-awesome.css', 'font_awesome' );
	wp_enqueue_script('optimizer_js',get_template_directory_uri().'/optimizer.js', array('jquery'), true);
	 }
add_action( 'wp_enqueue_scripts', 'aniline_scripts' );

/*Modificamos cantidad de fichas según tipo de índice*/
function hwl_home_pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        $query->set( 'posts_per_page', 6 );
        $query->set( 'order', 'desc' );
        return;}

    if ( is_post_type_archive('anime') ) {
        $query->set( 'posts_per_page', 18 );
        $query->set( 'orderby', 'rand' );
        return;}

    if ( is_tax('letra') ) {
        $query->set( 'posts_per_page' , -1 );
	$query->set( 'order', 'asc' );
        $query->set( 'orderby', 'title' );
        return;}

    if ( is_tax('temporada') ) {
        $query->set( 'posts_per_page', 30 );
        $query->set( 'order', '&meta_key=fecha-de-estreno' );
        $query->set( 'orderby', 'meta_value' );
        return;} }
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );

/** Paneles personalizados en dashboard*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {global $wp_meta_boxes;
	wp_add_dashboard_widget('sources_widget', 'Aniline', 'contenido_widget');}

/** Contenido de paneles del dashboard*/
function contenido_widget() {
echo '<h2>¡Bienvenido a Aniline!</h2><p>¿No sabes que publicar? Prueba visitando <a href="http://animenewsnetwork.com/" target="_blank">ANN</a>, <a href="http://en.rocketnews24.com/" target="_blank">RN24</a>, <a href="http://www.otakutale.com/" target="_blank">OT</a>, <a href="http://otakumode.com/news" target="_blank">Otaku Mode</a>, <a href="http://otakuusamagazine.com/" target="_blank">Otaku USA</a>, <a href="http://kotaku.com/" target="_blank">Kotaku</a> o <a href="http://haruhichan.com/">Haruhichan</a>.<br>Si tienes dudas,¡ no dudes en consultar!</p><center><img width="320px" src="http://orig04.deviantart.net/2e5c/f/2011/278/2/1/ritsuko_by_gofu_web-d4bw9ar.jpg" /></center><h6>Las fichas están basadas en <a href="http://myanimelist.net/" target="_blank">MAL</a> y LNDB.info<br>Vamos a destruir a <a href=" anmtvla.com " target="_blank">ANMTVLA</a>, <a href="http://www.koi-nya.net/" target="_blank">Koi-nya</a>, <a href="http://multianime.com.mx/" target="_blank">Multi Anime</a>, <a href="http://narujodo.com/" target="_blank">Narujodó</a>, <a href="http://otakunews01.tumblr.com/" target="_blank">Otaku News!!</a>, <a href="http://otakudesho.com/" target="_blank">Otakudesho</a>... bueno, quizas no xP</h6>';}

/** Limpiar admin area*/
function remove_menus(){
  remove_menu_page( 'upload.php' );
  remove_menu_page( 'edit.php?post_type=page' );
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'tools.php' );
  remove_meta_box( 'commentsdiv', 'anime', 'normal' );
  remove_meta_box( 'slugdiv', 'anime', 'normal' );
  remove_meta_box( 'authordiv', 'post', 'normal' );
  remove_meta_box( 'commentsdiv', 'post', 'normal' );
  remove_meta_box( 'slugdiv', 'post', 'normal' );
  remove_meta_box( 'postexcerpt', 'post', 'normal' );
  remove_meta_box( 'postcustom', 'post', 'normal' );
  remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
 if (!current_user_can( 'manage_options' )) { remove_menu_page( 'options-general.php' ); }
 if (!current_user_can( 'edit_others_posts' )) { remove_menu_page( 'edit.php?post_type=anime' ); } }
add_action( 'admin_menu', 'remove_menus' );

function wpsnippy_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('new-page');
  $wp_admin_bar->remove_menu('new-media');
  $wp_admin_bar->remove_menu('new-user');
 if (!current_user_can( 'manage_options' )) { $wp_admin_bar->remove_menu('new-anime'); } }
add_action( 'wp_before_admin_bar_render', 'wpsnippy_admin_bar' );

function remove_dashboard_meta() {
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
  remove_meta_box('jetpack_summary_widget', 'dashboard', 'normal');
  remove_menu_page( 'jetpack' ); }
add_action( 'admin_init', 'remove_dashboard_meta' );

function macgamer_jetpack_photon_image_downsize_array( $photon_args ) {
	$photon_args['resize'];
	unset( $photon_args['fit'] );
	return $photon_args; }

function stop_heartbeat() {
	global $pagenow;
	if ( $pagenow != 'post.php' && $pagenow != 'post-new.php' ) {wp_deregister_script('heartbeat');} }
add_action( 'init', 'stop_heartbeat', 1 );

?>