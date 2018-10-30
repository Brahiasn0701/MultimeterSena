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
        $size = getimagesize($_FILES['imgReference']['tmp_name']);
        if($size[0] > 350 && $size[1] < 430){
            move_uploaded_file($tmpName, 'files/'.$name);
            $array = array("nameReference" => $_POST['referenceName'],
                "descriptionReference" => $_POST['referenceDescription'],
                "imageReference" => $name,
                "fileUrlReference" => $_POST['doucumentReference'],
                "urlPurchaseLink" => $_POST['inpLinkForPurchase'],
                "priceReference" =>  str_replace(".", "", $_POST['inpPriceReference']),
                "nameMaker" => $_POST['nameMaker']
            );
            parent::insertReference($array);
            header('location:?c=index&m=insertions');
        } else {
            ?>
            <script>
                alert('La imagen no cumple con la dimension establecida (Entre 350Px y 430px)');
                window.location = 'http://localhost/Proyects/MultimeterSena/?c=index&m=insertions' ;
            </script>
            <?php
        }
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
                        $('#slcPrecision').prop('disabled', false);
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
                        $('#slcPrecision').prop('disabled', true);
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
                        $('#inpCostInitial').prop('disabled', false);
                        $('#inpCostFinal').prop('disabled', false);
                        $('#slcPrecision').prop('disabled', false);
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
                        $('#slcPrecision').prop('disabled', true);
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
        if ($_REQUEST['valueMaker'] == 0 and isset($_REQUEST['measurementVariablesValue']) > 0){
            if(strpbrk(',', implode(',',$_REQUEST['measurementVariablesValue'])) === false){
                ?>
                <div class="container row justify-content-center">
                    <?php
                    $array = array("valueCheck" => implode($_REQUEST['measurementVariablesValue']));
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
                                <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                                <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                    <?php
                                    $countFunctionReference = 0;
                                    foreach (parent::queryFunctionReferenceForReference($resultqueryForAllReferenceFunction->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                        $countFunctionReference++;
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                        </div>
                                        <?php
                                    }
                                    if($countFunctionReference == 0){
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <strong>No se han asignado funciones para este multimetro</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <small class="form-text text-muted mb-3">Precisión</small>
                                <div class="row justify-content-start">
                                    <label class="lead">Link de Compra </label>
                                    <p><a href="<?php echo $resultqueryForAllReferenceFunction->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultqueryForAllReferenceFunction->REFERENCE_PURCHASE_URL; ?></a></p>
                                </div>
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
                        <h3><p class="m-5">No se encontraron resultados de la Busquedas</p></h3>
                    </blockquote>
                    <?php
                }
            } else {
                //var_dump($_REQUEST['presicionValueCkeck']);
                $array=$_REQUEST['measurementVariablesValue'];
                $count=count($_REQUEST['measurementVariablesValue']);
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
                    $counts = 0;
                    foreach (parent::queryReferenceForFunction($sql) as $resultForFunctionAndMaker) {
                        $counts++;
                        ?>
                        <div class="card col-md-3 ml-3 mt-5">
                            <img class="card-img-top" src="files/<?php echo $resultForFunctionAndMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $resultForFunctionAndMaker->REFERENCE_NAME; ?></h5>
                                <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                <p class="card-text"><?php echo $resultForFunctionAndMaker->REFERENCE_DESCRIPTION; ?></p>
                                <p class="lead">Costo <strong><?php echo number_format($resultForFunctionAndMaker->REFERENCE_PRICE,     -1, '.', '.'); ?></strong></p>
                                <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                                <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                    <?php
                                    $countFunctionReference = 0;
                                    foreach (parent::queryFunctionReferenceForReference($resultForFunctionAndMaker->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                        $countFunctionReference++;
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                        </div>
                                        <?php
                                    }
                                    if($countFunctionReference == 0){
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <strong>No se han asignado funciones para este multimetro</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <small class="form-text text-muted mb-3">Precisión</small>
                                <div class="row justify-content-start">
                                    <label class="lead">Link de Compra </label>
                                    <p><a href="<?php echo $resultForFunctionAndMaker->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultForFunctionAndMaker->REFERENCE_PURCHASE_URL; ?></a></p>
                                </div>
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
                if ($counts === 0) {
                    ?>
                    <blockquote class="blockquote text-center">
                        <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                    </blockquote>
                    <?php
                }
            }
        } elseif($_REQUEST['valueMaker'] != 0 and isset($_REQUEST['measurementVariablesValue']) > 0){
            if(strpbrk(',', implode(',',$_REQUEST['measurementVariablesValue'])) === false) {
                ?>
                <div class="container row justify-content-center">
                    <?php
                    $array = array("valueCheck" => implode($_REQUEST['measurementVariablesValue']),
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
                                <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                                <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                    <?php
                                    $countFunctionReference = 0;
                                    foreach (parent::queryFunctionReferenceForReference($resultForFunctionAndMaker->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                        $countFunctionReference++;
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                        </div>
                                        <?php
                                    }
                                    if($countFunctionReference == 0){
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <strong>No se han asignado funciones para este multimetro</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <small class="form-text text-muted mb-3">Precisión</small>
                                <div class="row justify-content-start">
                                    <label class="lead">Link de Compra </label>
                                    <p><a href="<?php echo $resultForFunctionAndMaker->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultForFunctionAndMaker->REFERENCE_PURCHASE_URL; ?></a></p>
                                </div>
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
                // var_dump($_REQUEST['valueCheckBox']);
                $array=$_REQUEST['measurementVariablesValue'];
                $count=count($_REQUEST['measurementVariablesValue']);
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
                    $counts = 0;
                    foreach (parent::queryReferenceForFuncionAndMaker($sql, $_REQUEST['valueMaker']) as $resultForFunctionAndMaker) {
                        $counts++;
                        ?>
                        <div class="card col-md-3 ml-3 mt-5">
                            <img class="card-img-top" src="files/<?php echo $resultForFunctionAndMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $resultForFunctionAndMaker->REFERENCE_NAME; ?></h5>
                                <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                <p class="card-text"><?php echo $resultForFunctionAndMaker->REFERENCE_DESCRIPTION; ?></p>
                                <p class="lead">Costo <strong><?php echo number_format($resultForFunctionAndMaker->REFERENCE_PRICE,     -1, '.', '.'); ?></strong></p>
                                <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                                <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                    <?php
                                    $countFunctionReference = 0;
                                    foreach (parent::queryFunctionReferenceForReference($resultForFunctionAndMaker->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                        $countFunctionReference++;
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                        </div>
                                        <?php
                                    }
                                    if($countFunctionReference == 0){
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <strong>No se han asignado funciones para este multimetro</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <small class="form-text text-muted mb-3">Precisión</small>
                                <div class="row justify-content-start">
                                    <label class="lead">Link de Compra </label>
                                    <p><a href="<?php echo $resultForFunctionAndMaker->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultForFunctionAndMaker->REFERENCE_PURCHASE_URL; ?></a></p>
                                </div>
                                <div class="row col">
                                    <a href="<?php echo $resultForFunctionAndMaker->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                                    <div class="p-1"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    if ($counts === 0) {
                        ?>
                        <blockquote class="blockquote text-center">
                            <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                        </blockquote>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
        } elseif ($_REQUEST['valueMaker'] == 0 and  $_REQUEST['valueReference'] == 0 and  $_REQUEST['valuePriceFinal'] == 0 and  $_REQUEST['valuePriceInitial'] == 0 and isset($_REQUEST['presicionValueCkeck'])){
            if(strpbrk(',', implode(',',$_REQUEST['presicionValueCkeck'])) === false) {
                $count = 0;
                $array = explode("_", $_REQUEST['presicionValueCkeck'][0]);
                $arrayDef = array("FUNCTION_FUNCTION_ID" => $array[1],
                                    "FUNCTION_PRECISION" => $array[2]);
                ?>
                <div class="container row justify-content-center">
                <?php
                foreach (parent::queryReferenceForFunctionAndPrecision($arrayDef) as $resultQueryReferenceForFunctionAndPrecision){
                    $count++;
                    ?>
                    <div class="card col-md-3 ml-3 mt-5">
                        <img class="card-img-top" src="files/<?php echo $resultQueryReferenceForFunctionAndPrecision->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultQueryReferenceForFunctionAndPrecision->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultQueryReferenceForFunctionAndPrecision->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo number_format($resultQueryReferenceForFunctionAndPrecision->REFERENCE_PRICE,     -1, '.', '.'); ?></strong></p>
                            <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                            <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                <?php
                                $countFunctionReference = 0;
                                foreach (parent::queryFunctionReferenceForReference($resultQueryReferenceForFunctionAndPrecision->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                    $countFunctionReference++;
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                    </div>
                                    <?php
                                }
                                if($countFunctionReference == 0){
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <strong>No se han asignado funciones para este multimetro</strong>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <small class="form-text text-muted mb-3">Precisión</small>
                            <div class="row justify-content-start">
                                <label class="lead">Link de Compra </label>
                                <p><a href="<?php echo $resultQueryReferenceForFunctionAndPrecision->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultQueryReferenceForFunctionAndPrecision->REFERENCE_PURCHASE_URL; ?></a></p>
                            </div>
                            <div class="row col">
                                <a href="<?php echo $resultQueryReferenceForFunctionAndPrecision->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                                <div class="p-1"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if ($count === 0) {
                    ?>
                    <blockquote class="blockquote text-center">
                        <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                    </blockquote>
                    <?php
                }
                ?>
                </div>
                <?php
            } else {
                //var_dump($_REQUEST['presicionValueCkeck']);
                //echo '<br>';
                $count=count($_REQUEST['presicionValueCkeck']);
                $array= $_REQUEST['presicionValueCkeck'];
                $sql="";
                for ($i = 0; $i < $count; $i++) {
                    $la=$i+1;
                    if($count<=$la){
                        $or="";
                    }else{
                        $or=" OR ";
                    }
                    $array = explode("_", $_REQUEST['presicionValueCkeck'][$i]);
                    //var_dump($array);
                    //echo $i.'<br>';
                    $sql=$sql."(function_has_reference.FUNCTION_FUNCTION_ID = ".$array[1]." AND function_has_reference.FUNCTION_PRECISION = ".$array[2].") ".$or;
                }
                //echo $sql;
                ?>
                <div class="container row justify-content-center">
                <?php
                $counts = 0;
                foreach (parent::queryReferenceForFunctionPrecisionAndSomeSelected($sql) as $resultQueryReferenceForFunctionPrecisionAndSomeSelected){
                    $counts++;
                    ?>
                    <div class="card col-md-3 ml-3 mt-5">
                        <img class="card-img-top" src="files/<?php echo $resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo number_format($resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_PRICE,     -1, '.', '.'); ?></strong></p>
                            <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                            <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                <?php
                                $countFunctionReference = 0;
                                foreach (parent::queryFunctionReferenceForReference($resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                    $countFunctionReference++;
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                    </div>
                                    <?php
                                }
                                if($countFunctionReference == 0){
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <strong>No se han asignado funciones para este multimetro</strong>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <small class="form-text text-muted mb-3">Precisión</small>
                            <div class="row justify-content-start">
                                <label class="lead">Link de Compra </label>
                                <p><a href="<?php echo $resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_PURCHASE_URL; ?></a></p>
                            </div>
                            <div class="row col">
                                <a href="<?php echo $resultQueryReferenceForFunctionPrecisionAndSomeSelected->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                                <div class="p-1"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if ($counts === 0) {
                    ?>
                    <blockquote class="blockquote text-center">
                        <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                    </blockquote>
                    <?php
                }
                ?>
                </div>
                <?php
            }
        } elseif($_REQUEST['valueMaker'] != 0 and $_REQUEST['valueReference'] == 0 and $_REQUEST['valuePriceInitial'] == 0 and $_REQUEST['valuePriceFinal'] == 0 and !isset($_REQUEST['measurementVariablesValue']) and !isset($_REQUEST['presicionValueCkeck'])){
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
                            <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                            <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                <?php
                                    $countFunctionReference = 0;
                                    foreach (parent::queryFunctionReferenceForReference($resultSearchQueryReferenceForMaker->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                        $countFunctionReference++;
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                        </div>
                                        <?php
                                    }
                                    if($countFunctionReference == 0){
                                        ?>
                                        <div class="custom-control custom-checkbox text-left">
                                            <strong>No se han asignado funciones para este multimetro</strong>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <small class="form-text text-muted mb-3">Precisión</small>
                            <div class="row justify-content-start">
                                <label class="lead">Link de Compra </label>
                               <p><a href="<?php echo $resultSearchQueryReferenceForMaker->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultSearchQueryReferenceForMaker->REFERENCE_PURCHASE_URL; ?></a></p>
                            </div>
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
                            <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                            <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                <?php
                                $countFunctionReference = 0;
                                foreach (parent::queryFunctionReferenceForReference($resultSearchQueryReferenceOnlyAMaker->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                    $countFunctionReference++;
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                    </div>
                                    <?php
                                }
                                if($countFunctionReference == 0){
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <strong>No se han asignado funciones para este multimetro</strong>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <small class="form-text text-muted mb-3">Precisión</small>
                            <div class="row justify-content-start">
                                <label class="lead">Link de Compra </label>
                                <p><a href="<?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_PURCHASE_URL; ?></a></p>
                            </div>
                            <div class="row justify-content-center">
                                <a href="<?php echo $resultSearchQueryReferenceOnlyAMaker->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                                <div class="p-1"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if($count === 0){
                    ?>
                    <blockquote class="blockquote text-center">
                        <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                    </blockquote>
                    <?php
                }
                ?>
            </div>
        <?php
        } else if($_REQUEST['valueMaker'] == 0 and $_REQUEST['valueReference'] != 0 and $_REQUEST['valuePriceInitial'] == 0 and $_REQUEST['valuePriceFinal'] == 0){
            ?>
            <div class="container row justify-content-center">
                <?php
                $count = 0;
                foreach (parent::queryOnlyReference($_REQUEST['valueReference']) as $resultQueryOnlyReference) {
                    $count++;
                    ?>
                    <div class="card col-md-3 ml-3 mt-5">
                        <img class="card-img-top" src="files/<?php echo $resultQueryOnlyReference->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title">(<?php echo ucwords($resultQueryOnlyReference->MAKER_NAME).') '.$resultQueryOnlyReference->REFERENCE_NAME?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultQueryOnlyReference->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo number_format($resultQueryOnlyReference->REFERENCE_PRICE, -1, '.', '.'); ?></strong></p>
                            <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                            <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                <?php
                                $countFunctionReference = 0;
                                foreach (parent::queryFunctionReferenceForReference($resultQueryOnlyReference->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                    $countFunctionReference++;
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                    </div>
                                    <?php
                                }
                                if($countFunctionReference == 0){
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <strong>No se han asignado funciones para este multimetro</strong>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <small class="form-text text-muted mb-3">Precisión</small>
                            <div class="row justify-content-start">
                                <label class="lead">Link de Compra </label>
                                <p><a href="<?php echo $resultQueryOnlyReference->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultQueryOnlyReference->REFERENCE_PURCHASE_URL; ?></a></p>
                            </div>
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
            if($count === 0){
                ?>
                <blockquote class="blockquote text-center">
                    <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                </blockquote>
                <?php
            }
        } elseif($_REQUEST['valueMaker'] == 0 and $_REQUEST['valuePriceInitial'] != 0 and $_REQUEST['valuePriceFinal'] != 0 and $_REQUEST['valueReference'] == 0){
            $array = array("valuePriceInitial" => $_REQUEST['valuePriceInitial'],
                            "valuePriceFinal" => $_REQUEST['valuePriceFinal']);
            ?>
            <div class="container row justify-content-center">
            <?php
            $count = 0;
            foreach (parent::queryAllReferenceForPrice($array) as $resultQueryAllReferenceForPrice) {
                $count++;
                ?>
                <div class="card col-md-3 ml-3 mt-5">
                    <img class="card-img-top" src="files/<?php echo $resultQueryAllReferenceForPrice->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $resultQueryAllReferenceForPrice->REFERENCE_NAME; ?></h5>
                        <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                        <p class="card-text"><?php echo $resultQueryAllReferenceForPrice->REFERENCE_DESCRIPTION; ?></p>
                        <p class="lead">Costo <strong><?php echo number_format($resultQueryAllReferenceForPrice->REFERENCE_PRICE, -1, '.', '.'); ?></strong></p>
                        <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                        <div class="row justify-content-start" id="resultQueryPresicionForReference">
                            <?php
                            $countFunctionReference = 0;
                            foreach (parent::queryFunctionReferenceForReference($resultQueryAllReferenceForPrice->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                $countFunctionReference++;
                                ?>
                                <div class="custom-control custom-checkbox text-left">
                                    <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                </div>
                                <?php
                            }
                            if($countFunctionReference == 0){
                                ?>
                                <div class="custom-control custom-checkbox text-left">
                                    <strong>No se han asignado funciones para este multimetro</strong>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <small class="form-text text-muted mb-3">Precisión</small>
                        <div class="row justify-content-start">
                            <label class="lead">Link de Compra </label>
                            <p><a href="<?php echo $resultQueryAllReferenceForPrice->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultQueryAllReferenceForPrice->REFERENCE_PURCHASE_URL; ?></a></p>
                        </div>
                        <div class="row justify-content-center">
                            <a href="<?php echo $resultQueryAllReferenceForPrice->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                        </div>
                        <div class="p-1"></div>
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
        } else if($_REQUEST['valueMaker'] != 0 and $_REQUEST['valuePriceInitial'] != 0 and $_REQUEST['valuePriceFinal'] != 0 and $_REQUEST['valueReference'] == 0){
            $array = array("valuePriceInitial" => $_REQUEST['valuePriceInitial'],
                "valuePriceFinal" => $_REQUEST['valuePriceFinal'],
                "valueMaker" => $_REQUEST['valueMaker']);
            ?>
            <div class="container row justify-content-center">
                <?php
                $count = 0;
                foreach (parent::queryReferenceForPriceAndMaker($array) as $resultQueryReferenceForPriceAndMaker) {
                    $count++;
                    ?>
                    <div class="card col-md-3 ml-3 mt-5">
                        <img class="card-img-top" src="files/<?php echo $resultQueryReferenceForPriceAndMaker->REFERENCE_IMG; ?>" alt="Multimetro Crash">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $resultQueryReferenceForPriceAndMaker->REFERENCE_NAME; ?></h5>
                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                            <p class="card-text"><?php echo $resultQueryReferenceForPriceAndMaker->REFERENCE_DESCRIPTION; ?></p>
                            <p class="lead">Costo <strong><?php echo number_format($resultQueryReferenceForPriceAndMaker->REFERENCE_PRICE, -1, '.', '.'); ?></strong></p>
                            <label for="resultQueryPresicionForReference" class="lead">Presición</label>
                            <div class="row justify-content-start" id="resultQueryPresicionForReference">
                                <?php
                                $countFunctionReference = 0;
                                foreach (parent::queryFunctionReferenceForReference($resultQueryReferenceForPriceAndMaker->REFERENCE_ID) as $resultQueryFunctionForReference) {
                                    $countFunctionReference++;
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <?php echo $resultQueryFunctionForReference->FUNCTION_NAME.'<strong> ('.$resultQueryFunctionForReference->FUNCTION_PRECISION.') </strong>'; ?>
                                    </div>
                                    <?php
                                }
                                if($countFunctionReference == 0){
                                    ?>
                                    <div class="custom-control custom-checkbox text-left">
                                        <strong>No se han asignado funciones para este multimetro</strong>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <small class="form-text text-muted mb-3">Precisión</small>
                            <div class="row justify-content-start">
                                <label class="lead">Link de Compra </label>
                                <p><a href="<?php echo $resultQueryReferenceForPriceAndMaker->REFERENCE_PURCHASE_URL; ?>" class="badge badge-info pr-3"><?php echo $resultQueryReferenceForPriceAndMaker->REFERENCE_PURCHASE_URL; ?></a></p>
                            </div>
                            <div class="row justify-content-center">
                                <a href="<?php echo $resultQueryReferenceForPriceAndMaker->REFERENCE_FILE_URL; ?>" class="btn btn-primary col">Descargar PDF</a>
                            </div>
                            <div class="p-1"></div>
                        </div>
                    </div>
                    <?php
                }
                if($count === 0){
                    ?>
                    <blockquote class="blockquote text-center">
                        <h3><p class="m-5">No se encontraron resultados de la Busqueda</p></h3>
                    </blockquote>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }

    /*
        Actualizaciones del modulo de administradores
        @BrahianSánchez
    */

    public function queryReferenceForUpdateIndexController(){
        $array = array("slcValueForUpdate" => $_REQUEST['slcValueForUpdate']);
        foreach (parent::queryReferenceForUpdate($array) as $resultQueryReferenceForUpdate) {
            ?>
            <div class="form-group">
                <label for="NewinpNameReference">Nuevo nombre de referencia</label>
                <input type="text" name="NewinpNameReference" id="NewinpNameReference" class="form-control" value="<?php echo $resultQueryReferenceForUpdate->REFERENCE_NAME; ?>">
                <small class="form-text text-muted">Nuevo nombre de referencia</small>
            </div>
            <div class="form-group">
                <label for="referenceDescription">Descripcion de la referencia</label>
                <textarea name="referenceDescription" rows="10" id="referenceDescription" class="form-control" maxlength="500"><?php echo $resultQueryReferenceForUpdate->REFERENCE_DESCRIPTION; ?></textarea>
                <small class="form-text text-muted">Escribe la descripcion de la referencia</small>
            </div>
            <div class="form-group">
                <label for="imgReferencePreShow">Previsualizacion de Imagen</label>
                <div class="text-left">
                    <img src="files/<?php echo $resultQueryReferenceForUpdate->REFERENCE_IMG; ?>" alt="Reference Image" class="rounded" width="300">
                </div>
                <small class="form-text text-muted">Previsualizacion</small>
            </div>
            <div class="form-group">
                <label for="NewimgReference">Nueva Imagen de Referencia</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="NewimgReference" id="NewimgReference">
                    <label class="custom-file-label" for="NewimgReference">Seleccionar Archivo</label>
                </div>
                <small class="form-text text-muted">Imagen de la referencia</small>
            </div>
            <div class="form-group">
                <label for="NewdoucumentReference">Nuevo Documento de la referencia</label>
                <input type="text" name="NewdoucumentReference" id="NewdoucumentReference" class="form-control" value="<?php echo $resultQueryReferenceForUpdate->REFERENCE_FILE_URL; ?>">
                <small class="form-text text-muted">Pega la url del archivo</small>
            </div>
            <div class="form group">
                <label for="NewinpPurchaseLink">Nuevo enlace de compra</label>
                <input type="text" name="NewinpPurchaseLink" id="NewinpPurchaseLink" class="form-control" value="<?php echo $resultQueryReferenceForUpdate->REFERENCE_PURCHASE_URL; ?>">
                <small class="form-text text-muted">Nuevo enlace</small>
            </div>
            <div class="form-group">
                <label for="NewinpPriceReference">Nuevo Precio de referencia</label>
                <input type="text" name="NewinpPriceReference" id="NewinpPriceReference" class="form-control" value="<?php echo number_format($resultQueryReferenceForUpdate->REFERENCE_PRICE, -1, '.', '.'); ?>">
                <small class="form-text text-muted">Escribe el precio de la refrencia</small>
            </div>
            <div class="form-group">
                <label for="nameMaker">Nombre del Fabricante</label>
                <select name="nameMaker" id="nameMaker" class="form-control">
                    <option value="<?php echo $resultQueryReferenceForUpdate->MAKER_ID; ?>" selected ><?php echo $resultQueryReferenceForUpdate->MAKER_NAME; ?></option>
                    <?php
                    foreach (parent::queryMakerDiferentsTo($resultQueryReferenceForUpdate->MAKER_ID) as $resultMakerAll) {
                        ?>
                        <option value="<?php echo $resultMakerAll->MAKER_ID; ?>"><?php echo ucwords($resultMakerAll->MAKER_NAME); ?></option>
                        <?php
                    }
                    ?>
                </select>
                <small class="form-text text-muted">Selecciona el Fabricante</small>
            </div>
            <?php
        }
    }

    public function updateReference(){
        if($_FILES['NewimgReference']["name"] == null){
            $array = array("REFERENCE_NAME" => $_POST['NewinpNameReference'],
                "REFERENCE_DESCRIPTION" => $_POST['referenceDescription'],
                "REFERENCE_FILE_URL" => $_POST['NewdoucumentReference'],
                "REFERENCE_PURCHASE_URL" => $_POST['NewinpPurchaseLink'],
                "REFERENCE_PRICE" => str_replace(".", "", $_POST['NewinpPriceReference']),
                "maker_MAKER_ID" => $_POST['nameMaker'],
                "slcValueForUpdate" => $_POST['slcNewReferenceName']);
            parent::updateReferenceWithoutImage($array);
            header('location:?c=index&m=insertions');
        } else if($_FILES['NewimgReference']["name"] != null) {
            $tmpName = $_FILES['NewimgReference']['tmp_name'];
            $name  = sha1(date('Y-M-D (H:i:s)')).basename($_FILES['NewimgReference']['name']);
            $size = getimagesize($_FILES['NewimgReference']['tmp_name']);
            if($size[0] > 350 && $size[1] < 430){
                move_uploaded_file($tmpName, 'files/'.$name);
                $array = array("REFERENCE_NAME" => $_POST['NewinpNameReference'],
                    "REFERENCE_DESCRIPTION" => $_POST['referenceDescription'],
                    "REFERENCE_IMG" => $name,
                    "REFERENCE_FILE_URL" => $_POST['NewdoucumentReference'],
                    "REFERENCE_PURCHASE_URL" => $_POST['NewinpPurchaseLink'],
                    "REFERENCE_PRICE" => str_replace(".", "", $_POST['NewinpPriceReference']),
                    "maker_MAKER_ID" => $_POST['nameMaker'],
                    "slcValueForUpdate" => $_POST['slcNewReferenceName']);
                foreach (parent::queryReferenceForUpdate($array) as $resultQueryReferenceUpdate){
                    $nameFile = 'files/'.$resultQueryReferenceUpdate->REFERENCE_IMG;
                }
                unlink($nameFile);
                parent::updateReferenceWithImage($array);
                header('location:?c=index&m=insertions');
            } else {
                ?>
                <script>
                    alert('La imagen no cumple con la dimension establecida (Entre 350Px y 430px)');
                    window.location = 'http://localhost/Proyects/MultimeterSena/?c=index&m=insertions' ;
                </script>
                <?php
            }
        }
    }
    public function queryMakerForSelectIndexController(){
        foreach (parent::queryMakersForSelect($_REQUEST['slcMaker']) as $resultQueryMaker) {
            ?>
            <div class="form-group">
                <label for="inpNewMaker">Escribe el nuevo fabricante</label>
                <input type="text" name="inpNewMaker" id="inpNewMaker" class="form-control" value="<?php  echo ucwords($resultQueryMaker->MAKER_NAME); ?>">
                <small class="form-text text-muted">Escribe el nuevo fabricante</small>
            </div>
            <?php
        }
    }

    public function updateMakerIndexController(){
        $array = array("inpNewMaker" => $_REQUEST['inpNewMaker'],
                        "slcMaker" => $_REQUEST['slcMaker']);
        parent::updateMaker($array);
        echo 'Actualizado correctamente';
    }

    public function queryFunctionToUpdateIndexController(){
        foreach (parent::queryFunctionToUpdate($_REQUEST['slcNewFunction']) as $resultQueryFunctionToUpdate){
            ?>
            <div class="form-group">
                <label for="">Escribe la nueva funcion</label>
                <input type="text" name="inpNewFunction" id="inpNewFunction" class="form-control" value="<?php echo $resultQueryFunctionToUpdate->FUNCTION_NAME; ?>">
                <small class="form-text text-muted">Escribe la nueva funcion</small>
            </div>
            <?php
        }
    }

    public function updateFunctionIndexController(){
        $array = array("slcNewFunction" => $_REQUEST['slcNewFunction'],
                        "inpNewFunction" => $_REQUEST['inpNewFunction']);
        parent::updateFunction($array);
        echo 'Actualizado correctamente';
    }

    /*
     *  Eliminaciones en modulo de administrador
     *  @BrahianSánchez
     */

    public function deleteMakerIndexController()
    {
        parent::deleteMaker($_REQUEST['slcMaker']);
        echo 'Eliminado correctamente';
    }

    public function deleteFunctionIndexController(){
        parent::deleteFunction($_REQUEST['slcDeleteFunction']);
        echo 'Eliminado correctamente';
    }

}