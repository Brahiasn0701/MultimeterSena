<!-- 
    diseño del modulo de administrador buscador de Multimetros
    ---------------------------------
    Desarrollado por Brahian Sánchez
    Contacto: slbrahianIn@misena.edu.co
-->

<div class="container mt-5"> <!-- Inicio de Contenedor -->
    <p class="text-left lead ml-3 pb-3">Modulo de Administradores, Bienvenid@ <b><?php echo $_SESSION['NAME'].' '.$_SESSION['LASTNAME']; ?></b></p>
    <a href="?c=login&m=destroySession" class="btn btn-outline-success mb-3" role="button">Cerrar Sesion</a>
    <div class="row justify-content-center"> <!-- Incio de columna encargada de alineamiento -->
        <div class="col-md-4 mt-5">
            <div class="card"> <!-- Card para la realizacion de insercion de Referencias -->
                <div class="card-body">
                    <h5 class="card-title">Insercion de Referencias</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Formulario Referencias</h6>
                    <div class="card-text">
                        <form id="formReference" action="?c=index&m=InsertReferenceIndexController" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="referenceName">Nombre de la Referencia</label>
                                <input type="text" name="referenceName" id="referenceName" class="form-control">
                                <small class="form-text text-muted">Escribe el nombre de la referencia</small>
                            </div>
                            <div class="form-group">
                                <label for="referenceDescription">Descripcion de la referencia</label>
                                <textarea name="referenceDescription" rows="10" id="referenceDescription" class="form-control"></textarea>
                                <small class="form-text text-muted">Escribe la descripcion de la referencia</small>
                            </div>
                            <div class="form-group">
                                <label for="imgReference">Imagen de Referencia</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imgReference" id="imgReference">
                                    <label class="custom-file-label" for="imgReference">Seleccionar Archivo</label>
                                </div>
                                <small class="form-text text-muted">Imagen de la referencia</small>
                            </div>
                            <div class="form-group">
                                <label for="doucumentReference">Documento de la referencia</label>
                                <input type="text" name="doucumentReference" id="doucumentReference" class="form-control">
                                <small class="form-text text-muted">Pega la url del archivo</small>
                            </div>
                            <div class="form-group">
                                <label for="inpLinkForPurchase">Enlace de compra</label>
                                <input type="text" name="inpLinkForPurchase" id="inpLinkForPurchase" class="form-control">
                                <small class="form-text text-muted">Pega la url de compra</small>
                            </div>
                            <div class="form-group">
                              <label for="inpPriceReference">Precio de referencia</label>
                              <input type="text" name="inpPriceReference" id="inpPriceReference" class="form-control">
                              <small class="form-text text-muted">Escribe el precio de la refrencia</small>
                            </div>
                            <div class="form-group">
                                <label for="nameMaker">Nombre del Fabricante</label>
                                <select name="nameMaker" id="nameMaker" class="form-control">
                                    <option value="">Fabricante</option>
                                    <?php
                                    foreach (self::queryMaker() as $resultMakerAll) {
                                        ?>
                                        <option value="<?php echo $resultMakerAll->MAKER_ID; ?>"><?php echo ucwords($resultMakerAll->MAKER_NAME); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted">Selecciona el Fabricante</small>
                            </div>
                            <button type="submit" class="btn btn-outline-primary" id="btnInsertReference">Insertar</button>
                        </form>
                    </div>
                </div>
            </div> <!-- Fin de la Card de insercion de Referencias -->
        </div>
        <div class="col-md-4 mt-5">
            <div class="card"> <!-- Inicio de la Card encargada de la actualizacion de Referencias -->
                <div class="card-body">
                    <h5 class="card-title">Actualizacion de Referencias</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Actualizar Referencias</h6>
                    <div class="card-text">
                        <form action="?c=index&m=updateReference" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="slcNewReferenceName">Selecciona la Referencia</label>
                                <select name="slcNewReferenceName" id="slcNewReferenceName" class="form-control">
                                    <option value="0" selected>Selecciona</option>
                                    <?php
                                        foreach(parent::queryReference() as $reultQueryReference){
                                    ?>
                                        <option value="<?php echo $reultQueryReference->REFERENCE_ID; ?>"><?php echo $reultQueryReference->REFERENCE_NAME; ?></option>
                                    <?php
                                        } 
                                    ?>
                                </select>
                                <small class="form-text text-muted">Escribe el nombre de la referencia</small>
                            </div>
                            <div id="resultQueryUpdateReference">
                                <div class="form-group">
                                    <label for="NewinpNameReference">Nuevo nombre de referencia</label>
                                    <input type="text" name="NewinpNameReference" id="NewinpNameReference" class="form-control">
                                    <small class="form-text text-muted">Nuevo nombre de referencia</small>
                                </div>
                                <div class="form-group">
                                    <label for="referenceDescription">Descripcion de la referencia</label>
                                    <textarea name="referenceDescription" rows="10" id="referenceDescription" class="form-control"></textarea>
                                    <small class="form-text text-muted">Nueva descripcion de la referencia</small>
                                </div>
                                <div class="form-group">
                                    <label for="imgReferencePreShow">Previsualizacion de Imagen</label>
                                    <div class="text-left">
                                        <img src="" alt="Imagen de Referencia" class="rounded">
                                    </div>
                                    <small class="form-text text-muted">Previsualizacion</small>
                                </div>
                                <div class="form-group">
                                    <label for="NewimgReference">Nueva Imagen de Referencia</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="NewimgReference" id="NewimgReference">
                                        <label class="custom-file-label" for="NewimgReference">Seleccionar Archivo</label>
                                    </div>
                                    <small class="form-text text-muted">Nueva imagen de la referencia</small>
                                </div>
                                <div class="form-group">
                                    <label for="NewdoucumentReference">Nuevo Documento de la referencia</label>
                                    <input type="text" name="NewdoucumentReference" id="NewdoucumentReference" class="form-control">
                                    <small class="form-text text-muted">Nueva url del archivo</small>
                                </div>
                                <div class="form group">
                                    <label for="NewinpPurchaseLink">Nuevo enlace de compra</label>
                                    <input type="text" name="NewinpPurchaseLink" id="NewinpPurchaseLink" class="form-control">
                                    <small class="form-text text-muted">Nuevo enlace</small>
                                </div>
                                <div class="form-group">
                                <label for="NewinpPriceReference">Nuevo Precio de referencia</label>
                                <input type="text" name="NewinpPriceReference" id="NewinpPriceReference" class="form-control">
                                <small class="form-text text-muted">Nuevo precio de la refrencia</small>
                                </div>
                                <div class="form-group">
                                    <label for="nameMaker">Nombre del Fabricante</label>
                                    <select name="nameMaker" id="nameMaker" class="form-control">
                                        <option value="">Fabricante</option>
                                        <?php
                                        foreach (self::queryMaker() as $resultMakerAll) {
                                            ?>
                                            <option value="<?php echo $resultMakerAll->MAKER_ID; ?>"><?php echo ucwords($resultMakerAll->MAKER_NAME); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <small class="form-text text-muted">Selecciona el Fabricante</small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary" id="btnUpdateReference">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div> <!-- Fin de la Card encargada de la actualizacion de Referencias -->
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Eliminacion de Referencias</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Formulario Referencias</h6>
                    <div class="card-text">
                        <form id="formReference" action="?c=index&m=InsertReferenceIndexController" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="referenceName">Nombre de la Referencia</label>
                                <input type="text" name="referenceName" id="referenceName" class="form-control">
                                <small class="form-text text-muted">Escribe el nombre de la referencia</small>
                            </div>
                            <div class="form-group">
                                <label for="referenceDescription">Descripcion de la referencia</label>
                                <textarea name="referenceDescription" rows="10" id="referenceDescription" class="form-control"></textarea>
                                <small class="form-text text-muted">Escribe la descripcion de la referencia</small>
                            </div>
                            <div class="form-group">
                                <label for="imgReference">Imagen de Referencia</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imgReference" id="imgReference">
                                    <label class="custom-file-label" for="imgReference">Seleccionar Archivo</label>
                                </div>
                                <small class="form-text text-muted">Imagen de la referencia</small>
                            </div>
                            <div class="form-group">
                                <label for="doucumentReference">Documento de la referencia</label>
                                <input type="text" name="doucumentReference" id="doucumentReference" class="form-control">
                                <small class="form-text text-muted">Pega la url del archivo</small>
                            </div>
                            <div class="form-group">
                              <label for="inpPriceReference">Precio de referencia</label>
                              <input type="text" name="inpPriceReference" id="inpPriceReference" class="form-control">
                              <small class="form-text text-muted">Escribe el precio de la refrencia</small>
                            </div>
                            <div class="form-group">
                                <label for="nameMaker">Nombre del Fabricante</label>
                                <select name="nameMaker" id="nameMaker" class="form-control">
                                    <option value="">Fabricante</option>
                                    <?php
                                    foreach (self::queryMaker() as $resultMakerAll) {
                                        ?>
                                        <option value="<?php echo $resultMakerAll->MAKER_ID; ?>"><?php echo ucwords($resultMakerAll->MAKER_NAME); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted">Selecciona el Fabricante</small>
                            </div>
                            <button type="submit" class="btn btn-outline-primary" id="">Insertar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Insercion de Fabricantes</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Formulario Fabricantes</h6>
                    <div id="contentInsertMaker">
                        <div class="alert alert-success" role="alert">
                            <div id="resultInsertMaker">
                            </div>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="form-group">
                            <label for="Maker">Fabricante</label>
                            <input type="text" name="Maker" id="Maker" class="form-control">
                            <small class="form-text text-muted">Escribe el Fabricante</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" id="btnInsertMaker">Insertar</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Actualizacion de Fabricantes</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Formulario Fabricantes</h6>
                    <!-- <div id="contentInsertMaker">
                        <div class="alert alert-success" role="alert">
                            <div id="resultInsertMaker">
                            </div>
                        </div>
                    </div> -->
                    <div class="card-text">
                        <div class="form-group">
                            <label for="Maker">Fabricante</label>
                            <input type="text" name="Maker" id="Maker" class="form-control">
                            <small class="form-text text-muted">Escribe el Fabricante</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" id="btnInsertMaker">Insertar</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Eliminacion de Fabricantes</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Formulario Fabricantes</h6>
                    <!-- <div id="contentInsertMaker">
                        <div class="alert alert-success" role="alert">
                            <div id="resultInsertMaker">
                            </div>
                        </div>
                    </div> -->
                    <div class="card-text">
                        <div class="form-group">
                            <label for="Maker">Fabricante</label>
                            <input type="text" name="Maker" id="Maker" class="form-control">
                            <small class="form-text text-muted">Escribe el Fabricante</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" id="btnInsertMaker">Insertar</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Funciones</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Formulario para añadir funciones</h6>
                    <div id="contentInsertFunction">
                        <div class="alert alert-success" role="alert">
                            <div id="resultInsertFunction">
                            </div>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="form-group">
                            <label for="">Nombre de Funcion</label>
                            <input type="text" name="inpNameFunctionMultimeter" id="inpNameFunctionMultimeter" class="form-control">
                            <small class="form-text text-muted">Escribe el nombre de la funcion</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" id="btnInsertNewFunctionMultimeter">Insertar</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Funciones</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Formulario para actualizar funciones</h6>
                    <!-- <div id="contentInsertFunction">
                        <div class="alert alert-success" role="alert">
                            <div id="resultInsertFunction">
                            </div>
                        </div>
                    </div> -->
                    <div class="card-text">
                        <div class="form-group">
                            <label for="">Nombre de Funcion</label>
                            <input type="text" name="inpNameFunctionMultimeter" id="inpNameFunctionMultimeter" class="form-control">
                            <small class="form-text text-muted">Escribe el nombre de la funcion</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" id="btnInsertNewFunctionMultimeter">Insertar</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Funciones</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Formulario para eliminar funciones</h6>
                    <!-- <div id="contentInsertFunction">
                        <div class="alert alert-success" role="alert">
                            <div id="resultInsertFunction">
                            </div>
                        </div>
                    </div> -->
                    <div class="card-text">
                        <div class="form-group">
                            <label for="">Nombre de Funcion</label>
                            <input type="text" name="inpNameFunctionMultimeter" id="inpNameFunctionMultimeter" class="form-control">
                            <small class="form-text text-muted">Escribe el nombre de la funcion</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" id="btnInsertNewFunctionMultimeter">Insertar</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Asginacion de funciones por referencia</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Formulario para asignar funciones</h6>
                    <div id="contentAsignReference">
                    <div class="alert alert-success" role="alert">
                        <div id="resultAsignFunction">
                        </div>
                    </div>
                </div>
                    <div class="card-text">
                        <div class="form-group">
                            <label for="">Funcion</label>
                            <select name="slcNameFunction" id="slcNameFunction" class="form-control">
                                <option value="" selected>Selecciona</option>
                                <?php
                                    foreach (parent::queryFunction() as $resultQueryAsignFunction) {
                                        ?>
                                        <option value="<?php echo $resultQueryAsignFunction->FUNCTION_ID; ?>"><?php echo $resultQueryAsignFunction->FUNCTION_NAME; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <small class="form-text text-muted">Selecciona la funcion</small>
                        </div>
                        <div class="form-group">
                            <label for="slcReference">Referencia</label>
                            <select name="slcReference" id="slcReference" class="form-control">
                                <option value="" selected>Selecciona</option>
                                <?php
                                    foreach (parent::queryReference() as $resultQueryAsignReference) {
                                        ?>
                                        <option value="<?php echo $resultQueryAsignReference->REFERENCE_ID; ?>"><?php echo $resultQueryAsignReference->REFERENCE_NAME; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <small class="text-muted form-text">Selecciona la referencia</small>
                        </div>
                        <div class="form-group">
                            <label for="inpPrecision">Precisión</label>
                            <input type="text" name="inpPrecision" id="inpPrecision" class="form-control">
                            <small class="text-muted form-text">Escribe la precision de la Funcion</small>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" id="btnAsignFunction">Insertar</button>
                </div>
            </div>
        </div>
    </div> <!-- Fin de Columna -->
</div> <!-- Fin de Contentedor -->
