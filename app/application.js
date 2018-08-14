

$(function(){

    $(document).ready(function(){
        $('#resultSearchCard').hide();
        $('#contentInsertMaker').hide();
        $('#buttonBack').hide();
        $('#contentInsertFunction').hide();
        $('#contentAsignReference').hide();
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

    $('#btnAsignFunction').on("click", function () {
       $.ajax({
        type: 'POST',
           url: '?c=index&m=insertFunctionReferenceIndexController',
           data: {nameFunction : $('#slcNameFunction').val(),
                    nameReference : $('#slcReference').val()}
       }).done(function (response) {
           $('#contentAsignReference').show();
           $('#resultAsignFunction').html(response);
           setTimeout(function () {
               $('#contentAsignReference') .hide("slow");
           }, 1000);
           $('#slcNameFunction').val('');
           $('#slcReference').val('');
       });
    });

    /*
        QUERYS
        ------------------------------------
        Boton para mostrar el resultado de la busqueda
        @BrahianSánchez
    */

    $('#maker').on("change", function () {
        if ($(this).val() == 0){
            $.ajax({
               type: 'POST',
               url: '?c=index&m=queryAllReferences',
               data: null
            }).done(function (response) {
                $('#responseQueryReferenceForMaker').html(response);
            });
        } else {
            $.ajax({
               type: 'POST',
               url: '?c=index&m=queryReferenceForMaker',
               data: {value: $(this).val()}
            }).done(function (response) {
                $('#responseQueryReferenceForMaker').html(response);
            });
        }
    });

    $('#btnSearch').on("click", function(){
        $.ajax({
           type: 'POST',
            url: '?c=index&m=querySearch',
            data: {valueMaker : $('#maker').val(),
                    valueReference : $('#reference').val()}
        }).done(function (response) {
            alert(response);
            $('#responseSearch').html(response);
        });
       // $('#sectionForSearch').hide();
       // $('#resultSearchCard').show();
        // $('#buttonBack').show();
    });


});