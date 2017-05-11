<?php
/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:08
 */
class Cliente_model extends CI_Model {

    /**
     * getClientes
     *
     * Returns the Cliente with the packaged data passed as a parameter
     *
     * @param $cliente It must be packed like $cliente = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     * @return Array with the specific Cliente's beans
     */
    public function getClientes($cliente){
        $filter = '';
        $arrData = [];
        $keys = array_keys($cliente);
        $last_key = end($keys);
        foreach ($cliente as $k => $data) {
            $filter .= $k . '=?' . ($k==$last_key?'':' and ');
            array_push($arrData, $data);
        }

        $beans = R::find('cliente', $filter, $arrData);
        R::close();
        return $beans;
    }

    /**
     * saveCliente
     *
     * Saves the Cliente's bean with the packaged data passed as a parameter
     *
     * @param $cliente It must be packed like $cliente = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     */
    public function saveCliente($cliente){
        $bean = R::dispense('cliente');
        foreach ($cliente as $k => $data){
            $bean -> $k = $data;
        }
        $id = R::store($bean);
        R::close();
        return $id;
    }

    /**
     * getAllClientes
     *
     * Retrieve all Clientes
     *
     * @return Array with all Cliente's beans
     */
    public function getAllClientes(){
        $beans = R::findAll('cliente');
        R::close();
        return $beans;
    }

    public function getClienteById($id){
        $bean = R::load('cliente', $id);
        R::close();
        return $bean;
    }
}