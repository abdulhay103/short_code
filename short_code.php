<?php 

	/**

	 * Plugin Name:			Short Code
	 * Plugin URI:			http://journeybyweb.com/
	 * Description:			Write less and get more with this plugin.
	 * Version:				1.0.0
	 * Requires at least:	5.2
	 * Requires PHP:		7.2
	 * Author:				Abdul Hay
	 * Author URI:			http://abdulhay.journeybyweb.com/
	 * License:				GPL v2 or later
	 * License URI:			https://www.gnu.org/licenses/gpl-2.0.html
	 * Text Domain:			short_code
	 * Domain Path:			/languages

	*/

	/*function short_code_activation_hook(){}
		register_activation_hook( __FILE__, 'short_code_activation_hook' );

	function short_code_deactivation_hook(){}
		register_deactivation_hook( __FILE__, 'short_code_activation_hook' );*/


	function short_code_load_textdomain(){
		load_plugin_textdomain( 'short_code', false, dirname(__FILE__).'/languages' );
	}
	add_action( 'plugin_loaded', 'short_code_load_textdomain');

	//Short code plugin system
	function ThemeZone_short_code_button($attributes){
		return sprintf('<a target="_blank" class="btn btn-%s" href="%s"> %s </a>',
			$attributes['type'],
			$attributes['url'],
			$attributes['title']
		);
	}
	add_shortcode( 'button', 'ThemeZone_short_code_button' );

	function ThemeZone_short_code_button2($attributes, $content){
		$default_value = array(
			'type' => 'primary',
			'size' => 'col-6',
			'url'  => '',
		);

		$default_attributes = shortcode_atts( $default_value, $attributes);

		return sprintf('<a target="_blank" class="btn btn-%s %s" href="%s"> %s </a>',
			$default_attributes['type'],
			$default_attributes['size'],
			$default_attributes['url'],
			$content
		);
	}
	add_shortcode( 'button2', 'ThemeZone_short_code_button2' );


	function ThemeZone_short_code_google_map($attributes){
		$default_value = array(
			'place' => 'Dhaka',
			'width' => '100%',
			'height' => '300',
			'zoom' => '13',
		);
		$default_attributes = shortcode_atts( $default_value, $attributes );

		$map =  <<<EOD
					<div class="mt-3">
						<iframe width="{$default_attributes['width']}" height="{$default_attributes['height']}" src="https://maps.google.com/maps?q={$default_attributes['place']}%20of%20san%20francisco&t=&z={$default_attributes['zoom']}&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>
					</div>
				EOD;

		return $map;

	}
	add_shortcode( 'gmap', 'ThemeZone_short_code_google_map')

?>