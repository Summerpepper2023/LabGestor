<?php 
require_once("../conexionDB.php");

// Se abstraen los datos actualizados del cliente
$idCliente = $_POST['id_cliente'];
$nombreCliente = $_POST['nombre_cliente'];
$direccionCliente = $_POST['direccion_cliente'];


// Se ejecuta la sentencia de actualizardo de cliente
$sql = "UPDATE clientes SET nombre_cliente= '$nombreCliente', direccion_cliente= '$direccionCliente' WHERE id_cliente= '$idCliente'";
$result = mysqli_query($conexion, $sql);

// Se redirige a la pagina de consulta d clientes
echo "<script>
alert('Se actualizo correctamente la informacion del cliente');
location.href = '../templates/ConsultarClientes.php';
</script>";

mysqli_close($conexion);