<?php
/**
 * Template Name: Account Page
 */
get_header(); ?>

<!-- breadcrumbs -->
<nav class="breadcrumbs">
    <a href="#">Home</a>
    <span>FAQ</span>
</nav>
<!-- /breadcrumbs -->

<div class="site__content site__content_page site__white-back">
    <?php echo do_shortcode('[woocommerce_my_account]') ?>
</div>

<?php get_footer(); ?>
