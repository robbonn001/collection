<?php

class Lib{
    static function convertArray($cols){
        $columns = [];
        for ($i=0;$i<count($cols);$i++){
            $columns[] = "`$cols[$i]`";
        }
        return join(",",$columns);
    }
    // static function convertMas($tables){
    //     $res = [];
    //     foreach ($tables as $key=>$val){
    //         $res[] = [
    //             "table"=> "`$key`",
    //             "cols"=>self::convertArray($val, $key)
    //         ];
    //     }
    //     return $res;
    // }
}