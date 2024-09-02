<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://wallpapers.com/images/hd/arrow-2880-x-1800-background-v0h3qux477cg0eaw.jpg'); /* Fondo temático en rojo y negro */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: #f8f9fa; /* Fondo claro para el cuerpo */
        }
        .container {
            max-width: 600px;
            margin-top: 20px;
        }
        .btn-danger {
            background-color: #dc3545; /* Rojo para el botón cancelar */
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Rojo más oscuro al pasar el ratón */
            border-color: #c82333;
        }
        .btn-primary {
            background-color: #007bff; /* Azul para el botón actualizar */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Azul más oscuro al pasar el ratón */
            border-color: #004085;
        }
        h2 {
            color: #343a40; /* Título en gris oscuro */
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
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

            <div class="mb-3">
                <label for="user_id" class="form-label">Nombre del Cliente:</label>
                <select id="user_id" name="user_id" class="form-select">
                    <?php
                    // Obtenemos todos los usuarios de la base de datos
                    $users_query = "SELECT id, username FROM users";
                    $users_result = mysqli_query($conexion, $users_query);
                    while ($user = mysqli_fetch_assoc($users_result)) {
                        $selected = ($user['id'] == $row['user_id']) ? 'selected' : '';
                        echo "<option value='{$user['id']}' $selected>{$user['username']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" name="update" class="btn btn-primary">Actualizar</button>
                <a href="crud_ordenes.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
