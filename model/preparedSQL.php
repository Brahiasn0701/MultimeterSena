<?php
class preparedSQL
{
    //Constantes para realizar el llenado de las tablas auto y no manual
    const insertMaker = "INSERT INTO maker (MAKER_NAME) VALUES (?)";
    const insertReference = "INSERT INTO reference (REFERENCE_NAME, REFERENCE_IMG, REFERENCE_FILE, maker_MAKER_ID) VALUES (?,?,?,?)";
    const QueryMaker = "SELECT * FROM maker";
}