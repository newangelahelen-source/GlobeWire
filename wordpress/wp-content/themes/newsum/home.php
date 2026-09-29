<?php
/**
 * The template for displaying the Blog Posts Page (home.php)
 *
 * Used when a static page is set as front page and a separate page is set as "Posts page",
 * or when viewing the default blog index.
 *
 * @package NewSum
 */

get_header();

$total_posts    = $GLOBALS['wp_query']->found_posts;
$archive_layout = get_theme_mod( 'newsum_archive_layout', 'grid' );
$grid_cols      = get_theme_mod( 'newsum_grid_columns', '3' );
$sidebar_pos    = get_theme_mod( 'newsum_archive_sidebar', 'right' );
$excerpt_length = get_theme_mod( 'newsum_excerpt_length', 22 );
$show_filters   = get_theme_mod( 'newsum_archive_show_filters', true );

// Page Title & Description for the Blog page
$blog_title = get_the_title( get_option( 'page_for_posts' ) );
if ( empty( $blog_title ) || ! is_numeric( get_option( 'page_for_posts' ) ) ) {
    $blog_title = __( 'The Daily Dispatch', 'newsum' );
}

$blog_page_id = get_option( 'page_for_posts' );
$blog_desc    = $blog_page_id ? get_post_field( 'post_excerpt', $blog_page_id ) : '';
if ( empty( $blog_desc ) ) {
    $blog_desc = get_bloginfo( 'description' );
}
?>

