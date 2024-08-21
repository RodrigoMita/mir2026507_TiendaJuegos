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
        
        // Seleccionamos la orden específica junto con el nombre del usuario
        $query = "SELECT orders.*, users.username FROM orders 
                  JOIN users ON orders.user_id = users.id 
                  WHERE orders.id = $id";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if (isset($_POST['update'])) {
        $user_id = $_POST['user_id'];

        $query = "UPDATE orders SET user_id = '$user_id' WHERE id = $id";
        mysqli_query($conexion, $query);

        header('Location: crud_ordenes.php');
        exit;
    }
    ?>

    <form method="POST" action="">
        <h2>Editar Orden</h2>

        <!-- Campo para seleccionar el nombre del cliente -->
        <label for="user_id">Nombre del Cliente:</label>
        <select id="user_id" name="user_id">
            <?php
            // Obtenemos todos los usuarios de la base de datos
            $users_query = "SELECT id, username FROM users";
            $users_result = mysqli_query($conexion, $users_query);
            while ($user = mysqli_fetch_assoc($users_result)) {
                $selected = ($user['id'] == $row['user_id']) ? 'selected' : '';
                echo "<option value='{$user['id']}' $selected>{$user['username']}</option>";
            }
            ?>
        </select><br>

        <!-- Campo para editar el total -->

        <input type="submit" name="update" value="Actualizar" class="btn btn--2"/>
        <a href="crud_ordenes.php" class="btn btn-danger">Cancelar</a>
    </form>
</body>
</html>
