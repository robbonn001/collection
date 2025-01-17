<?php
require_once 'Model/Model.php';

class CollectionModel extends Model{
    function getContent(){
        
        $folder_id = $_SESSION['auth_user'][1];
        if ($this->checkValid($_GET['folder_id'])){
			$folder_id = $_GET['folder_id'];
		}
        if ($folder_id < 1) Route::follow("index");
        
        $sql = "SELECT `id`,`path`,`hash`,`extension` FROM `image` i ";
        $sql .= "JOIN `folder_image` fi ON fi.image_id = i.id AND fi.folder_id = $folder_id";
        $data = [];
        $data['image'] = $this->db->querySelect($sql);
        $sql = "SELECT `id`,`name` FROM `folder` f ";
        $sql .= "JOIN `folderlink` fl ON fl.child_id = f.id AND fl.parent_id = $folder_id";
        $data['folder'] = $this->db->querySelect($sql);
        
        $_SESSION['auth_user'][1] = $folder_id;
        return $data;
    }
    function getParent(){
        $child_id = $_SESSION['auth_user'][1];
        $sql = "SELECT `parent_id` FROM `folderlink` WHERE `child_id` = $child_id";
        $data = $this->db->querySelect($sql);
        if (count($data)==0) return $_SESSION['auth_user'][1];
        return $data[0]['parent_id'];
    }
    function checkValid($method){
		return (isset($method) && !empty($method));
	}
}