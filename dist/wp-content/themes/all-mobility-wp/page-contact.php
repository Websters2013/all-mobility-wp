<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>


    <!-- breadcrumbs -->
    <nav class="breadcrumbs">
        <a href="#">Home</a>
        <span>Contact Us</span>
    </nav>
    <!-- /breadcrumbs -->

    <!-- site__content -->
    <div class="site__content site__content_inner site__white-back site__content_no-padding">

        <!-- contact-us -->
        <div class="contact-us">

            <h1 class="site__title site__title_6 site__title_center"><?= get_the_title() ?></h1>

            <!-- contact-us__head -->
            <div class="contact-us__head">

                <div>

                        <span class="contact-us__pic">

                            <svg width="36px" height="49px" viewBox="0 0 36 49" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-259.000000, -355.000000)" fill="#0094C1">
                                        <g transform="translate(259.000000, 355.000000)">
                                            <circle id="Oval-5-Copy-2" cx="31.5" cy="4.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-5" cx="31.5" cy="17.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-8" cx="31.5" cy="31.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-3" cx="18.5" cy="4.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-6" cx="18.5" cy="17.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-9" cx="18.5" cy="31.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-11" cx="18.5" cy="44.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-4" cx="4.5" cy="4.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-7" cx="4.5" cy="17.5" r="4.5"></circle>
                                            <circle id="Oval-5-Copy-10" cx="4.5" cy="31.5" r="4.5"></circle>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                        </span>


                    <span class="contact-us__caption"><?php the_field('call_us_today_title') ?></span>
                    <?php if( $phone = get_field('phone') ): ?>
                    <a class="contact-us__content contact-us__phone" href="<?= $phone ?>"><?= $phone ?></a>
                    <?php endif; ?>

                </div>
                <div>

                        <span class="contact-us__pic">

                            <svg width="60px" height="55px" viewBox="0 0 60 55" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                               <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <g transform="translate(-691.000000, -348.000000)" fill="#0094C1">
                                       <path d="M696,386 L746,386 L746,353 L696,353 L696,386 Z M721.5,392 C720.12,392 719,390.88 719,389.5 C719,388.12 720.12,387 721.5,387 C722.8775,387 724,388.12 724,389.5 C724,390.88 722.8775,392 721.5,392 L721.5,392 Z M746,348 L696,348 C693.24,348 691,350.2425 691,353 L691,390.5 C691,393.255 693.24,395.5 696,395.5 L713.0175,395.5 L711.35,400.5 L703.5,400.5 C702.81,400.5 702.25,401.06 702.25,401.75 C702.25,402.44 702.81,403 703.5,403 L712.25,403 L729.75,403 L729.775,403 L738.5,403 C739.19,403 739.75,402.44 739.75,401.75 C739.75,401.06 739.19,400.5 738.5,400.5 L730.6475,400.5 L728.9825,395.5 L746,395.5 C748.7575,395.5 751,393.255 751,390.5 L751,353 C751,350.2425 748.7575,348 746,348 L746,348 Z" id="Page-1"></path>
                                   </g>
                               </g>
                            </svg>

                        </span>

                    <span class="contact-us__caption"><?php the_field('send_us_an_email_title') ?></span>

                    <?php if($email = get_field('email_field')): ?>
                        <a class="contact-us__content contact-us__mail" href="mailto:<?= $email ?>"><?= $email ?></a>
                    <?php endif; ?>

                    </div>
                <div class="contact-us__form">

                    <h2 class="contact-us__title">

                        <svg fill="#0094C1" width="75px" height="75px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 99.9 100" style="enable-background:new 0 0 99.9 100;" xml:space="preserve">
                            <path d="M0,53.1c1.3-0.5,2.6-1,3.8-1.7C34.4,35,99.9,0,99.9,0L74.5,99.9c0,0-16.6-16-25.1-24.1C44,83.4,32.1,100,32.1,100
                                s-2.4-23.8-3.5-33.2c-0.1-1.2-1.3-2.8-2.4-3.2C17.5,60.2,8.7,57.1,0,53.8C0,53.6,0,53.3,0,53.1z M89.2,13.8
                                c-24.3,13-47.8,25.6-72,38.6c5.8,2.2,10.6,3.8,15.3,5.8c2.3,1,3.9,0.6,5.8-1c11.7-9.5,38-30.3,38-30.3l0.4,0.6
                                c0,0-17.7,24.4-26.9,37c7.4,6.8,14.7,13.5,21.8,20C77.1,61.9,83,38.3,89.2,13.8z"/>
                            </svg>

                        Send Us a Message

                    </h2>

                    <form action="#">

                        <div class="contact-us__row">
                            <label class="site__label" for="name">Your Name <span>*</span></label>
                            <input class="site__input" type="text" id="name" name="name">
                        </div>
                        <div class="contact-us__row">
                            <label class="site__label" for="email">Your E-mail <span>*</span></label>
                            <input class="site__input" type="email" id="email" name="email">
                        </div>
                        <div class="contact-us__row">
                            <label class="site__label" for="message">Your Message <span>*</span></label>
                            <textarea class="site__input" id="message" name="message" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn_13"><span>send</span></button>

                    </form>

                </div>
                <div>

                        <span class="contact-us__pic">
                            <svg width="38px" height="57px" viewBox="0 0 38 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                               <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <g  transform="translate(-1141.000000, -349.000000)" fill="#0094C1">
                                       <path d="M1160.5,377 C1155.81286,377 1152,373.187143 1152,368.5 C1152,363.812857 1155.81286,360 1160.5,360 C1165.18714,360 1169,363.812857 1169,368.5 C1169,373.187143 1165.18714,377 1160.5,377 M1160,349 C1149.52388,349 1141,357.5215 1141,368 C1141,378.0795 1158.27337,404.354125 1159.00962,405.465625 C1159.22813,405.798125 1159.601,406 1160,406 C1160.399,406 1160.7695,405.798125 1160.99038,405.465625 C1161.72663,404.354125 1179,378.0795 1179,368 C1179,357.5215 1170.47612,349 1160,349" id="Page-1"></path>
                                   </g>
                               </g>
                            </svg>
                        </span>

                    <span class="contact-us__caption"><?php the_field('our_headquarters_address') ?></span>

                    <p class="contact-us__content"><?php the_field('adress') ?></p>
                </div>

            </div>
            <!-- /contact-us__head -->

            <?php $map_coordinates = '{ 
             "lat": "'.get_field("map_lat").'",
             "lng": "'.get_field("map_longitude").'",
                                                                                        "icon": "'.DIRECT.'img/marker.png",
                                                                                        "iconWidth": "114",
                                                                                        "iconHeight": "117",
                                                                                        "zoom": "13"
                                                                                        }'; ?>

            <!-- contact-us__map -->
            <div class="contact-us__map google-map" id="contact-google-map" data-settings='<?= $map_coordinates ?>'>

            </div>
            <!-- /contact-us__map -->

            <a target="_blank" href="https://www.google.com.ua/maps/place/Dr.+C+T.+Sherman,+MD/@34.065699,-118.4481548,17z/data=!3m1!4b1!4m5!3m4!1s0x80c2bc8428f00001:0x55b3a89912c15eb0!8m2!3d34.065699!4d-118.4459661?hl=en" class="btn btn_14 contact__us-open">OPEN IN MAPS</a>

        </div>
        <!-- /contact-us -->

    </div>
    <!-- /site__content -->

<?php get_footer(); ?>