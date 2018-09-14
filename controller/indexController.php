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
        security::validateSession();
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
                        "priceReference" => $_POST['inpPriceReference'],
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
            $count = 0;
            foreach (parent::queryRefrenceFormaker($_REQUEST['value']) as $resultQueryReferenceForMaker) {
                $count++;
                ?>
                <option value="<?php echo $resultQueryReferenceForMaker->REFERENCE_ID; ?>"><?php echo $resultQueryReferenceForMaker->REFERENCE_NAME; ?></option>
                <?php
            }
            if($count === 0){
            ?>
                <option value="null">No se encontraron referencias</option>
            <?php
            }
            ?>
        </select>
        <script>
            $('#reference').on('change', function () {
                if($(this).val() == 0 || $(this).val() == 'null'){
                    $.ajax({
                        type: 'POST',
                        url: '?c=index&m=queryFunctionForReferenceDefault',
                        data: null
                    }).done(function (response) {
                        $('#resultQueryOnlyFunction').html(response);
                        $('.custom-control-input').prop('disabled', false);
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '?c=index&m=queryFunctionForReferenceIndexController',
                        data: {valueReference : $('#reference').val()}
                    }).done(function (response) {
                        $('#resultQueryOnlyFunction').html(response);
                        $('.custom-control-input').prop('disabled', true);
                    });
                }
            });
        </script>
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
        <script>
            $('#reference').on('change', function () {
                if($(this).val() == 0 || $(this).val() == 'null'){
                    $.ajax({
                        type: 'POST',
                        url: '?c=index&m=queryFunctionForReferenceDefault',
                        data: null
                    }).done(function (response) {
                        $('#resultQueryOnlyFunction').html(response);
                        $('.custom-control-input').prop('disabled', false);
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '?c=index&m=queryFunctionForReferenceIndexController',
                        data: {valueReference : $('#reference').val()}
                    }).done(function (response) {
                        $('#resultQueryOnlyFunction').html(response);
                        $('.custom-control-input').prop('disabled', true);
                    });
                }
            });
        </script>
        <?php
    }

    public function queryFunctionForReferenceDefault(){
        foreach (parent::queryFunction() as $resultQueryFunction) {
            ?>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="<?php echo $resultQueryFunction->FUNCTION_ID; ?>" class="custom-control-input">
                <label class="custom-control-label" for="<?php echo $resultQueryFunction->FUNCTION_ID; ?>"><?php echo $resultQueryFunction->FUNCTION_NAME; ?></label>
            </div>
            <?php
        }
    }

    public function queryFunctionForReferenceIndexController()
    {
        $count = 0;
        foreach (parent::queryFunctionForReference($_REQUEST['valueReference']) as $resultQueryFunctionForReference) {
            $count++;
            ?>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="<?php echo $resultQueryFunctionForReference->FUNCTION_ID; ?>" class="custom-control-input">
                <label class="custom-control-label" for="<?php echo $resultQueryFunctionForReference->FUNCTION_ID; ?>"><?php echo $resultQueryFunctionForReference->FUNCTION_NAME; ?></label>
            </div>
            <?php
        }
        if($count === 0){
            ?>
                <blockquote class="blockquote text-center">
                    <p class="m-5">No se encontraron funciones</p>
                </blockquote>
            <?php
        }
    }

    public function queryForFunctionAndMakerIndexController(){

    }

    public function querySearch()
    {
        if ($_REQUEST['valueMaker'] != 0 and isset($_REQUEST['valueCheckBox'])){
            if(strpbrk(',', implode(',',$_REQUEST['valueCheckBox'])) === false){
                ?>
                <div class="row justify-content-center">
                    <?php
                    $array = array("valueCheck" => implode($_REQUEST['valueCheckBox']),
                                    "valueMaker" => $_REQUEST['valueMaker']);
                    $count = 0;
                    foreach (parent::queryForFunctionAndMaker($array) as $resultForFunctionAndMaker) {
                        $count++;
                        ?>
                        <div class="card col ml-3 mt-3" style="width: 18rem;">
                            <img class="card-img-top" src="files/<?php echo $resultForFunctionAndMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $resultForFunctionAndMaker->REFERENCE_NAME; ?></h5>
                                <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                <p class="card-text"><?php echo $resultForFunctionAndMaker->REFERENCE_DESCRIPTION; ?></p>
                                <p class="lead">Costo <strong><?php echo $resultForFunctionAndMaker->REFERENCE_PRICE; ?></strong></p>
                                <div class="row col">
                                    <a href="<?php echo $resultForFunctionAndMaker->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                                    <div class="p-1"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
                if($count === 0){
                    ?>
                    <blockquote class="blockquote text-center">
                        <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                    </blockquote>
                    <?php
                }
            } else {
                echo 'Se selecciono varias opciones';
            }
        } elseif($_REQUEST['valueMaker'] != 0 and $_REQUEST['valueReference'] == 0){
            ?>
            <div class="row justify-content-center">
            <?php
            $count = 0;
            foreach (parent::queryRefrenceFormaker($_REQUEST['valueMaker']) as $resultSearchQueryReferenceForMaker) {
                $count++;
                ?>

                    <div class="card col ml-3 mt-3" style="width: 18rem;">
                        <img class="card-img-top" src="files/<?php echo $resultSearchQueryReferenceForMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_PRICE; ?></strong></p>
                            <div class="row justify-content-center">
                                <a href="<?php echo $resultSearchQueryReferenceForMaker->REFERENCE_FILE_URL; ?>" class="btn btn-primary">Descargar PDF</a>
                                <div class="p-1"></div>
                            </div>
                        </div>
                    </div>
                <?php
            }
            ?>
            </div>
            <?php
            if($count === 0){
                ?>
                <blockquote class="blockquote text-center">
                    <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                </blockquote>
                <?php
            }
        } else  if($_REQUEST['valueMaker'] != 0 and  $_REQUEST['valueReference'] != 0){
            ?>
            <div class="row justify-content-center">
                <?php
                $array = array(
                        'valueMaker' => $_REQUEST['valueMaker'],
                        'valueReference' => $_REQUEST['valueReference']
                );
                $count = 0;
                foreach (parent::queryReferenceOnlyForAMaker($array) as $resultSearchQueryReferenceOnlyAMaker) {
                    $count++;
                    ?>
                    <div class="card col ml-3 mt-3" style="width: 18rem;">
                        <img class="card-img-top" src="files/<?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_PRICE; ?></strong></p>
                            <div class="row justify-content-center">
                                <a href="<?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                                <div class="p-1"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
            if ($count === 0){
                ?>
                <blockquote class="blockquote text-center">
                    <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                </blockquote>
                <?php
            }
        } else if($_REQUEST['valueMaker'] == 0 and $_REQUEST['valueReference'] != 0){
            ?>
            <div class="row justify-content-center">
                <?php
                foreach (parent::queryOnlyReference($_REQUEST['valueReference']) as $resultQueryOnlyReference) {
                    ?>
                    <div class="card col ml-3 mt-3" style="width: 18rem;">
                        <img class="card-img-top" src="files/<?php echo $resultQueryOnlyReference->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title">(<?php echo ucwords($resultQueryOnlyReference->MAKER_NAME).') '.$resultQueryOnlyReference->REFERENCE_NAME?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultQueryOnlyReference->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo $resultQueryOnlyReference->REFERENCE_PRICE; ?></strong></p>
                            <div class="row justify-content-center">
                                <a href="<?php echo $resultQueryOnlyReference->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                            </div>
                            <div class="p-1"></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
}