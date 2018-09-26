<!-- 
    dex del buscador de Multimetros
    ---------------------------------
    Desarrollado por Brahian Sánchez
    Contacto: slbrahianIn@misena.edu.co
-->

<div class="container"> <!-- Contenedor Principal -->
    <p class="text-left lead pt-5 pb-5">Buscador de Multimetros</p>
    <div class="row justify-content-start">    <!-- Primera columna encargada del primer alineamieto -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="maker ">Fabricante</label>
                    <select  name="maker" id="maker" class="form-control">
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
        </div>
        <div class="col-md-3">
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
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Precisión</label>
                <div  id="resultQueryPrecisionForReference">
                    <select name="inpPrecisionReference" id="inpPrecisionReference" class="form-control">
                        <option value="0" selected>Precisión</option>
                    </select>
                </div>
                <small class="form-text text-muted">Precisión</small>
            </div>
        </div>
    </div> <!-- Fin de la primera Columna -->

    <div class="row align-items-start">  <!-- Segunda Columna encargada de alineamiento -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="resultQueryOnlyFunction">Variables de Medida</label>
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
                <small class="form-text text-muted">Variables de Medida</small> 
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Precio Inicial</label>
                <div  id="">
                    <select name="inpCostInitial" id="inpCostInitial" class="form-control">
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                    </select>
                </div>
                <small class="form-text text-muted">Precio Inicial</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Precio Final</label>
                <div  id="">
                    <select name="inpCostFinal" id="inpCostFinal" class="form-control">
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                        <option value="0" selected>Selecciona el Precio</option>
                    </select>
                </div>
                <small class="form-text text-muted">Precio Final</small>
            </div>
        </div>
    </div> <!-- Fin de la segunda Columna -->

    <!-- Botones para realizar Busqueda e ingresar en modulo Admin -->

    <button class="btn btn-outline-success" id="btnSearch">Buscar</button>     
    <button class="btn btn-outline-info" id="btnEdit">Editar</button>  

    <!-- Div correspondiente al resultado de la busqueda -->

    <div  id="responseSearch">    
    </div>

    <!-- Login -->

    <div class="row justify-content-center m-4" id="loginEdit"> <!-- Columna encargada de la alineacion de la Card -->
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
    </div> <!-- Fin de la Columna -->
</div> <!-- Fin de Contenedor -->