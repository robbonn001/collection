<?php

require_once 'View/View.php';
require_once 'Model/UserModel.php';
require_once 'Model/AddContentModel.php';
require_once 'Model/CollectionModel.php';

class MainController{
	function indexAction(){
		if (isset($_SESSION['auth_user'])){
			Route::follow("collection");
		}
		View::render(["page_view"=>"checkUser", "layout"=>"default", "data"=>[]]);
		die();
	}
	function collectionAction(){
		$folder_id = $_SESSION['auth_user'][1];
		$collection = new CollectionModel();
		$data = $collection -> getContent();
		View::render(["page_view"=>"collection", "layout"=>"collection", "data"=>$data, "folder_id"=>$folder_id]);
	}
	function uploadImageAction(){
		if ($this->checkValid($_FILES['image'])){
			$uploadImage = new AddContentModel();
			$uploadImage->uploadImage();
		}
		Route::follow("index");
	}
	function addFolderAction(){
		if ($this->checkValid($_POST['folder'])){
			$uploadImage = new AddContentModel();
			$uploadImage->addFolder();
		}
		Route::follow("index");
	}
	function exitAction(){
		if (isset($_SESSION['auth_user'])){
			session_destroy();
		}
		Route::follow("index");
	}
	function loginAction(){
		if (!$this->checkValid($_POST['login']) || !$this->checkValid($_POST['password'])){
			Route::follow("index");
		}
		$login = new UserModel();
		$where = [
			"password"=>md5($_POST['password']),
			"login"=>$_POST['login']
		];
		$data = $login->get($where);

		if (count($data)==0){
			Route::follow("index");
		}

		$_SESSION['auth_user'] = [$data[0]['id'],$data[0]['folder_id']];
		Route::follow("index");
	}
	function registerAction(){
		if (!$this->checkValid($_POST['login']) || !$this->checkValid($_POST['password'])){
			Route::follow("index");
		}
		$register = new UserModel();
		$pass = md5($_POST['password']);
		$login = $_POST['login'];
		$where = [
			"password"=>$pass,
			"login"=>$login
		];
		$data = $register->get($where);
		if (count($data)!=0){
			Route::follow("index");
		}
		$register->addUser($login,$pass);
		Route::follow("collection");
	}
	function errorAction(){
		echo "404, action";
	}
	function checkValid($method){
		return (isset($method) && !empty($method));
	}
}