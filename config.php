<?php
if ( file_exists( __DIR__ . '/local-config.php' ) ) {
	return include 'local-config.php';
}

return [
	'site'  => [
		'url'   => 'https://schemagenerator.app',
		'title' => 'Schema Generator',
	],
	'paths' => [
		'base'  => __DIR__,
		'views' => 'views',
	],
];
