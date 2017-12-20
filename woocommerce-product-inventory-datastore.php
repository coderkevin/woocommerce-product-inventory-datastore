<?php
/**
 * Plugin Name: WooCommerce Product Inventory Datastore
 * Plugin URI: https://woocommerce.com/
 * Description: Demo Code: Overrides product inventory.
 * Version: 1.0.0-dev
 * Author: Automattic
 * Author URI: https://woocommerce.com
 * Requires at least: 4.4
 * Tested up to: 4.7
 *
 * Text Domain: woocommerce-product-inventory-datastore
 * Domain Path: /languages/
 *
 * @package WooCommerce Product Inventory Datastore
 * @author Automattic
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Instantiate the main class.
include_once dirname( __FILE__ ) . '/includes/class-woocommerce-product-inventory-datastore-plugin.php';
