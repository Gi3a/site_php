<?php

namespace application\models;

use application\core\Model;


class Main extends Model {

	public $error;

	public function validate($input,$post){
		$rules = [
			'title' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-Z0-9_.,! -]{2,150}$#u',
				'message' => 'Название указано неверно (от 2 до 150 символов)',
			],
			'description' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-z0-9_.,! -]{2,512}$#u',
				'message' => 'Описание указано неверно (от 3 до 512 символов)',
			],
			'city' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-Z0-9 , -]{2,150}$#u',
				'message' => 'Название города указано неверно (от 2 до 150 символов)',
			],
			'category' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-z |/_]{2,50}$#',
				'message' => 'Выберите категорию',
			],
			'date_end' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-z |/_]{2,50}$#',
				'message' => 'Выберите срок',
			],
			'keywords' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-Z0-9 , ]{2,250}$#u',
				'message' => 'Ключевые слова указаны неверно',
			],
			'code' => [
				'pattern' => '#^[a-zA-Z0-9]{4,30}$#',
				'message' => 'Код указан не верно (от 4 до 30 символов)',
			],
			'cost' => [
				'pattern' => '#^[0-9]{1,40}$#',
				'message' => 'Цена указана неверно (от 1 до 40 символов)',
			],
			'route_from' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-Z0-9 , -]{2,150}$#u',
				'message' => 'Название адреса указано неверно (от 2 до 150 символов)',
			],
			'route_to' => [
				'pattern' => '#^[а-яА-ЯёЁa-zA-Z0-9 , -]{2,150}$#u',
				'message' => 'Название адреса указано неверно (от 2 до 150 символов)',
			],

		];
		foreach ($input as $val) {
			if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
				$this->error = $rules[$val]['message'];
				return false;
			}
		}
		return true;
	}

	public function getListCuisine(){
		return $this->db->row('SELECT cuisine FROM cuisines');
	}

	public function getListCities(){
		return $this->db->row('SELECT city, city_native, currency FROM cities');	
	}

	public function report($post){
		$params = [
			'id' => '0',
			'url' => trim(htmlspecialchars($post['url'])),
			'description' => trim(htmlspecialchars($post['description'])),
			'width' => trim(htmlspecialchars($post['width'])),
			'browser' => trim(htmlspecialchars($post['browser'])),
			'date' => date("Y-m-d H:i")
		];
		$this->db->query('INSERT INTO reports VALUES (:id, :url, :description, :width, :browser, :date)', $params);
	}
	
}