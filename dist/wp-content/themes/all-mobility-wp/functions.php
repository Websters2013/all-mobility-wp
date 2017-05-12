<?php
define( 'TEMPLATEINC', TEMPLATEPATH . '/inc' );
define( 'TEMPLATEURI', get_template_directory_uri() );
define( 'DIRECT', TEMPLATEURI.'/assets/' );
show_admin_bar( false );

//define('DISALLOW_FILE_MODS',true);

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

require_once( TEMPLATEINC . '/template.php' );
require_once( TEMPLATEINC . '/actions.php' );
require_once( TEMPLATEINC . '/ajaxes.php' );
require_once( TEMPLATEINC . '/often_parts.php' );
require_once( TEMPLATEINC . '/woocommerce-func.php' );