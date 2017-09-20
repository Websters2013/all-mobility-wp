<?php
/**
 * Template Name: Brands
 */
get_header(); ?>

<!-- site__content -->
<div class="site__content site__content_inner site__white-back site__content-brands">

    <!-- why-us -->
    <div class="why-us">
        <div>
					<?php $frontPage_id = get_option( 'page_on_front' ); ?>
            <h2 class="why-us__title"><?= get_field('why_us_title', $frontPage_id) ?></h2>

					<?php get_template_part('content/content','advantages-why-us') ?>

        </div>
        <div class="why-us__resolve">

            <h2 class="why-us__resolve-title">Questions?
                Concerns?</h2>

            <!-- why-us__call -->
            <div class="why-us__call">
                <span>Call us now or leave a message</span>

							<?php $phone = get_field('main_phone', 'options') ?>

							<?php if( $phone ): ?>

                  <a class="why-us__phone" href="<?= $phone ?>">
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
										<?= $phone ?>
                  </a>

							<?php endif; ?>

            </div>
            <!-- /why-us__call -->

        </div>
    </div>
    <!-- /why-us -->

	<div class="brands">

        <div class="brands__title">
            <h2>Brand Showcase</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        </div>

        <div class="brands__wrap">

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

            <a class="brands__item" href="#">
                <h3>E-Wheels</h3>
                <div class="brands__item-image" style="background-image: url('<?= get_template_directory_uri().'/assets/img/bitmap.png'; ?>'); "></div>
            </a>

        </div>

        <div class="brands__subtitle">
            <h3>Shop online OR offline</h3>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        </div>

    </div>

</div>


<?php get_footer(); ?>
