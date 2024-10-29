<?php
include "../conexionDB.php";
$query = 'select * from productos';
$resultado_p = mysqli_query($conexion, $query) 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>Vista Productos</title>
</head>

<body>
    <section id="vista_producto"></section>
    <div>
        <div class="container">

            <h1>Vista Producto</h1>
            <h2>

                <br> Nombre producto
            </h2>
            <div class="row p-5 info-producto">
                <article class="mod-table">
                    <table class="table table-striped table-bordered caption-top">
                        <caption>Informacion del Producto</caption>
                        <thead>
                            <tr>
                                <th scope="col" class="col-lg-4"></th>
                                <th scope="col" class="col-lg-8">Informacion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php
                                while ($fila = mysqli_fetch_assoc($resultado_p)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Fecha de Fabricacion</th>";
                                    echo "<td>" . $fila['fecha_fabricacion'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Fecha de Vencimiento</th>";
                                    echo "<td>" . $fila['fecha_vencimiento'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Descripcion Producto</th>";
                                    echo "<td>" . $fila['descripcion_producto'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Activo Producto</th>";
                                    echo "<td>" . $fila['activo_producto'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Presentacion Producto</th>";
                                    echo "<td>" . $fila['presentacion_producto'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Cantidad Producto</th>";
                                    echo "<td>" . $fila['cantidad_producto'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Numero Lote Producto</th>";
                                    echo "<td>" . $fila['numero_lote_producto'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Tamaño Lote Producto</th>";
                                    echo "<td>" . $fila['tamano_lote_producto'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Id Cliente</th>";
                                    echo "<td>" . $fila['id_cliente'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Id Fabricante</th>";
                                    echo "<td>" . $fila['id_fabricante'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Id modulo</th>";
                                    echo "<td>" . $fila['id_fabricante'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>

                            </tr>


                        </tbody>
                </article id ="targetas" >
                    <div class="row "> 
                        <div class=" col-lg-4 card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="t_targeta">Registo Pruebas de Recuento</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                            </div>

                            <div class="card col-lg-4" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="t_targeta">Controles Negativos de Medios</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                                </div>


                                <div class="card col-lg-4" style="width: 18rem;">
                                <div class="card-body ">
                                    <h5 class="t_targeta">Deteccion de Microorganismos Especificos</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                                </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <!-- CREATE TABLE `productos` (
  `numero_registro_producto` varchar(30) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `fecha_fabricacion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `descripcion_producto` text NOT NULL,
  `activo_producto` varchar(50) NOT NULL,
  `presentacion_producto` varchar(30) NOT NULL,
  `cantidad_producto` varchar(15) NOT NULL,
  `numero_lote_producto` varchar(30) NOT NULL,
  `tamano_lote_producto` varchar(30) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_fabricante` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL DEFAULT 1 -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>