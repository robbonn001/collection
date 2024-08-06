<?php
require_once 'Model/Model.php';

class CollectionModel extends Model{
    function getContent() {
        $folder_id = $_SESSION['auth_user'][1];
        $sql = "SELECT `path`,`hash`,`extension` FROM `image` i ";
        $sql .= "JOIN `folder_image` fi ON fi.image_id = i.id AND fi.folder_id = $folder_id";
        $data = [];
        $data['images'] = $this->db->query($sql, true);
        $sql = "SELECT `name` FROM `folder` f";
        $sql .= "JOIN `folderlink` fl ON fl.child_id = f.id AND fl.parent_id = $folder_id";
        $data['folders'] = $this->db->query($sql, true);
        return $data;
    }
}