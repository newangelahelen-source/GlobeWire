<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @package daddy-plus
 */

// Customizer Options.
require daddy_plus_plugin_dir . 'inc/abiz/theme-settings/abiz-customizer-options.php';
require daddy_plus_plugin_dir . 'inc/abiz/theme-settings/abiz-panels-and-sections.php';
require daddy_plus_plugin_dir . 'inc/abiz/theme-settings/abiz-selective-refresh-and-partial.php';
require daddy_plus_plugin_dir . 'inc/abiz/theme-settings/abiz-default-options.php';
// require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-main-header.php';
// require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-footer.php';
require daddy_plus_plugin_dir . 'inc/abiz/core.php';

// Frontpage Sections.
if ( ! function_exists( 'daddy_plus_abiz_frontpage_sections' ) ) :
	function daddy_plus_abiz_frontpage_sections() {
		require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-index-slider.php';
		require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-index-information.php';
		require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-index-marquee.php';
		require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-index-service.php';
		require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-index-features-2.php';
		require daddy_plus_plugin_dir . 'inc/abiz/frontpage/daddy-plus-index-blog.php';
	}
	add_action( 'daddy_plus_abiz_frontpage', 'daddy_plus_abiz_frontpage_sections' );
endif;
