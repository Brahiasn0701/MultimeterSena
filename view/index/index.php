<!-- 
    diseño del buscador de Multimetros
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
                <label for="">Precio Inicial</label>
                <div  id="">
                    <select name="inpCostInitial" id="inpCostInitial" class="form-control">
                        <option value="0" selected>Selecciona</option>
                        <option value="30000" >30.000</option>
                        <option value="100000" >100.000</option>
                        <option value="300000" >300.000</option>
                        <option value="500000" >500.000</option>
                        <option value="800000" >800.000</option>
                        <option value="1000000" >1.000.000</option>
                        <option value="1500000" >1.500.000</option>
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
                        <option value="0" selected>Selecciona</option>
                        <option value="2000000" >2.000.000</option>
                        <option value="2500000" >2.500.000</option>
                        <option value="3000000" >3.000.000</option>
                        <option value="3500000" >3.500.000</option>
                        <option value="4000000" >4.000.000</option>
                        <option value="5000000" >5.000.000</option>
                    </select>
                </div>
                <small class="form-text text-muted">Precio Final</small>
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
                <label for="resultQueryOnlyFunction">Precisión</label>
                <div class="card">
                    <div class="card-body" id="resultQueryOnlyFunction">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-1_1_0.1" class="custom-control-input" value="-1_1_0.1">
                            <label class="custom-control-label" for="-1_1_0.1">Voltaje AC (0.1)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-2_1_0.5" class="custom-control-input" value="-2_1_0.5">
                            <label class="custom-control-label" for="-2_1_0.5">Voltaje AC (0.5)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-3_1_0.8" class="custom-control-input" value="-3_1_0.8">
                            <label class="custom-control-label" for="-3_1_0.8">Voltaje AC (0.8)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-4_2_0.1" class="custom-control-input" value="-4_2_0.1">
                            <label class="custom-control-label" for="-4_2_0.1">Voltaje DC (0.1)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-5_2_0.5" class="custom-control-input" value="-5_2_0.5">
                            <label class="custom-control-label" for="-5_2_0.5">Voltaje DC (0.5)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-6_2_0.8" class="custom-control-input" value="-6_2_0.8">
                            <label class="custom-control-label" for="-6_2_0.8">Voltaje DC (0.8)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-7_3_0.1" class="custom-control-input" value="-7_3_0.1">
                            <label class="custom-control-label" for="-7_3_0.1">Corriente AC (0.1)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-8_3_0.5" class="custom-control-input" value="-8_3_0.5">
                            <label class="custom-control-label" for="-8_3_0.5">Corriente AC (0.5)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-9_3_0.8" class="custom-control-input" value="-9_3_0.8">
                            <label class="custom-control-label" for="-9_3_0.8">Corriente AC (0.8)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-10_4_0.1" class="custom-control-input" value="-10_4_0.1">
                            <label class="custom-control-label" for="-10_4_0.1">Corriente DC (0.1)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-11_4_0.5" class="custom-control-input" value="-11_4_0.5">
                            <label class="custom-control-label" for="-11_4_0.5">Corriente DC (0.5)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="-12_4_0.8" class="custom-control-input" value="-12_4_0.8">
                            <label class="custom-control-label" for="-12_4_0.8">Corriente DC (0.8)</label>
                        </div>
                    </div>
                </div>
                <small class="form-text text-muted">Precisión</small> 
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