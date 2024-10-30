<?php include '../conexionDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Cliente</title>
</head>
<body>
<h2>Añadir Cliente</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre_cliente" required><br>
        <label>Dirección:</label>
        <input type="text" name="direccion_cliente" required><br>
        <button type="submit" name="submit">Guardar</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $Nombre = $_POST['nombre_cliente'];
        $Direccion = $_POST['direccion_cliente'];

        $sql = "INSERT INTO clientes ( nombre_cliente, direccion_cliente ) VALUES ('$Nombre', '$Direccion')";
        if ($conexion->query($sql) === TRUE) {
            echo "<script>
                alert('Se ingreso el cliente de manera exitosa.');
                location.href = 'ConsultarClientes.php';
                </script>";
        } else {
            echo "Error: " . $conexion->error;
        }
    }
    ?>
</body>
</html>
