<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$enable_service		= get_theme_mod('enable_service',daddy_plus_flixita_get_default_option( 'enable_service' ));
$service_ttl		= get_theme_mod('service_ttl',daddy_plus_flixita_get_default_option( 'service_ttl' ));
$service_subttl		= get_theme_mod('service_subttl',daddy_plus_flixita_get_default_option( 'service_subttl' ));
$service_desc		= get_theme_mod('service_desc',daddy_plus_flixita_get_default_option( 'service_desc' ));
$service_data		= get_theme_mod('service_data',daddy_plus_flixita_get_default_option( 'service_data' ));
if($enable_service=='1'):
?>	
<section id="service-section" class="service-section st-py-default">
	<div class="container">
		<?php flixita_section_header($service_ttl,$service_subttl,$service_desc); ?>
		<div class="row">
			<div class="col-12 wow fadeInUp">
				<div class="row g-4 service-wrapper">
					<?php
						if ( ! empty( $service_data ) ) {
						$service_data = json_decode( $service_data );
						foreach ( $service_data as $i=>$item ) {
							$title = ! empty( $item->title ) ? apply_filters( 'flixita_translate_single_string', $item->title, 'Service section' ) : '';
							$text = ! empty( $item->text ) ? apply_filters( 'flixita_translate_single_string', $item->text, 'Service section' ) : '';
							$button = ! empty( $item->text2 ) ? apply_filters( 'flixita_translate_single_string', $item->text2, 'Service section' ) : '';
							$link = ! empty( $item->link ) ? apply_filters( 'flixita_translate_single_string', $item->link, 'Service section' ) : '';
							$icon = ! empty( $item->icon_value ) ? apply_filters( 'flixita_translate_single_string', $item->icon_value, 'Service section' ) : '';
							$image = ! empty( $item->image_url ) ? apply_filters( 'flixita_translate_single_string', $item->image_url, 'Service section' ) : '';
					?>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="service-inner">
								<div class="service-front">
									<div class="service-content" background-image" style="background-image: url(<?php echo esc_url(daddy_plus_plugin_url . '/inc/arvity/images/service-shape.png'); ?>);">					
										<?php if(!empty($icon)): ?>
											<div class="service-icon">
												<i class="fa <?php echo esc_attr($icon); ?>"></i>
											</div>
										<?php endif; ?>
								
										<?php if(!empty($title)): ?>
											<h3 class="service-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
										<?php endif; ?>
										
										<?php if(!empty($text)): ?>
											<div class="service-excerpt">
												<p><?php echo esc_html($text); ?></p>
											</div>
										<?php endif; ?>
										
										<?php if(!empty($link)): ?>
											<a class="service-link" href="<?php echo esc_url($link); ?>">
												<svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M2.65909 11.52L0.871094 9.732L4.96309 5.76L0.871094 1.788L2.65909 0L8.43109 5.76L2.65909 11.52Z" fill="#071A3E"></path>
												</svg>
											</a>
										<?php endif; ?>	
									</a>
									</div>
									<div class="service-img">
										<img src="<?php echo esc_url($image); ?>">
									</div>
								</div>
								<div class="service-back" background-image" style="background-image: url(<?php echo esc_url($image); ?>);">
									<div class="service-content">
										<?php if(!empty($icon)): ?>
											<div class="service-icon">
												<i class="fa <?php echo esc_attr($icon); ?>"></i>
												<svg class="shape" xmlns="http://www.w3.org/2000/svg" width="119" height="117" viewBox="0 0 119 117" fill="none"><path opacity="0.2" d="M96.8711 0H90.6716L0.871094 117H7.07058L96.8711 0Z" fill="#F4F8FB"/><path opacity="0.2" d="M22.8711 0H29.0706L118.871 117H112.672L22.8711 0Z" fill="#F4F8FB"/><path opacity="0.2" d="M107.871 0H101.672L11.8711 117H18.0706L107.871 0Z" fill="#F4F8FB"/><path opacity="0.2" d="M11.8711 0H18.0706L107.871 117H101.672L11.8711 0Z" fill="#F4F8FB"/><path opacity="0.2" d="M118.871 0H112.672L22.8711 117H29.0706L118.871 0Z" fill="#F4F8FB"/><path opacity="0.2" d="M0.871094 0H7.07058L96.8711 117H90.6716L0.871094 0Z" fill="#F4F8FB"/></svg>
											</div>
										<?php endif; ?>
										
										<?php if(!empty($title)): ?>
											<h3 class="service-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
										<?php endif; ?>
										
										<?php if(!empty($text)): ?>
											<div class="service-excerpt">
												<p><?php echo esc_html($text); ?></p>
											</div>
										<?php endif; ?>
										
										<div class="service-divider"><span></span></div>
										<?php if(!empty($button)): ?>
											<a href="<?php echo esc_url($link); ?>" class="btn btn-primary"><?php echo esc_html($button); ?></a>
										<?php endif; ?>	
									</div>
								</div>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>