<?php
/**
 * Template Name: Form
 */
get_header(); ?>


<?php woocommerce_breadcrumb(); ?>
<div class="site__content">

    <?php echo do_shortcode('[contact-form-7 id="1730" title="Mega form"]'); ?>
</div>
<?php get_footer(); ?>