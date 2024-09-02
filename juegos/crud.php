<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://c4.wallpaperflare.com/wallpaper/180/382/440/material-design-design-minimalist-minimal-wallpaper-thumb.jpg'); 
            background-color: #000; /* Fondo negro para toda la página */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff; /* Texto blanco para contraste */
        }
        h2 {
            color: #b0b0b0; /* Gris claro para el título */
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            text-shadow: 2px 2px 5px #000; /* Sombras para dar más impacto */
        }
        .btn-primary {
            background-color: #6c757d; /* Botones en gris plomo */
            border-color: #6c757d;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #5a6268; /* Gris oscuro al pasar el ratón */
            border-color: #545b62;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }
        .btn-warning:hover {
            background-color: #e0a800; /* Amarillo más oscuro al pasar el ratón */
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Rojo más oscuro al pasar el ratón */
            border-color: #bd2130;
        }
        .table th {
            background-color: #343a40; /* Encabezado en negro */
            color: #fff;
        }
        .table tbody tr {
            background-color: rgba(255, 255, 255, 0.1); /* Fondo transparente con tono gris oscuro */
        }
        .table tbody tr:hover {
            background-color: rgba(108, 117, 125, 0.3); /* Gris suave al pasar el ratón */
        }
        .table tbody td {
            color: #fff; /* Texto en blanco */
        }
        .table thead th {
            text-align: center;
        }
        .table tbody td {
            text-align: center;
        }
        .acciones {
            width: 160px;
        }
        /* Transparencia para la tabla */
        .table {
            background-color: rgba(0, 0, 0, 0.7); /* Fondo negro semi-transparente */
            border-radius: 10px; /* Bordes redondeados */
        }
        /* Sombra alrededor de la tabla */
        .table-responsive {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Sombra alrededor de la tabla */
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Juegos</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="crear.php" class="btn btn-primary">Agregar Nuevo Juego</a>
            <a href="/ordenes/crud_ordenes.php" class="btn btn-primary">Agregar Nueva Orden</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th class="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '_db.php';
                    $query = "SELECT * FROM games";
                    $result = mysqli_query($conexion, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['description']}</td>
                            <td>\${$row['price']}</td>
                            <td>{$row['stock']}</td>
                            <td>
                                <a href='editar.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='eliminar.php?id={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
