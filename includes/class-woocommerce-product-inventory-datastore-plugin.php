<?php
/**
 * Base class for plugin
 *
 * @package WooCommerce Product Inventory Data Store
 * @author Automattic
 */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}
/**
 * WC_Product_Inventory_Datastore_Plugin class.
 */
class WC_Product_Inventory_Data_Store_Plugin {

	public function __construct() {
		add_filter( 'woocommerce_data_stores', array( $this, 'install_data_store' ) );
	}

	public function install_data_store( $stores ) {
		include_once dirname( __FILE__ ) . '/class-product-inventory-data-store.php';

		$instance = new WC_Product_Inventory_Data_Store( $stores[ 'product' ] );
		$stores[ 'product' ] = $instance;

		return $stores;
	}
}

new WC_Product_Inventory_Data_Store_Plugin();
