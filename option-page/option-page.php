<?php

/**
 * @link    Codeway.ir
 */


/**
 * Add the top level menu page.
 */
function ccs_options_page() {

	/**
     * If main option page doesnt
     * 
     * exist so create.
    */
	
	$menu_url = menu_page_url( 'codewayir-slug', false );
 
	if (!$menu_url) {

	add_menu_page(

        //$page_title string Required
        //The text to be displayed in the title tags of the page when the menu is selected.
		'Codeway.ir',

        //$menu_title string Required
        //The text to be used for the menu.
		__('Codeway.ir', 'category-count-shortcode'),

        //$capability string Required
        //The capability required for this menu to be displayed to the user.
		'manage_options',

        //$menu_slug string Required
        //The slug name to refer to this menu by. Should be unique for this menu page and only include lowercase alphanumeric, dashes, and underscores characters to be compatible with sanitize_key() .
		'codewayir-slug',

		//$callback callable Optional
		// The function to be called to output the content for this page.
		// Default: ''
		'ccs_options_page_html'
	);

	}

	add_submenu_page( 
		
		'codewayir-slug',   //Parent slug
		
		'Category count shortcode',
		
		'Category count shortcode',
		
		'manage_options',
		
		'category-count-shortcode',
		
		'category_count_shortcode_submenu_page_callback',
	);
        
}


/**
 * Register our ccs_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'ccs_options_page' );


/**
 * Top level menu callback function
 */
function ccs_options_page_html() {

	?>
	
	<div class="wrap">

		<h1>
			
			<?php echo esc_html( get_admin_page_title() ); ?>
		
		</h1>
		
		<?php _e( '<p style="font-size:2.2rem">Good day, <a href="http://codeway.ir">Codeway.ir</a> Plugins page.<br><br> If you have in mind some more case or different if you wish <a href="http://codeway.ir/communication">let us know</a>.</p>', 'category-count-shortcode' );//title ?>
	
	</div>

	<?php
}


if (!function_exists('category_count_shortcode_submenu_page_callback')){

	function category_count_shortcode_submenu_page_callback(){

		?>

		<br>

		<?php _e('<h1 style="font-size:4.2rem">Category count shortcode</h1>', 'category-count-shortcode');?>

		<br>

		<?php _e('<h2 style="font-size:3.2rem">How to use</h2>', 'category-count-shortcode');?>

		<?php _e( '<p style="font-size:2.2rem">Use <code style="font-size:2.2rem">[show_category_count]</code>  shortcode to show the categories count.</p>', 'category-count-shortcode');?>

		<?php

	}

}