<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Órdenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/db/0c/e4/db0ce461255cb21f91a2f70c139a38a5.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #e9ecef;
        }
        h2 {
            color: #f8f9fa;
            text-align: center;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Sombra de texto para el título */
        }
        .btn-primary {
            background-color: #343a40;
            border-color: #343a40;
            color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Sombra en los botones */
            transition: all 0.3s ease; /* Transición suave para el hover */
        }
        .btn-primary:hover {
            background-color: #495057;
            border-color: #495057;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada al pasar el ratón */
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Sombra en los botones */
            transition: all 0.3s ease; /* Transición suave para el hover */
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada al pasar el ratón */
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Sombra en los botones */
            transition: all 0.3s ease; /* Transición suave para el hover */
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada al pasar el ratón */
        }
        table {
            background-color: #343a40;
            color: #f8f9fa;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4); /* Sombra más marcada para la tabla */
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #495057;
        }
        th {
            background-color: #495057;
            color: #f8f9fa;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); /* Sombra de texto en las cabeceras */
        }
        tr:nth-child(even) {
            background-color: #495057;
        }
        tr:nth-child(odd) {
            background-color: #343a40;
        }
        tr:hover {
            background-color: #495057;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Órdenes</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="crear_orden.php" class="btn btn-primary">Agregar Nueva Orden</a>
            <!-- 
            <a href="crud_order_items.php" class="btn btn-primary">Generar Recibo</a>
            -->
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Cliente</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '_db.php';
                    
                    // Consultar las órdenes junto con el nombre del cliente
                    $query = "SELECT orders.id, users.username, orders.created_at 
                              FROM orders 
                              JOIN users ON orders.user_id = users.id";
                    
                    $result = mysqli_query($conexion, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['created_at']}</td>
                            <td>
                                <a href='editar_orden.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='eliminar_orden.php?id={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
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
