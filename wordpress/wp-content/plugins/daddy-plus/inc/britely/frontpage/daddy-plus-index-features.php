<?php 
	do_action('flixita_b_features_section_trigger');
	$features_ttl		= get_theme_mod('features_ttl',daddy_plus_flixita_get_default_option( 'features_ttl' ));
	$features_subttl	= get_theme_mod('features_subttl',daddy_plus_flixita_get_default_option( 'features_subttl' ));
	$features_desc		= get_theme_mod('features_desc',daddy_plus_flixita_get_default_option( 'features_desc' ));
	$features_data		= get_theme_mod('features_data',daddy_plus_flixita_get_default_option( 'features_data' ));
?>	
<section id="flixita-features-section" class="flixita-features-section st-py-default">
	<div class="container">
		<?php flixita_section_header_white($features_ttl,$features_subttl,$features_desc); ?>
		<div class="row">
			<div class="col-12 wow fadeInUp">
				<div class="row g-4 features-wrapper">
					<?php
						if ( ! empty( $features_data ) ) {
						$features_data = json_decode( $features_data );
						foreach ( $features_data as $i=>$item ) {
							$title = ! empty( $item->title ) ? apply_filters( 'flixita_translate_single_string', $item->title, 'Features section' ) : '';
							$subtitle = ! empty( $item->subtitle ) ? apply_filters( 'flixita_translate_single_string', $item->subtitle, 'Features section' ) : '';
							$text = ! empty( $item->text ) ? apply_filters( 'flixita_translate_single_string', $item->text, 'Features section' ) : '';
							$link = ! empty( $item->link ) ? apply_filters( 'flixita_translate_single_string', $item->link, 'Features section' ) : '';
							$icon = ! empty( $item->icon_value ) ? apply_filters( 'flixita_translate_single_string', $item->icon_value, 'Features section' ) : '';
							$image = ! empty( $item->image_url ) ? apply_filters( 'flixita_translate_single_string', $item->image_url, 'Features section' ) : '';
					?>
						<div class="col-lg-2 col-md-3 col-sm-6 col-12">
							<div class="features-wrap text-center">
								<a href="<?php echo esc_url($link); ?>" class="fx-feature-wrap">
								
									<?php if(!empty($title)): ?>
										<div class="fx-feature-city"><?php echo esc_html($title); ?></div>
									<?php endif; ?>
									
									<?php if(!empty($image)): ?>
										<div class="fx-feature-icon mb-3"><img src="<?php echo esc_url($image); ?>"></div>
									<?php else: ?>	
										<div class="fx-feature-icon mb-3"><i class="fa <?php echo esc_attr($icon); ?>"></i></div>
									<?php endif; ?>	
									<div class="fx-feature-caption">
										<?php if(!empty($subtitle)): ?>
											<h4 class="mb-2"><?php echo esc_html($subtitle); ?></h4>
										<?php endif; ?>
										
										<?php if(!empty($text)): ?>
											<span class="text-muted"><?php echo esc_html($text); ?></span>
										<?php endif; ?>	
									</div>
								</a>
							</div>
						</div>
					<?php } }?>
				</div>
			</div>
		</div>
	</div>
	<!-- BG animation-->
	<div class="stars"></div>
	<div class="stars2"></div>
	<div class="stars3"></div>	
</section>
<?php do_action('flixita_a_features_section_trigger'); ?>