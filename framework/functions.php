<?php
function config( string $name ) {
	// Framework config.
	$file   = dirname( __DIR__ ) . '/config.php';
	$config = include $file;

	return array_get( $config, $name );
}

function url( string $path = '' ): string {
	$home = rtrim( config( 'site.url' ), '/' );
	$path = trim( $path, '/' );
	return $path ? "$home/$path" : $home; // Always no trailing slash
}

function url_match( string $regex ): bool {
	$regex = "~^{$regex}$~x";
	$path  = get_path();

	return preg_match( $regex, $path );
}

function get_path(): string {
	$path = (string) parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
	$path = trim( $path, '/' );
	$base = (string) parse_url( config( 'site.url' ), PHP_URL_PATH );
	$base = trim( $base, '/' );

	if ( str_starts_with( $path, $base ) ) {
		$path = substr( $path, strlen( $base ) );
	}
	$path = trim( $path, '/' );

	return $path;
}

function asset( string $path ): string {
	return url( "$path?v=" . filemtime( config( 'paths.base' ) . "/public/$path" ) );
}

/**
 * Retrieve a value from a deeply nested array using "dot" notation:
 */
function array_get( array $array, string $key, $default = null ) {
	$value = $array;
	$keys  = explode( '.', $key );

	foreach ( $keys as $key ) {
		if ( ! is_array( $value ) || ! isset( $value[ $key ] ) ) {
			return $default;
		}
		$value = $value[ $key ];
	}

	return $value;
}
