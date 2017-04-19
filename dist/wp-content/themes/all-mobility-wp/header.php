<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link rel='shortcut icon' type='image/x-icon' href='<?php echo TEMPLATEURI; ?>/assets/img/favicon.ico' />

        <title><?php document_title(); ?></title>
        <?php  wp_head() ?>
    </head>
    <body data-action="<?php echo admin_url( 'admin-ajax.php' );?>" <?php body_class(); ?>>

    <!-- site -->
    <div class="site">

        <!-- site__header -->
        <header class="site__header">

            <!-- site__header-layout -->
            <div class="site__header-layout">

                <?php if( is_front_page() ):
                    $start_wrap = '<h1 class="logo">';
                    $end_wrap = '</h1>';
                else:
                    $start_wrap = '<a href="'.get_home_url().'" class="logo">';
                    $end_wrap = '</a>';
                endif; ?>

                <?= $start_wrap  ?>

                    <svg class="logo__mobile" width="157px" height="35px" viewBox="0 0 157 35" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-114.000000, -12.000000)">
                                <g transform="translate(114.000000, 12.000000)">
                                    <text font-family="Anago-Black" font-size="14" font-weight="700" fill="#F37820">
                                        <tspan x="52" y="12">ALL AROUND</tspan>
                                    </text>
                                    <text font-family="Anago-Black" font-size="24" font-weight="700" fill="#FFFFFF">
                                        <tspan x="51" y="33">MOBILITY</tspan>
                                    </text>
                                    <path d="M14.3772686,0.0148061643 C18.5184306,0.0163712032 22.6603742,0.0124586059 26.8015361,0.0171537227 C32.147215,0.022631359 36.6948331,1.89598298 40.2935325,5.89465749 C42.5446738,8.39558973 43.8773807,11.3316028 44.4683053,14.6651358 C45.7759995,22.0419468 41.9217017,29.5760443 35.4621769,32.9463557 C31.6680659,34.9253475 27.6777616,35.5020643 23.5170585,34.5544332 C17.059097,33.0832966 12.7913083,29.0752319 10.6542874,22.870635 C10.0954103,21.246907 10.0453849,19.4369395 9.85622652,17.7020938 C9.75695745,16.7951538 10.3408472,16.2192194 11.1217118,16.223132 C11.8181587,16.2262621 12.4247162,16.8295846 12.418463,17.6582727 C12.4043934,19.5237992 12.7303399,21.3228114 13.4572709,23.0294864 C15.4293645,27.6557415 18.7974783,30.7122626 23.7163783,31.9314279 C30.0328618,33.4980319 35.9780634,30.9211953 39.4587343,26.0132332 C44.8560018,18.4024488 41.7294167,7.49569233 33.1219279,3.84210891 C31.150616,3.00559559 29.093323,2.60338058 26.9703717,2.59868547 C18.2487626,2.57912248 10.4283916,2.59399035 1.70678245,2.57755744 C1.26280737,2.57677492 0.688297353,2.53921399 0.411594571,2.27237485 C0.119258864,1.9891028 -0.0495767317,1.38891036 0.0129549704,0.969479922 C0.105189231,0.349724499 0.671882781,0.0531496185 1.29250992,0.0155886838 C1.83888067,-0.0180596536 2.388378,0.0132411253 2.93631204,0.0132411253 C7.05089804,0.0140236448 10.2634642,0.0132411253 14.3772686,0.0148061643" fill="#0094C1"></path>
                                    <path d="M16.6629608,5.00806969 C20.075839,5.00806969 23.4895082,5.04048464 26.9015955,5.00077632 C32.0743009,4.93999829 36.7764008,8.45377891 38.3669682,13.4845792 C40.5080253,20.2536312 37.0706281,27.3727647 30.2812546,29.4578564 C23.7323248,31.469204 17.041027,27.7033972 15.13725,21.150715 C14.8248312,20.0745386 14.6895816,18.9351531 14.5646141,17.8135958 C14.4602108,16.8711311 15.0526201,16.1669164 15.8316896,16.1385533 C16.6036408,16.1101902 17.0916468,16.7357987 17.1699492,17.7520074 C17.4926501,21.9448813 19.4620746,24.9854036 23.2933567,26.6004785 C27.8997537,28.5429444 33.2931295,26.3354863 35.4389322,21.7098729 C37.8805441,16.4456849 35.321874,10.0761472 29.9340347,8.20337342 C28.8567832,7.82898074 27.6514005,7.7130973 26.5037559,7.70256244 C20.8715182,7.65150889 15.2384895,7.67500973 9.60546074,7.67419936 C8.13669715,7.67338898 5.99722191,7.70337281 4.52845832,7.67500973 C3.54295512,7.65637113 2.89597148,6.96512232 3.01382058,6.14745519 C3.11664194,5.42784329 3.6133482,5.02346679 4.42563696,5.02265641 C8.28143799,5.01941492 12.8071597,5.02103567 16.6629608,5.02103567 L16.6629608,5.00806969 Z" fill="#0094C1"></path>
                                    <path d="M18.9852527,11.0015964 C21.5743327,11.0015964 24.1626016,10.9975097 26.7516816,11.0024137 C30.2256883,11.0097697 32.8285573,12.8177117 33.7370064,16.1630583 C34.8190342,20.1483772 32.4424664,23.7315679 28.8046143,24.7703989 C25.6307202,25.6760046 21.6311108,23.8664279 20.4176823,19.9824585 C20.1954367,19.2713782 20.2100368,18.4622179 20.2351814,17.7020976 C20.2603259,16.963228 20.8621735,16.6779785 21.4891656,16.6706225 C22.0934465,16.6640839 22.5833601,16.9918346 22.7285497,17.6481536 C22.8339947,18.1222071 22.8891506,18.6077033 22.9840511,19.0842088 C23.3490529,20.9093148 25.3808967,22.4262861 27.2870176,22.303686 C29.2799279,22.1745473 31.1065595,20.4499733 31.2493158,18.5627499 C31.4634502,15.7102555 29.6416853,13.7184134 26.7865595,13.7126921 C21.4104874,13.7028841 16.0336042,13.7077881 10.6575321,13.7037014 C9.52845962,13.7037014 8.98257903,13.2476292 9.00042357,12.3379369 C9.01826811,11.4364179 9.6176823,11.0065004 10.7086324,11.0138564 C13.4672354,11.0334724 16.2266496,11.020395 18.9852527,11.020395 L18.9852527,11.0015964" fill="#F37820"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <svg class="logo__desktop" width="217px" height="54px" viewBox="0 0 217 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs>
                            <polygon id="path-1" points="265.453316 83.0966702 265.453316 30.0351562 49.0000304 30.0351562 49.0000304 83.0966702"></polygon>
                        </defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="dark-header" transform="translate(-49.000000, -30.000000)">
                                <mask id="mask-2" fill="white">
                                    <use xlink:href="#path-1"></use>
                                </mask>
                                <g id="Clip-1"></g>
                                <text mask="url(#mask-2)" font-family="Anago-Black" font-size="16.3714" font-weight="700" fill="#F37820">
                                    <tspan x="124.541849" y="47.2106197">ALL AROUND</tspan>
                                </text>
                                <text mask="url(#mask-2)" font-family="Anago-Black" font-size="27.1772" font-weight="700" fill="#FFFFFF">
                                    <tspan x="124.192096" y="69.8337602">MOBILITY</tspan>
                                </text>
                                <path d="M70.6099952,30.5698423 C76.8344885,30.5721921 83.0601565,30.5663177 89.2846498,30.573367 C97.3196269,30.5815911 104.155056,33.3942443 109.564185,39.3978608 C112.947828,43.1527646 114.950992,47.5608995 115.839198,52.5658714 C117.804765,63.6414278 112.011452,74.9531342 102.302276,80.0133253 C96.5994279,82.9845868 90.6016858,83.8504704 84.3478207,82.4276955 C74.6409949,80.2189286 68.2261718,74.2012135 65.0140607,64.8856215 C64.1740243,62.4477537 64.0988323,59.7302655 63.8145123,57.1255653 C63.665303,55.763884 64.5429354,54.8991752 65.7166366,54.9050496 C66.7634511,54.9097491 67.6751549,55.8155785 67.6657559,57.0597722 C67.6446081,59.8606767 68.1345314,62.5617167 69.2271661,65.1241213 C72.1913784,72.0699884 77.2539192,76.6590542 84.6474141,78.4895111 C94.1415873,80.8416129 103.077694,76.9727461 108.309417,69.6039236 C116.421936,58.1770793 111.722432,41.8016572 98.7846974,36.316161 C95.82166,35.0602185 92.7293863,34.4563322 89.538423,34.449283 C76.4291562,34.4199111 64.6745215,34.4422337 51.5652547,34.4175613 C50.8979252,34.4163865 50.0343913,34.3599924 49.6184852,33.9593597 C49.1790815,33.5340546 48.9253083,32.6329246 49.0192984,32.0031911 C49.1579338,31.0726893 50.0097189,30.6274113 50.9425705,30.5710172 C51.7638088,30.5204975 52.5897466,30.5674926 53.4133347,30.5674926 C59.5978822,30.5686675 64.4266227,30.5674926 70.6099952,30.5698423" fill="#0094C1" mask="url(#mask-2)"></path>
                                <path d="M74.9409408,38.7750591 C80.0105308,38.7750591 85.0812958,38.8220541 90.149711,38.7644852 C97.8334002,38.6763695 104.818038,43.7706319 107.180714,51.0642624 C110.361103,60.8780018 105.255092,71.1992878 95.1699563,74.2222438 C85.4419827,77.1382861 75.5025315,71.6786372 72.6746049,62.1785896 C72.2105289,60.6183542 72.009625,58.9664785 71.8239946,57.3404501 C71.668911,55.9740693 72.5488931,54.953102 73.706146,54.9119814 C74.852825,54.8708607 75.5777236,55.777865 75.6940363,57.2511595 C76.1733857,63.3299681 79.098827,67.738103 84.7899265,70.0796309 C91.6324045,72.8958088 99.6438842,69.6954465 102.831323,62.9892541 C106.458165,55.3572594 102.657441,46.1227338 94.6541857,43.4075952 C93.0540045,42.8648025 91.2634935,42.6967952 89.5587483,42.6815219 C81.1924561,42.6075047 72.824989,42.6415761 64.4575219,42.6404012 C62.2757771,42.6392263 59.0977375,42.6826967 56.9159927,42.6415761 C55.4520971,42.6145539 54.4910485,41.6123847 54.6661051,40.4269348 C54.8188389,39.3836448 55.5566611,38.7973817 56.7632588,38.7962068 C62.4907794,38.7915073 69.2134201,38.7938571 74.9409408,38.7938571 L74.9409408,38.7750591 Z" fill="#0094C1" mask="url(#mask-2)"></path>
                                <path d="M78.2630202,46.7915907 C82.0132245,46.7915907 85.7622539,46.7857163 89.5124582,46.7927656 C94.5444523,46.8033394 98.3146295,49.4021652 99.6304906,54.2109328 C101.197775,59.9396284 97.7553885,65.0902849 92.4860695,66.5835523 C87.8887796,67.885315 82.0954658,65.2841394 80.3378513,59.7011285 C80.0159353,58.6789864 80.037083,57.5158591 80.0735042,56.4232244 C80.1099253,55.3611365 80.9816834,54.9511047 81.8898625,54.9405308 C82.7651452,54.9311318 83.4747703,55.4022571 83.6850731,56.3456826 C83.837807,57.0271107 83.9176986,57.724987 84.0551591,58.4099398 C84.5838533,61.0334379 87.5269177,63.2140079 90.2878764,63.0377765 C93.1745468,62.852146 95.8203676,60.3731576 96.0271458,57.6603689 C96.3373131,53.5600515 93.6985415,50.6968786 89.5629779,50.6886545 C81.7758996,50.674556 73.9876463,50.6816052 66.200568,50.6757308 C64.5651406,50.6757308 63.774449,50.02015 63.8002963,48.712513 C63.8261435,47.4166247 64.6943769,46.7986399 66.2745852,46.8092138 C70.2703386,46.8374109 74.2672668,46.8186128 78.2630202,46.8186128 L78.2630202,46.7915907" fill="#F37820" mask="url(#mask-2)"></path>
                            </g>
                        </g>
                    </svg>

                <?= $end_wrap  ?>

                <!-- cart -->
                <a href="#" class="cart">

                    <img src="<?= DIRECT ?>img/shopping-cart-black-shape.png" width="32" height="28" alt="">

                    Cart

                </a>
                <!-- /cart -->

                <!-- login -->
                <a href="#" class="login">

                    <img src="<?= DIRECT ?>img/person.png" width="12" height="12" alt="">

                    Log In

                </a>
                <!-- /login -->

                <!-- search -->
                <div class="search">

                    <form action="#">
                        <input type="search" name="search" id="search">
                        <button type="submit">search</button>
                    </form>

                    <!-- search__result -->
                    <div class="search__result">

                        <div>

                            <ul class="search__found">
                                <li>Wheelchairs

                                    <ul>
                                        <li>Transport Wheelchairs</li>
                                        <li>Standard Wheelchairs</li>
                                        <li>Lightweight Wheelchairs</li>
                                        <li>Ultralightweight Wheelchairs</li>
                                    </ul>

                                </li>
                                <li>3-Wheel Chair</li>
                                <li>4-Wheel Rollators</li>
                                <li>3-Wheel Rollators</li>
                                <li>Wagon Wheels</li>
                                <li>Wheelie Wonkie</li>
                            </ul>

                        </div>
                        <div>

                            <!-- top-products -->
                            <div class="top-products">

                                <h2 class="top-products__title">Top Products</h2>

                                <!-- top-products__wrap -->
                                <div class="top-products__wrap">
                                    <div>

                                        <!-- top-products__item -->
                                        <div class="top-products__item">

                                            <!-- top-products__pic -->
                                            <div class="top-products__pic">

                                                <img src="pic/lift-chairs.png" width="414" height="414" alt="">

                                            </div>
                                            <!-- /top-products__pic -->

                                            <!-- top-products__price -->
                                            <span class="top-products__price"><del>$1,800</del> $1,350</span>
                                            <!-- /top-products__price -->

                                            <!-- top-products__item-title -->
                                            <h3 class="top-products__item-title">Wheelchairs
                                                Product Title</h3>
                                            <!-- /top-products__item-title -->

                                            <!-- top-products__btn -->
                                            <a href="#" class="top-products__btn">view</a>
                                            <!-- /top-products__btn -->

                                        </div>
                                        <!-- /top-products__item -->

                                    </div>
                                    <div>

                                        <!-- top-products__item -->
                                        <div class="top-products__item">

                                            <!-- top-products__pic -->
                                            <div class="top-products__pic">

                                                <img src="pic/lift-chairs.png" width="414" height="414" alt="">

                                            </div>
                                            <!-- /top-products__pic -->

                                            <!-- top-products__price -->
                                            <span class="top-products__price"><del>$1,800</del> $1,350</span>
                                            <!-- /top-products__price -->

                                            <!-- top-products__item-title -->
                                            <h3 class="top-products__item-title">Wheelchairs
                                                Product Title</h3>
                                            <!-- /top-products__item-title -->

                                            <!-- top-products__btn -->
                                            <a href="#" class="top-products__btn">view</a>
                                            <!-- /top-products__btn -->

                                        </div>
                                        <!-- /top-products__item -->

                                    </div>
                                    <div>

                                        <!-- top-products__item -->
                                        <div class="top-products__item">

                                            <!-- top-products__pic -->
                                            <div class="top-products__pic">

                                                <img src="pic/lift-chairs.png" width="414" height="414" alt="">

                                            </div>
                                            <!-- /top-products__pic -->

                                            <!-- top-products__price -->
                                            <span class="top-products__price"><del>$1,800</del> $1,350</span>
                                            <!-- /top-products__price -->

                                            <!-- top-products__item-title -->
                                            <h3 class="top-products__item-title">Wheelchairs
                                                Product Title</h3>
                                            <!-- /top-products__item-title -->

                                            <!-- top-products__btn -->
                                            <a href="#" class="top-products__btn">view</a>
                                            <!-- /top-products__btn -->

                                        </div>
                                        <!-- /top-products__item -->

                                    </div>
                                    <div>

                                        <!-- top-products__item -->
                                        <div class="top-products__item">

                                            <!-- top-products__pic -->
                                            <div class="top-products__pic">

                                                <img src="pic/lift-chairs.png" width="414" height="414" alt="">

                                            </div>
                                            <!-- /top-products__pic -->

                                            <!-- top-products__price -->
                                            <span class="top-products__price"><del>$1,800</del> $1,350</span>
                                            <!-- /top-products__price -->

                                            <!-- top-products__item-title -->
                                            <h3 class="top-products__item-title">Wheelchairs
                                                Product Title</h3>
                                            <!-- /top-products__item-title -->

                                            <!-- top-products__btn -->
                                            <a href="#" class="top-products__btn">view</a>
                                            <!-- /top-products__btn -->

                                        </div>
                                        <!-- /top-products__item -->

                                    </div>
                                    <div>

                                        <!-- top-products__item -->
                                        <div class="top-products__item">

                                            <!-- top-products__pic -->
                                            <div class="top-products__pic">

                                                <img src="pic/lift-chairs.png" width="414" height="414" alt="">

                                            </div>
                                            <!-- /top-products__pic -->

                                            <!-- top-products__price -->
                                            <span class="top-products__price"><del>$1,800</del> $1,350</span>
                                            <!-- /top-products__price -->

                                            <!-- top-products__item-title -->
                                            <h3 class="top-products__item-title">Wheelchairs
                                                Product Title</h3>
                                            <!-- /top-products__item-title -->

                                            <!-- top-products__btn -->
                                            <a href="#" class="top-products__btn">view</a>
                                            <!-- /top-products__btn -->

                                        </div>
                                        <!-- /top-products__item -->

                                    </div>
                                    <div>

                                        <!-- top-products__item -->
                                        <div class="top-products__item">

                                            <!-- top-products__pic -->
                                            <div class="top-products__pic">

                                                <img src="pic/lift-chairs.png" width="414" height="414" alt="">

                                            </div>
                                            <!-- /top-products__pic -->

                                            <!-- top-products__price -->
                                            <span class="top-products__price"><del>$1,800</del> $1,350</span>
                                            <!-- /top-products__price -->

                                            <!-- top-products__item-title -->
                                            <h3 class="top-products__item-title">Wheelchairs
                                                Product Title</h3>
                                            <!-- /top-products__item-title -->

                                            <!-- top-products__btn -->
                                            <a href="#" class="top-products__btn">view</a>
                                            <!-- /top-products__btn -->

                                        </div>
                                        <!-- /top-products__item -->

                                    </div>
                                </div>
                                <!-- /top-products__wrap -->

                            </div>
                            <!-- /top-products -->

                        </div>

                    </div>
                    <!-- /search__result -->

                </div>
                <!-- /search -->

                <!-- site__header-btn -->
                <button class="site__header-btn">
                    <span></span>
                </button>
                <!-- /site__header-btn -->

                <!-- site__header-get -->
                <a class="site__header-get" href="#">

                    <img src="img/book.png" width="17" height="18" alt="book">

                    GET A FREE CATALOG</a>
                <!-- /site__header-get -->

                <?php $phone = get_field('main_phone','options');  ?>

                <!-- site__header-call -->
                <a class="site__header-call" href="tel:<?= $phone ?>">

                    <span>NEED HELP? CALL NOW:</span>

                    <svg width="13px" height="18px" viewBox="0 0 13 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.5">
                            <g transform="translate(-230.000000, -79.000000)" fill="#FFFFFF">
                                <g transform="translate(230.000000, 79.000000)">
                                    <circle id="Oval-5-Copy-2" cx="11.5" cy="1.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-5" cx="11.5" cy="6.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-8" cx="11.5" cy="11.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-3" cx="6.5" cy="1.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-6" cx="6.5" cy="6.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-9" cx="6.5" cy="11.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-11" cx="6.5" cy="16.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-4" cx="1.5" cy="1.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-7" cx="1.5" cy="6.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-10" cx="1.5" cy="11.5" r="1.5"></circle>
                                </g>
                            </g>
                        </g>
                    </svg>

                    <span>CALL</span> <?= $phone ?></a>
                <!-- /site__header-call -->

                <!-- site__menu -->
                <nav class="site__menu">

                    <ul>
                        <li class="site__menu-item active site__menu-item_sub">
                            <a href="#" data-product='{
                                "src": "pic/girl.jpg",
                                "name": "bla bla bal",
                                "url": "ghjfghf",
                                "price": "1000$",
                                "oldPrice": "1$",
                                "onSale": "true"
                            }'>
                                Mobility Scooters</a>

                            <div class="site__menu-sub">

                                <div>

                                    <ul>
                                        <li><a href="#" data-product='{
                                "src": "pic/lift-chairs.png",
                                "name": "bla bla bal",
                                "url": "ghjfghf",
                                "price": "1000$",
                                "oldPrice": "100$",
                                "onSale": "true"
                            }'>4-Wheel Rollators</a></li>
                                        <li><a href="#" data-product='{
                                "src": "pic/girl.jpg",
                                "name": "bla bla bal",
                                "url": "ghjfghf",
                                "price": "1000$"
                            }'>3-Wheel Rollators</a></li>
                                        <li><a href="#" data-product='{
                                "src": "pic/lift-chairs.png",
                                "name": "bla bla bal",
                                "url": "ghjfghf",
                                "price": "1000$",
                                "oldPrice": "100$",
                                "onSale": "true"
                            }'>Standard Walkers</a></li>
                                        <li><a href="#">Heavy Duty Walkers</a></li>
                                        <li><a href="#">Standard Canes</a></li>
                                        <li><a href="#">Quad Canes</a></li>
                                        <li><a href="#">Folding Canes</a></li>
                                        <li><a href="#">Seat Canes</a></li>
                                        <li><a href="#">Fashion Canes</a></li>
                                        <li><a href="#">Heavy Duty Canes</a></li>
                                        <li><a href="#">Walking Sticks</a></li>
                                    </ul>
                                    <ul>
                                        <li><a href="#">Cane Accessories</a></li>
                                        <li><a href="#">Crutches</a></li>
                                        <li><a href="#">Knee Walkers</a></li>
                                        <li><a href="#">Specialty Walkers</a></li>
                                        <li><a href="#">Two-in-one Walker-Wheelchair</a></li>
                                        <li><a href="#">Walker Accessories</a></li>
                                    </ul>

                                </div>
                                <div>

                                    <!-- featured-product -->
                                    <div class="featured-product">
                                        <h2 class="featured-product__title">The Name of the
                                            product</h2>

                                        <div class="featured-product__pic">
                                            <span class="featured-product__remark"><span>ON SALE</span></span>
                                            <img src="pic/lift-chairs.png" width="414" height="414" alt="">
                                        </div>

                                        <span class="featured-product__price"><del>$1,800.00</del> <span>$1,350.00</span></span>

                                        <a href="#" class="btn">SEE MORE</a>
                                    </div>
                                    <!-- /featured-product -->

                                </div>

                            </div>

                        </li>
                        <li class="site__menu-item">
                            <a href="#">Manual Wheelchairs</a>
                        </li>
                        <li class="site__menu-item">
                            <a href="#">Power Wheelchairs</a>
                        </li>
                        <li class="site__menu-item">
                            <a href="#">Walking Aids</a>
                        </li>
                        <li class="site__menu-item">
                            <a href="#">Lift Chairs</a>
                        </li>
                        <li class="site__menu-item site__menu-item_sub">
                            <a href="#">Patient Lifts</a>

                            <div class="site__menu-sub">

                                <ul>
                                    <li><a href="#">4-Wheel Rollators</a></li>
                                    <li><a href="#">3-Wheel Rollators</a></li>
                                    <li><a href="#">Standard Walkers</a></li>
                                    <li><a href="#">Heavy Duty Walkers</a></li>
                                    <li><a href="#">Standard Canes</a></li>
                                    <li><a href="#">Quad Canes</a></li>
                                    <li><a href="#">Folding Canes</a></li>
                                    <li><a href="#">Seat Canes</a></li>
                                    <li><a href="#">Fashion Canes</a></li>
                                    <li><a href="#">Heavy Duty Canes</a></li>
                                    <li><a href="#">Walking Sticks</a></li>
                                    <li><a href="#">Cane Accessories</a></li>
                                    <li><a href="#">Crutches</a></li>
                                    <li><a href="#">Knee Walkers</a></li>
                                    <li><a href="#">Specialty Walkers</a></li>
                                    <li><a href="#">Two-in-one Walker-Wheelchair</a></li>
                                    <li><a href="#">Walker Accessories</a></li>
                                </ul>

                                <!-- featured-product -->
                                <div class="featured-product">
                                    <h2 class="featured-product__title">The Name of the
                                        product</h2>

                                    <div class="featured-product__pic">
                                        <span class="featured-product__remark"><span>ON SALE</span></span>
                                        <img src="pic/lift-chairs.png" width="414" height="414" alt="">
                                    </div>

                                    <span class="featured-product__price"><del>$1,800.00</del> $1,350.00</span>

                                    <a href="#" class="btn">SEE MORE</a>
                                </div>
                                <!-- /featured-product -->

                            </div>
                        </li>
                        <li class="site__menu-item">
                            <a href="#">Vehicle Lifts</a>
                        </li>
                        <li class="site__menu-item">
                            <a href="#">Other</a>
                        </li>
                        <li class="site__menu-item">
                            <a href="#">About</a>
                        </li>
                    </ul>

                </nav>
                <!-- /site__menu -->

            </div>
            <!-- /site__header-layout -->

        </header>
        <!-- /site__header -->