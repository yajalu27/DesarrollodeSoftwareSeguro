<?php
// Conexión a la base de datos (ajusta los valores según tu configuración de XAMPP)
$servername = "localhost";
$username = "root"; // Usuario por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP
$dbname = "tu_base_de_datos"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cedulaRUC = $_POST['cedulaRUC'];
$telefono = $_POST['telefono'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$salario = $_POST['salario'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

// Preparar la consulta SQL
$stmt = $conn->prepare("INSERT INTO registros (nombres, apellidos, cedula_ruc, telefono, fecha_nacimiento, salario, email, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $nombres, $apellidos, $cedulaRUC, $telefono, $fechaNacimiento, $salario, $email, $contrasena);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>