<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (!function_exists('daddy_plus_abiz_dynamic_style')):
    function daddy_plus_abiz_dynamic_style()
    {
        $output_style = '';

        // Slider Style
        $slider_opacity = get_theme_mod('slider_opacity', daddy_plus_abiz_get_default_option( 'slider_opacity' ));
        $slider_overlay_clr = get_theme_mod('slider_overlay_clr', daddy_plus_abiz_get_default_option( 'slider_overlay_clr' ));
        list($br, $bg, $bb) = sscanf($slider_overlay_clr, "#%02x%02x%02x");
        $output_style .= ".main-slider {
					    background: rgba($br, $bg, $bb, " . esc_attr($slider_opacity) . ");
				}\n";
       
       // Features
        $features2_img = get_theme_mod('features2_img', daddy_plus_abiz_get_default_option( 'features2_img' ));
        $features2_img_attach = get_theme_mod('features2_img_attach', daddy_plus_abiz_get_default_option( 'features2_img_attach' ));
        $features2_img_opacity = get_theme_mod('features2_img_opacity', daddy_plus_abiz_get_default_option( 'features2_img_opacity' ));
        $features2_img_overlay_color = get_theme_mod('features2_img_overlay_color', daddy_plus_abiz_get_default_option( 'features2_img_overlay_color' ));
        list($br, $bg, $bb) = sscanf($features2_img_overlay_color, "#%02x%02x%02x");
        $output_style .= ".abiz-features-section-2 {
								 background: url(" . esc_url($features2_img) . ") no-repeat " . esc_attr($features2_img_attach) . " center center / cover rgb($br $bg $bb / " . esc_attr($features2_img_opacity) . ");
								 background-blend-mode: multiply;
							}\n";				

        wp_add_inline_style('abiz-style', $output_style);
    }
endif;
add_action('wp_enqueue_scripts', 'daddy_plus_abiz_dynamic_style');


$activate_theme_data = wp_get_theme(); // getting current theme data.
$activate_theme      = $activate_theme_data->name;
/*
 *
 * Slider Default
*/
function daddy_plus_abiz_get_slider_default()
{
	return apply_filters('daddy_plus_abiz_get_slider_default', json_encode(array(
		array(
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/slider/slider01.jpg'),
			'title' => esc_html__("ABIZ! EASY STEP FOR BUSINESS", 'daddy-plus') ,
			'subtitle' => esc_html__('Improve Your Business Idea With', 'daddy-plus') ,
			'subtitle2' => esc_html__('Abiz', 'daddy-plus') ,
			'text' => esc_html__('We are experienced professionals who care about your success.', 'daddy-plus') ,
			'text2' => esc_html__('Learn More', 'daddy-plus') ,
			'link' => esc_html__('#', 'daddy-plus') ,
			"align" => "left",
			'id' => 'customizer_repeater_slider_001',
		) ,
		array(
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/slider/slider02.jpg'),
			'title' => esc_html__('ABIZ! BEST SERVICE PROVIDE', 'daddy-plus') ,
			'subtitle' => esc_html__('Fastest Way To Gain Business', 'daddy-plus') ,
			'subtitle2' => esc_html__('Success', 'daddy-plus') ,
			'text' => esc_html__('We are experienced professionals who care about your success.', 'daddy-plus') ,
			'text2' => esc_html__('Learn More', 'daddy-plus') ,
			'link' => esc_html__('#', 'daddy-plus') ,
			"align" => "center",
			'id' => 'customizer_repeater_slider_002',
		) ,
		array(
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/slider/slider03.jpg'),
			'title' => esc_html__('ABIZ! BUSINESS MAKE EASY', 'daddy-plus') ,
			'subtitle' => esc_html__('The Right Candidate For Your', 'daddy-plus') ,
			'subtitle2' => esc_html__('Business', 'daddy-plus') ,
			'text' => esc_html__('We are experienced professionals who care about your success.', 'daddy-plus') ,
			'text2' => esc_html__('Learn More', 'daddy-plus') ,
			'link' => esc_html__('#', 'daddy-plus') ,
			"align" => "right",
			'id' => 'customizer_repeater_slider_003',
		)
	)));
}

/*
 *
 * Info Section
*/

