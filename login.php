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
  <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-image: url('assets/background.svg');
      background-size: cover;
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
      box-sizing: border-box;
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
    .logo {
      max-width: 300px;
      margin-bottom: 1rem;
    }
    footer {
      margin-top: 2rem;
      font-size: 0.8rem;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <img src="assets/logo.svg" alt="Logo Versalles" class="logo">
    <h2>Panel administrador</h2>
    <?php if (isset($_GET['error'])): ?>
      <div class="error">Usuario o contraseña incorrectos.</div>
    <?php endif; ?>
    <form method="POST" action="procesar_login.php">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Iniciar sesión</button>
    </form>
    <footer>
      v1.0 <br>
      &copy; 2025 Centro de Desarrollo Comunitario Versalles. Todos los derechos reservados. <br>
      Desarrollado por Nicolas Rendon Arias.
    </footer>
  </div>
</body>
</html>
