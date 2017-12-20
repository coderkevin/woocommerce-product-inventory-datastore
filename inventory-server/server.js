import http from 'http';
import express from 'express';

const inventory = {
	[ 'p120' ]: 240,
	[ 'p121' ]: 252,
	[ 'p122' ]: 258,
};

const app = express();
const server = http.createServer( app );

server.listen( 8080, function() {
	const port = server.address().port;
	console.log( 'Server running on port %d', port );
} );

app.get( '/api/inventory/:sku', getSkuInventory );

function getSkuInventory( req, res ) {
	const { sku } = req.params;

	const count = inventory[ sku ];
	if ( 'undefined' !== typeof count ) {
		res.status( 200 ).json( count );
	}
}

