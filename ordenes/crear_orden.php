<html>
<head>
    <link rel="StyleSheet" href="es.css" type="text/css">
    <link rel="StyleSheet" href="form.css" type="text/css">
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
</head>
<body>
    
<a href="crud_ordenes" class="btn btn-danger">Salir</a>

        <h2>Crear Orden</h2>

        <!-- Seleccionar un usuario existente -->
        <label for="user_id">Usuario:</label>
        <select id="user_id" name="user_id">
            <option value="">Selecciona un usuario</option>
            <?php
            require '_db.php';
            $query = "SELECT id, username FROM users";

            $result = mysqli_query($conexion, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['username']}</option>";
            }
            ?>
        </select><br>


        <input type="submit" value="Enviar" class="btn btn--2"/>
        <a href="crud_ordene_item.php" class="btn btn-danger">Cancelar</a>
    </form>

    <?php
require '_db.php';

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Insertar la orden en la tabla orders
    $insertar = "INSERT INTO orders (user_id) VALUES ('$user_id')";
    $query = mysqli_query($conexion, $insertar);

    if ($query) {
        // Obtener el ID de la última orden insertada
        $last_order_id = mysqli_insert_id($conexion);

        // Redirigir a la página para agregar artículos a la orden
        header("Location: crud_order_items.php?order_id=$last_order_id");
        exit;
    } else {
        echo "<script> alert('Error al insertar la orden'); location.href = 'crear_orden.php'; </script>";
    }
}
?>

</body>
</html>
