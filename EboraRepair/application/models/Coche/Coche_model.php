<?php
/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:08
 */
class Coche_model extends CI_Model {

    /**
     * getCoches
     *
     * Returns the Coche with the packaged data passed as a parameter
     *
     * @param $coche It must be packed like $coche = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     * @return Array with the specific Coche's beans
     */
    public function getCoches($coche){
        $filter = '';
        $arrData = [];
        $keys = array_keys($coche);
        $last_key = end($keys);
        foreach ($coche as $k => $data) {
            $filter .= $k . '=?' . ($k==$last_key?'':' and ');
            array_push($arrData, $data);
        }

        $beans = R::find('coche', $filter, $arrData);
        R::close();
        return $beans;
    }

    /**
     * saveCoche
     *
     * Saves the Coche's bean with the packaged data passed as a parameter
     *
     * @param $coche It must be packed like $coche = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     */
    public function saveCoche($coche){
        $bean = R::dispense('coche');
        foreach ($coche as $k => $data){
            $bean -> $k = $data;
        }
        $id = R::store($bean);
        R::close();
        return $id;
    }

    /**
     * getAllCoches
     *
     * Retrieve all Coches
     *
     * @return Array with all Coche's beans
     */
    public function getAllCoches(){
        $beans = R::findAll('coche');
        R::close();
        return $beans;
    }

    public function getCocheById($id){
        $bean = R::load('coche', $id);
        R::close();
        return $bean;
    }
}