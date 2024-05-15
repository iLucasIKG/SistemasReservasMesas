<?php 
    include 'layouts/header.php';
?>

    <div class="container vh-100 d-flex justify-content-center align-items-center h-100">
        <form method="POST" action="reservas/store.php" class="bg-white p-3 rounded-2" style="width: 18rem;">
            <div class="mb-3">
                <label for="" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cantidad personas</label>
                <input type="number" class="form-control" id="cantidadPersonas" name="cantidadPersonas">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fechaReservada" name="fechaReservada">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Horario</label>
                <input type="time" class="form-control" id="horarioReservado" name="horarioReservado">
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>
    
<!-- <?php 
    include 'layouts/footer.php';
?> -->