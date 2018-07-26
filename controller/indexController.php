<?php

class indexController extends index
{
    public function index(){
        require_once ('view/all/head.php');
        require_once ('view/index/index.php');
        require_once ('view/all/footer.php');
    }

    public function InsertMak(){
        echo $_POST['nameMaker'];
    }
}