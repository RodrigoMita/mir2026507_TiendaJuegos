<html>
<head>
    <link rel="StyleSheet" href="es.css" type="text/css">
    <link rel="StyleSheet" href="form.css" type="text/css">
</head>
<body>
    <?php
    require '_db.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM games WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $query = "UPDATE games SET name = '$name', description = '$description', price = '$price', stock = '$stock' WHERE id = $id";
        mysqli_query($conexion, $query);
        header('Location: crud.php');
    }
    ?>
    <form method="POST" action="">
        <h2>Editar Juego</h2>
        <label for="name">Nombre del Juego:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br>

        <label for="price">Precio:</label>
        <input type="number" step="0.01" id="price" name="price" value="<?php echo $row['price']; ?>"><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?php echo $row['stock']; ?>"><br>

        <input type="submit" name="update" value="Actualizar" class="btn btn--2"/>
        <a href="crud_juegos.php" class="btn btn-danger">Cancelar</a>
    </form>
</body>
</html>
