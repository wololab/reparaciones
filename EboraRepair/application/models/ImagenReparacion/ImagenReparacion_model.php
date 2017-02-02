<?php
/**
 * Created by IntelliJ IDEA.
 * User: Hector
 * Date: 02/02/2017
 * Time: 17:09
 */
class ImagenReparacion_model extends CI_Model {

    /**
     * getImagenReparacions
     *
     * Returns the ImagenReparacion with the packaged data passed as a parameter
     *
     * @param $imagenReparacion It must be packed like $imagenReparacion = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     * @return Array with the specific ImagenReparacion's beans
     */
    public function getImagenReparacions($imagenReparacion){
        /* TODO complete */
        $filter = '';
        $arrData = [];
        $keys = array_keys($imagenReparacion);
        $last_key = end($keys);
        foreach ($imagenReparacion as $k => $data) {
            $filter .= $k . '=?' . ($k==$last_key?'':' and ');
            array_push($arrData, $data);
        }

        $beans = R::find('imagenreparacion', $filter, $arrData);
        R::close();
        return $beans;
    }

    /**
     * saveImagenReparacion
     *
     * Saves the ImagenReparacion's bean with the packaged data passed as a parameter
     *
     * @param $imagenReparacion It must be packed like $imagenReparacion = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     */
    public function saveImagenReparacion($imagenReparacion){
        /* TODO complete */
        $bean = R::dispense('imagenreparacion');
        foreach ($imagenReparacion as $k => $data){
            $bean -> $k = $data;
        }
        $id = R::store($bean);
        R::close();
        return $id;
    }

    /**
     * getAllImagenReparacions
     *
     * Retrieve all ImagenReparacions
     *
     * @return Array with all ImagenReparacion's beans
     */
    public function getAllImagenReparacions(){
        $beans = R::findAll('imagenreparacion');
        R::close();
        return $beans;
    }

    public function getImagenReparacionById($id){
        $bean = R::load('imagenreparacion', $id);
        R::close();
        return $bean;
    }
}