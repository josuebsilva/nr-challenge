<?php
namespace App\DBA;

class DataDelegator{
    public static function save($table, $fields){
        return $table::create($fields);
    }

    public static function saveIfNoExist($table, $fields, $findBy){
        if(!$table::where($findBy)->first())
            return $table::create($fields);
    }

    public static function getAll($table){
        return $categories = $table::all();
    }
}