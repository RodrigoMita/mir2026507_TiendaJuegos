<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Orden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://cdn.vectorstock.com/i/500p/13/16/abstract-background-with-paper-layers-and-shadows-vector-1661316.jpg'); /* Fondo temático en rojo y negro */
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
            background-color: #dc3545; /* Rojo para el botón salir y cancelar */
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Rojo más oscuro al pasar el ratón */
            border-color: #c82333;
        }
        .btn-primary {
            background-color: #007bff; /* Azul para el botón enviar */
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
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="crud_ordenes.php" class="btn btn-danger mb-3">Salir</a>

        <h2>Crear Orden</h2>

        <form action="crear_orden.php" method="POST">
            <div class="form-group">
                <label for="user_id" class="form-label">Usuario:</label>
                <select id="user_id" name="user_id" class="form-select">
                    <option value="">Selecciona un usuario</option>
                    <?php
                    require '_db.php';
                    $query = "SELECT id, username FROM users";
                    $result = mysqli_query($conexion, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['username']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="crud_order_items.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

    <script>
        window.onload = function() {
            document.querySelector('form').addEventListener('submit', function(event) {
                var user_id = document.getElementById('user_id').value;

                if (user_id === '') {
                    alert('Selecciona un usuario válido');
                    event.preventDefault();
                }
            });
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
