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

    public function insertFunctionReferenceIndexController()
    {
        $array = array("nameFunction" => $_REQUEST['nameFunction'],
                        "nameReference" => $_REQUEST['nameReference']);
        parent::insertFunctionReference($array);
        echo 'Asignacion correcta';
    }

    public function queryReferenceForMaker(){
        ?>
        <select name="reference" id="reference" class="form-control">
            <option value="0" selected>Referencia</option>
            <?php
            foreach (parent::queryRefrenceFormaker($_REQUEST['value']) as $resultQueryReferenceForMaker) {
                ?>
                <option value="<?php echo $resultQueryReferenceForMaker->REFERENCE_ID; ?>"><?php echo $resultQueryReferenceForMaker->REFERENCE_NAME; ?></option>
                <?php
            }
            ?>
        </select>
        <?php
    }

    public function queryAllReferences(){
        ?>
        <select name="reference" id="reference" class="form-control">
            <option value="0" selected>Referencia</option>
            <?php
            foreach (parent::queryReference() as $resultQueryReference) {
                ?>
                <option value="<?php echo $resultQueryReference->REFERENCE_ID; ?>"><?php echo $resultQueryReference->REFERENCE_NAME; ?></option>
                <?php
            }
            ?>
        </select>
        <?php
    }


    public function querySearch()
    {
        if($_REQUEST['valueMaker'] != 0 and $_REQUEST['valueReference'] == 0){
            ?>
            <div class="row justify-content-center">
            <?php
            foreach (parent::queryRefrenceFormaker($_REQUEST['valueMaker']) as $resultSearchQueryReferenceForMaker) {
                ?>
                    <div class="card col ml-3 mt-3" style="width: 18rem;">
                        <img class="card-img-top" src="files/<?php echo $resultSearchQueryReferenceForMaker->REFERENCE_IMG; ?>.png" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_DESCRIPTION; ?></p>
                            <div class="row">
                                <a href="<?php echo $resultSearchQueryReferenceForMaker->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                                <div class="p-1"></div>
                            </div>
                        </div>
                    </div>
                <?php
            }
            ?>
            </div>
            <?php
        } else  if($_REQUEST['valueMaker'] != 0 and  $_REQUEST['valueReference'] != 0){
            echo 'Selecciono los dos select';
        } else if($_REQUEST['valueMaker'] == 0 and $_REQUEST['valueReference'] != 0){
            echo 'Selecciono solo Referencia';
        }
        /*
         * Lo que hizo Andres
         * -----------------------------------------------
         *
            $id_fabricante=$_REQUEST['id_fabricante'];
            $id_referencia=$_REQUEST['id_referencia'];

            if($id_fabricante!=0 and $id_referencia==0){
                echo $badge="<span class='badge badge-secondary'>FABRICANTE</span>";
                $query="SELECT * FROM  reference";
                $condicion="WHERE maker_MAKER_ID=".$id_fabricante;
                $inner_join="";
            }
            else if($id_fabricante!=0 and $id_referencia!=0){
               echo  $badge="<span class='badge badge-secondary'>FABRICANTE</span>";
                echo $badge2="<span class='badge badge-secondary'>REFERENCIA</span>";
                $query="SELECT * FROM  reference";
                $inner_join="";
                $condicion="WHERE maker_MAKER_ID=".$id_fabricante.' and REFERENCE_ID='.$id_referencia;

            } else if($id_fabricante==0 and $id_referencia!=0){
                $query="SELECT * FROM  reference";
                $inner_join="";
                $condicion="WHERE REFERENCE_ID=".$id_referencia;
            }else{
                $query="SELECT * FROM  reference";
                $inner_join="";
                $condicion="";
            }
             $c=0;
            echo '<br>';
           foreach (parent::SuperQueryRobinsonAndresCortes($query,$inner_join,$condicion) as $r){
               ?>
               <div class="card" style="width: 18rem;">'
                   <img class="card-img-top" src="files/<?php echo $r->REFERENCE_IMG ?>.png" alt="Card image cap">
                   <div class="card-body">
                       <h5 class="card-title"><?php  echo $r->REFERENCE_NAME; ?></h5>
                       <p class="card-text"><?php echo $r->REFERENCE_DESCRIPTION?></p>
                       <a href="#" class="btn btn-primary">Go somewhere</a>
                   </div>
               </div>
              <?php
               $c++;
           }
           if($c<=0)
           echo "no hay resultados para la consulta";
       */
    }
}