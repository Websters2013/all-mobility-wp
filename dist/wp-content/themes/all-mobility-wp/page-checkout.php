<?php
/**
 * Template Name: Checkout Page
 */
get_header(); ?>

<nav class="breadcrumbs">
    <a href="#">Home</a>
    <a href="#">My Cart</a>
    <span>Checkout</span>
</nav>

<div class="site__content site__content_inner site__white-back">
    <?php echo do_shortcode('[woocommerce_checkout]') ?>
</div>

<?php get_footer(); ?>
