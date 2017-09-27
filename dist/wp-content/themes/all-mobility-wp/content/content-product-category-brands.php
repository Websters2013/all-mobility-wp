<?php global $wp_query;

$cat_obj = $wp_query->get_queried_object();

$category_ID  = $cat_obj->term_id;
$args = array(
	'taxonomy'      => 'product_cat',
	'order'         => 'ASC',
	'hide_empty'    => false,
	'fields'        => 'ids',
	'parent'         => $category_ID,

);
$terms = get_terms($args);

 ?>
<div class="brands">

    <div class="brands__title">
			<?= get_field('title', 'product_cat_'.$category_ID); ?>
    </div>
    <?php if(!empty($terms)) { ?>
    <div class="brands__wrap">
        <?php foreach ($terms as $row) {
        $term = get_term_by('id',$row, 'product_cat');
        $thumbnail_id = get_woocommerce_term_meta( $row, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        ?>
        <a class="brands__item" href="<?= get_term_link($row); ?>">
            <h3><?= $term->name; ?></h3>
            <div class="brands__item-image" style="background-image: url('<?= $image ?>'); "></div>
        </a>
	    <?php } ?>

    </div>
    <?php } ?>

    <div class="brands__subtitle">
			<?= get_field('description', 'product_cat_'.$category_ID); ?>
    </div>

</div>