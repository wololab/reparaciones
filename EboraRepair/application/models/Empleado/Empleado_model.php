<?php

/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 01/02/2017
 * Time: 13:24
 */
class Empleado_model extends CI_Model {

    /**
     * getEmpleados
     *
     * Returns the Empleado with the packaged data passed as a parameter
     *
     * @param $empleado It must be packed like $empleado = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     * @return Array with the specific Empleado's beans
     */
    public function getEmpleados($empleado){
        /* TODO complete */
        $filter = '';
        $arrData = [];
        $keys = array_keys($empleado);
        $last_key = end($keys);
        foreach ($empleado as $k => $data) {
            $filter .= $k . '=?' . ($k==$last_key?'':' and ');
            array_push($arrData, $data);
        }

        $beans = R::find('empleado', $filter, $arrData);
        R::close();
        return $beans;
    }

    /**
     * saveEmpleado
     *
     * Saves the Empleado's bean with the packaged data passed as a parameter
     *
     * @param $empleado It must be packed like $empleado = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     */
    public function saveEmpleado($empleado){
        /* TODO complete */
        $bean = R::dispense('empleado');
        foreach ($empleado as $k => $data){
            $bean -> $k = $data;
        }
        $id = R::store($bean);
        R::close();
        return $id;
    }

    /**
     * getAllEmpleados
     *
     * Retrieve all Empleados
     *
     * @return Array with all Empleado's beans
     */
    public function getAllEmpleados(){
        $beans = R::findAll('empleado');
        R::close();
        return $beans;
    }

    public function getEmpleadoById($id){
        $bean = R::load('empleado', $id);
        R::close();
        return $bean;
    }
}