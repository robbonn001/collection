<?php
require_once "config.php";

class DB{
    private $connector = null;
    public function connect(){
        $this->connector = new mysqli(HOST, USER, PASSWORD, DB_NAME);
        if ($this->connector->connect_errno) {
            throw new RuntimeException('ошибка соединения mysqli: ' . $this->connector->connect_error);
        }
    }
    function query($sql, $responseData = false){
        $result = $this->connector->query($sql);
        if (!$result){
            die($this->connector->error);
        }
        if ($responseData){
            $data = [];
            while($row = $result->fetch_array(MYSQLI_ASSOC)){ //MYSQLI_NUM
                $data[] = $row;
            }
            return $data;
        }
    }
    function getlastId(){
        return $this->connector->insert_id;
    }
}

// Options -Indexes
// php_value post_max_size 10000M
// php_value upload_max_filesize 10000M
// AddDefaultCharset utf-8