<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<!-- site__content -->
<div class="site__content">

    <!-- site__content__wrap -->
    <div class="site__content__wrap">

        <!-- site__inner -->
        <div class="site__inner">

           <?php get_template_part('content/content','home-slider') ?>

            <!-- product-categories -->
            <div class="product-categories site__white-back">

                <h2 class="site__title"><?php the_field('title_for_this_block') ?></h2>

                <?php get_template_part('content/content','home-category') ?>

            </div>
            <!-- /product-categories -->

            <!-- advantages -->
            <div class="advantages advantages_mob">

                <h2 class="advantages__title">
                    <?= get_field('advantages_title') ?>
                </h2>

               <?php get_template_part('content/content', 'advantages') ?>

            </div>
            <!-- /advantages -->

            <!-- featured-products -->
            <div class="featured-products site__white-back">

                <h2 class="site__title"><?php the_field('featured_title') ?>

<!--                    <a class="site__title-link" href="#">see full catalog</a>-->

                </h2>
                
                <!-- featured-products__inner -->
                <div class="featured-products__inner">
                    <?php get_template_part('content/content','home-featured') ?>
                </div>
                <!-- /featured-products__inner -->

            </div>
            <!-- /featured-products -->

            <!-- check-out -->
            <div class="check-out site__white-back">

                <h2 class="site__title"><?= get_field( 'choose_the_title' ) ?>

                    <a class="site__title-link" href="<?= get_permalink(432) ?>">store locator</a>

                </h2>

                <div class="check-out__map" style="background-image: url(<?= get_field( 'choose_the_map_image' ) ?>)">

                    <a href="#" class="btn btn_3">store locator</a>

                </div>

            </div>
            <!-- /check-out -->

            <?php if( have_rows('about_block') ): ?>

                <!--main-text -->
                <div class="main-text site__white-back">

                           <?php  while ( have_rows('about_block') ) : the_row(); ?>

                               <div>
                                   <h2 class="main-text__title"><?= get_sub_field('about_block_title') ?></h2>
                                   <div class="main-text__content">

                                       <?php the_sub_field('about_block_description') ?>

                                   </div>
                               </div>

                    <?php endwhile; ?>

                </div>
                <!-- /main-text -->

           <?php  endif; ?>

        </div>
        <!-- /site__inner -->

        <?php get_template_part('content/content','home-aside') ?>
        
    </div>
    <!-- /site__content__wrap -->

</div>
<!-- /site__content -->

<?php get_footer(); ?>
