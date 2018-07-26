<div class="container">
    <div class="row justify-content-center pt-5">
        <p class="lead pr-5">Buscador de Multimetros</p>
        <form action="?c=index&m=InsertMak" method="POST">            
            <div class="form-group">
                <label for="">Nombre fabricante</label>
                <input type="text" class="form-control" name="nameMaker">
                <button type="submit" class="form-control">Insertar</button>
            </div>
        </form>
        <div class="col-3" id="sectionForSearch">
            <div class="form-group">
                <label for="maker ">Fabricante</label>
                    <select name="maker" id="maker" class="form-control">
                        <option value="" selected>Fabricante</option>
                        <option value="">Opcion</option>
                        <option value="">Opcion</option>
                        <option value="">Opcion</option>
                        <option value="">Opcion</option>
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
                <select name="function" id="function" class="form-control">
                    <option value="" selected>Funcion</option>
                    <option value="">Opcion</option>
                    <option value="">Opcion</option>
                    <option value="">Opcion</option>
                    <option value="">Opcion</option>
                </select>
                <small class="form-text text-muted">Referencia</small>
            </div>
            <button class="btn btn-outline-primary" id="btnSearch">Buscar</button>    
        </div>
        <div class="col-3" id="resultSearchCard">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="assets/img/multimetro.jpg" alt="Multimetro Crash">
                <div class="card-body">
                    <h5 class="card-title">Nombre Multimetro (Referencia)</h5>
                    <h6 class="card-subtitle text-muted mb-2">Caracteristicas</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="row">
                        <a href="#" class="btn btn-primary col">Descargar PDF</a>
                        <div class="p-2"></div>
                        <button class="btn btn-danger col" id="btnBackSearch">Volver</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>