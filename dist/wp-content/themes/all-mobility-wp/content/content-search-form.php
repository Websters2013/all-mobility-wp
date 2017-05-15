<!-- search-btn -->
<a href="#" class="search-btn">

    <svg width="12px" height="12px" viewBox="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
        <desc>Created with Sketch.</desc>
        <defs></defs>
        <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="main-menu-mobile" transform="translate(-237.000000, -36.000000)" stroke="#F47920" stroke-width="2">
                <g id="icon-search" transform="translate(238.000000, 37.000000)">
                    <circle id="Oval-8" cx="4.5" cy="4.5" r="4.5"></circle>
                    <path d="M8,8 L10,10" id="Path-12" stroke-linecap="round"></path>
                </g>
            </g>
        </g>
    </svg>

    Search

</a>
<!-- /search-btn -->

<?php
$symbolsNumber = get_field( 'set_number', 'options' );

if(!$symbolsNumber){
    $symbolsNumber = 0;
}

?>

<!-- search -->
<div class="search" data-symbols="<?= $symbolsNumber ?>" data-path="<?php echo admin_url( 'admin-ajax.php' );?>" data-action="http://www.erefre.com">

    <form action="<?= get_permalink(444) ?>">
        <input type="search" name="search" id="search1" autocomplete="off">
        <button type="submit">search</button>
        <a href="#" class="search__cancel">cancel</a>
    </form>

    <!-- search__result -->
    <div class="search__result">

        <div>

            <ul class="search__found">

            </ul>

        </div>
        <div>

            <!-- top-products -->
            <div class="top-products">
                
                <!-- top-products__wrap -->
                <div class="top-products__wrap">


                </div>
                <!-- /top-products__wrap -->

            </div>
            <!-- /top-products -->

        </div>

    </div>
    <!-- /search__result -->

</div>
<!-- /search -->
