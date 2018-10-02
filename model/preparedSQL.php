<?php
final class preparedSQL
{
    //Constantes para realizar el llenado de las tablas auto y no manual
    const insertMaker = "INSERT INTO maker (MAKER_NAME) VALUES (?)";
    const insertReference = "INSERT INTO reference (REFERENCE_NAME, REFERENCE_DESCRIPTION, REFERENCE_IMG, REFERENCE_FILE_URL, REFERENCE_PRICE, maker_MAKER_ID) VALUES (?,?,?,?,?,?)";
    const QueryMaker = "SELECT * FROM maker";
    const insertFunction = "INSERT INTO function (FUNCTION_NAME) VALUE (?)";
    const queryFunction = "SELECT * FROM function";
    const queryReference = "SELECT REFERENCE_ID, REFERENCE_NAME FROM reference";
    const insertFunctionReference = "INSERT INTO function_has_reference (FUNCTION_FUNCTION_ID, REFERENCE_REFERENCE_ID, FUNCTION_PRECISION) VALUES (?,?, ?)";

    //Querys
    const queryMakersForSelect = "SELECT * FROM maker WHERE MAKER_ID = ?";
    const queryReferenceForMaker = "SELECT * FROM reference  WHERE maker_MAKER_ID= ?";
    const queryPrecisionForReference = "SELECT * FROM reference INNER JOIN function_has_reference  INNER JOIN function ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID AND function.FUNCTION_ID = function_has_reference.FUNCTION_FUNCTION_ID WHERE REFERENCE_ID = ?";
    const queryReferenceOnlyForAMaker = "SELECT * FROM reference WHERE  REFERENCE_ID = ? and maker_MAKER_ID = ?";
    const queryOnlyReference = "SELECT * FROM reference INNER JOIN maker ON maker.MAKER_ID = reference.maker_MAKER_ID WHERE REFERENCE_ID = ?";
    const queryFunctionForReference = "SELECT * FROM function INNER JOIN function_has_reference INNER JOIN reference ON function.FUNCTION_ID = function_has_reference.FUNCTION_FUNCTION_ID and reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID
      WHERE REFERENCE_ID = ?";
    const queryForFunctionAndMaker = "SELECT * FROM reference INNER JOIN function_has_reference ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID WHERE function_has_reference.FUNCTION_FUNCTION_ID = ? AND reference.maker_MAKER_ID = ?";
    const queryForAllReferenceFunction = "SELECT * FROM reference INNER JOIN function_has_reference ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID WHERE function_has_reference.FUNCTION_FUNCTION_ID = ?";
}