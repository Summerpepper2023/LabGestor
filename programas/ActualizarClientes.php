<?php 
include("../conexionDB.php");

// Se abstraen los datos actualizados del cliente
$idCliente = $_POST['id_cliente'];
$nombreCliente = $_POST['nombre_cliente'];
$direccionCliente = $_POST['direccion_cliente'];


// Se ejecuta la sentencia de actualizardo de cliente
$actualizacion = $conexion->prepare("UPDATE clientes SET nombre_cliente = ?, direccion_cliente = ? WHERE id_cliente = ?");
$actualizacion->bind_param("ssi", $nombreCliente, $direccionCliente, $idCliente);

// Se redirige a la pagina de consulta d clientes
if ($actualizacion->execute()) {
    echo "<script>
        alert('Se actualizó correctamente la información del cliente');
        location.href = '../templates/ConsultarClientes.php';
        </script>";
} else {
    echo "<script>
        alert('Error al actualizar la información del cliente');
        location.href = '../templates/ConsultarClientes.php';
        </script>";
}
// Cierra la declaración
$actualizacion->close();