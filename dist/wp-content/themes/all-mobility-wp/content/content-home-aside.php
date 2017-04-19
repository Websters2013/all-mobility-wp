
<aside class="site__aside">

    <!-- advantages -->
    <div class="advantages">

        <h2 class="advantages__title">
           <?= get_field('advantages_title') ?>
        </h2>

        <?php if( have_rows('advantages_list') ): ?>

        <ul class="advantages__list">

                  <?php  while ( have_rows('advantages_list') ) : the_row();
                      $image = get_sub_field('advantage_image');
                      ?>

                      <li>
                                <span>
                                    <?php if($image): ?>
                                    <img src="<?= $image['url'] ?>" width="32" height="32" alt="<?= $image['alt'] ?>" title="<?= $image['title'] ?>">
                                    <?php endif; ?>
                                </span>
                      <?= get_sub_field('advantage_text') ?>
                      </li>

                        <?php
        
                    endwhile; ?>

                </ul>

                <?php endif; ?>
    </div>
    <!-- /advantages -->

    <!-- need-help -->
    <div class="need-help">

        <!-- need-help__title -->
        <h2 class="need-help__title">
            <span>$</span>
            <?= get_field( 'financing_title' ) ?>
        </h2>
        <!-- /need-help__title -->

        <a href="" class="btn btn_2 btn_img-right">
            learn more
            <img src="<?= DIRECT ?>/img/arrow-right.png" width="18" height="14" alt="arrow">
        </a>

    </div>
    <!-- /need-help -->

    <!-- watch-video -->
    <div class="watch-video" style="background-image: url(<?= get_field('video_image') ?>)">

        <!-- watch-video__title -->
        <h2 class="watch-video__title">video</h2>
        <!-- /watch-video__title -->

        <a href="#" class="btn btn_3">watch video</a>

    </div>
    <!-- /watch-video -->

    <?php get_template_part('content/content','aside-contact') ?>
    
</aside>
