<?php if( have_rows('slider_constructor') ): ?>

<div class="main-slider">

    <div class="swiper-container">

        <div class="swiper-wrapper">

            <?php   while ( have_rows('slider_constructor') ) : the_row();
                $image = get_sub_field('choose_the_image');
                $text = get_sub_field('description_text');
                $link = get_sub_field('link_for_current_slide'); ?>

                <a href="<?= $link ?>" class="swiper-slide" style="background-image: url(<?= $image ?>)">

                    <!-- main-slider__content -->
                    <div class="main-slider__content">
                        <h2 class="main-slider__title"><?= $text ?></h2>

                        <?php if($link): ?>

                        <span class="btn btn_5 btn_img-right">
                            learn more

                            <img src="<?= DIRECT ?>img/arrow-right.png" width="18" height="14" alt="">
                        </span>
                        <?php endif; ?>

                    </div>
                    <!-- /main-slider__content -->

                </a>

                <?php endwhile; ?>

        </div>

        <div class="main-slider__constrols">
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
        </div>


    </div>

</div>

<?php  endif; ?>


