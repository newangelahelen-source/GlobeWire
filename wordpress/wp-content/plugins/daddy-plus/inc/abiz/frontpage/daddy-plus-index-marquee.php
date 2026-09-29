<?php 
$enable_marquee 	= get_theme_mod('enable_marquee',daddy_plus_abiz_get_default_option( 'enable_marquee' ));
$marquee_data= get_theme_mod('marquee_data',daddy_plus_abiz_get_default_option( 'marquee_data' ));
if($enable_marquee=='1'):
if ( ! empty( $marquee_data ) ) {
$allowed_html = array(
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'span' => array(),
	'b'      => array(),
	'i'      => array(),
	);
$marquee_data = json_decode( $marquee_data );
?>
<section id="abiz-marquee-section" class="abiz-marquee-section st-py-default">
	<div class="marquee-inner">
		<div class="marquee-wrapper">
			<div class="marquee-inner-content">
				<?php if(is_rtl()){ ?>
				<div class="marquee-list marquee" data-direction='right' dir="ltr">
				<?php } else { ?> 
				<div class="marquee-list marquee">
				<?php } ?> 
					<div class="marquee-title">
						<?php
							foreach ( $marquee_data as $i=>$item ) {
								$icon = ! empty( $item->icon_value ) ? apply_filters( 'abiz_translate_single_string', $item->icon_value, 'Marquee section' ) : '';
								$link = ! empty( $item->link ) ? apply_filters( 'abiz_translate_single_string', $item->link, 'Marquee section' ) : '';
								$title = ! empty( $item->title ) ? apply_filters( 'abiz_translate_single_string', $item->title, 'Marquee section' ) : '';
						?>
							<a href="<?php echo esc_url($link); ?>">
								<?php if(!empty($icon)): ?>
									<i class="<?php echo esc_attr($icon); ?>"></i>
								<?php endif; ?>	
								<span class="marqueee-color-txt"><?php echo wp_kses( html_entity_decode( $title ), $allowed_html ); ?>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } endif; ?>