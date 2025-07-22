<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: ../login.php');
  exit;
}

$conexion = new mysqli('localhost', 'root', '', 'versalles');
$total = $conexion->query("SELECT COUNT(*) AS total FROM aplicaciones")->fetch_assoc()['total'];
$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Administrador</title>
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
  <style>
    body {
      display: flex;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      width: 250px;
      background: #2d4491;
      color: white;
      height: 100vh;
      padding: 2rem 1rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .sidebar h2 {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }
    .sidebar .total {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 2rem;
    }
    .main {
      flex: 1;
      padding: 2rem;
    }
    .filtros {
      margin-bottom: 2rem;
    }
    input, select, button {
      margin-right: 1rem;
      padding: 0.5rem;
    }
    .logout {
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 0.5rem;
      border: 1px solid white;
      border-radius: 10px;
      text-align: center;
    }
    .logout:hover {
      background-color: #1e2f70;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div>
      <h2>Hola, <?php echo strtoupper($rol); ?></h2>
      <div class="total"><?php echo $total; ?> Total aplicantes</div>
    </div>
    <a class="logout" href="logout.php">Cerrar sesión</a>
  </div>
  <div class="main">
    <h1>Filtrar hojas de vida</h1>
    <form class="filtros" method="GET" action="dashboard.php">
      <input type="text" name="profesion" placeholder="Escriba profesión">
      <label>
        <input type="checkbox" name="icbf" value="1"> Trabajó con ICBF
      </label>
      <select name="tiempo_grado">
        <option value="">Tiempo desde la última formación</option>
        <option value="< 6 meses">&lt; 6 meses</option>
        <option value="6-12 meses">6-12 meses</option>
        <option value="> 1 año">&gt; 1 año</option>
      </select>
      <button type="submit">Filtrar</button>
    </form>

    <div class="resultados">
      <?php
      $condiciones = [];
      if (!empty($_GET['profesion'])) {
        $prof = $conexion->real_escape_string($_GET['profesion']);
        $condiciones[] = "profesion LIKE '%$prof%'";
      }
      if (!empty($_GET['icbf'])) {
        $condiciones[] = "trabaja_icbf = 1";
      }
      if (!empty($_GET['tiempo_grado'])) {
        $tiempo = $conexion->real_escape_string($_GET['tiempo_grado']);
        $condiciones[] = "tiempo_grado = '$tiempo'";
      }
      $where = count($condiciones) > 0 ? 'WHERE ' . implode(' AND ', $condiciones) : '';

      $sql = "SELECT id, nombres, apellidos, profesion, celular FROM aplicaciones $where ORDER BY id DESC";
      $res = $conexion->query($sql);
      while ($row = $res->fetch_assoc()):
      ?>
        <div style="margin-bottom: 1rem; border-bottom: 1px solid #ccc; padding-bottom: 1rem;">
          <strong><?php echo $row['nombres'] . ' ' . $row['apellidos']; ?></strong><br>
          <?php echo $row['profesion']; ?> - Tel: <?php echo $row['celular']; ?><br>
          <a href="ver.php?id=<?php echo $row['id']; ?>">Ver aplicación</a>
          <?php if ($rol === 'superadmin'): ?>
            | <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
            | <a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Confirma que desea eliminar esta hoja de vida?');">Eliminar</a>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</body>
</html>
