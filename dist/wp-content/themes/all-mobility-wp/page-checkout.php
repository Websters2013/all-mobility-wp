<?php
/**
 * Template Name: Checkout Page
 */
get_header(); ?>

<?php woocommerce_breadcrumb(); ?>

<div class="site__content site__content_inner site__white-back site__checkout">
    <?php echo do_shortcode('[woocommerce_checkout]') ?>
</div>

<?php get_footer(); ?>
