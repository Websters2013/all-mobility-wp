<?php

function iframe_function($attr, $content = '') {
	$iframe = '<div class="iframe">' . $content . '</div>';
	return $iframe;
}

function register_shortcodes(){
	add_shortcode('iframe', 'iframe_function');
}
function register_button( $buttons ) {
	array_push( $buttons, "|", "iframe" );
	return $buttons;
}
function add_plugin( $plugin_array ) {
	$plugin_array['iframe'] = get_template_directory_uri() . '/assets/js/iframe-button.js';
	return $plugin_array;
}

function add_all() {
	add_filter( 'mce_external_plugins', 'add_plugin' );
	add_filter( 'mce_buttons', 'register_button' );
}
add_action( 'init', 'register_shortcodes' );
add_action( 'init', 'add_all' );