<main class="site-content site-main archive-page-content" id="primary">

    <!-- ═══ BLOG HERO MASTHEAD ═════════════════════════════ -->
    <header class="archive-masthead blog-masthead-hero">
        <div class="archive-masthead-inner">
            <div class="archive-masthead-header">
                <span class="archive-kicker"><?php esc_html_e( 'THE EDITORIAL WIRE', 'newsum' ); ?></span>
                <span class="archive-count-pill">
                    <?php
                    printf(
                        /* translators: %s: number of articles */
                        esc_html( _n( '%s Story Published', '%s Stories Published', $total_posts, 'newsum' ) ),
                        number_format_i18n( $total_posts )
                    );
                    ?>
                </span>
            </div>
            <h1 class="archive-title"><?php echo esc_html( $blog_title ); ?></h1>
            <?php if ( ! empty( $blog_desc ) ) : ?>
                <div class="archive-desc"><?php echo esc_html( $blog_desc ); ?></div>
            <?php endif; ?>

            <?php
            // Topic Filter Pills Bar
            if ( $show_filters ) :
                $cats = get_categories( array(
                    'number'     => 10,
                    'orderby'    => 'count',
                    'order'      => 'DESC',
                    'hide_empty' => true,
                ) );
                if ( ! empty( $cats ) ) :
                ?>
                <nav class="archive-filter-bar" aria-label="<?php esc_attr_e( 'Filter by Topic', 'newsum' ); ?>">
                    <span class="filter-label"><?php esc_html_e( 'TOPICS:', 'newsum' ); ?></span>
                    <div class="filter-pills-track">
                        <?php foreach ( $cats as $cat ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="filter-pill">
                                <?php echo esc_html( $cat->name ); ?>
                                <span class="pill-count"><?php echo esc_html( $cat->count ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </nav>
                <?php
                endif;
            endif;
            ?>
        </div>
    </header>

    <!-- ═══ BLOG MAIN CONTENT GRID & SIDEBAR ═══════════════ -->
    <div class="content-sidebar-wrap archive-layout-wrap sidebar-pos-<?php echo esc_attr( $sidebar_pos ); ?>">

        <div class="main-content-col">

            <?php if ( have_posts() ) : ?>
                
                <?php
                $feed_classes = array( 'archive-feed-container' );
                if ( 'list' === $archive_layout ) {
                    $feed_classes[] = 'feed-layout-list';
                } elseif ( 'compact' === $archive_layout ) {
                    $feed_classes[] = 'feed-layout-compact';
                } else {
                    $feed_classes[] = 'feed-layout-grid';
                    $feed_classes[] = ( '2' === $grid_cols ) ? 'grid-2-col' : 'grid-3-col';
                }
                ?>

                <div class="<?php echo esc_attr( implode( ' ', $feed_classes ) ); ?>">
                    <?php
                    $post_counter = 0;
                    while ( have_posts() ) :
                        the_post();
                        $post_counter++;

                        $post_id   = get_the_ID();
                        $read_time = newsum_get_reading_time( $post_id );
                        $cats      = get_the_category();
                        $cat_name  = ! empty( $cats ) ? $cats[0]->name : '';
                        $img_url   = has_post_thumbnail() ? get_the_post_thumbnail_url( $post_id, 'medium_large' ) : newsum_get_default_fallback_image( $post_id );
                        $author_id = get_the_author_meta( 'ID' );
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post-card' ); ?>>
                            
                            <div class="card-media-wrap">
                                <a href="<?php the_permalink(); ?>" class="card-media-link" tabindex="-1" aria-hidden="true">
                                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" class="card-thumb-img">
                                </a>
                                <?php if ( $cat_name ) : ?>
                                    <span class="card-category-badge"><?php echo esc_html( $cat_name ); ?></span>
                                <?php endif; ?>
                                
                                <div class="card-action-deck">
                                    <span class="card-action-pill card-read-time">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        <?php echo esc_html( $read_time ); ?>m
                                    </span>
                                    <button type="button" class="card-action-pill card-summary-btn" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-post-title="<?php echo esc_attr( get_the_title() ); ?>" data-post-excerpt="<?php echo esc_attr( wp_trim_words( get_the_excerpt(), 30 ) ); ?>" data-post-link="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php esc_attr_e( 'Quick 30s Summary', 'newsum' ); ?>">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                        <span><?php esc_html_e( '30s', 'newsum' ); ?></span>
                                    </button>
                                    <?php newsum_render_bookmark_button( $post_id, get_the_title(), get_permalink() ); ?>
                                </div>
                            </div>

                            <div class="card-body-wrap">
                                <h2 class="card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <p class="card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), absint( $excerpt_length ) ); ?></p>
                                
                                <footer class="card-meta-footer">
                                    <div class="author-byline">
                                        <span class="by-text"><?php esc_html_e( 'By', 'newsum' ); ?></span>
                                        <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" class="author-link">
                                            <strong><?php the_author(); ?></strong>
                                        </a>
                                    </div>
                                    <div class="date-meta">
                                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></time>
                                    </div>
                                </footer>
                            </div>

                        </article>
                        <?php do_action( 'newsum_after_loop_post', $post_counter ); ?>
                    <?php endwhile; ?>
                </div>

                <!-- ═══ PAGINATION ════════════════════════════════ -->
                <nav class="archive-pagination" aria-label="<?php esc_attr_e( 'Stories Pagination', 'newsum' ); ?>">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'           => 2,
                        'prev_text'          => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg> <span>' . __( 'Previous', 'newsum' ) . '</span>',
                        'next_text'          => '<span>' . __( 'Next', 'newsum' ) . '</span> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                        'before_page_number' => '',
                    ) );
                    ?>
                </nav>

            <?php else : ?>
                <!-- ═══ EMPTY BLOG STATE ══════════════════════════ -->
                <div class="archive-empty-state">
                    <div class="empty-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="15" x2="16" y2="15"></line><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                    </div>
                    <h2 class="empty-title"><?php esc_html_e( 'No Dispatches Found', 'newsum' ); ?></h2>
                    <p class="empty-desc"><?php esc_html_e( 'There are currently no published stories.', 'newsum' ); ?></p>
                    <div class="empty-actions">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-return-home">
                            &larr; <?php esc_html_e( 'Return to Frontpage', 'newsum' ); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <?php if ( 'none' !== $sidebar_pos ) : ?>
        <!-- ═══ BLOG SIDEBAR ══════════════════════════════════ -->
        <aside class="sidebar-column archive-sidebar" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'newsum' ); ?>">
            <?php
            if ( is_active_sidebar( 'sidebar-1' ) ) :
                dynamic_sidebar( 'sidebar-1' );
            else :
                $sidebar_query = new WP_Query( array(
                    'posts_per_page'      => 4,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => 1,
                ) );
                ?>
                <div class="sidebar-widget">
                    <h3 class="widget-title"><?php esc_html_e( 'Trending Wire', 'newsum' ); ?></h3>
                    <div class="sidebar-posts">
                        <?php
                        if ( $sidebar_query->have_posts() ) :
                            $rank = 1;
                            while ( $sidebar_query->have_posts() ) :
                                $sidebar_query->the_post();
                                ?>
                                <div class="sidebar-post-item">
                                    <span class="rank"><?php echo str_pad( $rank++, 2, '0', STR_PAD_LEFT ); ?></span>
                                    <div>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <span class="meta"><?php echo newsum_get_reading_time( get_the_ID() ); ?> MIN READ • <?php echo esc_html( get_the_date( 'd M' ) ); ?></span>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>

                <div class="sidebar-widget newsletter-widget">
                    <h3 class="widget-title"><?php esc_html_e( 'The Daily Dossier', 'newsum' ); ?></h3>
                    <p><?php esc_html_e( 'Get the day’s top journalism and essential tech commentary delivered to your inbox.', 'newsum' ); ?></p>
                    <form class="newsletter-form" method="post" action="#">
                        <label for="blogNewsletterEmail" class="screen-reader-text"><?php esc_html_e( 'Email Address', 'newsum' ); ?></label>
                        <input type="email" id="blogNewsletterEmail" placeholder="<?php esc_attr_e( 'user@example.com', 'newsum' ); ?>" required>
                        <button type="submit"><?php esc_html_e( 'Subscribe', 'newsum' ); ?></button>
                    </form>
                </div>
            <?php endif; ?>
        </aside>
        <?php endif; ?>

    </div>

</main>

<?php
get_footer();
