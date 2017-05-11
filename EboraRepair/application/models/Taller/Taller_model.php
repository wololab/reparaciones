<?php
/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:04
 */
class Taller_model extends CI_Model {

    /**
     * getTallers
     *
     * Returns the Taller with the packaged data passed as a parameter
     *
     * @param $taller It must be packed like $taller = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     * @return Array with the specific Taller's beans
     */
    public function getTallers($taller){
        $filter = '';
        $arrData = [];
        $keys = array_keys($taller);
        $last_key = end($keys);
        foreach ($taller as $k => $data) {
            $filter .= $k . '=?' . ($k==$last_key?'':' and ');
            array_push($arrData, $data);
        }

        $beans = R::find('taller', $filter, $arrData);
        R::close();
        return $beans;
    }

    /**
     * saveTaller
     *
     * Saves the Taller's bean with the packaged data passed as a parameter
     *
     * @param $taller It must be packed like $taller = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     */
    public function saveTaller($taller){
        $bean = R::dispense('taller');
        foreach ($taller as $k => $data){
            $bean -> $k = $data;
        }
        $id = R::store($bean);
        R::close();
        return $id;
    }

    /**
     * getAllTallers
     *
     * Retrieve all Tallers
     *
     * @return Array with all Taller's beans
     */
    public function getAllTallers(){
        $beans = R::findAll('taller');
        R::close();
        return $beans;
    }

    public function getTallerById($id){
        $bean = R::load('taller', $id);
        R::close();
        return $bean;
    }
}