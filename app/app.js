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
        $('#searchTitle').hide();
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
        $('#searchTitle').show();
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
               console.log("Nombre del Archivo " + fileName + " Tamaño del Archivo " + fileSize + " Bytes");
            });

            $('#btnInsertReference').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '?c=index&m=InsertReference',
                    data: {nameReference : $('#referenceName').val(),
                            descriptionReference : $('#referenceDescription').val(),
                            imgReference : $('#imgReference').val(),
                            documentReference : $('#doucumentReference').val(),
                            nameMaker : $('#nameMaker').val()},
                    success(response){
                        alert(response)
                    }
                });
            });
});