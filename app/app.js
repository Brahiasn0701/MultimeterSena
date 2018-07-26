$(function(){

    $(document).ready(function(){
        $('#resultSearchCard').hide();
        $('#contentInsertMaker').hide();
    });

    /* 
        Boton para mostrar el resultado de la busqueda
        @BrahianSánchez
    */
    $('#btnSearch').click(function(){
        $('#sectionForSearch').hide();
        $('#resultSearchCard').show();
    });

    /* 
        Boton para volver a atras y realizar nueva busqueda
        @BrahianSánchez
    */
    $('#btnBackSearch').click(function(){
        $('#resultSearchCard').hide();
        $('#sectionForSearch').show();
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
            }, 2000);
            $('#Maker').val("");
        });
    });
});