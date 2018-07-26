<?php

class indexController extends index
{
    public function index(){
        require_once ('view/all/head.php');
        require_once ('view/index/index.php');
        require_once ('view/all/footer.php');
    }

    public function insertions(){
        require_once ('view/all/head.php');
        require_once ('view/insertion/insertions.php');
        require_once ('view/all/footer.php');
    }

    public function InsertMak(){
        $array = array("MAKER_NAME" => $_REQUEST['make']);
        self::insertMaker($array);
        echo 'Insertado correctamente';
    }
}