<?php  
$enable_blog = get_theme_mod('enable_blog',daddy_plus_abiz_get_default_option( 'enable_blog' ));
$blog_ttl	= get_theme_mod('blog_ttl',daddy_plus_abiz_get_default_option( 'blog_ttl' ));
$blog_subttl= get_theme_mod('blog_subttl',daddy_plus_abiz_get_default_option( 'blog_subttl' ));
$blog_desc	= get_theme_mod('blog_desc',daddy_plus_abiz_get_default_option( 'blog_desc' ));
$blog_cat	= get_theme_mod('blog_cat');
$blog_num	= get_theme_mod('blog_num',daddy_plus_abiz_get_default_option( 'blog_num' ));
if($enable_blog=='1'):
?>
<section id="abiz-blog-section" class="blog-section st-py-default abiz-blog-main">
	<div class="container">
		<?php abiz_section_header($blog_ttl,$blog_subttl,$blog_desc); ?>
		<div class="row">
			<div class="col-12 wow fadeInUp">
				<div class="row g-4 blog-wrapper">
					<?php 
						$abiz_post_args = array( 'post_type' => 'post', 'category__in' => $blog_cat, 'posts_per_page' => $blog_num,'post__not_in'=>get_option("sticky_posts")) ; 	
						
						$abiz_wp_query = new WP_Query($abiz_post_args);
						if($abiz_wp_query)
						{	
						$i = 0;
						while($abiz_wp_query->have_posts()):$abiz_wp_query->the_post();
					?>
					<div class="col-lg-4 col-md-6 col-12">
						<?php get_template_part('template-parts/content','page');  ?>
					</div>
					<?php endwhile; } wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>