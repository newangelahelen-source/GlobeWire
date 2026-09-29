<?php
/**
 * Register customizer panels and sections.
 *
 * @package Abiz
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function daddy_plus_abiz_panel_section_register( $wp_customize ) { 	
	// Panel: Frontpage Sections
	$wp_customize->add_panel('abiz_frontpage_sections', array(
		'priority' => 32,
		'title' => esc_html__( 'Theme Frontpage Sections', 'daddy-plus' ),
	));
	
	// Section:  Slider
	$wp_customize->add_section('slider_section_set', array(
		'title' => esc_html__( 'Slider Settings', 'daddy-plus' ),
		'panel' => 'abiz_frontpage_sections',
		'priority' => 1,
	));
	
	// Section:  Info
	$wp_customize->add_section('info_section_set', array(
		'title' => esc_html__( 'Info Settings', 'daddy-plus' ),
		'priority' => 3,
		'panel' => 'abiz_frontpage_sections',
	));
	
	// Section:  Marquee
	$wp_customize->add_section('marquee_section_set', array(
		'title' => esc_html__( 'Marquee Settings', 'daddy-plus' ),
		'priority' => 3,
		'panel' => 'abiz_frontpage_sections',
	));
	
	// Section:  Service
	$wp_customize->add_section('service_section_set', array(
		'title' => esc_html__( 'Service Settings', 'daddy-plus' ),
		'priority' => 3,
		'panel' => 'abiz_frontpage_sections',
	));
	
	// Section:  Features
	$wp_customize->add_section('features2_section_set', array(
		'title' => esc_html__( 'Features Settings', 'daddy-plus' ),
		'priority' => 11,
		'panel' => 'abiz_frontpage_sections',
	));
	
	// Section:  Blog
	$wp_customize->add_section('blog_section_set', array(
		'title' => esc_html__( 'Blog Settings', 'daddy-plus' ),
		'priority' => 27,
		'panel' => 'abiz_frontpage_sections',
	));
}
add_action( 'customize_register', 'daddy_plus_abiz_panel_section_register' );