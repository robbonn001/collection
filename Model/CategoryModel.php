<?php
require_once 'Model/Model.php';

class CategoryModel extends Model{
	//protected $table = ["category","news"];
	protected $cond = ['id','category_id'];
	protected $tables = [
		"category"=>["id","title"],
		"news"=>['id','title','img','content','category_id','title']
	];
	//protected $columns = ['id','title','img','content','category_id','title'];
	function loadNews(){
		require_once 'Model/NewsModel.php';
		$model = new NewsModel();
		$i=0;
		foreach ($this->data as $category) {
		    $this->data[$i]["news"] = $model->get(["category_id", $category['id']]);
		    $i++;
		}
	}
}