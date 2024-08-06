<?php
require_once 'Model/Model.php';

class NewsModel extends Model{
	protected $data = [];
	//protected $table = ["news","category"];
	//protected $columns = ['id','title','img','content','category_id','title'];
	protected $cond = ['category_id', 'id'];
	protected $tables = [
		"news"=>['id','title','img','content','category_id'],
		"category"=>["id","title"]
	];
	// function __construct()
	// {
	// 	parent::__construct();
	// 	$this->table = "news";
	// 	$this->columns = ['id','title','img','content','category_id'];
	// }
	function loadCategory(){
		require_once 'Model/CategoryModel.php';
		$model = new CategoryModel();
		$i=0;
		foreach ($this->data as $news) {
		    $this->data[$i]["category"] = $model->get(['id',$news['category_id']]);
		    $i++;
		}
	}
}