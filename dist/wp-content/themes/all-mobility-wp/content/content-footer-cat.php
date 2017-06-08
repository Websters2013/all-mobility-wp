
<?php

$locations = get_nav_menu_locations();

$menu_items = wp_get_nav_menu_items($locations['footer_cat_menu']);

$countItems = count($menu_items);

if($menu_items): ?>

    <!-- site__footer-categories -->
    <div class="site__footer-categories">

        <?php for($i = 0; $i<$countItems; $i++){

            //1 lvl
            if($menu_items[$i]->menu_item_parent == 0){

                $menusArray .= '<dl>';

                $menu_id = $menu_items[$i]->ID;

                $t_id = $menu_items[$i]->object_id;

                ($menu_items[$i+1]->menu_item_parent == $menu_items[$i]->ID )? $flag_i = true : $flag_i = false;

                $link = get_term_link( (int)$t_id, 'product_cat' );

                $menusArray .= '<dt><a href="'.$link.'">'.$menu_items[$i]->title.'</a></dt>';

                if( $flag_i ){

                    for($j = 0; $j<$countItems; $j++){

                        $t_jd = $menu_items[$j]->object_id;
                        $link = get_term_link( (int)$t_jd, 'product_cat' );

                        if( $menu_items[$j]->menu_item_parent ==  $menu_items[$i]->ID ):

                            $menusArray .= '<dd><a href="'.$link.'">'.$menu_items[$j]->title.'</a></dd>';

                        endif;

                    }

                } ?>



                <?php

                $menusArray .= '</dl>';

            }


        } ?>

        <?php echo $menusArray; ?>

    </div>
    <!-- /site__footer-categories -->

<?php  endif;

?>
