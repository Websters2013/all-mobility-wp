<?php
/**
 * Template Name: Locations Page
 */
get_header(); ?>

<!-- breadcrumbs -->
<nav class="breadcrumbs">
    <a href="#">All Products</a>
    <a href="#">Mobility Scooters</a>
    <span> Heavy Duty & High Weight Capacity </span>
</nav>
<!-- /breadcrumbs -->

<div class="site__content site__content_inner site__white-back site__content_no-padding">
    <!-- why-us -->
    <div class="why-us why-us_2">
        <h2 class="why-us__title-main">Choose between 15,000 products in our online store</h2>
        <div>

            <h2 class="why-us__title">Why
                Us?</h2>

            <!-- why-us__advantages -->
            <ul class="why-us__advantages">
                <li>
                    <img src="img/money-back-white.svg" width="32" height="32" alt="">
                    30-days Money
                    Back Guarantee
                </li>
                <li>
                    <img src="img/free-shipping-white.svg" width="35" height="35" alt="">
                    Free Shipping
                    over $50
                </li>
                <li>
                    <img src="img/safe-secure-white.svg" width="44" height="44" alt="">
                    Safe & Secure
                    Online Payments
                </li>
                <li>
                    <img src="img/expert-support-white.svg" width="36" height="36" alt="">
                    Expert Support
                    at Your Service
                </li>
                <li>
                    <img src="img/local-store-white.svg" width="24" height="37" alt="">
                    Local Stores
                    Near You
                </li>
            </ul>
            <!-- /why-us__advantages -->

        </div>
        <div class="why-us__resolve">

            <a href="#" class="btn btn_8">
                VIEW ONLINE CATALOG
            </a>

        </div>
    </div>
    <!-- /why-us -->

    <!-- locations -->
    <div class="locations">

        <h1 class="site__title site__title_3">Locations</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <!-- locations__search -->
        <div class="locations__stores">
            <?= do_shortcode('[wpsl]') ?>
        </div>
        <!-- /locations__search -->

    </div>
    <!-- /locations -->
</div>

<?php get_footer(); ?>
