<?php

class index extends  database
{
    public function insertMaker(array $array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::insertMaker);
            $stm->bindParam(1, $array['MAKER_NAME'], PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryMaker(){
        try {
            $stm=parent::conexion()->prepare(preparedSQL::QueryMaker);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertReference(array $array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::insertReference);
            $stm->bindParam(1, $array['nameReference'], PDO::PARAM_STR);
            $stm->bindParam(2, $array['descriptionReference'], PDO::PARAM_STR);
            $stm->bindParam(3, $array['imageReference'], PDO::PARAM_STR);
            $stm->bindParam(4, $array['fileUrlReference'], PDO::PARAM_STR);
            $stm->bindParam(5, $array['nameMaker'], PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function insertFunction($date){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::insertFunction);
            $stm->bindParam(1, $date, PDO::PARAM_STR);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryFunction(){
        try {
            $stm=parent::conexion()->prepare(preparedSQL::queryFunction);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryReference(){
        try {
            $stm=parent::conexion()->prepare(preparedSQL::queryReference);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertFunctionReference(array $array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::insertFunctionReference);
            $stm->bindParam(1, $array['nameFunction'], PDO::PARAM_INT);
            $stm->bindParam(2, $array['nameReference'], PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function queryMakersForSelect($date){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryMakersForSelect);
            $stm->bindParam(1, $date, PDO::PARAM_INT);
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryRefrenceFormaker($date){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryReferenceForMaker);
            $stm->bindParam(1, $date, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function SuperQueryRobinsonAndresCortes($query,$join,$condicion){
        try {
            $stm = parent::conexion()->prepare($query.' '.$join.' '.$condicion);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}