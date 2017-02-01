<?php
/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 01/02/2017
 * Time: 13:24
 */

class Empleado_model extends CI_Model {

    /**
     * getEmpleado
     *
     * Returns the Empleado with the packaged data passed as a parameter
     *
     * @param $empleado It must be packed like $empleado = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     * @return Array with the specific Empleado's beans
     */
    public function getEmpleado($empleado){
        /* TODO completete */
        $filter = '';
        $arrData = [];
        $keys = array_keys($empleado);
        $last_key = end($keys);
        foreach ($empleado as $k => $data) {
            $filter .= $k . '=?' . ($k==$last_key?'':' and ');
            array_push($arrData, $data);
        }

        $bean = R::find('empleado', $filter, $arrData);
        return $bean;
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
        R::store($bean);
        R::close();
    }


}