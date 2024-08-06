<?php

class Route{
	static function splitURL($url = 'route'){
		if (!isset($_GET[$url]) || empty($_GET[$url])){
			self::main();
		}
		$urlParamsArray = explode('/',$_GET[$url]);
		if (count($urlParamsArray)!=2){
			self::error();
		}
		$controller = ucfirst($urlParamsArray[0])."Controller"; 
		$action = $urlParamsArray[1]."Action"; 
		
		if (!file_exists("Controller/$controller.php")){
			self::error();
		}
		require_once "Controller/$controller.php";
		if (!method_exists($controller, $action)){
			self::error();
		}
		$controller = new $controller();
		$controller -> $action();
	}
	static function error(){
		require_once "Controller/MainController.php";
		$controller = new MainController();
		$controller -> errorAction();
		die();
	}
	static function main(){
		require_once "Controller/MainController.php";
		$controller = new MainController();
		$controller -> indexAction($params);
		die();
	}
	static function follow($action){
		header("location: http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."?route=main/".$action);
		die();
	}
}