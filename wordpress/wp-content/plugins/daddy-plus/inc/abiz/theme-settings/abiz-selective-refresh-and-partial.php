<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function daddy_plus_abiz_selective_refresh( $wp_customize ) {
	// info_data
	$wp_customize->selective_refresh->add_partial( 'info_data', array(
		'selector'            => '.info-section  .info-wrapper',
	) );
	
	// service_ttl
	$wp_customize->selective_refresh->add_partial( 'service_ttl', array(
		'selector'            => '.abiz-service-main .theme-main-heading .title',
		'settings'            => 'service_ttl',
		'render_callback'  => 'abiz_service_ttl_render_callback',
	) );
	
	// service_subttl
	$wp_customize->selective_refresh->add_partial( 'service_subttl', array(
		'selector'            => '.abiz-service-main .theme-main-heading .subtitle',
		'settings'            => 'service_subttl',
		'render_callback'  => 'abiz_service_subttl_render_callback',
	) );
	
	// service_desc
	$wp_customize->selective_refresh->add_partial( 'service_desc', array(
		'selector'            => '.abiz-service-main .theme-main-heading .content',
		'settings'            => 'service_desc',
		'render_callback'  => 'abiz_service_desc_render_callback',
	) );
	
	// service_data
	$wp_customize->selective_refresh->add_partial( 'service_data', array(
		'selector'            => '.abiz-service-main  .service-wrapper',
	) );
	
	// features2_ttl
	$wp_customize->selective_refresh->add_partial( 'features2_ttl', array(
		'selector'            => '.abiz-features-section-2 .theme-main-heading .title',
		'settings'            => 'features2_ttl',
		'render_callback'  => 'abiz_features2_ttl_render_callback',
	) );
	
	// features2_subttl
	$wp_customize->selective_refresh->add_partial( 'features2_subttl', array(
		'selector'            => '.abiz-features-section-2 .theme-main-heading .subtitle',
		'settings'            => 'features2_subttl',
		'render_callback'  => 'abiz_features2_subttl_render_callback',
	) );
	
	// features2_desc
	$wp_customize->selective_refresh->add_partial( 'features2_desc', array(
		'selector'            => '.abiz-features-section-2 .theme-main-heading .content',
		'settings'            => 'features2_desc',
		'render_callback'  => 'abiz_features2_desc_render_callback',
	) );
	
	// features2_data
	$wp_customize->selective_refresh->add_partial( 'features2_data', array(
		'selector'            => '.abiz-features-section-2  .features-wrapper',
	) );
	
	// blog_ttl
	$wp_customize->selective_refresh->add_partial( 'blog_ttl', array(
		'selector'            => '.abiz-blog-main .theme-main-heading .title',
		'settings'            => 'blog_ttl',
		'render_callback'  => 'abiz_blog_ttl_render_callback',
	) );
	
	// blog_subttl
	$wp_customize->selective_refresh->add_partial( 'blog_subttl', array(
		'selector'            => '.abiz-blog-main .theme-main-heading .subtitle',
		'settings'            => 'blog_subttl',
		'render_callback'  => 'abiz_blog_subttl_render_callback',
	) );
	
	// blog_desc
	$wp_customize->selective_refresh->add_partial( 'blog_desc', array(
		'selector'            => '.abiz-blog-main .theme-main-heading .content',
		'settings'            => 'blog_desc',
		'render_callback'  => 'abiz_blog_desc_render_callback',
	) );
}
add_action( 'customize_register', 'daddy_plus_abiz_selective_refresh' );


// service_ttl
function abiz_service_ttl_render_callback() {
	return get_theme_mod( 'service_ttl' );
}

// service_subttl
function abiz_service_subttl_render_callback() {
	return get_theme_mod( 'service_subttl' );
}

// service_desc
function abiz_service_desc_render_callback() {
	return get_theme_mod( 'service_desc' );
}

// features2_ttl
function abiz_features2_ttl_render_callback() {
	return get_theme_mod( 'features2_ttl' );
}

// features2_subttl
function abiz_features2_subttl_render_callback() {
	return get_theme_mod( 'features2_subttl' );
}

// features2_desc
function abiz_features2_desc_render_callback() {
	return get_theme_mod( 'features2_desc' );
}

// blog_ttl
function abiz_blog_ttl_render_callback() {
	return get_theme_mod( 'blog_ttl' );
}

// blog_subttl
function abiz_blog_subttl_render_callback() {
	return get_theme_mod( 'blog_subttl' );
}

// blog_desc
function abiz_blog_desc_render_callback() {
	return get_theme_mod( 'blog_desc' );
}