<?php
require '_db.php';

// Verificar si el order_id fue pasado correctamente en la URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
} else {
    die("Error: order_id no definido.");

}

// Mostrar los artículos relacionados con la orden
$query = "SELECT order_items.*, games.name FROM order_items 
          JOIN games ON order_items.game_id = games.id 
          WHERE order_items.order_id = $order_id";

$result = mysqli_query($conexion, $query);

// Aquí puedes renderizar la tabla con los artículos
?>

<html>
<head>
    <link rel="StyleSheet" href="es.css" type="text/css">
</head>
<body>
    <h2>Artículos de la Orden #<?php echo $order_id; ?></h2>
    <a href="crear_order_item.php?order_id=<?php echo $order_id; ?>" class="btn btn-primary">Agregar Nuevo Artículo</a>
    
    <table>
        <thead>
            <tr>
                <th>ID&nbsp;&nbsp;&nbsp;</th>
                <th>Juego</th>
                <th>Cantidad&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>Precio&nbsp;</th>
                <th>Total&nbsp;</th>
                <th>Acciones &nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $total = $row['quantity'] * $row['price'];
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}&nbsp;&nbsp;&nbsp;</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['price']}</td>
                    <td>$total</td>
                    <td>
                        <a href='editar_orden.php?id={$row['id']}&order_id=$order_id' class='btn btn-warning'>Editar</a>
                        <a href='eliminar_articulo.php?id={$row['id']}&order_id=$order_id' class='btn btn-danger'>Eliminar</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
