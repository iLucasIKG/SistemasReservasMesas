<?php

require_once '../config.conection.php';
require_once '../models/model.mesa.php';

class MesasController {
    private $modelMesa;

    public function __construct() {
        
        $conexion = new Conexion();


        $this->modelMesa = new MesasModel($conexion);
    }


    public function realizarReserva($codigoReserva,$nombreApellido,$email,$cantidadAsientos,$fecha,$horario){
        $reserva=$this->modelMesa->realizarReserva($codigoReserva,$nombreApellido,$email,$cantidadAsientos,$fecha,$horario);
        return $reserva;
    }
}

?>