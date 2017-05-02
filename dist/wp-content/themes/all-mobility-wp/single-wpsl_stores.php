<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php single_post_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php
                    global $post;
                    $queried_object = get_queried_object();

                    // Add the map shortcode
                    echo do_shortcode( '[wpsl_map]' );

                    // Add the content
                    $post = get_post( $queried_object->ID );
                    setup_postdata( $post );
                    the_content();
                    wp_reset_postdata( $post );

                    // Add the address shortcode
                    echo do_shortcode( '[wpsl_address]' );
                    ?>
                </div>
            </article>
        </main><!-- #main -->
    </div><!-- #primary -->
\
<?php get_footer(); ?>