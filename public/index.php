<?php
namespace App;

require '../vendor/autoload.php';

$path = get_path();

// Api: get list of schemas.
if ( $path === 'api/schemas' ) {
	$api = new Api;
	$api->get_schemas();
	return;
}

// Api: get a schema specs.
if ( preg_match( '~^api/schemas/(.+)$~x', $path, $matches ) ) {
	$api = new Api;
	$api->get_schema( $matches[1] );
	return;
}

// Api: get code.
if ( $path === 'api/code' ) {
	$api = new Api;
	$api->get_code();
	return;
}

// Home.
if ( $path === '' ) {
	return new Home();
}

// Schema.
return new Schema( $path );
