<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$enable_info	= get_theme_mod('enable_info',daddy_plus_flixita_get_default_option( 'enable_info' ));
$info_data	= get_theme_mod('info_data',daddy_plus_flixita_get_default_option( 'info_data' ));
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
							$button = ! empty( $item->text2 ) ? apply_filters( 'flixita_translate_single_string', $item->text2, 'Information section' ) : '';
							$link = ! empty( $item->link ) ? apply_filters( 'flixita_translate_single_string', $item->link, 'Information section' ) : '';
							$icon = ! empty( $item->icon_value ) ? apply_filters( 'flixita_translate_single_string', $item->icon_value, 'Information section' ) : '';
							$image = ! empty( $item->image_url ) ? apply_filters( 'flixita_translate_single_string', $item->image_url, 'Information section' ) : '';
					?>
						<div class="col-lg-3 col-md-6 col-12">
							<aside class="info-inner">
								<?php if(!empty($image)): ?>
									<div class="feature-img">
										<img src="<?php echo esc_url($image); ?>" />
									</div>
								<?php endif; ?>	
								<div class="feature-content">
								
									<?php if(!empty($icon)): ?>
										<div class="feature-icon-box">
											<div class="feature-icon">
												<i class="fa <?php echo esc_attr($icon); ?>"></i>
											</div>	
										</div>	
									<?php endif; ?>
									
									<?php if(!empty($title)): ?>
										<h3 class="feature-box-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
									<?php endif; ?>
									
									<?php if(!empty($text)): ?>
										<div class="fbox-content"><?php echo esc_html($text); ?></div>
									<?php endif; ?>
									
									<?php if(!empty($button)): ?>
										<a href="<?php echo esc_url($link); ?>" class="more read-more">
											<span><?php echo esc_html($button); ?></span>
											<i class="fa fa-arrow-right"></i>
										</a>
									<?php endif; ?>	
									
								</div>
								<div class="feature-shape">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="108" height="70">
											<path d="M0 0 C3.5 0.625 3.5 0.625 6.4375 2.625 C9.0529952 6.42935665 9.0883031 9.19272679 8.5 13.625 C7.36900147 17.90057346 5.88670367 22.02808986 4.37890625 26.18359375 C3.95955307 27.36848892 3.54019989 28.55338409 3.10813904 29.77418518 C2.22358927 32.26669706 1.33470893 34.75704067 0.43725586 37.24487305 C-0.71455258 40.43789081 -1.8527718 43.63553234 -2.98599148 46.83518887 C-4.06846453 49.8903332 -5.15703804 52.94329072 -6.24609375 55.99609375 C-6.65653427 57.14702011 -7.06697479 58.29794647 -7.48985291 59.48374939 C-7.87017166 60.53897293 -8.25049042 61.59419647 -8.64233398 62.68139648 C-8.97764633 63.61435043 -9.31295868 64.54730438 -9.65843201 65.50852966 C-10.5 67.625 -10.5 67.625 -11.5 68.625 C-12.91570123 68.71151611 -14.335595 68.73204904 -15.75390625 68.72265625 C-16.60791016 68.71943359 -17.46191406 68.71621094 -18.34179688 68.71289062 C-19.23962891 68.70451172 -20.13746094 68.69613281 -21.0625 68.6875 C-21.96419922 68.68298828 -22.86589844 68.67847656 -23.79492188 68.67382812 C-26.03001314 68.66200225 -28.26497437 68.6455222 -30.5 68.625 C-25.27081515 52.63937734 -20.00001578 36.66151459 -14.32266235 20.82843018 C-13.86067897 19.53489288 -13.40355351 18.23960942 -12.95150757 16.94256592 C-12.31765713 15.12861563 -11.66312475 13.3219328 -11.0078125 11.515625 C-10.64316895 10.49500977 -10.27852539 9.47439453 -9.90283203 8.42285156 C-7.57914356 3.78841545 -5.17420041 0.92396436 0 0 Z " fill="var(--bs-primary)" transform="translate(96.5,1.375)"/>
											<path d="M0 0 C3.97245401 0.70936679 5.67231707 1.79731707 8.5 4.625 C10.72038808 9.06577616 9.4309883 13.22876151 7.93945312 17.71240234 C7.22973371 19.71537097 6.50973142 21.71471612 5.78125 23.7109375 C5.40391724 24.76785797 5.02658447 25.82477844 4.63781738 26.91372681 C3.43405868 30.27906804 2.21723376 33.63951217 1 37 C0.18012277 39.28484539 -0.63889769 41.56999842 -1.45703125 43.85546875 C-3.46144054 49.44892695 -5.477579 55.03803036 -7.5 60.625 C-13.77 60.625 -20.04 60.625 -26.5 60.625 C-24.24853729 50.49341782 -24.24853729 50.49341782 -22.88354492 46.56762695 C-22.57950241 45.68673904 -22.2754599 44.80585114 -21.96220398 43.89826965 C-21.63823135 42.97922348 -21.31425873 42.06017731 -20.98046875 41.11328125 C-20.64002029 40.1414238 -20.29957184 39.16956635 -19.94880676 38.16825867 C-19.23134276 36.12768563 -18.51097625 34.088131 -17.7878418 32.04956055 C-16.68854774 28.9404633 -15.60871142 25.82503012 -14.52929688 22.70898438 C-13.82670581 20.71833137 -13.12296855 18.72808246 -12.41796875 16.73828125 C-12.10006882 15.81316238 -11.78216888 14.88804352 -11.45463562 13.93489075 C-6.88375613 1.22924217 -6.88375613 1.22924217 0 0 Z " fill="var(--bs-primary)" transform="translate(64.5,9.375)"/>
											<path d="M0 0 C4.18392436 0.67241641 5.83120085 1.24671924 8.5 4.5625 C9.49947427 10.90054931 7.90616493 16.45340812 5.65625 22.31640625 C5.36770142 23.10272934 5.07915283 23.88905243 4.78186035 24.69920349 C3.8680975 27.17973239 2.93449945 29.65221893 2 32.125 C1.37236467 33.81786567 0.74604982 35.51122152 0.12109375 37.20507812 C-1.4017009 41.33116497 -2.95116529 45.44574841 -4.5 49.5625 C-10.77 49.5625 -17.04 49.5625 -23.5 49.5625 C-21.27361073 40.82584143 -18.47592754 32.38196928 -15.42138672 23.90820312 C-14.62053128 21.6750391 -13.83966577 19.43546027 -13.05859375 17.1953125 C-12.54288277 15.75737577 -12.02599715 14.31985966 -11.5078125 12.8828125 C-11.28054474 12.22129181 -11.05327698 11.55977112 -10.81912231 10.87820435 C-8.73986774 5.23446137 -6.17615634 0.99259655 0 0 Z " fill="var(--bs-primary)" transform="translate(32.5,20.4375)"/>
										</svg>
									</div>
							</aside>
						</div>
				   <?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>