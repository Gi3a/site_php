<?php

namespace application\core;

use application\core\View;

abstract class Controller {

	public $route; // URL Address
	public $view;
	public $acl; // Access users
	public $lang;

	public function __construct($route) {
		$this->route = $route;
		if (!$this->checkAcl()) {
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
		

		if (!isset($_COOKIE['SSLANG'])) {$this->lang = require 'application/lang/en.php';}
		elseif($_COOKIE['SSLANG'] == 'ru'){$this->lang = require 'application/lang/'.$_COOKIE['SSLANG'].'.php';}
		elseif($_COOKIE['SSLANG'] == 'en'){$this->lang = require 'application/lang/'.$_COOKIE['SSLANG'].'.php';}
		else{$this->lang = require 'application/lang/en.php';}
    }

    // Loading models
	public function loadModel($name) {
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	// Check access
	public function checkAcl() {
		$this->acl = require 'application/acl/'.$this->route['controller'].'.php';
		if ( (!isset($_SESSION['user'])) && ($this->isAcl('all')) ) {
			return true;
		}
		elseif( isset($_SESSION['user']) && ($this->isAcl($_SESSION['user']['role'])) ){
			return true;
		}
		return false;
	}

	public function isAcl($key) {
		return in_array($this->route['action'], $this->acl[$key]);
	}

}