$(function(){

    $(document).ready(function(){
        $('#resultSearchCard').hide();
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
});