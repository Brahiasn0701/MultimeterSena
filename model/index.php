<?php
/**
 * Created by PhpStorm.
 * User: brahi
 * Date: 23/07/2018
 * Time: 19:03
 */

class index extends  database
{
    public function insertMaker(array $array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::insertMaker);
            $stm->bindParam(1, $array[], PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}