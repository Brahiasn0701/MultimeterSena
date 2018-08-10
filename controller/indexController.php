<?php

class indexController extends index
{
    public function index(){
        require_once ('view/all/head.php');
        require_once ('view/all/navbar.php');
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
        parent::insertMaker($array);
        echo 'Insertado correctamente';
    }

    public function InsertReferenceIndexController(){
        $tmpName = $_FILES['imgReference']['tmp_name'];
        $name  = sha1(date('Y-M-D')).basename($_FILES['imgReference']['name']);
        move_uploaded_file($tmpName, 'files/'.$name);
        $array = array("nameReference" => $_POST['referenceName'],
                        "descriptionReference" => $_POST['referenceDescription'],
                        "imageReference" => $name,
                        "fileUrlReference" => $_POST['doucumentReference'],
                        "nameMaker" => $_POST['nameMaker']
        );
        parent::insertReference($array);
        header('location:?c=index&m=insertions');
    }

    public function insertFunctionIndexController(){
        parent::insertFunction($_REQUEST['nameFunction']);
        echo 'Insertado correctamente';
    }
}