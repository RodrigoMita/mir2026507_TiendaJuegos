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
        $query = "SELECT * FROM order_items WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if (isset($_POST['update'])) {
        $game_id = $_POST['game_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        $query = "UPDATE order_items SET game_id = '$game_id', quantity = '$quantity', price = '$price' WHERE id = $id";
        mysqli_query($conexion, $query);
        header("Location: crud_order_items.php?order_id={$_GET['order_id']}");
        exit;
    }
    ?>

    <form method="POST" action="">
        <h2>Editar Artículo en la Orden</h2>

        <label for="game_id">Juego:</label>
        <select id="game_id" name="game_id">
            <?php
            $games_query = "SELECT id, name FROM games";
            $games_result = mysqli_query($conexion, $games_query);
            while ($game = mysqli_fetch_assoc($games_result)) {
                $selected = ($game['id'] == $row['game_id']) ? 'selected' : '';
                echo "<option value='{$game['id']}' $selected>{$game['name']}</option>";
            }
            ?>
        </select><br>

        <label for="quantity">Cantidad:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required><br>

        <label for="price">Precio:</label>
        <input type="number" step="0.01" id="price" name="price" value="<?php echo $row['price']; ?>" required><br>

        <input type="submit" name="update" value="Actualizar" class="btn btn--2"/>
        <a href="crud_order_items.php?order_id=<?php echo $_GET['order_id']; ?>" class="btn btn-danger">Cancelar</a>
    </form>
</body>
</html>
