<?php
/**
 * Template Name: Cart Page
 */
get_header(); ?>

<!-- breadcrumbs -->
<nav class="breadcrumbs">
    <a href="#">Home</a>
    <span>My Cart</span>
</nav>
<!-- /breadcrumbs -->

<div class="site__content site__content_inner site__white-back">

    <!-- my-cart -->
    <div class="my-cart">

        <h1 class="site__title site__title_3"><?php the_title(); ?></h1>

        <?php echo do_shortcode('[woocommerce_cart]') ?>

    </div>
    <!-- /product-single -->

</div>


<?php get_footer(); ?>
