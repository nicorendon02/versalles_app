<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Nueva Aplicación - Versalles</title>
  <link rel="stylesheet" href="css/estilos.css">
<!-- favicon -->
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      /*background: #f7f7f7;*/
      /* background image */
        background-image: url('assets/background.svg');
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .contenedor {
      background: white;
      max-width: 800px;
      width: 90%;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      text-align: center;
      position: relative;
    }
    .logo {
      max-width: 300px;
      margin-bottom: 1rem;
    }
    .titulo {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }
    .descripcion {
      font-size: 1rem;
      margin-bottom: 1.5rem;
    }
    .legal {
      font-size: 0.9rem;
      margin-top: 1rem;
    }
    .checkbox {
      margin-bottom: 1.5rem;
    }
    button {
      padding: 0.8rem 2rem;
      background-color: #2d4491;
      color: white;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      font-size: 1rem;
    }
    button:disabled {
      background-color: #999;
      cursor: not-allowed;
    }
    .admin-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #2d4491;
      color: white;
      padding: 0.4rem 1rem;
      border-radius: 20px;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
    }
    footer {
      margin-top: 2rem;
      font-size: 0.8rem;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="contenedor">
    <a class="admin-btn" href="login.php">
      Panel administrador
    </a>
    <img src="assets/logo.svg" alt="Logo Versalles" class="logo">
    <div class="titulo">Nueva aplicación</div>
    <div class="descripcion">
      Bienvenido al Centro de Desarrollo Comunitario Versalles.<br>
      Por favor, diligencie cuidadosamente cada uno de los campos requeridos para su hoja de vida digital.<br>
      Una vez enviado, el formulario no podrá ser modificado.
    </div>
    <div class="legal">
      Al continuar, acepta el tratamiento de datos personales conforme a la ley 1581 del 2012.
    </div>
    <div class="checkbox">
      <input type="checkbox" id="acepto" onchange="toggleBoton()"> Acepto el tratamiento de datos personales.
    </div>
    <button id="continuar" disabled onclick="window.location.href='formulario.php'">CONTINUAR</button>
    <footer>
      v1.0 <br>
      &copy; 2025 Centro de Desarrollo Comunitario Versalles. Todos los derechos reservados. <br>
      Desarrollado por Nicolas Rendon Arias.
    </footer>
  </div>

  <script>
    function toggleBoton() {
      document.getElementById("continuar").disabled = !document.getElementById("acepto").checked;
    }
  </script>
</body>
</html>