if ( 'BizVita' == $activate_theme ) {
function daddy_plus_abiz_info_default()
{
	return apply_filters('daddy_plus_abiz_info_default', json_encode(array(
		array(
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service01.jpg'),
			'icon_value' => 'fas fa-user',
			'title' => esc_html__('Expert Work', 'daddy-plus') ,
			'text' => esc_html__('There are many variations words passages.', 'daddy-plus') ,
			'text2' => esc_html__('Read More', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_info_001'
		),
		array(
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service02.jpg'),
			'icon_value' => 'fas fa-signal',
			'title' => esc_html__('Networking', 'daddy-plus') ,
			'text' => esc_html__('There are many variations words passages.', 'daddy-plus') ,
			'text2' => esc_html__('Read More', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_info_002'
		),
		array(
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service03.jpg'),
			'icon_value' => 'fas fa-pencil-square',
			'title' => esc_html__('Creative Design', 'daddy-plus') ,
			'text' => esc_html__('There are many variations words passages.', 'daddy-plus') ,
			'text2' => esc_html__('Read More', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_info_003'
		)
	)));
}
}else{
	function daddy_plus_abiz_info_default()
	{
		return apply_filters('daddy_plus_abiz_info_default', json_encode(array(
			array(
				'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service01.jpg'),
				'icon_value' => 'fas fa-user',
				'title' => esc_html__('Expert Work', 'daddy-plus') ,
				'text' => esc_html__('There are many variations words passages.', 'daddy-plus') ,
				'text2' => esc_html__('Read More', 'daddy-plus') ,
				'link' => '#',
				'id' => 'customizer_repeater_info_001'
			),
			array(
				'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service02.jpg'),
				'icon_value' => 'fas fa-signal',
				'title' => esc_html__('Networking', 'daddy-plus') ,
				'text' => esc_html__('There are many variations words passages.', 'daddy-plus') ,
				'text2' => esc_html__('Read More', 'daddy-plus') ,
				'link' => '#',
				'id' => 'customizer_repeater_info_002'
			),
			array(
				'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service03.jpg'),
				'icon_value' => 'fas fa-pencil-square',
				'title' => esc_html__('Creative Design', 'daddy-plus') ,
				'text' => esc_html__('There are many variations words passages.', 'daddy-plus') ,
				'text2' => esc_html__('Read More', 'daddy-plus') ,
				'link' => '#',
				'id' => 'customizer_repeater_info_003'
			),
			array(
				'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service04.jpg'),
				'icon_value' => 'fas fa-mobile-phone',
				'title' => esc_html__('Mobility', 'daddy-plus') ,
				'text' => esc_html__('There are many variations words passages.', 'daddy-plus') ,
				'text2' => esc_html__('Read More', 'daddy-plus') ,
				'link' => '#',
				'id' => 'customizer_repeater_info_004'
			)
		)));
	}
}
/*
 *
 * Service Section
*/
function daddy_plus_abiz_service_default()
{
	return apply_filters('daddy_plus_abiz_service_default', json_encode(array(
		array(
			'icon_value' => 'far fa-face-smile',
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service01.jpg'),
			'title' => esc_html__('Customer Services', 'daddy-plus') ,
			'text' => esc_html__('Lorem Ipsum is simply dummy text of the printing.', 'daddy-plus') ,
			'text2' => esc_html__('Read More', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_service_001'
		),
		array(
			'icon_value' => 'fas fa-lock',
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service02.jpg'),
			'title' => esc_html__('Cyber Security', 'daddy-plus') ,
			'text' => esc_html__('Lorem Ipsum is simply dummy text of the printing.', 'daddy-plus') ,
			'text2' => esc_html__('Read More', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_service_002'
		),
		array(
			'icon_value' => 'fas fa-cloud',
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service03.jpg'),
			'title' => esc_html__('Cloud Computing', 'daddy-plus') ,
			'text' => esc_html__('Lorem Ipsum is simply dummy text of the printing.', 'daddy-plus') ,
			'text2' => esc_html__('Read More', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_service_003'
		),
		array(
			'icon_value' => 'fas fa-laptop',
			'image_url' => esc_url(daddy_plus_plugin_url . '/inc/abiz/images/service/service04.jpg'),
			'title' => esc_html__('IT Management', 'daddy-plus') ,
			'text' => esc_html__('Lorem Ipsum is simply dummy text of the printing.', 'daddy-plus') ,
			'text2' => esc_html__('Read More', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_service_004'
		)
	)));
}

   
/*
 *
 * Features Section
*/
function daddy_plus_abiz_features_default()
{
	return apply_filters('daddy_plus_abiz_features_default', json_encode(array(
		array(
			'icon_value' => 'fas fa-paintbrush',
			'title' => esc_html__('Clean Design', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_001'
		) ,
		array(
			'icon_value' => 'fas fa-face-smile',
			'title' => esc_html__('Lifestyle', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_002'
		) ,
		array(
			'icon_value' => 'fas fa-users',
			'title' => esc_html__('Business', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_003'
		) ,
		array(
			'icon_value' => 'fas fa-tv',
			'title' => esc_html__('Marketing', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_004'
		) ,
		array(
			'icon_value' => 'fas fa-list-alt',
			'title' => esc_html__('Blog', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_005'
		) ,
		array(
			'icon_value' => 'fas fa-stethoscope',
			'title' => esc_html__('Newspaper', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_006'
		) ,
		array(
			'icon_value' => 'fas fa-shopping-bag',
			'title' => esc_html__('Shopping', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_007'
		) ,
		array(
			'icon_value' => 'fas fa-magnet',
			'title' => esc_html__('Responsive', 'daddy-plus') ,
			'subtitle' => esc_html__('There are many variations words pulvinar dapibus passages.', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_features_008'
		)
	)));
}

	
/*
 *
 * Marquee Section
*/
function daddy_plus_abiz_marquee_default()
{
	return apply_filters('daddy_plus_abiz_marquee_default', json_encode(array(
		array(
			'icon_value' => 'far fa-play',
			'title' => esc_html__('New Update :</span> A free consultation for Future', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_marquee_001'
		) ,
		array(
			'icon_value' => 'far fa-play',
			'title' => esc_html__('News Now :</span> A free consultation for Development', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_marquee_002'
		) ,
		array(
			'icon_value' => 'far fa-play',
			'title' => esc_html__('Get Now :</span> A free consultation for design', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_marquee_003'
		) ,
		array(
			'icon_value' => 'far fa-play',
			'title' => esc_html__('Looks Now :</span> A free Development Course', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_marquee_004'
		) ,
		array(
		   'icon_value' => 'far fa-play',
			'title' => esc_html__('Get Now :</span> A free consultation for Research', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_marquee_005'
		) ,
		array(
			'icon_value' => 'far fa-play',
			'title' => esc_html__('Book Now :</span> A free consultation for Future', 'daddy-plus') ,
			'link' => '#',
			'id' => 'customizer_repeater_marquee_006'
		) ,
	)));
}