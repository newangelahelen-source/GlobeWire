<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function daddy_plus_abiz_customize_options($wp_customize)
{
    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';
	/*=========================================
    Slider Content
    =========================================*/
    $wp_customize->add_setting('slider_chead', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_text',
        'priority' => 4,
    ));

    $wp_customize->add_control('slider_chead', array(
        'type' => 'hidden',
        'label' => __('Slider Settings', 'daddy-plus') ,
        'section' => 'slider_section_set',
    ));
	
	// hide/show
    $wp_customize->add_setting('enable_slider', array(
        'default' => daddy_plus_abiz_get_default_option( 'enable_slider' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_checkbox',
		 'priority' => 5,
    ));

    $wp_customize->add_control(new Abiz_Customize_Toggle_Control($wp_customize, 'enable_slider', array(
        'label' => __('Enable / Disable ?', 'daddy-plus') ,
        'section' => 'slider_section_set',
    )));

    //slides
    $wp_customize->add_setting('slider', array(
        'sanitize_callback' => 'abiz_repeater_sanitize',
        'priority' => 5,
        'default' => daddy_plus_abiz_get_default_option( 'slider' ),
    ));

    $wp_customize->add_control(new Abiz_Repeater($wp_customize, 'slider', array(
        'label' => esc_html__('Slide', 'daddy-plus') ,
        'section' => 'slider_section_set',
        'add_field_label' => esc_html__('Add New Slider', 'daddy-plus') ,
        'item_name' => esc_html__('Slider', 'daddy-plus') ,

        'customizer_repeater_title_control' => true,
        'customizer_repeater_subtitle_control' => true,
        'customizer_repeater_subtitle2_control' => true,
        'customizer_repeater_text_control' => true,
        'customizer_repeater_text2_control' => true,
        'customizer_repeater_link_control' => true,
        'customizer_repeater_align_control' => true,
        'customizer_repeater_image_control' => true,
    )));

	// Upgrade
	$wp_customize->add_setting('abiz_slider_upgrade',array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'priority' => 5,
    ));
	
	$wp_customize->add_control(new Daddy_Plus_Customize_Upgrade_Control($wp_customize, 
			'abiz_slider_upgrade', 
			array(
				'label'      => __( 'Slider', 'daddy-plus' ),
				'section'    => 'slider_section_set'
			) 
		) 
	);
	
    // slider opacity	
	$wp_customize->add_setting('slider_opacity', array(
		'default' => daddy_plus_abiz_get_default_option( 'slider_opacity' ),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'abiz_sanitize_html',
		'priority' => 6,
	));
	$wp_customize->add_control('slider_opacity', array(
		'label' => __('Opacity', 'daddy-plus') ,
		'section' => 'slider_section_set',
		'type' => 'number',
	));

    // Opacity Color
    $wp_customize->add_setting('slider_overlay_clr', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => daddy_plus_abiz_get_default_option( 'slider_overlay_clr' ),
        'priority' => 6,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'slider_overlay_clr', array(
        'label' => __('Opacity Color', 'daddy-plus') ,
        'section' => 'slider_section_set',
    )));
	
	// Info content Section //
    $wp_customize->add_setting('info_content_head', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_text',
        'priority' => 1,
    ));

    $wp_customize->add_control('info_content_head', array(
        'type' => 'hidden',
        'label' => __('Info Settings', 'daddy-plus') ,
        'section' => 'info_section_set',
    ));
	
	// hide/show
    $wp_customize->add_setting('enable_info', array(
        'default' => daddy_plus_abiz_get_default_option( 'enable_info' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_checkbox',
		 'priority' => 2,
    ));

    $wp_customize->add_control(new Abiz_Customize_Toggle_Control($wp_customize, 'enable_info', array(
        'label' => __('Enable / Disable ?', 'daddy-plus') ,
        'section' => 'info_section_set',
    )));
	
    // Info
	$activate_theme_data = wp_get_theme(); // getting current theme data.
	$activate_theme      = $activate_theme_data->name;
	if ( 'Arvina' == $activate_theme  ||  'Quicksy' == $activate_theme) {
		$wp_customize->add_setting('info_data', array(
			'sanitize_callback' => 'abiz_repeater_sanitize',
			'transport' => $selective_refresh,
			'priority' => 2,
			'default' => daddy_plus_abiz_get_default_option( 'info_data' )
		));

		$wp_customize->add_control(new Abiz_Repeater($wp_customize, 'info_data', array(
			'label' => esc_html__('Information', 'daddy-plus') ,
			'section' => 'info_section_set',
			'add_field_label' => esc_html__('Add New Information', 'daddy-plus') ,
			'item_name' => esc_html__('Information', 'daddy-plus') ,
			'customizer_repeater_icon_control' => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_text_control' => true,
			'customizer_repeater_text2_control' => true,
			'customizer_repeater_link_control' => true
		)));
	}elseif('BizVita' == $activate_theme){
		$wp_customize->add_setting('info_data', array(
			'sanitize_callback' => 'abiz_repeater_sanitize',
			'transport' => $selective_refresh,
			'priority' => 2,
			'default' => daddy_plus_abiz_get_default_option( 'info_data' )
		));

		$wp_customize->add_control(new Abiz_Repeater($wp_customize, 'info_data', array(
			'label' => esc_html__('Information', 'daddy-plus') ,
			'section' => 'info_section_set',
			'add_field_label' => esc_html__('Add New Information', 'daddy-plus') ,
			'item_name' => esc_html__('Information', 'daddy-plus') ,
			'customizer_repeater_icon_control' => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_text_control' => true,
			'customizer_repeater_link_control' => true
		)));
	}else{
		$wp_customize->add_setting('info_data', array(
			'sanitize_callback' => 'abiz_repeater_sanitize',
			'transport' => $selective_refresh,
			'priority' => 2,
			'default' => daddy_plus_abiz_get_default_option( 'info_data' )
		));

		$wp_customize->add_control(new Abiz_Repeater($wp_customize, 'info_data', array(
			'label' => esc_html__('Information', 'daddy-plus') ,
			'section' => 'info_section_set',
			'add_field_label' => esc_html__('Add New Information', 'daddy-plus') ,
			'item_name' => esc_html__('Information', 'daddy-plus') ,
			'customizer_repeater_icon_control' => true,
			'customizer_repeater_image_control' => true,
			'customizer_repeater_title_control' => true,
			'customizer_repeater_text_control' => true,
			'customizer_repeater_text2_control' => true,
			'customizer_repeater_link_control' => true
		)));
	}
	
	// Upgrade
	$wp_customize->add_setting('abiz_info_upgrade',array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'priority' => 2,
    ));
	
	$wp_customize->add_control(new Daddy_Plus_Customize_Upgrade_Control($wp_customize, 
			'abiz_info_upgrade', 
			array(
				'label'      => __( 'Info', 'daddy-plus' ),
				'section'    => 'info_section_set',
			) 
		) 
	);	
	
	// Marquee  content Section //
	$wp_customize->add_setting('marquee_content_head', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'abiz_sanitize_text',
		'priority' => 1,
	));

	$wp_customize->add_control('marquee_content_head', array(
		'type' => 'hidden',
		'label' => __('Marquee  Settings', 'daddy-plus') ,
		'section' => 'marquee_section_set',
	));
	
	// hide/show
    $wp_customize->add_setting('enable_marquee', array(
        'default' => daddy_plus_abiz_get_default_option( 'enable_marquee' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_checkbox',
		 'priority' => 2,
    ));

    $wp_customize->add_control(new Abiz_Customize_Toggle_Control($wp_customize, 'enable_marquee', array(
        'label' => __('Enable / Disable ?', 'daddy-plus') ,
        'section' => 'marquee_section_set',
    )));
	
	// Marquee  Data
	$wp_customize->add_setting('marquee_data', array(
		'sanitize_callback' => 'abiz_repeater_sanitize',
		'priority' => 8,
		'default' => daddy_plus_abiz_get_default_option( 'marquee_data' ),
	));

	$wp_customize->add_control(new Abiz_Repeater($wp_customize, 'marquee_data', array(
		'label' => esc_html__('Marquee ', 'daddy-plus') ,
		'section' => 'marquee_section_set',
		'add_field_label' => esc_html__('Add New Marquee ', 'daddy-plus') ,
		'item_name' => esc_html__('Marquee', 'daddy-plus') ,
		'customizer_repeater_icon_control' => true,
		'customizer_repeater_title_control' => true,
		'customizer_repeater_link_control' => true
	)));
	
	 //  Head //
    $wp_customize->add_setting('service_head', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_text',
        'priority' => 1,
    ));

    $wp_customize->add_control('service_head', array(
        'type' => 'hidden',
        'label' => __('Service Settings', 'daddy-plus') ,
        'section' => 'service_section_set',
    ));
	
	// hide/show
    $wp_customize->add_setting('enable_service', array(
        'default' => daddy_plus_abiz_get_default_option( 'enable_service' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_checkbox',
		 'priority' => 2,
    ));

    $wp_customize->add_control(new Abiz_Customize_Toggle_Control($wp_customize, 'enable_service', array(
        'label' => __('Enable / Disable ?', 'daddy-plus') ,
        'section' => 'service_section_set',
    )));
	
    //  Title //
    $wp_customize->add_setting('service_ttl', array(
        'default' => daddy_plus_abiz_get_default_option( 'service_ttl' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 4,
    ));

    $wp_customize->add_control('service_ttl', array(
        'label' => __('Title', 'daddy-plus') ,
        'section' => 'service_section_set',
        'type' => 'text',
    ));

    // Subtitle //
    $wp_customize->add_setting('service_subttl', array(
        'default' => daddy_plus_abiz_get_default_option( 'service_subttl' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 5,
    ));

    $wp_customize->add_control('service_subttl', array(
        'label' => __('Subtitle', 'daddy-plus') ,
        'section' => 'service_section_set',
        'type' => 'textarea',
    ));

    // Description //
    $wp_customize->add_setting('service_desc', array(
        'default' => daddy_plus_abiz_get_default_option( 'service_desc' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 6,
    ));

    $wp_customize->add_control('service_desc', array(
        'label' => __('Description', 'daddy-plus') ,
        'section' => 'service_section_set',
        'type' => 'textarea',
    ));

    // Service Data
    $wp_customize->add_setting('service_data', array(
        'sanitize_callback' => 'abiz_repeater_sanitize',
        'transport' => $selective_refresh,
        'priority' => 8,
        'default' => daddy_plus_abiz_get_default_option( 'service_data' ),
    ));

    $wp_customize->add_control(new Abiz_Repeater($wp_customize, 'service_data', array(
        'label' => esc_html__('Service', 'daddy-plus') ,
        'section' => 'service_section_set',
        'add_field_label' => esc_html__('Add New Service', 'daddy-plus') ,
        'item_name' => esc_html__('Service', 'daddy-plus') ,
        'customizer_repeater_icon_control' => true,
        'customizer_repeater_image_control' => true,
        'customizer_repeater_title_control' => true,
        'customizer_repeater_text_control' => true,
        'customizer_repeater_text2_control' => true,
        'customizer_repeater_link_control' => true,
    )));
	
	// Upgrade
	$wp_customize->add_setting('abiz_service_upgrade',array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'priority' => 8,
    ));
	
	$wp_customize->add_control(new Daddy_Plus_Customize_Upgrade_Control($wp_customize, 
			'abiz_service_upgrade', 
			array(
				'label'      => __( 'Service', 'daddy-plus' ),
				'section'    => 'service_section_set',
			) 
		) 
	);
	
	
	//  Head //
    $wp_customize->add_setting('features2_head', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_text',
        'priority' => 1,
    ));

    $wp_customize->add_control('features2_head', array(
        'type' => 'hidden',
        'label' => __('Features Settings', 'daddy-plus') ,
        'section' => 'features2_section_set',
    ));

	// hide/show
    $wp_customize->add_setting('enable_features2', array(
        'default' => daddy_plus_abiz_get_default_option( 'enable_features2' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_checkbox',
		 'priority' => 2,
    ));

    $wp_customize->add_control(new Abiz_Customize_Toggle_Control($wp_customize, 'enable_features2', array(
        'label' => __('Enable / Disable ?', 'daddy-plus') ,
        'section' => 'features2_section_set',
    )));
	
    //  Title //
    $wp_customize->add_setting('features2_ttl', array(
        'default' => daddy_plus_abiz_get_default_option( 'features2_ttl' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 4,
    ));

    $wp_customize->add_control('features2_ttl', array(
        'label' => __('Title', 'daddy-plus') ,
        'section' => 'features2_section_set',
        'type' => 'text',
    ));

    // Subtitle //
    $wp_customize->add_setting('features2_subttl', array(
        'default' => daddy_plus_abiz_get_default_option( 'features2_subttl' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 5,
    ));

    $wp_customize->add_control('features2_subttl', array(
        'label' => __('Subtitle', 'daddy-plus') ,
        'section' => 'features2_section_set',
        'type' => 'textarea',
    ));

    // Description //
    $wp_customize->add_setting('features2_desc', array(
        'default' => daddy_plus_abiz_get_default_option( 'features2_desc' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 6,
    ));

    $wp_customize->add_control('features2_desc', array(
        'label' => __('Description', 'daddy-plus') ,
        'section' => 'features2_section_set',
        'type' => 'textarea',
    ));

    // Features Data
    $wp_customize->add_setting('features2_data', array(
        'sanitize_callback' => 'abiz_repeater_sanitize',
        'transport' => $selective_refresh,
        'priority' => 8,
        'default' => daddy_plus_abiz_get_default_option( 'features2_data' ),
    ));

    $wp_customize->add_control(new Abiz_Repeater($wp_customize, 'features2_data', array(
        'label' => esc_html__('Features', 'daddy-plus') ,
        'section' => 'features2_section_set',
        'add_field_label' => esc_html__('Add New Features', 'daddy-plus') ,
        'item_name' => esc_html__('Features', 'daddy-plus') ,
        'customizer_repeater_icon_control' => true,
        'customizer_repeater_title_control' => true,
        'customizer_repeater_subtitle_control' => true,
        'customizer_repeater_link_control' => true,
    )));
	
	// Upgrade
	$wp_customize->add_setting('abiz_features_upgrade',array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'priority' => 8,
    ));
	
	$wp_customize->add_control(new Daddy_Plus_Customize_Upgrade_Control($wp_customize, 
			'abiz_features_upgrade', 
			array(
				'label'      => __( 'Features', 'daddy-plus' ),
				'section'    => 'features2_section_set',
			) 
		) 
	);	
	
    //  Image //
    $wp_customize->add_setting('features2_img', array(
        'default' => daddy_plus_abiz_get_default_option( 'features2_img' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_url',
        'priority' => 11,
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'features2_img', array(
        'label' => esc_html__('Background Image', 'daddy-plus') ,
        'section' => 'features2_section_set',
    )));

    // Background Attachment //
    $wp_customize->add_setting('features2_img_attach', array(
        'default' => daddy_plus_abiz_get_default_option( 'features2_img_attach' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_select',
        'priority' => 12,
    ));

    $wp_customize->add_control('features2_img_attach', array(
        'label' => __('Background Attachment', 'daddy-plus') ,
        'section' => 'features2_section_set',
        'type' => 'select',
        'choices' => array(
            'scroll' => __('Scroll', 'daddy-plus') ,
            'fixed' => __('Fixed', 'daddy-plus')
        )
    ));

    // Image Opacity //	
	$wp_customize->add_setting('features2_img_opacity', array(
		'default' => daddy_plus_abiz_get_default_option( 'features2_img_opacity' ),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'abiz_sanitize_html',
		'priority' => 13,
	));
	$wp_customize->add_control('features2_img_opacity', array(
		'label' => __('Opacity', 'daddy-plus') ,
		'section' => 'features2_section_set',
		'type' => 'number',
	));

    $wp_customize->add_setting('features2_img_overlay_color', array(
        'default' => daddy_plus_abiz_get_default_option( 'features2_img_overlay_color' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'priority' => 14,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'features2_img_overlay_color', array(
        'label' => __('Overlay Color', 'daddy-plus') ,
        'section' => 'features2_section_set',
    )));
	
	// Blog Header Section //
    $wp_customize->add_setting('blog_headings', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_text',
        'priority' => 3,
    ));

    $wp_customize->add_control('blog_headings', array(
        'type' => 'hidden',
        'label' => __('Blog Settings', 'daddy-plus') ,
        'section' => 'blog_section_set',
    ));
	
	// hide/show
    $wp_customize->add_setting('enable_blog', array(
        'default' => daddy_plus_abiz_get_default_option( 'enable_blog' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_checkbox',
		 'priority' => 3,
    ));

    $wp_customize->add_control(new Abiz_Customize_Toggle_Control($wp_customize, 'enable_blog', array(
        'label' => __('Enable / Disable ?', 'daddy-plus') ,
        'section' => 'blog_section_set',
    )));
	
    // Blog Title //
    $wp_customize->add_setting('blog_ttl', array(
        'default' => daddy_plus_abiz_get_default_option( 'blog_ttl' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 4,
    ));

    $wp_customize->add_control('blog_ttl', array(
        'label' => __('Title', 'daddy-plus') ,
        'section' => 'blog_section_set',
        'type' => 'text',
    ));

    // Blog Subtitle //
    $wp_customize->add_setting('blog_subttl', array(
        'default' => daddy_plus_abiz_get_default_option( 'blog_subttl' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 5,
    ));

    $wp_customize->add_control('blog_subttl', array(
        'label' => __('Subtitle', 'daddy-plus') ,
        'section' => 'blog_section_set',
        'type' => 'textarea',
    ));

    // Blog Description //
    $wp_customize->add_setting('blog_desc', array(
        'default' => daddy_plus_abiz_get_default_option( 'blog_desc' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
        'transport' => $selective_refresh,
        'priority' => 6,
    ));

    $wp_customize->add_control('blog_desc', array(
        'label' => __('Description', 'daddy-plus') ,
        'section' => 'blog_section_set',
        'type' => 'textarea',
    ));
	
    // Blog Category
    $wp_customize->add_setting('blog_cat', array(
        'capability' => 'edit_theme_options',
        'priority' => 8,
    ));
    $wp_customize->add_control(new Abiz_Category_Dropdown_Custom_Control($wp_customize, 'blog_cat', array(
        'label' => __('Select category for Blog Section', 'daddy-plus') ,
        'section' => 'blog_section_set',
    )));

    // blog_num
	$wp_customize->add_setting('blog_num', array(
        'default' => daddy_plus_abiz_get_default_option( 'blog_num' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'abiz_sanitize_html',
    ));

    $wp_customize->add_control('blog_num', array(
        'label' => __('No. of Posts Display', 'daddy-plus') ,
        'section' => 'blog_section_set',
        'type' => 'number',
    ));	
}
add_action('customize_register', 'daddy_plus_abiz_customize_options');