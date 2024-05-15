<?php

require 'conexion.php';

//Procesar los datos del formulario

if($_SERVER["REQUEST_METHOD"] = "POST") {

    $nombres = $_POST["nombres"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["rol"];
    $fecha = $_POST["fecha"];

}

$sql = "INSERT INTO usuarios2 (nombres, cedula, correo, telefono, rol, fecha_registro ) VALUES('$nombres','$cedula','$correo','$telefono','$rol', '$fecha')";

if(mysqli_query($conexion,$sql)) {
    echo "Usuario creado";
}
else {
    echo "Error". mysqli_connect_error();
}


mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilos.css">
    <title>Eliminar Usuario</title>
</head>
<body>
<div class="div-usuario">
    <div class="col-9 p-4">
    <h2>Eliminar Persona</h2>
    <p>Selecciona el usuario que deseas eliminar:</p>
    <ul>
        <li><a href="delete.php?id=<?=$cedula->cedula">Usuario</a></li>
        <li><a href="html/formulario.html" target="_self">Inicio</a></li>
    </ul>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

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
        echo "El usuario se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>