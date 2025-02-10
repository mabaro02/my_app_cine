<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";

//Crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexion
if ($conn->connect_error) {
    die("Conexion fallida: " .$conn->connect_error);
}

//Consulta SQL para seleccionar todo el contenido de la tabla peliculas
$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Peliculas</title>
</head>
<body>
    <h1>Listado de Peliculas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Titulo</th><th>Director</th><th>Nota</th><th>Año</th><th>Ppto</th><th>Img</th><th>Trailer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["titulo"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["director"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["nota"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["anyo"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["presupuesto"]) . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . htmlspecialchars($row["img_base64"]) . "' alt='Imagen' width='100' height='100'></td>";
                    echo "<td><a href='" . htmlspecialchars($row["url_trailer"]) . "' target='_blank'>Ver Trailer</a></td>";
                    echo "</tr>";
                }
            } else  { echo "<tr><td colspan='8'>No hay registros</td></tr>" ;}
            ?>
            </tbody>
        </table>
    </body>
</html>

<?php
$conn->close();
?>