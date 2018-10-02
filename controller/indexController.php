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
                        "precisionReference" => $_POST['inpPrecision'],
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
                        "nameReference" => $_REQUEST['nameReference'],
                        "valuePrecision" => $_REQUEST['valuePrecision']);
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
                        $('#inpCostInitial').prop('disabled', false);
                        $('#inpCostFinal').prop('disabled', false);
                        $.ajax({
                            type: 'POST',
                            url: '?c=index&m=queryPrecisionForReferenceDefaultIndexController',
                            data: null
                        }).done(function (response) {
                            $('#resultQueryPresicionForReference').html(response);
                        })
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '?c=index&m=queryFunctionForReferenceIndexController',
                        data: {valueReference : $('#reference').val()}
                    }).done(function (response) {
                        $('#resultQueryOnlyFunction').html(response);
                        $('.custom-control-input').prop('disabled', true);
                        $('#inpCostInitial').prop('disabled', true);
                        $('#inpCostFinal').prop('disabled', true);
                        $.ajax({
                            type: 'POST',
                            url: '?c=index&m=queryPrecisionForReferenceIndexController',
                            data: {
                                valueReference: $('#reference').val()
                            }
                        }).done(function (response) {
                            $('#resultQueryPresicionForReference').html(response);
                            $('.custom-control-input').prop('disabled', true);
                        });
                    });
                }
            });
        </script>
        <?php
    }

    public function queryPrecisionForReferenceIndexController(){
        $array = array("valueReference" => $_REQUEST['valueReference']);
        foreach (parent::queryPrecisionForReference($array) as $resultQueryPrecisionForReference) {
            ?>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="<?php echo $resultQueryPrecisionForReference->FUNCTION_ID * -1; ?>" class="custom-control-input" value="<?php echo $resultQueryPrecisionForReference->FUNCTION_PRECISION; ?>">
                <label class="custom-control-label" for="<?php echo $resultQueryPrecisionForReference->FUNCTION_ID * -1; ?>"><?php echo $resultQueryPrecisionForReference->FUNCTION_NAME.' '.'<b>'.$resultQueryPrecisionForReference->FUNCTION_PRECISION.'</b>'; ?></label>
            </div>
            <?php
        }
    }

    public function queryPrecisionForReferenceDefaultIndexController(){
        ?>
        <div class="custom-control custom-checkbox">
            <b> Precisión por Referencia </b>
        </div>
        <?php
    }
    public function queryFunctionDefaultIndexController(){
        foreach (parent::queryFunction() as $resultQueryFunction) {
        ?>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="<?php echo $resultQueryFunction->FUNCTION_ID; ?>" class="custom-control-input" value="<?php echo $resultQueryFunction->FUNCTION_ID; ?>">
                <label class="custom-control-label" for="<?php echo $resultQueryFunction->FUNCTION_ID; ?>"><?php echo $resultQueryFunction->FUNCTION_NAME; ?></label>
            </div>
        <?php
            }
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

    public function querySearch()
    {
        if ($_REQUEST['valueMaker'] == 0 and isset($_REQUEST['valueCheckBox'])){
            if(strpbrk(',', implode(',',$_REQUEST['valueCheckBox'])) === false){
                ?>
                <div class="container row justify-content-center">
                    <?php
                    $array = array("valueCheck" => implode($_REQUEST['valueCheckBox']));
                    $count = 0;
                    foreach (parent::queryForAllReferenceFunction($array) as $resultqueryForAllReferenceFunction) {
                        $count++;
                        ?>
                        <div class="card col-md-3 ml-3 mt-5">
                            <img class="card-img-top" src="files/<?php echo $resultqueryForAllReferenceFunction->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $resultqueryForAllReferenceFunction->REFERENCE_NAME; ?></h5>
                                <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                <p class="card-text"><?php echo $resultqueryForAllReferenceFunction->REFERENCE_DESCRIPTION; ?></p>
                                <p class="lead">Costo <strong><?php echo number_format($resultqueryForAllReferenceFunction->REFERENCE_PRICE, -1, '.', '.'); ?></strong></p>
                                <div class="row col">
                                    <a href="<?php echo $resultqueryForAllReferenceFunction->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
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
               // var_dump($_REQUEST['valueCheckBox']);
                $array=$_REQUEST['valueCheckBox'];
                $count=count($_REQUEST['valueCheckBox']);
                $sql="";
                    for ($i = 0; $i < $count; $i++) {
                        $la=$i+1;
                          if($count<=$la){
                              $or="";
                          }else{
                              $or=" or ";
                          }
                          $sql=$sql."function_has_reference.FUNCTION_FUNCTION_ID = ".$array[$i]."".$or  ;
                    }
                    ?>
                     <div class="container row justify-content-center">
                    <?php
                    foreach (parent::queryandres($sql,$_REQUEST['valueMaker']) as $resultForFunctionAndMaker) {
                        $count++;
                        ?>
                        <div class="card col-md-3 ml-3 mt-5">
                            <img class="card-img-top" src="files/<?php echo $resultForFunctionAndMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $resultForFunctionAndMaker->REFERENCE_NAME; ?></h5>
                                <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                <p class="card-text"><?php echo $resultForFunctionAndMaker->REFERENCE_DESCRIPTION; ?></p>
                                <p class="lead">Costo <strong><?php echo number_format($resultForFunctionAndMaker->REFERENCE_PRICE,     -1, '.', '.'); ?></strong></p>
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
            }
        } elseif($_REQUEST['valueMaker'] != 0 and isset($_REQUEST['valueCheckBox'])){
            if(strpbrk(',', implode(',',$_REQUEST['valueCheckBox'])) === false) {
                ?>
                <div class="container row justify-content-center">
                    <?php
                    $array = array("valueCheck" => implode($_REQUEST['valueCheckBox']),
                        "valueMaker" => $_REQUEST['valueMaker']);
                    $count = 0;
                    foreach (parent::queryForFunctionAndMaker($array) as $resultForFunctionAndMaker) {
                        $count++;
                        ?>
                        <div class="card col-md-3 ml-3 mt-5">
                            <img class="card-img-top"
                                 src="files/<?php echo $resultForFunctionAndMaker->REFERENCE_IMG; ?>"
                                 alt="Multimetro Crash">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $resultForFunctionAndMaker->REFERENCE_NAME; ?></h5>
                                <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                <p class="card-text"><?php echo $resultForFunctionAndMaker->REFERENCE_DESCRIPTION; ?></p>
                                <p class="lead">Costo
                                    <strong><?php echo number_format($resultForFunctionAndMaker->REFERENCE_PRICE, -1, '.', '.'); ?></strong>
                                </p>
                                <div class="row col">
                                    <a href="<?php echo $resultForFunctionAndMaker->REFERENCE_FILE_URL; ?>"
                                       class="btn btn-primary col">Descargar PDF</a>
                                    <div class="p-1"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
                if ($count === 0) {
                    ?>
                    <blockquote class="blockquote text-center">
                        <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                    </blockquote>
                    <?php
                }
            } else {

            }
        } elseif($_REQUEST['valueMaker'] != 0 and $_REQUEST['valueReference'] == 0){
            ?>
            <div class="container row justify-content-center ">
            <?php
            $count = 0;
            foreach (parent::queryRefrenceFormaker($_REQUEST['valueMaker']) as $resultSearchQueryReferenceForMaker) {
                $count++;
                ?>
                    <div class="card col-md-3 ml-3 mt-5">
                        <img class="card-img-top" src="files/<?php echo $resultSearchQueryReferenceForMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo number_format($resultSearchQueryReferenceForMaker->REFERENCE_PRICE, -1, '.', '.'); ?></strong></p>
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
            <div class="container row justify-content-center">
                <?php
                $array = array(
                        'valueMaker' => $_REQUEST['valueMaker'],
                        'valueReference' => $_REQUEST['valueReference']
                );
                $count = 0;
                foreach (parent::queryReferenceOnlyForAMaker($array) as $resultSearchQueryReferenceOnlyAMaker) {
                    $count++;
                    ?>
                    <div class="card col-md-3 ml-3 mt-5">
                        <img class="card-img-top" src="files/<?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo number_format($resultSearchQueryReferenceOnlyAMaker->REFERENCE_PRICE, -1, '.', '.'); ?></strong></p>
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
        } else if($_REQUEST['valueMaker'] == 0 and $_REQUEST['valueReference'] != 0){
            ?>
            <div class="container row justify-content-center">
                <?php
                foreach (parent::queryOnlyReference($_REQUEST['valueReference']) as $resultQueryOnlyReference) {
                    ?>
                    <div class="card col-md-3 ml-3 mt-5">
                        <img class="card-img-top" src="files/<?php echo $resultQueryOnlyReference->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title">(<?php echo ucwords($resultQueryOnlyReference->MAKER_NAME).') '.$resultQueryOnlyReference->REFERENCE_NAME?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultQueryOnlyReference->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo number_format($resultQueryOnlyReference->REFERENCE_PRICE, -1, '.', '.'); ?></strong></p>
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