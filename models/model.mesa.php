<?php

class MesasModel {
    private $mesasID;
    private $nombreApellido;
    private $email;
    private $cantidadAsientos;

    public function __construct($mesasID, $nombreApellido,$email,$cantidadAsientos) {
        $this->nombreApellido = $nombreApellido;
        $this->email = $email;
        $this->cantidadAsientos = $cantidadAsientos;
        $this->mesasID = $mesasID;
    }

    public function crearMesa($nombreApellido,$email,$cantidadAsientos) {
        $conexion = new Conexion();
        $pdo = $conexion->conectarDB();
    

        //Guardo mi consulta SQL
        $sql = "INSERT INTO mesas(nombre_apellido, email, cantidad_asientos) VALUES (:nombreApellido,:email,:cantidadAsientos)";
    
        //Preparo la sentencia SQL
        $statement = $pdo->prepare($sql);
    
        //Remplazo los parámetros de la consulta
        $statement->bindParam(':nombreApellido', $nombreApellido);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':cantidadAsientos', $cantidadAsientos);
    
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
      
        if (!$statement) {
            // no se encontraron medicos
        } else {
            $ultimoID = $pdo->lastInsertId();
        }
        return $ultimoID;
    }
    
    public function mostrarMesas() {
        $personas=array();

        $conexion = new Conexion();
        $pdo = $conexion->conectarDB();
    
        //Consulta SQL para obtener todas las personas
        $sql = "SELECT * FROM mesas";
    
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
}
?>
