<?php

require_once '../config.conection.php';
require_once '../models/model.mesa.php';

class MesasController {
    private $modelMesa;

    public function __construct() {
        
        $conexion = new Conexion();


        $this->modelMesa = new MesasModel($conexion);
    }


    public function crearMesa($nombreApellido,$email,$cantidadAsientos){
        $reserva=$this->modelMesa->crearMesa($nombreApellido,$email,$cantidadAsientos);
        return $reserva;
    }
}

?>