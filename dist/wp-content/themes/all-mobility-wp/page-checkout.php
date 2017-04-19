<?php
/**
 * Template Name: Checkout Page
 */
get_header(); ?>

<div class="site__content">
    <?php echo do_shortcode('[woocommerce_checkout]') ?>
</div>

<?php get_footer(); ?>
