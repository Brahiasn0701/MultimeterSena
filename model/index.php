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
            $stm->bindParam(5, $array['priceReference'], PDO::PARAM_STR);
            $stm->bindParam(6, $array['nameMaker'], PDO::PARAM_STR);
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
            $stm->bindParam(3, $array['valuePrecision'], PDO::PARAM_STR);
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

    public function queryReferenceOnlyForAMaker(array $array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryReferenceOnlyForAMaker);
            $stm->bindParam(2,$array['valueMaker'], PDO::PARAM_INT);
            $stm->bindParam(1, $array['valueReference'], PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryPrecisionForReference($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryPrecisionForReference);
            $stm->bindParam(1, $array['valueReference'], PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryOnlyReference($date){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryOnlyReference);
            $stm->bindParam(1, $date, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryFunctionForReference($data){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryFunctionForReference);
            $stm->bindParam(1, $data, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryForFunctionAndMaker(array $array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryForFunctionAndMaker);
            $stm->bindParam(1, $array['valueCheck'], PDO::PARAM_INT);
            $stm->bindParam(2, $array['valueMaker'], PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryForAllReferenceFunction($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryForAllReferenceFunction);
            $stm->bindParam(1, $array['valueCheck'], PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryandres($where,$id){
        try {
            //echo $where;
            $stm = parent::conexion()->prepare("SELECT * FROM reference
                                                         INNER JOIN function_has_reference ON
                                                         reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID
                                                         WHERE ".$where." AND reference.maker_MAKER_ID = ".$id." GROUP BY REFERENCE_ID");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryAllReferenceForPrice($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryAllReferenceForPrice);
            $stm->bindParam(1, $array['valuePriceInitial'], PDO::PARAM_INT);
            $stm->bindParam(2, $array['valuePriceFinal'], PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function queryReferenceForPriceAndMaker($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryReferenceForPriceAndMaker);
            $stm->bindParam(1, $array['valuePriceInitial'], PDO::PARAM_INT);
            $stm->bindParam(2, $array['valuePriceFinal'], PDO::PARAM_INT);
            $stm->bindParam(3, $array['valueMaker'], PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}