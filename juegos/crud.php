
<html>
<head>
    <link rel="StyleSheet" href="es.css" type="text/css">
</head>
<body>
    
    <h2>Lista de Juegos</h2>
    <a href="crear.php" class="btn btn-primary">Agregar Nuevo Juego</a>
    <a href="/ordenes/crud_ordenes.php" class="btn btn-primary">Agregar Nueva orden</a>
    
    <table>
        <thead>
            <tr>
                <th>ID&nbsp;</th>
                <th>Nombre&nbsp;</th>
                <th>Descripción&nbsp;</th>
                <th>Precio&nbsp;</th>
                <th>Stock&nbsp;</th>
                <th>Acciones &nbsp;</th>
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
                    <td>{$row['price']}</td>
                    <td>{$row['stock']}</td>
                    <td>
                        <a href='editar.php?id={$row['id']}' class='btn btn-warning'>Editar</a>
                        <a href='eliminar.php?id={$row['id']}' class='btn btn-danger'>Eliminar</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
