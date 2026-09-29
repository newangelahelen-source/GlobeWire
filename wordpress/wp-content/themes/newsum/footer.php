<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package NewSum
 */

$show_brand      = get_theme_mod( 'newsum_footer_show_brand', true );
$footer_tagline  = get_theme_mod( 'newsum_footer_tagline', __( 'The high-contrast, premium aesthetic standard for modern tech journalism. Delivering uncompromising truth in the age of algorithms.', 'newsum' ) );
$col1_title      = get_theme_mod( 'newsum_footer_col1_title', __( 'Trending', 'newsum' ) );
$col2_title      = get_theme_mod( 'newsum_footer_col2_title', __( 'Coverage', 'newsum' ) );
$col3_title      = get_theme_mod( 'newsum_footer_col3_title', __( 'Company', 'newsum' ) );
$col4_title      = get_theme_mod( 'newsum_footer_col4_title', __( 'Terminal Dispatch', 'newsum' ) );
$gallery_title   = get_theme_mod( 'newsum_footer_gallery_title', __( 'Tech Gallery', 'newsum' ) );
$copyright_raw   = get_theme_mod( 'newsum_footer_copyright', __( '© {year} NewSum Media, LLC. All rights reserved.', 'newsum' ) );
$show_back_to_top = get_theme_mod( 'newsum_footer_back_to_top', true );

// Dynamic tokens in copyright
$copyright = str_replace(
    array( '{year}', '{site}' ),
    array( date( 'Y' ), get_bloginfo( 'name' ) ),
    $copyright_raw
);

// Fallback images for footer trending
$trending_fallbacks = array(
    array(
        'title' => __( 'TSMC announces breakthrough in 2nm fabrication', 'newsum' ),
        'img'   => newsum_get_default_fallback_image( 0 ),
        'time'  => '4h ago',
    ),
    array(
        'title' => __( 'The real cost of enterprise cloud repatriation', 'newsum' ),
        'img'   => newsum_get_default_fallback_image( 1 ),
        'time'  => '6h ago',
    ),
    array(
        'title' => __( 'GitHub Copilot X adoption surges across engineering teams', 'newsum' ),
        'img'   => newsum_get_default_fallback_image( 2 ),
        'time'  => '8h ago',
    ),
);

// Query 3 trending/recent posts
$footer_query = new WP_Query( array(
    'posts_per_page'      => 3,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
) );
$footer_posts = $footer_query->posts;

// Query categories
$footer_categories = get_categories( array(
    'orderby'    => 'count',
    'order'      => 'DESC',
    'number'     => 5,
    'hide_empty' => false,
) );

