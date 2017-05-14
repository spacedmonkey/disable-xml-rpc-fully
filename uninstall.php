<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Disable_XML-RPC_Fully
 * @author    Jonathan Harris <jon@spacedmonkey.co.uk>
 * @license   GPL-2.0+
 * @link      http://www.spacedmonkey.com/
 * @copyright 2014 Jonathan Harris
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

