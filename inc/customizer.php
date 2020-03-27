<?php
/** Aniline Theme Customizer */

/** Enable options in the theme customizer */
function aniline_customizer_register( $wp_customize ) {
	class Aniline_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';

	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>>
	        	<?php echo esc_textarea( $this->value() ); ?>
	        </textarea>
	        </label>
	        <?php
	    }
	}

	// Excerpts
	$wp_customize->add_section( 'aniline_excerpts', array(
		'title' => __( 'Estractos', 'aniline' ),
        'priority' => 200
    ) );

	$wp_customize->add_setting( 'aniline-theme[display_excerpts]', array(
    	'default' => false,
    	'type' => 'option'
	) );

    $wp_customize->add_control( 'display_excerpts', array(
        'label' => __( 'Mostrar extractos en los archivos', 'aniline' ),
        'section' => 'aniline_excerpts',
		'settings' => 'aniline-theme[display_excerpts]',
		'type' => 'checkbox'
    ) );

}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aniline_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'aniline_customize_register' );

/** Binds JS handlers to make Theme Customizer preview reload changes asynchronously. */
function aniline_customize_preview_js() {
	wp_enqueue_script( 'aniline_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'aniline_customize_preview_js' );
