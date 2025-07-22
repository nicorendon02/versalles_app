<?php
session_start();

$conexion = new mysqli('localhost', 'root', '', 'versalles');
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$stmt = $conexion->prepare("SELECT id, password, rol FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
  $fila = $resultado->fetch_assoc();
  if (hash('sha256', $password) === $fila['password']) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = $fila['rol'];
    $_SESSION['id_usuario'] = $fila['id'];
    header("Location: admin/dashboard.php");
    exit;
  }
}

header("Location: login.php?error=1");
exit;
