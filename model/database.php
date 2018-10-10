<?php

class database
{
    public static function conexion(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=id7425541_db_multimeter_sena;charset=utf8', 'id7425541_ceet','ceet2018');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}