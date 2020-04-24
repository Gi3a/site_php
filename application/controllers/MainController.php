<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

use application\models\Main;

class MainController extends Controller {

	
	public function mainAction() {
		$vars = [
			'lang' => $this->lang,
		];
		$this->view->render('Site - песочница для разработки', $vars);
	}
	
	public function reportAction(){
		if (!empty($_POST)) {
			if (!$this->model->validate(['description'], $_POST)){
				$this->view->message('error', $this->model->error);
			} else{
				$this->model->report($_POST);
				$this->view->message('success', $this->lang['report_thanks']);
			}
		}
	}

}