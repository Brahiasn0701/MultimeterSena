<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card" style="width: 20rem;">
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
        <div class="col">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Insercion de Referencias</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Formulario Referencias</h6>
                    <div class="card-text">
                        <form id="formReference" enctype="multipart/form-data">
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
                        </form>
                            <button class="btn btn-outline-primary" id="btnInsertReference">Insertar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another links</a>
                </div>
            </div>
        </div>
    </div>
</div>