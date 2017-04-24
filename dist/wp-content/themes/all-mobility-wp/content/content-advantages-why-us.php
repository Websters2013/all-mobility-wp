
<?php $frontPage_id = get_option( 'page_on_front' ); ?>

    <?php if( have_rows('advantages_list', $frontPage_id ) ):
        $count = 0;
        ?>

    <ul class="why-us__advantages">

        <?php  while ( have_rows('advantages_list', $frontPage_id ) ) : the_row();

            if( get_sub_field('hide_on_categories_page') != 'hide' && $count != 4) {
                
                $image = get_sub_field('advantage_image_in_why_us_block');
                ?>

                <li>
                                <span>
                                    <?php if ($image): ?>
                                        <img src="<?= $image['url'] ?>" width="32" height="32"
                                             alt="<?= $image['alt'] ?>" title="<?= $image['title'] ?>">
                                    <?php endif; ?>
                                </span>
                    <?= get_sub_field('advantage_text') ?>
                </li>

                <?php
            }
        $count++;
        endwhile; ?>

    </ul>

<?php endif; ?>