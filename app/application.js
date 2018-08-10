$(function(){

    $(document).ready(function(){
        $('#resultSearchCard').hide();
        $('#contentInsertMaker').hide();
        $('#buttonBack').hide();
        $('#contentInsertFunction').hide();
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

    $('#btnInsertNewFunctionMultimeter').on("click", function () {
        $.ajax({
           type: 'POST',
           url: '?c=index&m=insertFunctionIndexController',
           data: {nameFunction : $('#inpNameFunctionMultimeter').val()}
        }).done(function (response) {
            $('#contentInsertFunction').show();
            $('#resultInsertFunction').html(response);
            setTimeout(function () {
               $('#contentInsertFunction') .hide("slow");
            }, 1000);
            $('#inpNameFunctionMultimeter').val("");
        });
    });
});