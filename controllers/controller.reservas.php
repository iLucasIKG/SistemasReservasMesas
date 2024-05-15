<?php

    class ReservasController {

        private $reservaModel;

        public function __construct() {
            
            require_once 'c:/xampp/htdocs/SistemasReservasMesas/models/model.reservas.php';
            $this->reservaModel = new ReservasModel();
        }


        public function realizarReserva($nombreApellido,$email,$cantidadPersonas,$fechaReservada,$horarioReservado){
            $reserva=$this->reservaModel->realizarReserva($nombreApellido,$email,$cantidadPersonas,$fechaReservada,$horarioReservado);

            // return($reserva!=false)
            //     ? header("Location: ../reserva.php")
            //     : "No se pudo realizar la reserva";
            if($reserva != false){
                echo "
                    <script language='Javascript'>alert('Reserva realizada con exito :)');location.href = '../reserva.php';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo realizar la reserva :(');location.href = '../reserva.php';</script>`;";
            }
        }

        public function mostrarReservas(){

            $reservas=$this->reservaModel->mostrarReservas();

            return $reservas;
        }
    }

?>