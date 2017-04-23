
<?php $frontPage_id = get_option( 'page_on_front' ); ?>

    <?php if( have_rows('advantages_list', $frontPage_id ) ): ?>

    <ul class="advantages__list">

        <?php  while ( have_rows('advantages_list', $frontPage_id ) ) : the_row();
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