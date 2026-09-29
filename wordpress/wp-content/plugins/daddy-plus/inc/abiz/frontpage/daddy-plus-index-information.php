<?php 
$enable_info 	= get_theme_mod('enable_info',daddy_plus_abiz_get_default_option( 'enable_info' ));
$info_data		= get_theme_mod('info_data',daddy_plus_abiz_get_default_option( 'info_data' ));
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
							$title = ! empty( $item->title ) ? apply_filters( 'abiz_translate_single_string', $item->title, 'Information section' ) : '';
							$text = ! empty( $item->text ) ? apply_filters( 'abiz_translate_single_string', $item->text, 'Information section' ) : '';
							$button = ! empty( $item->text2 ) ? apply_filters( 'abiz_translate_single_string', $item->text2, 'Information section' ) : '';
							$link = ! empty( $item->link ) ? apply_filters( 'abiz_translate_single_string', $item->link, 'Information section' ) : '';
							$icon = ! empty( $item->icon_value ) ? apply_filters( 'abiz_translate_single_string', $item->icon_value, 'Information section' ) : '';
							$image = ! empty( $item->image_url ) ? apply_filters( 'abiz_translate_single_string', $item->image_url, 'Information section' ) : '';
					?>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="info-box-inner">
								<div class="info-image-box">
									<div class="info-image">
										<div class="featured-img">
											<img loading="lazy" decoding="async" src="<?php echo esc_url($image); ?>"alt="">
										</div>
									</div>
								</div>
								<div class="content-box">
									<?php if(!empty($icon)): ?>
										<div class="info-box-icon">
											<i class="<?php echo esc_attr($icon); ?>"></i>
										</div>	
									<?php endif; ?>	
									<?php if(!empty($title)): ?>
										<h4 class="info-box-title">
											<a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
										</h4>
									<?php endif; ?>
									<?php if(!empty($text)): ?>
										<div class="info-content"><?php echo esc_html($text); ?></div>
									<?php endif; ?>
									<?php if(!empty($button)): ?>
										<div class="post-more">
											<a class="btn btn-primary btn-like-icon" href="<?php echo esc_url($link); ?>"><?php echo esc_html($button); ?><span class="bticn"><i class="fas fa-arrow-right"></i></span></a>
										</div>
									<?php endif; ?>
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