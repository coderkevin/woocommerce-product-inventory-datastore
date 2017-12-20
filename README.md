# Demo Inventory Data Store for WooCommerce Products

This demo shows an example of how to extend existing Data Stores in WooCommerce.

**NOTE: This is demo code and not even close to being something you want to use in production.**

It extends an existing Product Data Store, and overrides only the inventory count,
replacing the database count with one retrieved from an external API.

## Try it out!

This plugin has everything needed to try out the example code.

### Pre-Setup

1. Set up a test WooCommerce site.
2. Add 3 products with SKUs of "p120", "p121", and "p122", set stock quantities.

### Plugin Setup

1. Clone this repository under `wp-content/plugins`.
2. Under the `server` directory run `npm install` then `npm start` to run the test API server.
3. Activate the "WooCommerce Product Inventory Datastore" plugin.
4. Observe the products with the SKUs above now receive inventory counts from the API instead of `wpdb`.
