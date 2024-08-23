<?php
require '_db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM games WHERE id = $id";
    mysqli_query($conexion, $query);
    header('Location: crud.php');
}
?>
