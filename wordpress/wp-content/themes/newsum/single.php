<?php
/**
 * The template for displaying all single posts
 *
 * @package NewSum
 */

get_header();
?>

<main class="site-content site-main" id="primary">

    <?php if ( get_theme_mod( 'newsum_show_scroll_progress', true ) ) : ?>
    <!-- READING PROGRESS BAR -->
    <div class="reading-progress-container">
        <div class="reading-progress-bar" id="readingProgressBar" style="width: 0%;"></div>
    </div>
    <?php endif; ?>

    <?php
    while ( have_posts() ) :
        the_post();

        $post_id         = get_the_ID();
        $reading_time    = newsum_get_reading_time( $post_id );
        $categories      = get_the_category( $post_id );
        $primary_cat     = ! empty( $categories ) ? $categories[0] : null;
        $author_id       = get_the_author_meta( 'ID' );
        $author_name     = get_the_author();
        $author_bio      = get_the_author_meta( 'description' );
        $author_posts_url = get_author_posts_url( $author_id );
        $author_avatar   = get_avatar( $author_id, 80 );
        $share_url       = rawurlencode( get_permalink() );
        $share_title     = rawurlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) );
        $excerpt         = get_the_excerpt();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
            
            <!-- ARTICLE HERO -->
            <header class="article-hero">
                <div class="hero-inner">
                    <div class="article-meta-top">
                        <?php if ( $primary_cat ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>" class="category-badge">
                                <?php echo esc_html( $primary_cat->name ); ?>
                            </a>
                        <?php endif; ?>
                        <span class="read-time">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <?php echo esc_html( $reading_time ); ?> <?php esc_html_e( 'MIN READ', 'newsum' ); ?>
                        </span>
                        <?php if ( comments_open() || get_comments_number() ) : ?>
                            <a href="#comments" class="comments-link-pill">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                <?php echo get_comments_number(); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <h1 class="article-title"><?php the_title(); ?></h1>

                    <div class="article-meta-bottom">
                        <div class="author-info">
                            <a href="<?php echo esc_url( $author_posts_url ); ?>" class="author-avatar-link">
                                <?php echo get_avatar( $author_id, 44, '', $author_name, array( 'class' => 'author-avatar' ) ); ?>
                            </a>
                            <div class="author-text">
                                <span class="byline"><?php esc_html_e( 'By', 'newsum' ); ?> <a href="<?php echo esc_url( $author_posts_url ); ?>"><strong><?php echo esc_html( $author_name ); ?></strong></a></span>
                                <time class="publish-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                    <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
                                </time>
                            </div>
                        </div>

                        <?php if ( newsum_is_reading_list_enabled() ) : ?>
                        <div class="hero-actions-deck">
                            <button type="button" class="article-action-btn card-bookmark-btn" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-post-title="<?php echo esc_attr( get_the_title() ); ?>" data-post-link="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php esc_attr_e( 'Save to Reading List', 'newsum' ); ?>">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                <span><?php esc_html_e( 'Save', 'newsum' ); ?></span>
                            </button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="hero-image-wrap">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'hero-image' ) ); ?>
                        <?php
                        $caption = get_the_post_thumbnail_caption();
                        if ( ! empty( $caption ) ) :
                            ?>
                            <span class="image-caption"><?php echo esc_html( $caption ); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </header>

            <!-- ARTICLE CONTENT LAYOUT -->
            <div class="article-layout">
                
                <!-- STICKY SHARE SIDEBAR -->
                <aside class="sticky-share">
                    <div class="share-inner">
                        <span class="share-label"><?php esc_html_e( 'SHARE', 'newsum' ); ?></span>
                        <a href="https://x.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-icon" aria-label="Share on X">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-icon" aria-label="Share on LinkedIn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="share-icon" aria-label="Share on Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <button type="button" class="share-icon copy-link-btn" data-url="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php esc_attr_e( 'Copy article link', 'newsum' ); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        </button>
                    </div>
                </aside>

                <!-- MAIN ARTICLE BODY -->
                <div class="article-body-wrapper">
                    
                    <?php if ( ! empty( $excerpt ) ) : ?>
                        <!-- KEY TAKEAWAYS / EXECUTIVE SUMMARY -->
                        <div class="article-takeaways-card">
                            <div class="takeaways-header">
                                <span class="takeaways-badge">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                    <?php esc_html_e( 'Key Takeaways', 'newsum' ); ?>
                                </span>
                            </div>
                            <div class="takeaways-content">
                                <p><?php echo esc_html( $excerpt ); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="article-body" id="articleBodyContent">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'newsum' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );
                        ?>
                    </div>

                    <!-- ARTICLE TAGS -->
                    <?php
                    $tags = get_the_tags();
                    if ( ! empty( $tags ) ) :
                        ?>
                        <div class="article-tags-deck">
                            <span class="tags-label"><?php esc_html_e( 'Topics:', 'newsum' ); ?></span>
                            <?php foreach ( $tags as $t ) : ?>
                                <a href="<?php echo esc_url( get_tag_link( $t->term_id ) ); ?>" class="tag-pill">#<?php echo esc_html( $t->name ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- AUTHOR BIO BOX -->
                    <div class="author-box">
                        <div class="author-box-avatar-wrap">
                            <?php echo get_avatar( $author_id, 84, '', $author_name, array( 'class' => 'author-box-avatar' ) ); ?>
                        </div>
                        <div class="author-box-content">
                            <span class="author-box-label"><?php esc_html_e( 'WRITTEN BY', 'newsum' ); ?></span>
                            <h4 class="author-box-name"><a href="<?php echo esc_url( $author_posts_url ); ?>"><?php echo esc_html( $author_name ); ?></a></h4>
                            <p class="author-box-bio">
                                <?php
                                if ( ! empty( $author_bio ) ) {
                                    echo esc_html( $author_bio );
                                } else {
                                    esc_html_e( 'Staff writer and contributing journalist covering modern trends, deep insights, and field analysis.', 'newsum' );
                                }
                                ?>
                            </p>
                            <a href="<?php echo esc_url( $author_posts_url ); ?>" class="author-box-link">
                                <?php printf( esc_html__( 'All stories by %s &rarr;', 'newsum' ), esc_html( $author_name ) ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- PREVIOUS / NEXT POST NAVIGATION -->
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    if ( $prev_post || $next_post ) :
                        ?>
                        <nav class="post-navigation-deck" aria-label="<?php esc_attr_e( 'Article navigation', 'newsum' ); ?>">
                            <?php if ( $prev_post ) : ?>
                                <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="post-nav-card prev-card">
                                    <span class="nav-direction">&larr; <?php esc_html_e( 'Previous Story', 'newsum' ); ?></span>
                                    <span class="nav-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if ( $next_post ) : ?>
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="post-nav-card next-card">
                                    <span class="nav-direction"><?php esc_html_e( 'Next Story', 'newsum' ); ?> &rarr;</span>
                                    <span class="nav-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                                </a>
                            <?php endif; ?>
                        </nav>
                    <?php endif; ?>

                    <!-- COMMENTS SECTION -->
                    <?php
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                </div>

                <!-- RIGHT SIDEBAR -->
                <aside class="sidebar-column">
                    <?php
                    if ( is_active_sidebar( 'sidebar-1' ) ) :
                        dynamic_sidebar( 'sidebar-1' );
                    else :
                        // Curated editorial sidebar widgets
                        $sidebar_query = new WP_Query( array(
                            'posts_per_page'      => 4,
                            'post_status'         => 'publish',
                            'post__not_in'        => array( $post_id ),
                            'ignore_sticky_posts' => 1,
                        ) );
                        ?>
                        <div class="sidebar-widget">
                            <h3 class="widget-title"><?php esc_html_e( 'Trending Stories', 'newsum' ); ?></h3>
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
                            <h3 class="widget-title"><?php esc_html_e( 'Daily Dispatch', 'newsum' ); ?></h3>
                            <p><?php esc_html_e( 'Get the day’s top journalism and essential commentary delivered to your inbox.', 'newsum' ); ?></p>
                            <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Subscribed to Daily Dispatch.');">
                                <input type="email" placeholder="<?php esc_attr_e( 'user@example.com', 'newsum' ); ?>" required>
                                <button type="submit"><?php esc_html_e( 'Subscribe', 'newsum' ); ?></button>
                            </form>
                        </div>
                    <?php endif; ?>
                </aside>

            </div>
        </article>

        <!-- RELATED POSTS SECTION -->
        <?php
        $related_cat_id = $primary_cat ? $primary_cat->term_id : 0;
        $related_query  = new WP_Query( array(
            'posts_per_page'      => 3,
            'cat'                 => $related_cat_id,
            'post__not_in'        => array( $post_id ),
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
        ) );

        if ( $related_query->have_posts() ) :
            ?>
            <section class="related-posts-section">
                <div class="feed-header">
                    <h2><?php esc_html_e( 'Related Stories', 'newsum' ); ?></h2>
                </div>
                <div class="feed-grid">
                    <?php
                    while ( $related_query->have_posts() ) :
                        $related_query->the_post();
                        $r_cats = get_the_category();
                        $r_cat  = ! empty( $r_cats ) ? $r_cats[0]->name : __( 'Story', 'newsum' );
                        $r_img  = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : newsum_get_default_fallback_image( get_the_ID() );
                        ?>
                        <article class="feed-card">
                            <div class="card-img-wrap">
                                <img src="<?php echo esc_url( $r_img ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            </div>
                            <div class="card-content">
                                <span class="category"><?php echo esc_html( $r_cat ); ?></span>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="excerpt"><?php echo wp_trim_words( get_the_excerpt(), 18 ); ?></p>
                                <div class="card-footer">
                                    <span class="author"><?php esc_html_e( 'By', 'newsum' ); ?> <?php the_author(); ?></span>
                                    <span class="read-time"><?php echo newsum_get_reading_time( get_the_ID() ); ?> MIN READ</span>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </section>
        <?php endif; ?>

    <?php endwhile; ?>

</main>

<?php
get_footer();
