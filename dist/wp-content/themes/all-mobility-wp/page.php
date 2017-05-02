<?php get_header(); ?>

<!-- breadcrumbs -->
<nav class="breadcrumbs">
    <a href="#">Home</a>
    <span>Terms of Usage</span>
</nav>
<!-- /breadcrumbs -->

<!-- site__content -->
<div class="site__content site__content_page site__white-back">

    <!-- site__content__wrap -->
    <div class="site__content__wrap">

        <!-- site__inner -->
        <div class="site__inner">

            <!-- content -->
            <div class="content">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


                    <?php the_content() ?>

                <?php endwhile; ?>

                <?php endif; ?>

            </div>
            <!-- /content -->

        </div>
        <!-- /site__inner -->

        <!-- site__aside -->
        <aside class="site__aside">

           <?php get_template_part('content/content','aside-contact') ?>

        </aside>
        <!-- /site__aside -->

    </div>
    <!-- /site__content__wrap -->

</div>
<!-- /site__content -->

<?php get_footer(); ?>
