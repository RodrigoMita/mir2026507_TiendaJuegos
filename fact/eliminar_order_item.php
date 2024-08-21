<?php
require '_db.php';

if (isset($_GET['id']) && isset($_GET['order_id'])) {
    $id = $_GET['id'];
    $order_id = $_GET['order_id'];

    $query = "DELETE FROM order_items WHERE id = $id";
    mysqli_query($conexion, $query);

    header("Location: crud_order_items.php?order_id=$order_id");
    exit;
}
?>
