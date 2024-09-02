<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://img.freepik.com/premium-photo/abstract-image-with-geometric-shapes-dark-bg-ai-generation_724548-22426.jpg'); 
            background-color: #000; /* Fondo negro para toda la página */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff; /* Texto blanco para contraste */
        }
        h2 {
            color: #ff0000; /* Título en rojo */
            text-align: center;
            margin-top: 20px;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.8); /* Fondo semi-transparente negro */
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
        }
        .form-label {
            color: #ff0000; /* Etiquetas en rojo */
        }
        .form-control {
            background-color: #333; /* Fondo oscuro para los campos de formulario */
            color: #fff; /* Texto blanco en los campos de formulario */
            border: 1px solid #ff0000; /* Borde rojo para los campos de formulario */
        }
        .form-control:focus {
            border-color: #ff0000; /* Borde rojo al enfocar los campos de formulario */
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25); /* Sombra de enfoque roja */
        }
        .btn-custom {
            background-color: #ff0000; /* Botones en rojo */
            border-color: #ff0000;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #cc0000; /* Rojo más oscuro al pasar el ratón */
            border-color: #cc0000;
        }
        .btn-danger {
            background-color: #dc3545; /* Rojo para el botón cancelar */
            border-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Rojo más oscuro al pasar el ratón */
            border-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
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
        <div class="form-container">
            <form method="POST" action="">
                <h2>Editar Juego</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Juego:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea id="description" name="description" class="form-control"><?php echo htmlspecialchars($row['description']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Precio:</label>
                    <input type="number" step="0.01" id="price" name="price" class="form-control" value="<?php echo htmlspecialchars($row['price']); ?>">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="<?php echo htmlspecialchars($row['stock']); ?>">
                </div>

                <button type="submit" name="update" class="btn btn-custom">Actualizar</button>
                <a href="crud_juegos.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
