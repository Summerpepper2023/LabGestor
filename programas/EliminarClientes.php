<?php
include '../conexionDB.php';
// Se toma el id del cliente enviado 
$id_cliente = $_POST['id_cliente'];

// Eliminar cliente de la base de datos
$sql = "DELETE FROM clientes WHERE id_cliente = '$id_cliente'";
$result = mysqli_query($conexion, $sql);

// Se redirige a la pagina de consulta de clientes
echo "<script>
    alert('Se elimino el usuario de manera exitosa.');
    location.href = '../templates/ConsultarClientes.php';
    </script>";


mysqli_close($conexion);



