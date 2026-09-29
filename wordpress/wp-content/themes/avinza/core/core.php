<?php
function avinza_child_css() {
	$avinza_parent_theme_css = 'flixita-style';
	wp_enqueue_style( 
		$avinza_parent_theme_css, 
		get_template_directory_uri() . '/style.css' 
	);
	wp_enqueue_style( 
		'avinza-style', 
		get_stylesheet_uri(), 
		array( $avinza_parent_theme_css )
	);
}
add_action( 'wp_enqueue_scripts', 'avinza_child_css',999);


function avinza_custom_header_setup()
{
    $header_image = esc_url(get_template_directory_uri() . '/assets/images/page-header.jpg');
    add_theme_support('custom-header', apply_filters('flixita_custom_header_args', array(
        'default-image' => $header_image,
        'default-text-color' => 'fff',
        'width' => 2000,
        'height' => 200,
        'flex-height' => true,
        'wp-head-callback' => 'flixita_header_style',
    )));
}
add_action('after_setup_theme', 'avinza_custom_header_setup');

require get_stylesheet_directory() . '/core/customizer/custom-controls/customize-upgrade-control.php';

/**
 * Import Options From Parent Theme
 *
 */
function avinza_parent_theme_options() {
    $flixita_mods = get_option( 'theme_mods_flixita' );
    if ( ! empty( $flixita_mods ) ) {
        foreach ( $flixita_mods as $flixita_mod_k => $flixita_mod_v ) {
            set_theme_mod( $flixita_mod_k, $flixita_mod_v );
        }
    }
}
add_action( 'after_switch_theme', 'avinza_parent_theme_options' );