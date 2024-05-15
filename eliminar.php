<?php

include 'conexion.php';

if(isset($_GET['id'])) {
    $cedula = $_GET['id'];

    $conexion = mysqli_connect($servername,$username,$password,$database);

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
   

    $consulta = "DELETE FROM usuarios2 WHERE cedula = $cedula";
    
    // Ejecutar la consulta
    if (mysqli_query($conexion, $consulta)) {
        echo "El empleado se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar el empleado: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>