<?php
require_once 'Model/Model.php';

class AddContentModel extends Model{
	protected $columns = ['id','folder_id'];
    private $maxFileSize = 100 * 1024 * 1024; // 100MB

    function uploadImage() {
        print_r($_FILES);
		$folder = "images/";
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        print_r([$fileName,$fileSize,$fileType]);

        if ($this->maxFileSize<$fileSize){
            Route::follow("collection");
        }
        $uploadHash = md5(microtime());
        $uploadPath = $folder.$uploadHash.'.'.$fileType;
        $sql = "INSERT INTO `image`(`path`,`hash`,`extension`) VALUES ('$folder','$uploadHash','.$fileType')";
        $this->db->query($sql);
        $image_id = $this->db->getlastId();
        $folder_id = $_SESSION['auth_user'][1];
        $sql = "INSERT INTO `folder_image`(`folder_id`,`image_id`) VALUES ('$folder_id','$image_id')";
        $this->db->query($sql);
        print_r($uploadPath);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
    }
    function addFolder() {
        $name = $_POST['folder'];
        $sql = "INSERT INTO `folder`(`name`) VALUES ('$name')";
        $this->db->query($sql);
        $folderChild_id = $this->db->getlastId();
        $folderParent_id = $_SESSION['auth_user'][1];
        $sql = "INSERT INTO `folderlink` VALUES($folderParent_id, $folderChild_id)";
        $this->db->query($sql);

    }
}