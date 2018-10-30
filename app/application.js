/*
    Application.JS
    Aca se encuentra todo lo relacionado con JQuery y Ajax

    Desarrollado por Brahian Sánchez
    Contacto: slbrahian@misena.edu.co
 */

$(function(){
    $(document).ready(function(){
        $('#resultSearchCard').hide();
        $('#contentInsertMaker').hide();
        $('#buttonBack').hide();
        $('#contentInsertFunction').hide();
        $('#contentAsignReference').hide();
        $('#contentUpdateMaker').hide();
        $('#contentDeleteMaker').hide();
        $('#contentUpdateFunction').hide();
        $('#contentDeleteFunction').hide();
        $('#loginEdit').hide();
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
                    nameReference : $('#slcReference').val(),
                    valuePrecision: $('#inpPrecision').val()}
       }).done(function (response) {
           $('#contentAsignReference').show();
           $('#resultAsignFunction').html(response);
           setTimeout(function () {
               $('#contentAsignReference') .hide("slow");
           }, 1000);
           $('#slcNameFunction').val('');
           $('#slcReference').val('');
           $('#inpPrecision').val('');
       });
    });


    /*
        Actualizaciones modulo de Administradores
        ---------------------------------------
        Consultas y boton para realizar actualizaciones
        @BrahianSánchez
     */

    $('#slcNewReferenceName').on('change', function(){
       $.ajax({
          type: 'POST',
          url: '?c=index&m=queryReferenceForUpdateIndexController',
          data: {
              slcValueForUpdate : $(this).val()
          }
       }).done(function (response) {
          $('#resultQueryUpdateReference').html(response);
       });
    });

    $('#slcNewMaker').on('change', function(){
        $.ajax({
           type: 'POST',
           url: '?c=index&m=queryMakerForSelectIndexController',
           data: {
               slcMaker: $('#slcNewMaker').val()
           },
        }).done(function(response){
            $('#resultQueryForUpdateMaker').html(response);
        });
    });

    $('#btnUpdateMaker').on('click', function(){
        $.ajax({
          type: 'POST',
          url: '?c=index&m=updateMakerIndexController',
          data: {
              slcMaker: $('#slcNewMaker').val(),
              inpNewMaker: $('#inpNewMaker').val()
          }  
        }).done(function (response) {
            $('#contentUpdateMaker').show();
            $('#resultUpdateMaker').html(response);
            setTimeout(function () {
                $('#contentUpdateMaker') .hide("slow");
            }, 1000);
            $('#inpNewMaker').val('');
            $('#slcNewMaker').val('0');
        });
    });


    /*
        Eliminaciones del modulo de administracion
        -----------------------------------------
        Consultas y Botones para realizar eliminaciones
        @BrahianSánchez
     */

    $('#btnDeleteMaker').on('click', function () {
        if(confirm('¿ Esta seguro de eliminar este fabricante ?') == true){
            $.ajax({
               type: 'POST',
               url: '?c=index&m=deleteMakerIndexController',
               data: {
                   slcMaker: $('#slcDeleteMaker').val()
               }
            }).done(function (response) {
                $('#contentDeleteMaker').show();
                $('#resultDeleteMaker').html(response);
                setTimeout(function () {
                    $('#contentDeleteMaker') .hide("slow");
                }, 1000);
                $('#slcDeleteMaker').val('0');
            });
        } else {
            $('#slcDeleteMaker').val('0');
        }
    });

    $('#slcNewFunction').on('change', function () {
        $.ajax({
           type: 'POST',
           url: '?c=index&m=queryFunctionToUpdateIndexController',
           data: {
               slcNewFunction: $('#slcNewFunction').val()
           }
        }).done(function (response) {
            $('#responseQueryUpdateFunction').html(response);
        });
    });

    $('#btnUpdateFunctionMultimeter').on('click', function(){
       $.ajax({
         type: 'POST',
         url: '?c=index&m=updateFunctionIndexController',
         data: {
             slcNewFunction: $('#slcNewFunction').val(),
             inpNewFunction: $('#inpNewFunction').val()
         }
       }).done(function (response) {
            $('#contentUpdateFunction').show();
            $('#resultUpdateFunction').html(response);
           setTimeout(function () {
               $('#contentUpdateFunction') .hide("slow");
           }, 1000);
           $('#inpNewFunction').val('');
           $('#slcNewFunction').val('0');
       });
    });

    $('#btnDeleteunctionMultimeter').on('click', function () {
       if(confirm('¿ Esta seguro de eliminar la function ?') == true){
           $.ajax({
              type: 'POST',
              url: '?c=index&m=deleteFunctionIndexController',
              data: {
                  slcDeleteFunction: $('#slcDeleteFunction').val()
              }
           }).done(function (response) {
                $('#contentDeleteFunction').show();
                $('#resultDeleteFunction').html(response);
               setTimeout(function () {
                   $('#contentDeleteFunction') .hide("slow");
               }, 1000);
               $('#slcDeleteFunction').val('0');
           });
       } else {
           $('#slcDeleteFunction').val('0');
       }
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
                $('#responseQueryReferenceForMaker').html( response);
                $('#inpCostInitial').prop('disabled', false);
                $('#inpCostFinal').prop('disabled', false);
                $.ajax({
                    type: 'POST',
                    url: '?c=index&m=queryFunctionDefaultIndexController',
                    data: null,
                }).done(function (response) {
                    $('#resultQueryOnlyFunction').html( response);
                    $.ajax({
                        type: 'POST',
                        url: '?c=index&m=queryPrecisionForReferenceDefaultIndexController',
                        data: null
                    }).done(function (response) {
                        $('#resultQueryPresicionForReference').html(response);
                    });
                });
            });
        } else {
            $.ajax({
               type: 'POST',
               url: '?c=index&m=queryReferenceForMaker',
               data: {value: $(this).val()}
            }).done(function (response) {
                $('#responseQueryReferenceForMaker').html(response);
                $('.custom-control-input').prop('disabled', false);
            });
        }
    });

    $('#reference').on("change", function () {
        if($(this).val() == 0){
            $.ajax({
               type: 'POST',
               url: '?c=index&m=queryFunctionForReferenceDefault',
               data: null
            }).done(function (response) {
                $('#resultQueryOnlyFunction').html(response);
                $('.custom-control-input').prop('disabled', false);
                $('#inpCostInitial').prop('disabled', false);
                $('#inpCostFinal').prop('disabled', false);
                $('#slcPrecision').prop('disabled', false);
            });
       } else {
            $.ajax({
               type: 'POST',
               url: '?c=index&m=queryFunctionForReferenceIndexController',
               data: {valueReference : $('#reference').val()}
            }).done(function (response) {
                $('#resultQueryOnlyFunction').html(response);
                $('.custom-control-input').prop('disabled', true);
                $('#inpCostInitial').prop('disabled', true);
                $('#inpCostFinal').prop('disabled', true);
                $('#slcPrecision').prop('disabled', true);
            });
       }
    });

    $('#btnSearch').on("click", function(){
        $('#loginEdit').hide();
        var presicionValueCkeck = [];
        var measurementVariablesValue = [];
       $('input:checkbox[class=custom-control-input]:checked').each(function () {
           if($(this).val() > 0){
               measurementVariablesValue.push($(this).val());

           } else if($(this).val().indexOf("_")){
               presicionValueCkeck.push($(this).val());
           }
       });

        $.ajax({
           type: 'POST',
            url: '?c=index&m=querySearch',
            data: {valueMaker : $('#maker').val(),
                    nameMaker : $('#maker option:selected').text(),
                    valueReference : $('#reference').val(),
                    measurementVariablesValue: measurementVariablesValue,
                    presicionValueCkeck: presicionValueCkeck,
                    valuePriceInitial: $('#inpCostInitial').val(),
                    valuePriceFinal: $('#inpCostFinal').val()}
        }).done(function (response) {
            $('#responseSearch').html(response);
        });

    });

    $('#btnEdit').on('click', function () {
        $('#responseSearch').hide();
        $('#loginEdit').show();
    });
});