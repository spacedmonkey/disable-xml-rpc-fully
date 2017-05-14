<?php
/**
 * Disable XML RPC Fully
 *
 * @package   Disable_XML_RPC_Fully
 * @author    Jonathan Harris <jon@spacedmonkey.co.uk>
 * @license   GPL-2.0+
 * @link      http://www.spacedmonkey.com/
 * @copyright 2014 Jonathan Harris
 *
 * @wordpress-plugin
 * Plugin Name:       Disable XML-RPC Fully
 * Plugin URI:        http://www.spacedmonkey.com/
 * Description:       Disable XML-RPC fully, getting rid of references in headers 
 * Version:           1.0.0
 * Author:            Jonathan Harris
 * Author URI:        http://www.spacedmonkey.com/
 * Text Domain:       disable-xml-rpc-fully
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/spacedmonkey/disable-xml-rpc-fully/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/


class Disable_XML_RPC_Fully {


	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {
	
		add_filter( 'xmlrpc_enabled', '__return_false' );
		
		add_filter('wp_headers', array( $this, 'remove_x_pingback' ) );
		
		add_filter( 'bloginfo_url', array( $this, 'remove_pingback_url' ), 1, 2 );
		add_filter( 'bloginfo', array( $this, 'remove_pingback_url' ), 1, 2 );
		

		
	}


	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	
	public function remove_x_pingback($headers) {
	    unset($headers['X-Pingback']);
	    return $headers;
	}
	
	public function remove_pingback_url( $output, $show ) {
	    if ( $show == 'pingback_url' ) $output = '';
	    return $output;
	}

}


add_action( 'plugins_loaded', array( 'Disable_XML_RPC_Fully', 'get_instance' ) );

