<?php

class index extends  database
{
    public function insertMaker($array){
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

    public function insertReference($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::insertReference);
            $stm->bindParam(1, $array['nameReference'], PDO::PARAM_STR);
            $stm->bindParam(2, $array['descriptionReference'], PDO::PARAM_STR);
            $stm->bindParam(3, $array['imageReference'], PDO::PARAM_STR);
            $stm->bindParam(4, $array['fileUrlReference'], PDO::PARAM_STR);
            $stm->bindParam(5, $array['urlPurchaseLink'], PDO::PARAM_STR);
            $stm->bindParam(6, $array['priceReference'], PDO::PARAM_STR);
            $stm->bindParam(7, $array['nameMaker'], PDO::PARAM_STR);
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

    public function insertFunctionReference($array){
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
            $stm->execute();
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

    public function queryReferenceOnlyForAMaker($array){
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

    public function queryForFunctionAndMaker($array){
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

    public function queryReferenceForFuncionAndMaker($where,$id){
        try {
            $stm = parent::conexion()->prepare("SELECT * FROM reference
                                                         INNER JOIN function_has_reference ON
                                                         reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID
                                                         WHERE (".$where.") AND reference.maker_MAKER_ID = $id GROUP BY REFERENCE_ID");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryReferenceForFunction($where){
        try {
            $stm = parent::conexion()->prepare("SELECT * FROM reference
                                                         INNER JOIN function_has_reference ON
                                                         reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID
                                                         WHERE (".$where.") GROUP BY REFERENCE_ID");
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

    public function queryFunctionReferenceForReference($data){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryFunctionReferenceForReference);
            $stm->bindParam(1, $data, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryReferenceForFunctionAndPrecision($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryReferenceForFunctionAndPrecision);
            $stm->bindParam(1, $array['FUNCTION_FUNCTION_ID'], PDO::PARAM_INT);
            $stm->bindParam(2, $array['FUNCTION_PRECISION'], PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryReferenceForFunctionPrecisionAndSomeSelected($where){
        try {
            $stm = parent::conexion()->prepare("SELECT * FROM reference 
                                                INNER JOIN function_has_reference ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID 
                                                WHERE ".$where);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryReferenceForFunctionPrecisionAndMaker($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryReferenceForFunctionPrecisionAndMaker);
            $stm->bindParam(1, $array['FUNCTION_FUNCTION_ID'], PDO::PARAM_INT);
            $stm->bindParam(2, $array['FUNCTION_PRECISION'], PDO::PARAM_STR);
            $stm->bindParam(3, $array['maker_MAKER_ID'], PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryReferenceForFunctionPrecisionMakerAndSomeSelected($where, $id){
        try {
            $stm = parent::conexion()->prepare("SELECT * FROM reference 
                                                INNER JOIN function_has_reference ON reference.REFERENCE_ID = function_has_reference.REFERENCE_REFERENCE_ID 
                                                WHERE (".$where.") AND reference.maker_MAKER_ID = ".$id." GROUP BY reference.REFERENCE_ID");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /*
     *  Actualizacion para modulo de Administradores
     * @BrahianSánchez
     */

    public function queryReferenceForUpdate($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryReferenceForUpdate);
            $stm->bindParam(1, $array['slcValueForUpdate'], PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryMakerDiferentsTo($data){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryMakerDiferentsTo);
            $stm->bindParam(1, $data, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateReferenceWithoutImage($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::updateReferenceWithoutImage);
            $stm->bindParam(1, $array['REFERENCE_NAME'], PDO::PARAM_STR);
            $stm->bindParam(2, $array['REFERENCE_DESCRIPTION'], PDO::PARAM_STR);
            $stm->bindParam(3, $array['REFERENCE_FILE_URL'], PDO::PARAM_STR);
            $stm->bindParam(4, $array['REFERENCE_PURCHASE_URL'], PDO::PARAM_STR);
            $stm->bindParam(5, $array['REFERENCE_PRICE'], PDO::PARAM_INT);
            $stm->bindParam(6, $array['maker_MAKER_ID'], PDO::PARAM_INT);
            $stm->bindParam(7, $array['slcValueForUpdate'], PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateReferenceWithImage($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::updateReferenceWithImage);
            $stm->bindParam(1, $array['REFERENCE_NAME'], PDO::PARAM_STR);
            $stm->bindParam(2, $array['REFERENCE_DESCRIPTION'], PDO::PARAM_STR);
            $stm->bindParam(3, $array['REFERENCE_IMG'], PDO::PARAM_STR);
            $stm->bindParam(4, $array['REFERENCE_FILE_URL'], PDO::PARAM_STR);
            $stm->bindParam(5, $array['REFERENCE_PURCHASE_URL'], PDO::PARAM_STR);
            $stm->bindParam(6, $array['REFERENCE_PRICE'], PDO::PARAM_INT);
            $stm->bindParam(7, $array['maker_MAKER_ID'], PDO::PARAM_INT);
            $stm->bindParam(8, $array['slcValueForUpdate'], PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateMaker($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::updateMaker);
            $stm->bindParam(1, $array['inpNewMaker'], PDO::PARAM_STR);
            $stm->bindParam(2, $array['slcMaker'], PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function queryFunctionToUpdate($data){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::queryFunctionToUpdate);
            $stm->bindParam(1, $data, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function updateFunction($array){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::updateFunction);
            $stm->bindParam(1, $array['inpNewFunction'], PDO::PARAM_STR);
            $stm->bindParam(2, $array['slcNewFunction'], PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /*
     *  Eliminacion para modulo de administradores
     * @BrahianSánchez
     */

    public function deleteMaker($data){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::deleteMaker);
            $stm->bindParam(1, $data, PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteFunction($data){
        try {
            $stm = parent::conexion()->prepare(preparedSQL::deleteFunction);
            $stm->bindParam(1, $data, PDO::PARAM_INT);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}