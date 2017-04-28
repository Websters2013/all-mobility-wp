<?php
/**
 * Template Name: Checkout Page
 */
get_header(); ?>

<div class="site__content">
    <?php echo do_shortcode('[woocommerce_checkout]') ?>
</div>

<?php echo do_shortcode('[wpsl template="default" category="fast-food,italian" 
start_location="times square,new york"]') ?>

<?php get_footer(); ?>
