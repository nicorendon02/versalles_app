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
  $stmt = $conexion->prepare("UPDATE aplicaciones SET nombres=?, apellidos=?, edad=?, profesion=?, correo=?, celular=? WHERE id=?");
  $stmt->bind_param('ssisssi',
    $_POST['nombres'], $_POST['apellidos'], $_POST['edad'], $_POST['profesion'],
    $_POST['correo'], $_POST['celular'], $id
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
    body {
      font-family: 'Segoe UI', sans-serif;
      background: url('../assets/background.svg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 2rem;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .form-container {
      background-color: #fff;
      padding: 2rem 3rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      max-width: 600px;
      width: 100%;
    }
    h1 {
      text-align: center;
      color: #2d4491;
      margin-bottom: 2rem;
    }
    label {
      font-weight: bold;
      margin-top: 1rem;
      display: block;
    }
    input[type="text"],
    input[type="email"],
    input[type="number"] {
      width: 100%;
      padding: 0.6rem;
      margin-top: 0.2rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 1rem;
    }
    button {
      background-color: #2d4491;
      color: white;
      padding: 0.6rem 1.2rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      width: 100%;
      margin-top: 1rem;
    }
    button:hover {
      background-color: #1e2f70;
    }
    a {
      display: block;
      text-align: center;
      margin-top: 1.5rem;
      color: #2d4491;
      font-weight: bold;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-container">
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

      <button type="submit">Guardar cambios</button>
    </form>
    <a href="dashboard.php">&larr; Volver al panel</a>
  </div>
</body>
</html>
