<?php
/*
 * Querys de todo el programa
    ---------------------------------
    Desarrollado por Brahian Sánchez
    Contacto: slbrahianIn@misena.edu.co
 */

final class preparedSQL
{
    //Constantes para realizar el llenado de las tablas auto y no manual
    const insertMaker = "INSERT INTO maker (MAKER_NAME) VALUES (?)";
    const insertReference = "INSERT INTO reference (REFERENCE_NAME, REFERENCE_DESCRIPTION, REFERENCE_IMG, REFERENCE_FILE_URL, REFERENCE_PURCHASE_URL, REFERENCE_PRICE, maker_MAKER_ID) VALUES (?,?,?,?,?,?,?)";
    const QueryMaker = "SELECT * FROM maker";
    const insertFunction = "INSERT INTO function (FUNCTION_NAME) VALUE (?)";
    const queryFunction = "SELECT * FROM function";
    const queryReference = "SELECT REFERENCE_ID, REFERENCE_NAME FROM reference";
    const insertFunctionReference = "INSERT INTO function_has_reference (FUNCTION_FUNCTION_ID, REFERENCE_REFERENCE_ID, FUNCTION_PRECISION) VALUES (?,?, ?)";

    //Querys
    const queryMakersForSelect = "SELECT * FROM maker WHERE MAKER_ID = ?";
    const queryReferenceForMaker = "SELECT * FROM reference WHERE maker_MAKER_ID= ?";
    const queryPrecisionForReference = "SELECT * FROM reference INNER JOIN function_has_reference  INNER JOIN function ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID AND function.FUNCTION_ID = function_has_reference.FUNCTION_FUNCTION_ID WHERE REFERENCE_ID = ?";
    const queryReferenceOnlyForAMaker = "SELECT * FROM reference WHERE  REFERENCE_ID = ? and maker_MAKER_ID = ?";
    const queryOnlyReference = "SELECT * FROM reference INNER JOIN maker ON maker.MAKER_ID = reference.maker_MAKER_ID WHERE REFERENCE_ID = ?";
    const queryFunctionForReference = "SELECT * FROM function INNER JOIN function_has_reference INNER JOIN reference ON function.FUNCTION_ID = function_has_reference.FUNCTION_FUNCTION_ID and reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID
      WHERE REFERENCE_ID = ?";
    const queryForFunctionAndMaker = "SELECT * FROM reference INNER JOIN function_has_reference ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID WHERE function_has_reference.FUNCTION_FUNCTION_ID = ? AND reference.maker_MAKER_ID = ?";
    const queryForAllReferenceFunction = "SELECT * FROM reference INNER JOIN function_has_reference ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID WHERE function_has_reference.FUNCTION_FUNCTION_ID = ?";
    const queryAllReferenceForPrice = "SELECT * FROM reference WHERE REFERENCE_PRICE BETWEEN  ? AND ?";
    const queryReferenceForPriceAndMaker = "SELECT * FROM reference where REFERENCE_PRICE BETWEEN ? AND ? AND maker_MAKER_ID = ?";
    const queryFunctionReferenceForReference = "SELECT * FROM function_has_reference INNER JOIN function on function_has_reference.FUNCTION_FUNCTION_ID = function.FUNCTION_ID where REFERENCE_REFERENCE_ID = ?";
    const queryReferenceForFunctionAndPrecision = "SELECT * FROM function_has_reference INNER JOIN reference ON function_has_reference.REFERENCE_REFERENCE_ID = reference.REFERENCE_ID WHERE function_has_reference.FUNCTION_FUNCTION_ID = ? AND function_has_reference.FUNCTION_PRECISION = ?";
    const queryReferenceForFunctionAndPrecisionAndMaker = "SELECT * FROM function_has_reference INNER JOIN reference INNER JOIN maker ON function_has_reference.REFERENCE_REFERENCE_ID = reference.REFERENCE_ID AND maker.MAKER_ID = reference.maker_MAKER_ID WHERE maker.MAKER_ID = ? AND function_has_reference.FUNCTION_FUNCTION_ID = ? AND function_has_reference.FUNCTION_PRECISION = ?";
    const queryReferenceForFunctionAndPrecisionMakerAndPrice = "SELECT * FROM function_has_reference INNER JOIN reference INNER JOIN maker ON function_has_reference.REFERENCE_REFERENCE_ID = reference.REFERENCE_ID AND maker.MAKER_ID = reference.maker_MAKER_ID WHERE maker.MAKER_ID = ? AND function_has_reference.FUNCTION_FUNCTION_ID = ? AND FUNCTION_PRECISION = ? AND reference.REFERENCE_PRICE BETWEEN ? AND ?";

    //Update modulo Administradores
    const queryReferenceForUpdate = "SELECT * FROM reference INNER JOIN maker ON reference.maker_MAKER_ID = maker.MAKER_ID WHERE REFERENCE_ID = ?";
    const queryMakerDiferentsTo = "SELECT * FROM maker WHERE MAKER_ID != ?";
    const updateReferenceWithoutImage = "UPDATE reference SET REFERENCE_NAME = ?, REFERENCE_DESCRIPTION = ?, REFERENCE_FILE_URL = ?, REFERENCE_PURCHASE_URL = ?, REFERENCE_PRICE = ?, maker_MAKER_ID = ?
                                         WHERE REFERENCE_ID = ?";
    const updateReferenceWithImage = "UPDATE reference SET REFERENCE_NAME = ?, REFERENCE_DESCRIPTION = ?, REFERENCE_IMG = ?, REFERENCE_FILE_URL = ?, REFERENCE_PURCHASE_URL = ?, REFERENCE_PRICE = ?, maker_MAKER_ID = ?
                                         WHERE REFERENCE_ID = ?";
    const updateMaker = "UPDATE maker SET MAKER_NAME = ? where MAKER_ID = ?";
    const queryFunctionToUpdate = "SELECT * FROM function WHERE FUNCTION_ID = ?";
    const updateFunction = "UPDATE function SET FUNCTION_NAME = ? WHERE FUNCTION_ID = ?";

    //Delete modulo Administradores
    const deleteMaker = "DELETE FROM maker WHERE MAKER_ID = ?";
    const deleteFunction = "DELETE FROM function WHERE FUNCTION_ID = ?";

}