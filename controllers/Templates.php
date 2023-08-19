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
		$template = @file_get_contents('views'. $template.'.html');
		if($template === false) {
			$template = file_get_contents('views/404.html');
		}
		return $this->render($template, $data);		
	}
	
	public function getPageURL() {
		$url =  explode('?', $_SERVER['REQUEST_URL']);
		return ($url[0] == '/' ? '/home' : $url[0]);
	}
	
	public function data($page) {
        $data['nav']['header'] = $this->nav->header();
		$data['nav']['footer'] = $this->nav->footer();
		switch ($page) {
			case '/home':
			    $data['content'] = [
				    'title' => 'Home',
					'heading' => 'Welcome to the contact page!',
					'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
             ];           
                break;
				case '/about':
				    $data['content'] = [