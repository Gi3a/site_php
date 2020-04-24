<?php

namespace application\models;

use application\core\Model;


class Auth extends Model {

	public $error;

	public function validate($input, $post){
		$rules = [
			'email' => [
				'pattern' => '#^([A-z0-9_.-]{1,20}+)@([A-z0-9_.-]+)\.([a-z\.]{2,10})$#',
				'title' => 'E-mail адрес указан неверно',
				'message' => 'Можно использовать буквы только латинского алфавита, цифры и точки (от 2 до 30 символов)',
			],
			'login' => [
				'pattern' => '#^[a-zA-z0-9. _]{3,50}$#',
				'title' => 'Логин указан неверно',
				'message' => 'Можно использовать буквы только латинского алфавита, цифры и точки (от 3 до 50 символов)',
			],
			'name' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-z .]{2,50}$#u',
				'title' => 'Имя указан неверно',
				'message' => 'Можно использовать буквы латинского, кириллистического алфавита и точки (от 2 до 50 символов)',
			],
			'phone' => [
				'pattern' => '#^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$#',
				'title' => 'Телефон указан неверно',
				'message' => 'Номер телефона указан неверно',
			],
			'password' => [
				'pattern' => '#^[A-z0-9]{8,50}$#',
				'title' => 'Пароль указан неверно',
				'message' => 'Пароль должен содержать не менее восьми знаков, включать буквы, цифры и специальные символы',
			],

		];

		foreach ($input as $val) {
			if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
				$this->title = $rules[$val]['title'];
				$this->message = $rules[$val]['message'];
				return false;
			}
		}
		return true;
	}

	/* Exists Functions */
	// Email Exists
	public function emailExistence($email){
		$params = ['email' => $email];
		return $this->db->column('SELECT id FROM users WHERE email = :email', $params);
	}
	// Login Exists
	public function loginExistence($login){
		$params = ['login' => $login];
		return $this->db->column('SELECT id FROM users WHERE login = :login', $params);
	}
	// Email or Login exsists
	public function userExistence($login){
		$params = [
			'email' => $login,
			'login' => $login
		];

		return $this->db->column('SELECT id FROM users WHERE email = :email OR login = :login', $params);
	}
	// Check Code User
	public function checkCodeUser($code){
		$params = [
			'code' => $code
		];
		return $this->db->column('SELECT name FROM users WHERE code = :code', $params);
	}
	// Check Status User
	public function checkStatusUser($login){
		$params = [
			'email' => $login,
			'login' => $login,
		];

		$status = $this->db->column('SELECT status FROM users WHERE email = :email OR login = :login', $params);

		if ($status == 'inactive') {
			$this->error = 'На ваш e-mail адрес было отправлено письмо с подтверждением вашего аккаунта'; return false; }

		elseif($status == 'frozen'){
			$this->error = 'Ваш аккаунт временно заморожен, обратитесь в администрацию'; return false; }

		elseif($status == 'blocked'){
			$this->error = 'Ваш аккаунт временно заблокирован, обратитесь в администрацию'; return false; }

		elseif($status == 'blocked'){
			$this->error = 'Ваш аккаунт был удален, обратитесь в администрацию'; return false; }

		return true;
	}
	// Check Access Of User
	public function checkAccessUser($login, $password){
		$params = [
			'email' => $login,
			'login' => $login,
		];

		$hash = $this->db->column('SELECT password FROM users WHERE email = :email OR login = :login', $params);
		// Matches Password & Hash
		if (!$hash or !password_verify($password, $hash)) { return false; }
		return true;
	}



}