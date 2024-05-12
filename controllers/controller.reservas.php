<?php

    class ReservasController {

        private $reservaModel;

        public function __construct() {
            
            require_once 'c:/xampp/htdocs/SistemasReservasMesas/models/model.reservas.php';
            $this->reservaModel = new ReservasModel();
        }


        public function realizarReserva($codigoReserva,$nombreApellido,$email,$cantidadPersonas,$fechaReservada,$horarioReservado){
            $reserva=$this->reservaModel->realizarReserva($codigoReserva,$nombreApellido,$email,$cantidadPersonas,$fechaReservada,$horarioReservado);

            return($reserva!=false)
                ? header("Location: ../reserva.php")
                : "No se pudo realizar la reserva";
        }
    }

?>