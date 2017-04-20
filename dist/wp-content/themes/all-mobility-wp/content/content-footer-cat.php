
    <?php $terms = get_terms(array(
        'taxonomy'=>'product_cat',
        'hide_empty' => false,
        'parent'=> 0
    )) ;
 ?>

    <!-- site__footer-categories -->
    <div class="site__footer-categories">

        <?php foreach ($terms as $term){
            $termId = $term->term_id;
            ?>
            <dl>
                <dt><a href="<?= get_term_link($termId) ?>"><?= $term->name ?></a></dt>

                <?php $terms_inner = get_terms(array(
                    'taxonomy'=>'product_cat',
                    'hide_empty' => false,
                    'parent'=> $termId
                )) ; ?>

                <?php foreach ($terms_inner as $item): ?>
                    <dd><a href="<?= get_term_link($item->term_id) ?>"><?= $item->name ?></a></dd>
                <?php endforeach; ?>
            </dl>
        <?php } ?>

    </div>
    <!-- /site__footer-categories -->