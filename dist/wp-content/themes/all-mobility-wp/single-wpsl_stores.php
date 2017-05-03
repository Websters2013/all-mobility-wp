<?php get_header(); ?>

    <!-- breadcrumbs -->
    <nav class="breadcrumbs">
        <a href="#">Home</a>
        <a href="#">Locations</a>
        <span>Mobility Plus</span>
    </nav>
    <!-- /breadcrumbs -->

    <!-- site__content -->
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

            <!-- locations__items -->
            <div class="locations__items">
                <div>

                    <h2 class="site__title site__title_3"><?= get_the_title() ?>

                        <span class="locations__repair"><?php the_field('shop_type_field') ?></span>
                    </h2>

                    <?php
                    $id = get_the_ID();
                        $address       = get_post_meta( $id, 'wpsl_address', true );
                        $city          = get_post_meta( $id, 'wpsl_city', true );
                        $country       = get_post_meta( $id, 'wpsl_country', true );
                        $lat       = get_post_meta( $id, 'wpsl_lat', true );
                        $lng       = get_post_meta( $id, 'wpsl_lng', true );
                        $tel       = get_post_meta( $id, 'wpsl_phone', true );
                        $zip       = get_post_meta( $id, 'wpsl_zip', true );
                        $state       = get_post_meta( $id, 'wpsl_state', true );
                        $opening_hours       = get_post_meta( $id, 'wpsl_hours', true );
                    ?>
                    <ul class="locations__info">
                        <li>

                            <svg width="16px" height="22px" viewBox="0 0 16 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="location-dedicated" transform="translate(-93.000000, -408.000000)" fill="#0094C1">
                                        <g id="Group" transform="translate(93.000000, 408.000000)">
                                            <circle id="Oval-5-Copy-2" cx="14" cy="2" r="2"></circle>
                                            <circle id="Oval-5-Copy-5" cx="14" cy="8" r="2"></circle>
                                            <circle id="Oval-5-Copy-8" cx="14" cy="14" r="2"></circle>
                                            <circle id="Oval-5-Copy-3" cx="8" cy="2" r="2"></circle>
                                            <circle id="Oval-5-Copy-6" cx="8" cy="8" r="2"></circle>
                                            <circle id="Oval-5-Copy-9" cx="8" cy="14" r="2"></circle>
                                            <circle id="Oval-5-Copy-11" cx="8" cy="20" r="2"></circle>
                                            <circle id="Oval-5-Copy-4" cx="2" cy="2" r="2"></circle>
                                            <circle id="Oval-5-Copy-7" cx="2" cy="8" r="2"></circle>
                                            <circle id="Oval-5-Copy-10" cx="2" cy="14" r="2"></circle>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            <span><?= $tel ?></span>

                        </li>
                        <li>


                            <svg width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="location-dedicated" transform="translate(-89.000000, -447.000000)" stroke-width="2">
                                        <circle id="Oval-5" stroke="#0094C1" fill="#0094C1" cx="100.5" cy="458.5" r="10.5"></circle>
                                        <polyline id="Path-4" stroke="#FFFFFF" stroke-linecap="round" points="100 452 100 459.546154 104 462"></polyline>
                                    </g>
                                </g>
                            </svg>

                            <span>Hours or operation: <?= do_shortcode('[wpsl_hours id="'.$id.'" hide_closed="true"]'); ?></span>

                        </li>
                        <li>

                            <svg width="20px" height="27px" viewBox="0 0 20 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="location-dedicated" transform="translate(-90.000000, -491.000000)">
                                        <path d="M100.191489,517 C100.374377,517 109,510.301984 109,500.768657 C109,495.925861 104.970563,492 100,492 C95.0294373,492 91,495.925861 91,500.768657 C91,510.77077 100.008602,517 100.191489,517 Z" id="Oval-2-Copy" stroke="#0094C1" stroke-width="2" fill="#0094C1"></path>
                                        <circle id="Oval-3-Copy-2" fill="#FFFFFF" cx="100" cy="501" r="4"></circle>
                                    </g>
                                </g>
                            </svg>

                            <div class="locations__address">
                                <span><?= $address ?></span>
                                <span><?= $city.', '.$state ?></span>
                                <span><?= $zip ?></span>
                            </div>

                        </li>
                    </ul>

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <p><?= get_the_content() ?></p>
                    <?php endwhile; endif; ?>

                    <a href="#" class="btn btn_10">
                        VIEW OUR ONLINE CATALOG
                    </a>

                </div>
                <div>

                    <?php $map_coordinates = '{
                                                                                                        "lat": "'.$lat.'",
                                                                                                        "lng": "'.$lng.'",
                                                                                                        "icon": "'.DIRECT.'img/marker2.png",
                                                                                                        "iconWidth": "50",
                                                                                                        "iconHeight": "66",
                                                                                                        "zoom": "11"
                                                                                                        }'; ?>

                    <!-- locations__map -->
                    <div class="locations__map google-map" id="contact-google-map" data-settings='<?= $map_coordinates ?>'>

                    </div>
                    <!-- /locations__map -->

                </div>
            </div>
            <!-- /locations__items -->

            <!-- product-categories -->
            <div class="product-categories product-categories_3">

                <h2 class="site__title">Browse our Categories

                    <a class="site__title-link" href="#">see all</a>

                </h2>


                <?php get_template_part('content/content','home-category') ?>

            </div>
            <!-- /product-categories -->

            <?php the_field('text_in_footer') ?>

       </div>
        <!-- /locations -->

    </div>
    <!-- /site__content -->

<?php get_footer(); ?>