$(function(){

    $(document).ready(function(){
        $('#resultSearchCard').hide();
        $('#contentInsertMaker').hide();
        $('#buttonBack').hide();
    });

    /*
        Boton para mostrar el resultado de la busqueda
        @BrahianSánchez
    */
    $('#btnSearch').click(function(){
        $('#sectionForSearch').hide();
        $('#resultSearchCard').show();
        $('#buttonBack').show();
    });

    /*
        Boton para volver a atras y realizar nueva busqueda
        @BrahianSánchez
    */
    $('#btnBackSearch').click(function(){
        $('#resultSearchCard').hide();
        $('#sectionForSearch').show();
        $('#buttonBack').hide();
    });

    /*
    *  Funcion que muestra tabReference al dar click
    *  @BrahianSánchez
    * */

    $('#MakerList').children('.list-group-item').on("click", function () {
      $('#referenceTabs').tab('show');
    });

    /*
        Funcion que muestra tabMultimeter al dar CLick
        @BrahianSánchez
     */

    $('#referenceList').children('.list-group-item').on("click", function () {
        $('#mutlimeterTabs').tab('show');
    });

    // Insercion para no hacer todo manualmente
    // @BrahianSánchez

    $('#btnInsertMaker').click(function(){
        $.ajax({
            type: 'POST',
            url: '?c=index&m=InsertMak',
            data: {make : $('#Maker').val()}
        }).done(function (response) {
            $('#contentInsertMaker').show();
            $('#resultInsertMaker').html(response);
            setTimeout(function () {
                $('#contentInsertMaker').hide("slow");
            }, 1000);
            $('#Maker').val("");
        });
    });

    //Subida de la Imagen, Pruebas
    //@BrahianSánchez


    //Captura de los datos de la Imagen Con JQUERY INVESTIGAR !
    //@BrahianSánchez


    $(':file').change(function(){
        var file = $('#imgReference')[0].files[0];
        var fileName = file.name;
        var FileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        var fileSize = file.size;
        var fileType = file.type;
        console.log("Nombre del Archivo " + fileName + " Tamaño del Archivo " + fileSize + " Bytes" );
    });

    $('#btnInsertReference').on("click", function () {
        let formData = new FormData();
        formData.append("valor", "123");
        formData.append("valor", "456");
        console.log(formData.getAll("valor"));
    });
});