<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Get default option by passing option id
 */
if ( !function_exists( 'daddy_plus_abiz_get_default_option' ) ):
	function daddy_plus_abiz_get_default_option( $option ) {

		if ( empty( $option ) ) {
			return false;
		}

		$abiz_default_options = array(
			'enable_slider' => '1',
			'slider' => daddy_plus_abiz_get_slider_default(),	
			'slider_opacity' => '0.75',	
			'slider_overlay_clr' => '#000000',	
			'enable_info' => '1',
			'info_data' => daddy_plus_abiz_info_default(),
			'enable_service' => '1',
			'service_ttl' => __('Service', 'daddy-plus'),
			'service_subttl' => __('Our <span class="color-primary">Services</span>', 'daddy-plus'),
			'service_desc' => __('There are many variations words pulvinar dapibus passages dont available.', 'daddy-plus'),
			'service_data' => daddy_plus_abiz_service_default(),
			'enable_marquee' => '1',
			'marquee_data' => daddy_plus_abiz_marquee_default(),
			'enable_features2' => '1',
			'features2_ttl' => __('Features', 'daddy-plus'),
			'features2_subttl' => __('Our <span class="color-primary">Featuress</span>', 'daddy-plus'),
			'features2_desc' => __('There are many variations words pulvinar dapibus passages dont available.', 'daddy-plus'),
			'features2_data' => daddy_plus_abiz_features_default(),	
			'features2_img' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/features2.jpg'),
			'features2_img_attach' => 'fixed',
			'features2_img_opacity' => '0.7',
			'features2_img_overlay_color' => '#000000',
			'enable_blog' => '1',
			'blog_ttl' => __('Our Blog', 'daddy-plus'),
			'blog_subttl' => __('Our <span class="text-primary">Blog</span>', 'daddy-plus'),
			'blog_desc' => __('There are many variations words pulvinar dapibus passages dont available.', 'daddy-plus'),
			'blog_num' => '3',
		);



		$abiz_default_options = apply_filters( 'abiz_modify_default_options', $abiz_default_options );

		if ( isset( $abiz_default_options[$option] ) ) {
			return $abiz_default_options[$option];
		}

		return false;
	}
endif;
