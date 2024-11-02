<?php include '../conexionDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Fabricante</title>
</head>
<body>
<h2>Añadir Fabricante</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre_fabricante" required><br>
        <label>Dirección:</label>
        <input type="text" name="direccion_fabricante" required><br>
        <button type="submit" name="submit">Guardar</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $Nombre = $_POST['nombre_fabricante'];
        $Direccion = $_POST['direccion_fabricante'];

        $sql = "INSERT INTO fabricantes ( nombre_fabricante, direccion_fabricante ) VALUES ('$Nombre', '$Direccion')";
        if ($conexion->query($sql) === TRUE) {
            echo "<script>
                alert('Se ingreso el fabricante de manera exitosa.');
                location.href = 'ConsultarFabricantes.php';
                </script>";
        } else {
            echo "Error: " . $conexion->error;
        }
    }
    ?>
</body>
</html>
