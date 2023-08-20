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
        $templateContent = @file_get_contents('views'. $template.'.html');
        if($templateContent === false) {
            $templateContent = file_get_contents('views/404.html');
        }
        return $this->m->render($templateContent, $data); // Fixed this line		
    }
    
    public function getPageURL() {
        $url =  explode('?', $_SERVER['REQUEST_URI']); // Changed REQUEST_URL to REQUEST_URI
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
                    'title' => 'About',
                    'heading' => 'Welcome to the about page!',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
					'additional' => ['item 1', 'item 2', 'item 3']
                ];
               break;
		   case '/contact':
		       $data['content'] = [
			       'title' => '404',
				   'heading' => 'Oops! Page Not Found',
        }
        
    }
}
?>
