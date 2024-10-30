<?php

/**
 * @link              codeway.ir
 * @since             1.0.0
 * @package           Category_Count
 *
 * @wordpress-plugin
 * Plugin Name:       Category count shortcode
 * Plugin URI:        
 * Description:       Show category count with shortcode.
 * Version:           1.4
 * Author:            codeway.ir
 * Author URI:        http://codeway.ir
 * License:           CS
 * License URI:       http://codeway.ir/license
 * Text Domain: ccs
 * Domain Path: /languages 
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

add_action( 'admin_init', 'ccs_load_textdomain' );
 
/**
 * Load plugin textdomain.
 */

if( !function_exists( 'ccs_load_textdomain' ) ){

	function ccs_load_textdomain() {
  
		load_plugin_textdomain( 'category-count-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	
	}

}


if( is_admin() ){

	define ( 'CCS_DIR', plugin_dir_path( __FILE__ ) .'/');

	require_once( CCS_DIR .'option-page/option-page.php');

}

add_shortcode( 'show_category_count', 'category_count_shortcode_output');

function category_count_shortcode_output(){

	//https://stackoverflow.com/questions/41371392/count-the-total-number-of-categories-in-wordpress

	$args = array(

		'get' => 'all',

		'hide_empty' => 1

	);

	$categories = get_categories( $args );

	return count( $categories );

}
   
