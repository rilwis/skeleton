<?php
namespace Framework;

class View {
	public function __construct( private string $name, private array $data = [] ) {}

	/**
	 * Render the view or a sub view with the same (and optional more) data from the parent view.
	 */
	public function render( string $name = '', array $data = [] ) {
		$data = array_merge( $this->data, $data );
		$file = $this->get_file( $name ?: $this->name );
		$this->load( $file, $data );
	}

	private function get_file( string $name ): string {
		$base = config( 'paths.base' );
		$path = config( 'paths.views' );
		$name = str_replace( '.', '/', $name );
		$file = "$base/$path/$name.php";

		return $file;
	}

	private function load( string $file, array $data = [] ): void {
		extract( $data );
		include $file;
	}
}
