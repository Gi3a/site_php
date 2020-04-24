<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

use application\models\Main;
use application\models\Auth;


class UserController extends Controller {

	/* --- Profile PATH --- */
	// Profile Action //
	public function userAction(){
		$vars = [
			'lang' => $this->lang,
		];
		$this->view->render('User | Shef', $vars);
	}

	/* --- Auth PATH --- */
	// Join Action //
	public function joinAction() {
		$auth = new Auth;
		if (!empty($_POST)) {
			// Validate route
			if ( ($this->route['role'] == 'user') or ($this->route['role'] == 'driver') or ($this->route['role'] == 'company') ){
				// Validate post
				if(!$auth->validate(['email','login','name', 'password',], $_POST)){
					$this->view->message('error', $auth->title, $auth->message); }
				// Existence Email
				elseif($auth->emailExistence($_POST['email'])){
					$this->view->message('error', '', 'E-mail уже зарегестрирован'); }
				// Exsitence Login
				elseif($auth->loginExistence($_POST['login'])){
					$this->view->message('error','', 'Логин занят'); }
				// Join User Func
				$joinStatus = $this->model->join($_POST, $this->route['role']);
				// Check if User Func = true
				if (($joinStatus != 0) or (!empty($joinStatus))) {
					$this->view->teleport(
						'success', // Type
						'login', // URL
						'Регистрация прошла успешна', // Title
						'На ваш e-mail адрес было отправлено письмо с подтверждением вашего аккаунта' // Text
					);
				}else{ $this->view->message('error', 'Произошла ошибка', 'Мы уже работаем над ней'); } 

			}else{ $this->view->message('error', 'Произошла ошибка', $this->route['role']); }
		}

		$vars = [
			'lang' => $this->lang,
		];
		$this->view->render($vars['lang']['join_'.$this->route['role']].' | Shef', $vars);
	}
	// Login Action //
	public function loginAction() {
		$auth = new Auth;

		// If !empty $_SESSION[]

		// If !empty $_HASH_SESSION

		if (!empty($_POST)) {
			if(!$auth->validate(['password'], $_POST)){
				$this->view->message('error', $auth->title, $auth->message); }

			elseif( !$auth->userExistence($_POST['login']) ){
				$this->view->message('error', 'Проверьте данные', 'Пользователь не найден'); }

			elseif(!$auth->checkAccessUser($_POST['login'],$_POST['password'])){
				$this->view->message('error', 'Проверьте данные', 'E-mail, логин или пароль указан неверно'); }

			elseif(!$auth->checkStatusUser($_POST['login'])){
				$this->view->message('info', 'Проблемы со входом', $auth->error); }

			// Save $_HASH_SESSION Func
			$loginStatus = $this->model->login($_POST['login']);
			$this->view->location('main');
		}
		$vars = [
			'lang' => $this->lang,
		];
		$this->view->render($vars['lang']['login'].' | Shef', $vars);
	}
	// Confirm Action //
	public function confirmAction() {
		$auth = new Auth;
		// If !empty($_SESSION)


		$codeUserName = $auth->checkCodeUser($this->route['code']);

		if(!isset($codeUserName)){
			$this->view->redirect('login'); }
		else{
			$vars = [
				'name' => $codeUserName,
				'lang' => $this->lang,
			];
			$this->model->activateUser($this->route['code']);
			$this->view->render('Регистрация успешно завершена | Shef', $vars);
		}
	}
	// Reset Action //
	public function resetAction() {
		echo "Reset";
	}
	// Recovery Actions //
	public function recoveryAction(){
		echo "Recovery";
	}


	/* Exit Action */
	public function exitAction() {
		$this->model->logout();
		$this->view->redirect('login');
	}

}