<html>
<head>
    <link rel="StyleSheet" href="es.css" type="text/css">
    <link rel="StyleSheet" href="form.css" type="text/css">
    
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
    <form method="POST" action="crear.php">
        <h2>Crear Juego</h2>
        <label for="name">Nombre del Juego:</label>
        <input type="text" id="name" name="name"><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="price">Precio:</label>
        <input type="number" step="0.01" id="price" name="price"><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock"><br>

        <input type="submit" value="Enviar" class="btn btn--2"/>
        <a href="crud.php" class="btn btn-danger">Cancelar</a>
    </form>

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
</body>
</html>
