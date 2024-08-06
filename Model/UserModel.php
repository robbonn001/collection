<?php
require_once 'Model/Model.php';

class UserModel extends Model{
	protected $columns = ['id','folder_id'];
	protected $table = "user";

    function addUser($login, $pass) {
        $sql = "INSERT INTO `folder`(`name`) VALUES(' ')";
        $this->db->query($sql);
        $folder_id = $this->db->getlastId();
        $sql = "INSERT INTO `$this->table`(`login`,`password`,`folder_id`) VALUES ('$login','$pass',$folder_id)";
        $this->db->query($sql);
        $user_id = $this->db->getlastId();
        $data = $this->get(['id'=>$user_id]);
        $_SESSION['auth_user'] = [$user_id, $data[0]['folder_id']];
    }
}