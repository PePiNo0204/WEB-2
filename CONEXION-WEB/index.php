<?php
require 'conexion.php';

$objConexion = new conexion();
$con = $objConexion->getConexion();

$sql = "SELECT * FROM persona";
$resultado = $con->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "Nombre Completo: " . $fila['nombre'] . " " . $fila['apellido'] . "<br>";
        echo "DNI: " . $fila['dni'] . "<br>";
        echo "Teléfono: " . $fila['telefono'] . "<br>";
        echo "Correo: " . $fila['correo'] . "<br>";
        echo "Estado: " . $fila['estado'] . "<br>";
        echo "Fecha creación: " . $fila['fechacreado'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "0 resultados<br>";
}

$sql_insert = "INSERT INTO persona (nombre, apellido, dni, telefono, correo, estado) 
               VALUES ('Fatima', 'Velez', '44775566', '978436189', 'fvelez@gmail.com', 'Activo')";

if ($con->query($sql_insert) === TRUE) {
    $ultimo_id = $con->insert_id;
    echo "Registrado exitosamente. ID nuevo = " . $ultimo_id . "<br>";
} else {
    echo "No se registró: " . $con->error . "<br>";
}

$dni_a_eliminar = '44775566';

$sql_delete = "DELETE FROM persona WHERE dni = '$dni_a_eliminar'";

if ($con->query($sql_delete) === TRUE) {
    echo "Registro con DNI $dni_a_eliminar eliminado correctamente.<br>";
} else {
    echo "Error al eliminar registro: " . $con->error . "<br>";
}

$sql_where = "SELECT * FROM persona WHERE estado = 'Activo'";
$resultado_activas = $con->query($sql_where);

if ($resultado_activas && $resultado_activas->num_rows > 0) {
    echo "<h3>Personas activas:</h3>";
    while ($fila = $resultado_activas->fetch_assoc()) {
        echo "Nombre Completo: " . $fila['nombre'] . " " . $fila['apellido'] . "<br>";
        echo "DNI: " . $fila['dni'] . "<br>";
    }
} else {
    echo "No hay personas activas.<br>";
}
?>
