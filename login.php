<?php
session_start();
if (isset($_SESSION['usuario'])) {
  header('Location: admin/dashboard.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión - Versalles</title>
  <link rel="stylesheet" href="css/estilos.css">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-box {
      background: white;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
      width: 100%;
      max-width: 400px;
    }
    input {
      width: 100%;
      padding: 0.8rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    button {
      padding: 0.8rem 2rem;
      background-color: #2d4491;
      color: white;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
    }
    .error {
      color: red;
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Panel administrador</h2>
    <?php if (isset($_GET['error'])): ?>
      <div class="error">Usuario o contraseña incorrectos.</div>
    <?php endif; ?>
    <form method="POST" action="procesar_login.php">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Iniciar sesión</button>
    </form>
  </div>
</body>
</html>
