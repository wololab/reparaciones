<?php
class Reparacion_model extends CI_Model
{

    /**
     * getReparacions
     *
     * Returns the Reparacion with the packaged data passed as a parameter
     *
     * @param $reparacion It must be packed like $reparacion = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     * @return Array with the specific Reparacion's beans
     */
    public function getReparacions($reparacion)
    {
        /* TODO complete */
        $filter = '';
        $arrData = [];
        $keys = array_keys($reparacion);
        $last_key = end($keys);
        foreach ($reparacion as $k => $data) {
            $filter .= $k . '=?' . ($k == $last_key ? '' : ' and ');
            array_push($arrData, $data);
        }

        $beans = R::find('reparacion', $filter, $arrData);
        R::close();
        return $beans;
    }

    /**
     * saveReparacion
     *
     * Saves the Reparacion's bean with the packaged data passed as a parameter
     *
     * @param $reparacion It must be packed like $reparacion = ['nameOfBBDDField' => 'data'] example $person = ['name' => 'john', 'age' => 16]
     */
    public function saveReparacion($reparacion)
    {
        /* TODO complete */
        $bean = R::dispense('reparacion');
        foreach ($reparacion as $k => $data) {
            $bean->$k = $data;
        }
        $id = R::store($bean);
        R::close();
        return $id;
    }

    public function asociaImagen($id, $imagen){
        $reparacion = $this->getReparacionById($id);
        $reparacion->xownImagenReparacionList[] = $imagen;
        R::store($reparacion);
        R::close();
    }

    /**
     * getAllReparacions
     *
     * Retrieve all Reparacions
     *
     * @return Array with all Reparacion's beans
     */
    public function getAllReparacions()
    {
        $beans = R::findAll('reparacion');
        R::close();
        return $beans;
    }

    public function getReparacionById($id){
        $bean = R::load('reparacion', $id);
        R::close();
        return $bean;
    }

    public function facturar($id){
        $bean = R::load('reparacion', $id);
        $bean -> facturada = true;
        R::store($bean);
        R::close();
    }

    public function desfacturar($id){
        $bean = R::load('reparacion', $id);
        $bean -> facturada = false;
        R::store($bean);
        R::close();
    }
}
