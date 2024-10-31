<?php

function numb_plugin_assets() {

	wp_enqueue_script( 'numb-main-js', plugin_dir_url( __FILE__ ) . '../js/numb-main.js', null, '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'numb_plugin_assets' );