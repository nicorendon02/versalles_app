<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'superadmin') {
  header('Location: ../login.php');
  exit;
}

$conexion = new mysqli('localhost', 'root', '', 'versalles');
$id = intval($_GET['id']);
$datos = $conexion->query("SELECT * FROM aplicaciones WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $conexion->prepare("UPDATE aplicaciones SET nombres=?, apellidos=?, edad=?, profesion=?, correo=?, celular=?, tiempo_grado=?, trabaja_icbf=? WHERE id=?");
  $stmt->bind_param('ssissssii',
    $_POST['nombres'], $_POST['apellidos'], $_POST['edad'], $_POST['profesion'],
    $_POST['correo'], $_POST['celular'], $_POST['tiempo_grado'], $_POST['trabaja_icbf'], $id
  );
  $stmt->execute();
  $stmt->close();
  header("Location: dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Aplicación</title>
  <link rel="stylesheet" href="../css/estilos.css">
  <style>
    body { font-family: 'Segoe UI', sans-serif; padding: 2rem; background: #f5f5f5; }
    input, textarea { width: 100%; padding: 0.5rem; margin-bottom: 1rem; }
    label { font-weight: bold; display: block; }
  </style>
</head>
<body>
  <h1>Editar aplicación</h1>
  <form method="POST">
    <label>Nombres</label>
    <input type="text" name="nombres" value="<?php echo $datos['nombres']; ?>" required>

    <label>Apellidos</label>
    <input type="text" name="apellidos" value="<?php echo $datos['apellidos']; ?>" required>

    <label>Edad</label>
    <input type="number" name="edad" value="<?php echo $datos['edad']; ?>" required>

    <label>Profesión</label>
    <input type="text" name="profesion" value="<?php echo $datos['profesion']; ?>" required>

    <label>Correo electrónico</label>
    <input type="email" name="correo" value="<?php echo $datos['correo']; ?>" required>

    <label>Celular</label>
    <input type="text" name="celular" value="<?php echo $datos['celular']; ?>" required>

    <label>Tiempo de grado</label>
    <input type="text" name="tiempo_grado" value="<?php echo $datos['tiempo_grado']; ?>">

    <label><input type="checkbox" name="trabaja_icbf" value="1" <?php if ($datos['trabaja_icbf']) echo 'checked'; ?>> Ha trabajado con ICBF</label>

    <button type="submit">Guardar cambios</button>
  </form>
  <a href="dashboard.php">&larr; Volver al panel</a>
</body>
</html>