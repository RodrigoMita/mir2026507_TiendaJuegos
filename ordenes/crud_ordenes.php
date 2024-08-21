<html>
<head>
    <link rel="StyleSheet" href="es.css" type="text/css">
</head>
<body>
    <h2>Lista de Órdenes</h2>
    <form method="POST" action="crear_orden.php">

    <a href="crud.php" class="btn btn-primary">Agregar Nueva Orden</a>
    <!--
    <a href="crud_order_items.php" class="btn btn-primary">Generar Recivo</a>
    -->
    
    <table>
        <thead>
            <tr>
                <th>ID&nbsp;</th>
                <th>Nombre del Cliente &nbsp;</th> 
                
                <th>Fecha&nbsp;</th>
                <th>Acciones&nbsp;</th>
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
                        <a href='editar_orden.php?id={$row['id']}' class='btn btn-warning'>Editar</a>
                        <a href='eliminar_orden.php?id={$row['id']}' class='btn btn-danger'>Eliminar</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
