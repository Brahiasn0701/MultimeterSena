<?php
class preparedSQL
{
    //Constantes para realizar el llenado de las tablas auto y no manual
    const insertMaker = "INSERT INTO maker (MAKER_NAME) VALUES (?)";
    const insertReference = "INSERT INTO reference (REFERENCE_NAME, REFERENCE_DESCRIPTION, REFERENCE_IMG, REFERENCE_FILE_URL, maker_MAKER_ID) VALUES (?,?,?,?,?)";
    const QueryMaker = "SELECT * FROM maker";
    const insertFunction = "INSERT INTO function (FUNCTION_NAME) VALUE (?)";
    const queryFunction = "SELECT * FROM function";
    const queryReference = "SELECT REFERENCE_ID, REFERENCE_NAME FROM reference";
}