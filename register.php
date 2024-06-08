<?php
// Configuración de la conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu servidor de PostgreSQL está en otro host
$dbname = 'Cuentas';
$username = 'usuario1'; // Cambia esto por tu nombre de usuario de PostgreSQL
$password = 'root'; // Cambia esto por tu contraseña de PostgreSQL

try {
    // Crear la conexión usando PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar el manejo de excepciones

    // Verificar si se recibieron datos del formulario mediante POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Realizar una consulta preparada para insertar los datos en la tabla usuarios
        $query = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();

        // Mensaje de éxito
        header("Location: respuesta/respuesta.html");
        exit();
    }
} catch (PDOException $e) {
    // Capturar y mostrar errores de conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>
