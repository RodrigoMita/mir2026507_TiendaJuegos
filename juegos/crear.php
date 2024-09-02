<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://img.freepik.com/premium-photo/abstract-background-gradient-gray-color-geometric_1015293-10594.jpg'); 
            background-color: #000; /* Fondo negro para toda la páginahttps */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }
        h2 {
            color: #28a745;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            color: #333;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn {
            width: 100px;
        }
    </style>
    <script>
        window.onload = function() {
            document.querySelector('form').addEventListener('submit', function(event) {
                var name = document.getElementById('name').value;
                var description = document.getElementById('description').value;
                var price = document.getElementById('price').value;
                var stock = document.getElementById('stock').value;

                if (name === '') {
                    alert('Llena el espacio vacío de nombre del juego');
                    event.preventDefault();
                }
                if (description === '') {
                    alert('Llena el espacio vacío de descripción');
                    event.preventDefault();
                }
                if (price === '' || isNaN(price) || price <= 0) {
                    alert('Introduce un precio válido');
                    event.preventDefault();
                }
                if (stock === '' || isNaN(stock) || stock < 0) {
                    alert('Introduce una cantidad de stock válida');
                    event.preventDefault();
                }
            });
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2>Crear Juego</h2>
            <form method="POST" action="crear.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Juego:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Precio:</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>

                <div class="d-flex justify-content-between">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                    <a href="crud.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['name'])) {
        require '_db.php';
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $insertar = "INSERT INTO games (name, description, price, stock) VALUES ('$name', '$description', '$price', '$stock')";
        $query = mysqli_query($conexion, $insertar);
        if ($query) {
            header('Location: crud.php');
            exit;
        } else {
            echo "<script> alert('Error al insertar juego'); location.href = 'crear.php'; </script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
