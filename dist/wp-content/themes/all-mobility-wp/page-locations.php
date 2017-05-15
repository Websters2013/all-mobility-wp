<?php
/**
 * Template Name: Locations Page
 */
get_header(); ?>

<?php woocommerce_breadcrumb(); ?>

<!-- site__content -->
<div class="site__content site__content_inner site__white-back site__content_no-padding">

    <h2 class="site__title site__title_3 site__title_hidden">Locations</h2>

    <!-- why-us -->
    <div class="why-us why-us_2">
        <h2 class="why-us__title-main"><?php the_field('title_in_why_us_block') ?></h2>
        <div>

            <h2 class="why-us__title">Why
                Us?</h2>

         <?php get_template_part('content/content','advantages-why-us') ?>

        </div>
        <div class="why-us__resolve">

            <a href="<?= get_home_url() ?>" class="btn btn_8">
                VIEW ONLINE CATALOG
            </a>

        </div>
    </div>
    <!-- /why-us -->

    <!-- locations -->
    <div class="locations locations_stores">

        <h1 class="site__title site__title_3"><?php the_title(); ?></h1>

        <!-- locations__stores -->
        <div class="locations__stores">
           <?= do_shortcode('[wpsl]') ?>
        </div>
        <!-- /locations__stores -->

        <?php the_field('description_text') ?>

    </div>
    <!-- /locations -->

</div>
<!-- /site__content -->

<?php get_footer(); ?>
