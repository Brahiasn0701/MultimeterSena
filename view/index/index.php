<div class="container">
    <p class="text-left lead pt-5 ">Buscador de Multimetros</p>
    <div class="row justify-content-start pt-5 float-xl-left">
        <div id="buttonBack">
            <button class="btn btn-outline-info" id="btnBackSearch">Volver</button>
        </div>          
        <div class="col">
                <div class="form-group">
                    <label for="maker ">Fabricante</label>
                        <select name="maker" id="maker" class="form-control">
                            <option value="0" selected>Fabricante</option>
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
                    <div  id="responseQueryReferenceForMaker">
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
                    </div>
                    <small class="form-text text-muted">Referencia</small>
                </div>
                <div class="form-group">
                    <label for="function">Funcion</label>
                    <div class="card">
                        <div class="card-body" id="resultQueryOnlyFunction">
                            <?php
                                foreach (parent::queryFunction() as $resultQueryFunction) {
                                    ?>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="<?php echo $resultQueryFunction->FUNCTION_ID; ?>" class="custom-control-input" value="<?php echo $resultQueryFunction->FUNCTION_ID; ?>">
                                        <label class="custom-control-label" for="<?php echo $resultQueryFunction->FUNCTION_ID; ?>"><?php echo $resultQueryFunction->FUNCTION_NAME; ?></label>
                                    </div>
                                    <?php
                                
                                }
                            ?>
                        
                        </div>
                    </div>
                    <small class="form-text text-muted">Funcion</small>
                </div>
                <button class="btn btn-outline-success" id="btnSearch">Buscar</button>
                <button class="btn btn-outline-info" id="btnEdit">Editar</button>
            </div>
            <div id="responseSearch">
            </div>
        </div>
    <div class="row justify-content-center m-3" id="loginEdit">
        <div class="card" style="width: 24rem;">
            <div class="card-body">
                <h5 class="card-title">Inicio de Sesion</h5>
                <h6 class="card-subtitle mb-2 text-muted">Administradores de Sistema</h6>
                <div class="card-text">
                    <form action="?c=login&m=loginUsersLoginController" method="POST">
                        <div class="form-group">
                            <label for="">Usuario</label>
                            <input type="text" id="inpUserLoginAdmin" name="inpUserLoginAdmin" class="form-control">
                            <small class="form-text text-muted">Digita tu usuario</small>
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" id="inpPassLoginAdmin" name="inpPassLoginAdmin" class="form-control">
                            <small class="form-text text-muted">Digita tu contraseña</small>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Iniciar Sesion</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>

    