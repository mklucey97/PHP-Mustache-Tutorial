<?php
class Templates {
	private $m;
	private $nav;
	
	public function __construct() {
		$this->m = (new \Mustache_Engine(
		    [
			'partials_loader' => new \Mustache_Loader_FilesystemLoader('views/partials'),
			]
		));
		$this->nav = new Nav();
    }
	
	public function render($template, $data) {
		
		
		
		
		
	}

?>