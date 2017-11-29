<?php if( have_rows('slider_constructor') ): ?>

<div class="main-slider">

    <div class="swiper-container">

        <div class="swiper-wrapper">

            <?php   while ( have_rows('slider_constructor') ) : the_row();
                $image = get_sub_field('choose_the_image');
                $text = get_sub_field('description_text');
                $text_2 = get_sub_field('description_text_2');
	            $link_title = get_sub_field('link_for_current_slide_title');
	            $slide_position = get_sub_field('slide_position');

                if( get_sub_field('check_if_link_go_to_popup')[0] == 'show') {
                   $link = '#';
                    $class_popup = ' popup__open';
                } else {
                    $link = get_sub_field('link_for_current_slide');
                    $class_popup = '';
                }
                ?>

                <a href="<?= $link ?>"  data-popup="get" class="main-slider__item swiper-slide<?= $class_popup ?> <?php if($slide_position){ echo 'main-slider__item_'.$slide_position; } ?>" style="background-image: url(<?= $image ?>)">

                    <!-- main-slider__content -->
                    <div class="main-slider__content">

                        <h2 class="main-slider__title"><?= $text ?></h2>

                        <?php if($text_2) {
                           echo '<p>'.$text_2.'</p>';
                        }?>

                        <?php if($link): ?>

                        <span class="btn btn_5 btn_img-right">

                            <?php if($link_title) {echo $link_title;} else { ?>learn more<?php } ?>

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


