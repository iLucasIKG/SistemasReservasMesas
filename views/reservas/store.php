<?php
    require_once '../../controllers/controller.reservas.php';

    $obj = new ReservasController();
    $obj->realizarReserva($_POST['codigoReserva'],$_POST['nombreCompleto'],$_POST['email'],$_POST['cantidadPersonas'],$_POST['fechaReservada'],$_POST['horarioReservado']);

?>