<?php

require_once 'Helper/DB.php';

class Model{
	protected $data;
	protected $db;
	protected $table;
	protected $columns;

	function __construct(){
		$this->db = new DB();
		$this->db->connect();
	}
	function Select($params = null){
		$cols = Lib::convertArray($this->columns, $this->table);
		
		$sql = "SELECT $cols FROM `$this->table`";
		$cond = [];
		$where = " WHERE ";

		if ($params){
			foreach ($params as $key=>$val){
				$cond[] = "`$key` = '$val'";
			}
			$where .= join(" AND ", $cond);
		}
		
		$sql .= $where;
		print_r($sql);
		//Debug::dd($sql);
		return $this->db->querySelect($sql);
	}
	function get(array $params = null){
		if (is_array($params) && !empty($params)){
			//Debug::dd($params);
			//return $this->selectData($params);
			return $this->Select($params);
		}
		return $this->data;
	}
	function once(){
		
	}
	function getLen(){
		return count($this->data);
	}
}