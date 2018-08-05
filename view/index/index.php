<div class="container">
    <div class="row justify-content-start pt-5">
        <div id="buttonBack">
            <button class="btn btn-outline-info" id="btnBackSearch">Volver</button>
        </div>          
        <div class="col-3" id="sectionForSearch">
            <div class="form-group">
                <label for="maker ">Fabricante</label>
                    <select name="maker" id="maker" class="form-control">
                        <option value="" selected>Fabricante</option>
                        <?php
                            foreach (self::queryMaker() as $resultMakerAll) {
                                ?>
                                    <option value="<?php echo $resultMakerAll->MAKER_ID; ?>"><?php echo ucwords($resultMakerAll->MAKER_NAME); ?></option>
                                <?php
                            }
                        ?>
                    </select>
                <small class="form-text text-muted">Fabricante</small>
            </div>
            <div class="form-group">
                <label for="reference">Referencia</label>
                <select name="reference" id="reference" class="form-control">
                    <option value="" selected>Referencia</option>
                    <option value="">Opcion</option>
                    <option value="">Opcion</option>
                    <option value="">Opcion</option>
                    <option value="">Opcion</option>
                </select>
                <small class="form-text text-muted">Referencia</small>
            </div>
            <div class="form-group">
                <label for="function">Funcion</label>
                <div class="card">
                    <div class="card-body">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Funcion</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Funcion</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Funcion</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4">Funcion</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                            <label class="custom-control-label" for="customCheck5">Funcion</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                            <label class="custom-control-label" for="customCheck6">Funcion</label>
                        </div>
                    </div>
                </div>
                <small class="form-text text-muted">Funcion</small>
            </div>
            <button class="btn btn-outline-success" id="btnSearch">Buscar</button>    
        </div>
    </div>
    <div id="resultSearchCard">
        <div class="row justify-content-center mt-5">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="#myList" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="homeTabs" data-toggle="pill" href="#makersMultimeterShow" role="tab" aria-controls="home" aria-selected="true">Fabricantes</a>
                        <a class="nav-link" id="referenceTabs" data-toggle="pill" href="#referenceMultimeterShow" role="tab" aria-controls="referenceTabs" aria-selected="false">Referencias</a>
                        <a class="nav-link" id="mutlimeterTabs" data-toggle="pill" href="#multimeterShow" role="tab" aria-controls="mutlimeterTabs" aria-selected="false">Multimetros</a>                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="makersMultimeterShow" role="tabpanel" aria-labelledby="makersMultimeterShow">
                            <div class="list-group" id="MakerList">
                                <?php
                                    foreach (parent::queryMaker() as $resultMaker) {
                                        ?>
                                            <a id="<?php echo $resultMaker->MAKER_NAME; ?>"  class="list-group-item list-group-item-action">
                                                <?php echo $resultMaker->MAKER_NAME; ?>
                                            </a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="referenceMultimeterShow" role="tabpanel" aria-labelledby="referenceMultimeterShow">
                            <div class="list-group" id="referenceList">
                                <a href="#" class="list-group-item list-group-item-action" id="Valor1">Referencia</a>
                                <a href="#" class="list-group-item list-group-item-action" id="Valor2">Referencia</a>
                                <a href="#" class="list-group-item list-group-item-action" id="Valor3">Referencia</a>
                                <a href="#" class="list-group-item list-group-item-action" id="Valor4">Referencia</a>
                                <a href="#" class="list-group-item list-group-item-action" id="Valor5">Referencia</a>
                                <a href="#" class="list-group-item list-group-item-action" id="Valor6">Referencia</a>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="multimeterShow" role="tabpanel" aria-labelledby="multimeterShow">
                            <div class="row justify-content-center">
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>             
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>  
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>  
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>  
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>  
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>  
                                <div class="ml-5 mb-5">            
                                    <div class="card col" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                                            <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <a href="#" class="btn btn-primary col">Descargar PDF</a>
                                                <div class="p-1"></div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>    
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>