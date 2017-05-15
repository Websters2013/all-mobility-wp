<?php
/**
 * Template Name: Cart Page
 */
get_header(); ?>

<?php woocommerce_breadcrumb(); ?>

<div class="site__content site__content_inner site__white-back">

    <?php $cart = WC()->cart;

    if( $cart->is_empty() ){
        $empty = ' empty';
    } else {
        $empty = '';
    }

    ?>

    <!-- my-cart -->
    <div class="my-cart<?= $empty ?>">

        <h1 class="site__title site__title_3"><?php the_title(); ?></h1>

        <?php echo do_shortcode('[woocommerce_cart]') ?>

    </div>
    <!-- /product-single -->

</div>


<?php get_footer(); ?>
