<?php 
include("../conexionDB.php");

// Se abstraen los datos actualizados del cliente
$idFabricante = $_POST['id_fabricante'];
$nombreFabricante = $_POST['nombre_fabricante'];
$direccionFabricante = $_POST['direccion_fabricante'];


// Se ejecuta la sentencia de actualizardo de fabricante
$actualizacion = $conexion->prepare("UPDATE fabricantes SET nombre_fabricante = ?, direccion_fabricante = ? WHERE id_fabricante = ?");
$actualizacion->bind_param("ssi", $nombreFabricante, $direccionFabricante, $idFabricante);

// Se redirige a la pagina de consulta d fabricantes
if ($actualizacion->execute()) {
    echo "<script>
        alert('Se actualizó correctamente la información del fabricante');
        location.href = '../templates/Consultarfabricantes.php';
        </script>";
} else {
    echo "<script>
        alert('Error al actualizar la información del fabricante');
        location.href = '../templates/Consultarfabricantes.php';
        </script>";
}
// Cierra la declaración
$actualizacion->close();