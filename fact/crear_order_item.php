<html>
<head>
    <link rel="StyleSheet" href="es.css" type="text/css">
    <link rel="StyleSheet" href="form.css" type="text/css">
</head>
<body>
    <?php
    require '_db.php';

    // Verificar si se ha pasado el order_id correctamente en la URL
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
    } else {
        die("Error: order_id no definido.");
    }

    // Procesar el formulario si se ha enviado
    if (isset($_POST['submit'])) {
        $game_id = $_POST['game_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        // Insertar el artículo en la tabla order_items
        $query = "INSERT INTO order_items (order_id, game_id, quantity, price) 
                  VALUES ('$order_id', '$game_id', '$quantity', '$price')";
        $result = mysqli_query($conexion, $query);

        if ($result) {
            // Redirigir a la página de artículos de la orden con éxito
            header("Location: crud_order_items.php?order_id=$order_id");
            exit;
        } else {
            echo "<script>alert('Error al agregar el artículo');</script>";
        }
    }
    ?>
<a href="crud_ordenes" class="btn btn-danger">Salir</a>

    <form method="POST" action="">
        <h2>Agregar Artículo a la Orden #<?php echo $order_id; ?></h2>

        <label for="game_id">Juego:</label>
        <select id="game_id" name="game_id" required>
            <option value="">Selecciona un juego</option>
            <?php
            // Obtener los juegos disponibles
            $games_query = "SELECT id, name FROM games";
            $games_result = mysqli_query($conexion, $games_query);
            while ($game = mysqli_fetch_assoc($games_result)) {
                echo "<option value='{$game['id']}'>{$game['name']}</option>";
            }
            ?>
        </select><br>

        <label for="quantity">Cantidad:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br>

        <label for="price">Precio:</label>
        <input type="number" step="0.01" id="price" name="price" min="0" required><br>

        <input type="submit" name="submit" value="Agregar" class="btn btn--2"/>
        <a href="crud_order_items.php?order_id=<?php echo $order_id; ?>" class="btn btn-danger">Cancelar</a>
    </form>
</body>
</html>