// Gallery images (Dynamic query for latest post thumbnails)
$gallery_query = new WP_Query( array(
    'posts_per_page'      => 6,
    'post_status'         => 'publish',
    'meta_key'            => '_thumbnail_id',
    'ignore_sticky_posts' => 1,
) );
$footer_gallery_images = array();
if ( $gallery_query->have_posts() ) {
    while ( $gallery_query->have_posts() ) {
        $gallery_query->the_post();
        $footer_gallery_images[] = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
    }
    wp_reset_postdata();
}
while ( count( $footer_gallery_images ) < 6 ) {
    $footer_gallery_images[] = newsum_get_default_fallback_image( count( $footer_gallery_images ) );
}
?>

    <?php do_action( 'newsum_before_footer' ); ?>

    <footer class="site-footer" id="siteFooterWrap">
        <div class="footer-inner">
            
            <?php if ( $show_brand ) : ?>
            <div class="footer-massive-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-logo massive">
                    <?php bloginfo( 'name' ); ?><span>.</span>
                </a>
                <?php if ( ! empty( $footer_tagline ) ) : ?>
                    <p class="footer-tagline"><?php echo esc_html( $footer_tagline ); ?></p>
                <?php endif; ?>
                <div class="footer-edition-badge">
                    <span class="badge-dot">●</span>
                    <span class="badge-edition"><?php echo esc_html( date( 'Y.m' ) ); ?> <?php esc_html_e( 'EDITION', 'newsum' ); ?></span>
                    <span class="badge-sep">•</span>
                    <span class="badge-intel"><?php esc_html_e( 'HIGH-PRECISION TECH INTELLIGENCE', 'newsum' ); ?></span>
                </div>
            </div>
            <?php endif; ?>

            <div class="footer-grid">
                
                <!-- 1. TRENDING STORIES -->
                <div class="footer-col footer-col-trending">
                    <h4><?php echo esc_html( $col1_title ); ?></h4>
                    <div class="footer-mini-feed">
                        <?php
                        if ( ! empty( $footer_posts ) ) {
                            foreach ( $footer_posts as $f_idx => $f_post ) {
                                $fp_id    = $f_post->ID;
                                $fp_title = get_the_title( $fp_id );
                                $fp_link  = get_permalink( $fp_id );
                                $fp_img   = has_post_thumbnail( $fp_id ) ? get_the_post_thumbnail_url( $fp_id, 'thumbnail' ) : '';
                                if ( empty( $fp_img ) && isset( $trending_fallbacks[ $f_idx ] ) ) {
                                    $fp_img = $trending_fallbacks[ $f_idx ]['img'];
                                }
                                $fp_date = get_the_date( 'd M', $fp_id );
                                ?>
                                <a href="<?php echo esc_url( $fp_link ); ?>" class="footer-mini-item">
                                    <div class="footer-mini-thumb">
                                        <img src="<?php echo esc_url( $fp_img ); ?>" alt="<?php echo esc_attr( $fp_title ); ?>" loading="lazy">
                                    </div>
                                    <div class="footer-mini-info">
                                        <span class="footer-mini-title"><?php echo esc_html( $fp_title ); ?></span>
                                        <span class="footer-mini-date"><?php echo esc_html( $fp_date ); ?></span>
                                    </div>
                                </a>
                                <?php
                            }
                        } else {
                            foreach ( $trending_fallbacks as $fb ) {
                                ?>
                                <a href="#" class="footer-mini-item">
                                    <div class="footer-mini-thumb">
                                        <img src="<?php echo esc_url( $fb['img'] ); ?>" alt="<?php echo esc_attr( $fb['title'] ); ?>" loading="lazy">
                                    </div>
                                    <div class="footer-mini-info">
                                        <span class="footer-mini-title"><?php echo esc_html( $fb['title'] ); ?></span>
                                        <span class="footer-mini-date"><?php echo esc_html( $fb['time'] ); ?></span>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                
                <!-- 2. COVERAGE / CATEGORIES -->
                <div class="footer-col footer-col-coverage">
                    <h4><?php echo esc_html( $col2_title ); ?></h4>
                    <ul class="footer-cat-list">
                        <?php
                        if ( ! empty( $footer_categories ) ) {
                            foreach ( $footer_categories as $cat ) {
                                ?>
                                <li>
                                    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
                                        <span class="cat-name"><?php echo esc_html( $cat->name ); ?></span>
                                        <span class="cat-count"><?php echo esc_html( $cat->count ); ?></span>
                                    </a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li><a href="#"><span class="cat-name">AI & Data</span><span class="cat-count">42</span></a></li>
                            <li><a href="#"><span class="cat-name">Cybersecurity</span><span class="cat-count">18</span></a></li>
                            <li><a href="#"><span class="cat-name">Startups</span><span class="cat-count">31</span></a></li>
                            <li><a href="#"><span class="cat-name">Hardware</span><span class="cat-count">25</span></a></li>
                            <li><a href="#"><span class="cat-name">Quantum</span><span class="cat-count">12</span></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <!-- 3. COMPANY & SOCIALS -->
                <div class="footer-col footer-col-company">
                    <h4><?php echo esc_html( $col3_title ); ?></h4>
                    <ul class="footer-links-list">
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About NewSum', 'newsum' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/masthead/' ) ); ?>"><?php esc_html_e( 'Editorial Masthead', 'newsum' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Pitch a Dispatch', 'newsum' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy & Security', 'newsum' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'newsum' ); ?></a></li>
                    </ul>

                    <div class="footer-social-deck">
                        <a href="#" class="social-icon-btn" aria-label="X / Twitter">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                        </a>
                        <a href="#" class="social-icon-btn" aria-label="GitHub">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                        </a>
                        <a href="#" class="social-icon-btn" aria-label="Discord">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M20.317 4.37a19.791 19.791 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.736 19.736 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028c.462-.63.874-1.295 1.226-1.994.021-.041.001-.09-.041-.106a13.107 13.107 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.292.074.074 0 01.077-.01c3.929 1.793 8.18 1.793 12.061 0a.074.074 0 01.078.01c.12.098.246.198.373.292a.077.077 0 01-.006.127 12.299 12.299 0 01-1.873.894.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.839 19.839 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.028zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/></svg>
                        </a>
                        <a href="#" class="social-icon-btn" aria-label="YouTube">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M21.582 6.186a2.593 2.593 0 0 0-1.825-1.84C18.146 3.9 12 3.9 12 3.9s-6.146 0-7.757.446a2.593 2.593 0 0 0-1.825 1.84C2 7.828 2 12 2 12s0 4.172.418 5.814a2.593 2.593 0 0 0 1.825 1.84C5.854 20.1 12 20.1 12 20.1s6.146 0 7.757-.446a2.593 2.593 0 0 0 1.825-1.84C22 16.172 22 12 22 12s0-4.172-.418-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <a href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="RSS Feed">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 11a9 9 0 0 1 9 9"></path><path d="M4 4a16 16 0 0 1 16 16"></path><circle cx="5" cy="19" r="1"></circle></svg>
                        </a>
                    </div>
                </div>

                <!-- 4. TERMINAL DISPATCH & TECH GALLERY -->
                <div class="footer-col footer-col-dispatch">
                    <h4><?php echo esc_html( $col4_title ); ?></h4>
                    <p class="footer-newsletter-desc"><?php esc_html_e( 'Direct weekly briefing on frontier AI models, hardware leaks, and cybersecurity disclosures.', 'newsum' ); ?></p>
                    
                    <form class="footer-newsletter-form" method="post" action="#">
                        <div class="footer-input-wrap">
                            <label for="footerNewsletterEmail" class="screen-reader-text"><?php esc_html_e( 'Email address', 'newsum' ); ?></label>
                            <input type="email" id="footerNewsletterEmail" placeholder="<?php esc_attr_e( 'user@example.com', 'newsum' ); ?>" required>
                            <button type="submit" aria-label="<?php esc_attr_e( 'Subscribe to NewSum Terminal', 'newsum' ); ?>">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </div>
                    </form>
                    
                    <h5 class="footer-gallery-title"><?php echo esc_html( $gallery_title ); ?></h5>
                    <div class="footer-gallery-grid">
                        <?php foreach ( $footer_gallery_images as $g_url ) : ?>
                            <div class="footer-gallery-thumb">
                                <img src="<?php echo esc_url( $g_url ); ?>" alt="<?php esc_attr_e( 'Technology Photo', 'newsum' ); ?>" loading="lazy">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <!-- FOOTER BOTTOM BAR -->
            <div class="footer-bottom-bar">
                <div class="footer-bottom-left">
                    <p class="footer-copyright"><?php echo wp_kses_post( $copyright ); ?></p>
                </div>
                <div class="footer-bottom-center">
                    <ul class="footer-legal-links">
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'newsum' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'newsum' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/security/' ) ); ?>"><?php esc_html_e( 'Security Disclosure', 'newsum' ); ?></a></li>
                        <li><span class="footer-status-pill">● <?php esc_html_e( 'Systems Normal', 'newsum' ); ?></span></li>
                    </ul>
                </div>
                <?php if ( $show_back_to_top ) : ?>
                <div class="footer-bottom-right">
                    <button type="button" class="footer-back-to-top" id="footerBackToTop" aria-label="<?php esc_attr_e( 'Back to top of page', 'newsum' ); ?>">
                        <span><?php esc_html_e( 'Top', 'newsum' ); ?></span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                    </button>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
