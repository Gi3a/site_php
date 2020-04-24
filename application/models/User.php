<?php

namespace application\models;

use application\core\Model;


class User extends Model {

	public $error;

	// Generate Token for Join Func
	public function generateCode(){
		return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 10)), 0, 10);
	}
	// Join Func
	public function join($post,$type){
		$code = $this->generateCode();

		$params = [
			'id' => '0',
			'email' => $post['email'],
			'login' => $post['login'],
			'name' => $post['name'],
			'password' => password_hash(trim($_POST['password']), PASSWORD_BCRYPT),
			'role' => $type,
			'code' => $code,
			'status' => 'inactive'
		];
		$this->db->query('INSERT INTO users VALUES (:id, :email, :login, :name, :password, :role, :code, :status)', $params);
		mail($post['email'], 'Регистрация прошла успешно', 'Подтверждение http://shef/join/confirm/'.$code);
		return $this->db->lastInsertId();
	}
	// Login Func
	public function login($login){
		$params = [
			'email' => $login,
			'login' => $login,
		];

		$data = $this->db->row('SELECT * FROM users WHERE email = :email OR login = :login', $params);
		$_SESSION['user'] = $data[0];
	}
	// Confirm Func
	public function activateUser($code){
		$params = [
			'code' => $code,
			'status' => 'active'
		];
		$this->db->query('UPDATE users SET status = :status, code = "" WHERE code = :code', $params);
	}


	// Exit Func
	public function logout(){
		// Update Info Last Visit
		unset($_SESSION['user']);
	}
}