<?php
include '../conexionDB.php';
// Se toma el id del fabricante enviado 
$id_fabricante = $_POST['id_fabricante'];

// Eliminar fabricante de la base de datos
$sql = "DELETE FROM fabricantes WHERE id_fabricante = '$id_fabricante'";
$result = mysqli_query($conexion, $sql);

// Se redirige a la pagina de consulta de fabricantes
echo "<script>
    alert('Se elimino el usuario de manera exitosa.');
    location.href = '../templates/Consultarfabricantes.php';
    </script>";


mysqli_close($conexion);



