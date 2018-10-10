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
                $.ajax({
                    type: 'POST',
                    url: '?c=index&m=queryPrecisionForReferenceDefaultIndexController',
                    data: null
                }).done(function (response) {
                    $('#resultQueryPresicionForReference').html(response);
                });
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
                $.ajax({
                   type: 'POST',
                   url: '?c=index&m=queryPrecisionForReferenceIndexController',
                   data: {
                       valueReference: $('#reference').val()
                   }
                }).done(function (response) {
                    $('#resultQueryPresicionForReference').html(response);
                    $('.custom-control-input').prop('disabled', true);
                });
            });
       }
    });

    $('#btnSearch').on("click", function(){
        $('#loginEdit').hide();
        var valueCheck = [];
       $('input:checkbox[class=custom-control-input]:checked').each(function () {
           valueCheck.push($(this).val());
       });
        $.ajax({
           type: 'POST',
            url: '?c=index&m=querySearch',
            data: {valueMaker : $('#maker').val(),
                    nameMaker : $('#maker option:selected').text(),
                    valueReference : $('#reference').val(),
                    valueCheckBox: valueCheck,
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