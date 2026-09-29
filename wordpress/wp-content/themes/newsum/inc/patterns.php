<?php
/**
 * Block Patterns for NewSum
 *
 * @package NewSum
 */

/**
 * Register NewSum Block Patterns and Categories
 */
function newsum_register_block_patterns() {
    if ( ! function_exists( 'register_block_pattern_category' ) || ! function_exists( 'register_block_pattern' ) ) {
        return;
    }

    // Register Category
    register_block_pattern_category(
        'newsum-editorial',
        array(
            'label' => __( 'NewSum Editorial', 'newsum' ),
        )
    );

    // 1. Key Takeaways Callout Box
    register_block_pattern(
        'newsum/key-takeaways',
        array(
            'title'       => __( 'Key Takeaways Box', 'newsum' ),
            'categories'  => array( 'newsum-editorial', 'featured' ),
            'description' => __( 'An executive summary callout box with bullet points.', 'newsum' ),
            'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","right":"1.5rem","bottom":"1.5rem","left":"1.5rem"},"margin":{"top":"2rem","bottom":"2rem"}},"border":{"radius":"4px","left":{"color":"#e11d48","width":"3px"}}},"backgroundColor":"surface","className":"article-takeaways-card"} -->
<div class="wp-block-group article-takeaways-card has-surface-background-color has-background" style="border-left-color:#e11d48;border-left-width:3px;border-radius:4px;margin-top:2rem;margin-bottom:2rem;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">
<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.06em"},"color":{"text":"#e11d48"}},"fontSize":"small"} -->
<h4 class="wp-block-heading has-text-color has-small-font-size" style="color:#e11d48;font-style:normal;font-weight:700;letter-spacing:0.06em;text-transform:uppercase">KEY TAKEAWAYS</h4>
<!-- /wp:heading -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li>Critical developments reshaping the landscape across modern industry verticals.</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Early adoption data reveals significant efficiency and cost benefits for forward-looking teams.</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>Regulatory and privacy frameworks are expected to evolve throughout the upcoming quarter.</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->',
        )
    );

    // 2. Editorial Pullquote
    register_block_pattern(
        'newsum/editorial-pullquote',
        array(
            'title'       => __( 'Editorial Pull-Quote', 'newsum' ),
            'categories'  => array( 'newsum-editorial', 'text' ),
            'description' => __( 'A bold pull-quote for impactful statements.', 'newsum' ),
            'content'     => '<!-- wp:quote {"className":"is-style-default pull-quote"} -->
<blockquote class="wp-block-quote is-style-default pull-quote"><p>"The true benchmark of journalistic excellence is not speed, but the relentless pursuit of clarity in an overwhelming era."</p><cite>— Editorial Board Dispatch</cite></blockquote>
<!-- /wp:quote -->',
        )
    );

    // 3. Two-Column Feature Story Split
    register_block_pattern(
        'newsum/feature-split',
        array(
            'title'       => __( 'Feature Story Split', 'newsum' ),
            'categories'  => array( 'newsum-editorial', 'columns' ),
            'description' => __( 'A split column feature story layout with image and text.', 'newsum' ),
            'content'     => '<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"},"blockGap":{"top":"2rem","left":"2.5rem"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:3rem;margin-bottom:3rem">
<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-large is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/default-fallback.svg' ) . '" alt="Feature Story"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%">
<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.08em"},"color":{"text":"#e11d48"}},"fontSize":"small"} -->
<p class="has-text-color has-small-font-size" style="color:#e11d48;letter-spacing:0.08em;text-transform:uppercase">SPECIAL DOSSIER</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Next-Generation Infrastructure: The Architecture of Scale</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>As networks expand, engineering teams must balance rapid feature iteration with foundational reliability. This comprehensive field report examines the structural paradigms leading organizations adopt to thrive under exponential demand.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"accent","textColor":"black","style":{"border":{"radius":"3px"},"typography":{"fontWeight":"700","textTransform":"uppercase"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:3px;font-weight:700;text-transform:uppercase">Read Special Report</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->',
        )
    );

    // 4. In-Article Newsletter CTA Box
    register_block_pattern(
        'newsum/article-newsletter-box',
        array(
            'title'       => __( 'In-Article Newsletter Box', 'newsum' ),
            'categories'  => array( 'newsum-editorial', 'featured' ),
            'description' => __( 'A sleek newsletter signup box for inserting inside long articles.', 'newsum' ),
            'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","right":"2rem","bottom":"2rem","left":"2rem"},"margin":{"top":"3rem","bottom":"3rem"}},"border":{"radius":"4px","width":"1px"}},"backgroundColor":"surface","className":"article-inline-newsletter"} -->
<div class="wp-block-group article-inline-newsletter has-surface-background-color has-background" style="border-width:1px;border-radius:4px;margin-top:3rem;margin-bottom:3rem;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem">
<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Get The Daily Briefing</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textAlign":"center","style":{"color":{"text":"#94a3b8"}}} -->
<p class="has-text-align-center has-text-color" style="color:#94a3b8">Curated reporting, deep analysis, and essential context delivered to your inbox every Thursday morning.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"accent","textColor":"black","style":{"border":{"radius":"3px"},"typography":{"fontWeight":"700","textTransform":"uppercase"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:3px;font-weight:700;text-transform:uppercase">Subscribe for Free</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
        )
    );
}
add_action( 'init', 'newsum_register_block_patterns' );
