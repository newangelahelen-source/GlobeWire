<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$enable_info	= get_theme_mod('enable_info',daddy_plus_flixita_get_default_option( 'enable_info' ));
$info_data	= get_theme_mod('info_data2',daddy_plus_flixita_get_default_option( 'info_data2' ));
if($enable_info=='1'):
?>	
<section id="info-section" class="info-section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow fadeInUp">
				<div class="row g-4 info-wrapper">
					<?php
						if ( ! empty( $info_data ) ) {
						$info_data = json_decode( $info_data );
						foreach ( $info_data as $i=>$item ) {
							$title = ! empty( $item->title ) ? apply_filters( 'flixita_translate_single_string', $item->title, 'Information section' ) : '';
							$text = ! empty( $item->text ) ? apply_filters( 'flixita_translate_single_string', $item->text, 'Information section' ) : '';
							$link = ! empty( $item->link ) ? apply_filters( 'flixita_translate_single_string', $item->link, 'Information section' ) : '';
							$icon = ! empty( $item->icon_value ) ? apply_filters( 'flixita_translate_single_string', $item->icon_value, 'Information section' ) : '';
					?>
						<div class="col-lg-4 col-md-6 col-12">
							<div class="info-inner">
								<div class="info-content">
									<div class="info_item_left">
										<?php if(!empty($icon)): ?>
											<div class="info-icon-img-wrap">
												<i class="fa <?php echo esc_attr($icon); ?>"></i>
											</div>
										<?php endif; ?>
									</div>	
									<div class="info_item_right">
										<?php if(!empty($title)): ?>
											<h4 class="info-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h4>
										<?php endif; ?>
										
										<?php if(!empty($text)): ?>
											<div class="info-excerpt">
												<p><?php echo esc_html($text); ?></p>
											</div>
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