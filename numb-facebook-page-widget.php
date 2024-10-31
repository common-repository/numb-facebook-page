<?php
/*
Plugin Name: Numb Facebook Page Widget
Plugin URI: http://codiov.com/wpdemo
Description: A Facebook page widget plugin with lot's of options
Version: 1.0
Author: Ibrahim Hasnat
Author URI: http://codiov.com/
Text Domain: numb
Domain Path: /languages
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

Numb Facebook Page Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Numb Facebook Page Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Numb Facebook Page Plugin. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Exit if access directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

function numb_load_text_domain() {
    load_plugin_textdomain( 'numb' );
}

add_action( 'plugins_loaded', 'numb_load_text_domain' );

// Load Class
require_once( plugin_dir_path(__FILE__) . '/includes/numb-facebook-page-plugin-class.php' );

// Load Plugin Assets
require_once( plugin_dir_path(__FILE__) . '/includes/numb-plugin-assets.php' );

// Register Widget
function numb_widget_register() {

	register_widget( 'Numn_Facebook_Page_Widget' );

}
add_action( 'widgets_init', 'numb_widget_register' );