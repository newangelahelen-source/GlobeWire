<?php 
$enable_features2 	= get_theme_mod('enable_features2',daddy_plus_abiz_get_default_option( 'enable_features2' ));
$features2_ttl		= get_theme_mod('features2_ttl',daddy_plus_abiz_get_default_option( 'features2_ttl' ));
$features2_subttl	= get_theme_mod('features2_subttl',daddy_plus_abiz_get_default_option( 'features2_subttl' ));
$features2_desc		= get_theme_mod('features2_desc',daddy_plus_abiz_get_default_option( 'features2_desc' ));
$features2_data		= get_theme_mod('features2_data',daddy_plus_abiz_get_default_option( 'features2_data' ));
if($enable_features2=='1'):
?>	
<section id="abiz-features-section-2" class="abiz-features-section-2 st-py-default">
	<div class="container">
		<?php abiz_section_header_white($features2_ttl,$features2_subttl,$features2_desc); ?>
		<div class="row">
			<div class="col-12 wow fadeInUp">
				<div class="row g-4 features-wrapper">
					<?php
						if ( ! empty( $features2_data ) ) {
						$features2_data = json_decode( $features2_data );
						foreach ( $features2_data as $i=>$item ) {
							$title = ! empty( $item->title ) ? apply_filters( 'abiz_translate_single_string', $item->title, 'Features section' ) : '';
							$subtitle = ! empty( $item->subtitle ) ? apply_filters( 'abiz_translate_single_string', $item->subtitle, 'Features section' ) : '';
							$link = ! empty( $item->link ) ? apply_filters( 'abiz_translate_single_string', $item->link, 'Features section' ) : '';
							$icon = ! empty( $item->icon_value ) ? apply_filters( 'abiz_translate_single_string', $item->icon_value, 'Features section' ) : '';
					?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-12">
							<div class="feature-single-item">
								<div class="shape-top">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40">
										<path d="M0 0 C5.05365292 -0.09897181 10.10674024 -0.17151603 15.16113281 -0.21972656 C16.87998279 -0.23982628 18.59876452 -0.26711089 20.31738281 -0.30175781 C22.78988489 -0.35035034 25.2614821 -0.37298435 27.734375 -0.390625 C28.88459137 -0.42159271 28.88459137 -0.42159271 30.05804443 -0.45318604 C33.3816931 -0.45457983 35.62457828 -0.22713602 38.4921875 1.5078125 C40.62581052 5.03437076 40.4981693 8.27116738 40.390625 12.265625 C40.38496521 13.05902283 40.37930542 13.85242065 40.37347412 14.66986084 C40.35113147 17.19719473 40.30094176 19.72309665 40.25 22.25 C40.22993214 23.96612532 40.21168187 25.68227292 40.1953125 27.3984375 C40.15127395 31.5995078 40.08226326 35.79951135 40 40 C34.78066785 35.63437815 29.90062363 31.04761468 25.09765625 26.23046875 C24.3750914 25.50886063 23.65252655 24.7872525 22.9080658 24.04377747 C21.39508309 22.53147082 19.88334464 21.01791842 18.37280273 19.50317383 C16.04850267 17.17347013 13.718852 14.84921149 11.38867188 12.52539062 C9.9163455 11.05240429 8.4443289 9.57910823 6.97265625 8.10546875 C6.27278091 7.40761765 5.57290558 6.70976654 4.8518219 5.99076843 C3.89468544 5.02890373 3.89468544 5.02890373 2.91821289 4.04760742 C2.35308487 3.48168381 1.78795685 2.91576019 1.20570374 2.33268738 C0 1 0 1 0 0 Z " fill="var(--bs-primary)" transform="translate(0,0)"/>
									</svg>
								</div>
								<div class="shape-bottom">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="40">
										<path d="M0 0 C5.21933215 4.36562185 10.09937637 8.95238532 14.90234375 13.76953125 C15.6249086 14.49113937 16.34747345 15.2127475 17.0919342 15.95622253 C18.60491691 17.46852918 20.11665536 18.98208158 21.62719727 20.49682617 C23.95149733 22.82652987 26.281148 25.15078851 28.61132812 27.47460938 C30.0836545 28.94759571 31.5556711 30.42089177 33.02734375 31.89453125 C33.72721909 32.59238235 34.42709442 33.29023346 35.1481781 34.00923157 C35.78626907 34.6504747 36.42436005 35.29171783 37.08178711 35.95239258 C37.92947914 36.801278 37.92947914 36.801278 38.79429626 37.66731262 C40 39 40 39 40 40 C34.94634708 40.09897181 29.89325976 40.17151603 24.83886719 40.21972656 C23.12001721 40.23982628 21.40123548 40.26711089 19.68261719 40.30175781 C17.21011511 40.35035034 14.7385179 40.37298435 12.265625 40.390625 C11.11540863 40.42159271 11.11540863 40.42159271 9.94195557 40.45318604 C6.6183069 40.45457983 4.37542172 40.22713602 1.5078125 38.4921875 C-0.62581052 34.96562924 -0.4981693 31.72883262 -0.390625 27.734375 C-0.38496521 26.94097717 -0.37930542 26.14757935 -0.37347412 25.33013916 C-0.35113147 22.80280527 -0.30094176 20.27690335 -0.25 17.75 C-0.22993214 16.03387468 -0.21168187 14.31772708 -0.1953125 12.6015625 C-0.15127395 8.4004922 -0.08226326 4.20048865 0 0 Z " fill="var(--bs-primary)" transform="translate(0,0)"/>
									</svg>
								</div>
								<?php if(!empty($icon)): ?>
									<div class="feature-icon-box"><i class="fa <?php echo esc_attr($icon); ?>"></i></div>
								<?php endif; ?>	
								<?php if(!empty($title)): ?>
									<h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h5>
								<?php endif; ?>
								<?php if(!empty($subtitle)): ?>
									<p><?php echo esc_html($subtitle); ?></p>
								<?php endif; ?>
								<div class="button-icon">
									<a href="<?php echo esc_url($link); ?>">
										<span class="bticn"><i class="fa fa-chevron-down"></i></span>
									</a>
								</div>
                            </div>					
						</div>
					<?php } }?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>	