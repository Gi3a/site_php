<?php

namespace application\core;

class View {

	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function render($title, $vars = []) {
		extract($vars);
		$path = 'application/views/templates/'.$this->path.'.php';
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layouts/'.$this->layout.'.php';
		}
	}

	public function redirect($url) {
		header('location: /'.$url);
		exit;
	}

	public static function errorCode($code) {
		http_response_code($code);
		$path = 'application/views/templates/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	public function message($status, $title, $message = '') {
		if (empty($message))
			exit(json_encode(['status' => $status, 'message' => $title]));
		else
			exit(json_encode(['status' => $status, 'title' => $title, 'message' => $message]));
	}

	public function location($url) {
		exit(json_encode(['url' => $url]));
	}

	public function teleport($status, $url, $title, $message){
		exit(json_encode(['status' => $status, 'url' => $url, 'title' => $title, 'message' => $message]));
	}

}	