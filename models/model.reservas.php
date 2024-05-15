<?php

    class ReservasModel {

        private $pdo;

        public function __construct() {

            require_once 'c:/xampp/htdocs/SistemasReservasMesas/config.conection.php';
            $conexion = new Conexion();
            $this->pdo = $conexion->conectarDB();

        }

        public function realizarReserva($nombreApellido,$email,$cantidadAsientos,$fechaReservada,$horarioReservado) {

            $codigoReserva = self::generadorDeCodigos();

            //Guardo mi consulta SQL
            $sql = "INSERT INTO reservas(codigo_reserva,nombre_apellido, email, cantidad_asientos,fecha, horario) VALUES (:codigoReserva,:nombreApellido,:email,:cantidadAsientos, :fechaReservada, :horarioReservado)";
        
            //Preparo la sentencia SQL
            $statement = $this->pdo->prepare($sql);
        
            //Remplazo los parámetros de la consulta
            $statement->bindParam(':codigoReserva', $codigoReserva);
            $statement->bindParam(':nombreApellido', $nombreApellido);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':cantidadAsientos', $cantidadAsientos);
            $statement->bindParam(':fechaReservada', $fechaReservada);
            $statement->bindParam(':horarioReservado', $horarioReservado);

        
            return ($statement->execute()) 
                ? true
                : false;
        
        }
        
        public function mostrarReservas() {
            $personas=array();

            $conexion = new Conexion();
            $pdo = $conexion->conectarDB();
        
            //Consulta SQL para obtener todas las personas
            $sql = "SELECT * FROM reservas";
        
            //Preparo la sentencia SQL
            $statement = $pdo->prepare($sql);
        
            //Ejecuto la consulta
            if ($statement->execute()) {
                while($resultado=$statement->fetch(PDO::FETCH_ASSOC)){
                    $personas[] = $resultado;
                }
                return $personas;
            } else {
                // La consulta falló
                return false;
            }
        }

        public function actualizarMesa($nombreApellido,$email,$cantidadAsientos,$mesasID) {
            $conexion = new Conexion();
            $pdo = $conexion->conectarDB();

            //Guardo mi consulta SQL
            $sql = "UPDATE mesas SET nombre_apellido=:nombreApellido,email=:email,cantidad_asientos=:cantidadAsientos WHERE  numero_mesa=:mesasID";

            //Preparo la sentencia SQL
            $statement = $pdo->prepare($sql);

            //Remplazo los parámetros de la consulta
            $statement->bindParam(':nombreApellido', $nombreApellido);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':cantidadAsientos',$cantidadAsientos);
            $statement->bindParam(':mesasID', $mesasID);

                //Ejecuto la consulta
                if ($statement->execute()) {
                    return true;
                } else {
                    // La inserción falló
                    return false;
                }
                
        }

        public function eliminarMesa($mesasID) {
            $conexion = new Conexion();
            $pdo = $conexion->conectarDB();

            $sql = "DELETE FROM mesas WHERE numero_mesa=:mesasID";
                
            // preparo el sql para posteriormente ejecutarlo
            $statement = $pdo->prepare($sql);
                
            $statement->bindParam(':mesasID', $mesasID);
                
                
            if(!$statement){
                echo "Error al Eliminar el registro";
            }else{
                $statement->execute();
            }
            
            
        }

        public static function generadorDeCodigos(){
            // Caracteres que se pueden usar en el código
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            //Obtiene la longitud de valores que contiene la cadena
            $longitudCadena = strlen($caracteres); 

            $codigo = '';

            for($i = 0; $i < 8; $i++){
                // Obtiene un carácter aleatorio del conjunto de caracteres
                $caracter_aleatorio = $caracteres[rand(0, $longitudCadena - 1)];
                    
                // Agregar el carácter aleatorio a la variable código
                $codigo .= $caracter_aleatorio;
            }

            return $codigo;
        }
    }
?>
