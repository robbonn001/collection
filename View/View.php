<?php

class View{

	static function render($params = ["page_view"=>"default", "layout"=>"default", "data"=>[]]){
		$data = $params['data'];

		$params['layout'] .= "_layout.php";
		$params['page_view'] .= "_page.php";
		include "View/layout/".$params['layout'];
	}
}