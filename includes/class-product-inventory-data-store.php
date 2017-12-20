<?php
/**
 * Product Data Store
 * Inventory with pass-thru
 *
 * @package WooCommerce Product Inventory Data Store
 * @author Automattic
 */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}
/**
 * WC_Product_Inventory_Datastore.
 */
class WC_Product_Inventory_Data_Store
		implements WC_Object_Data_Store_Interface, WC_Product_Data_Store_Interface {

	public function __construct( &$parent_data_store ) {
		$this->parent_instance = $this->create_parent_instance( $parent_data_store );
	}

	private function create_parent_instance( $store ) {
		if ( is_object( $store ) ) {
			if ( ! $store instanceof WC_Object_Data_Store_Interface ||
					! $store instanceof WC_Product_Data_Store_Interface ) {
				throw new Exception( __( 'Invalid parent product data store.', 'woocommerce' ) );
			}
			return $store;
		} else {
			if ( ! class_exists( $store ) ) {
				throw new Exception( __( 'Invalid parent product data store.', 'woocommerce' ) );
			}
			return new $store;
		}
	}

	public function create( &$product ) {
		error_log( 'create' );
		$this->parent_instance->create( $product );
	}

	public function read( &$product ) {
		error_log( 'read' );
		$this->parent_instance->read( $product );

		//$product->set_stock_quantity( 20 );

		$inventory_url = 'http://localhost:8080/api/inventory/' . $product->get_sku();
		$request = wp_remote_get( $inventory_url );
		$response = wp_remote_retrieve_body( $request );
		$data = json_decode( $response );
		$product->set_stock_quantity( $data );
	}

	public function update( &$product ) {
		error_log( 'update' );
		$this->parent_instance->update( $product );
	}

	public function delete( &$product, $args = array() ) {
		error_log( 'delete' );
		$this->parent_instance->delete( $product, $args );
	}

	public function read_meta( &$product ) {
		error_log( 'read_meta' );
		$this->parent_instance->read_meta( $product );
	}

	public function delete_meta( &$product, $meta ) {
		error_log( 'delete_meta' );
		$this->parent_instance->delete_meta( $product, $meta );
	}

	public function add_meta( &$product, $meta ) {
		error_log( 'add_meta' );
		$this->parent_instance->add_meta( $product, $meta );
	}

	public function update_meta( &$product, $meta ) {
		error_log( 'update_meta' );
		$this->parent_instance->update_meta( $product, $meta );
	}

	public function get_on_sale_products() {
		error_log( 'get_on_sale_products' );
		return $this->parent_instance->get_on_sale_products();
	}

	public function get_featured_product_ids() {
		error_log( 'get_featured_product_ids' );
		return $this->parent_instance->get_featured_product_ids();
	}

	public function is_existing_sku( $product_id, $sku ) {
		error_log( 'is_existing_sku' );
		return $this->parent_instance->is_existing_sku( $product_id, $sku );
	}

	public function get_product_id_by_sku( $sku ) {
		error_log( 'get_product_id_by_sku' );
		return $this->parent_instance->get_product_id_by_sku();
	}

	public function get_starting_sales() {
		error_log( 'get_starting_sales' );
		return $this->parent_instance->get_starting_sales();
	}

	public function get_ending_sales() {
		error_log( 'get_ending_sales' );
		return $this->parent_instance->get_ending_sales();
	}

	public function find_matching_product_variation( $product, $match_attributes = array() ) {
		error_log( 'find_matching_product_variation' );
		return $this->parent_instance->find_matching_product_variation( $product, $match_attributes );
	}

	public function sort_all_product_variations( $parent_id ) {
		error_log( 'sort_all_product_variations' );
		$this->parent_instance->sort_all_product_variations( $parent_id );
	}

	public function get_related_products( $cats_array, $tags_array, $exclude_ids, $limit, $product_id ) {
		error_log( 'get_related_products' );
		return $this->parent_instance->get_related_products( $cats_array, $tags_array, $exclude_ids, $limit, $product_id );
	}

	public function update_product_stock( $product_id_with_stock, $stock_quantity = null, $operation = 'set' ) {
		error_log( 'update_product_stock' );
		$this->parent_instance->update_product_stock( $product_id_with_stock, $stock_quantity, $operation );
	}

	public function update_product_sales( $product_id, $quantity = null, $operation = 'set' ) {
		error_log( 'update_product_sales' );
		$this->parent_instance->update_product_sales( $product_id, $quantity, $operation );
	}

	public function get_shipping_class_id_by_slug( $slug ) {
		error_log( 'get_shipping_class_id_by_slug' );
		return $this->parent_instance->get_shipping_class_id_by_slug( $slug );
	}

	public function get_products( $args = array() ) {
		error_log( 'get_products' );
		return $this->parent_instance->get_products( $args );
	}

	public function get_product_type( $product_id ) {
		error_log( 'get_product_type' );
		return $this->parent_instance->get_product_type( $product_id );
	}
}
