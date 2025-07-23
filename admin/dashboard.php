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
    .logo {
      max-width: 240px;
      margin-bottom: 2rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 1rem;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #f0f0f0;
    }
    .foto-aplicante {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 1rem;
    }
    .nombre-foto {
      display: flex;
      align-items: center;
    }
    .btn-ver {
      background-color: #2d4491;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
    }
    .btn-editar {
      background-color: #f0ad4e;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
    }
    .btn-eliminar {
      background-color: #d9534f;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div>
      <img src="../assets/logo-blanco.svg" alt="Logo" class="logo">
      <h1>Hola, <?php echo $_SESSION['usuario']; ?></h1>
      <br>
      <h2>Total de Aplicaciones</h2>
      <div class="total"><?php echo $total; ?></div>
    </div>
    <a href="logout.php" class="logout">Cerrar sesión</a>
  </div>
  <div class="main">
    <h1>Panel de Control</h1>
    <div class="filtros">
      <form method="GET">
        <input type="text" name="buscar" placeholder="Buscar por nombre o cédula" value="<?php echo $_GET['buscar'] ?? ''; ?>">
        <select name="ordenar">
          <option value="reciente" <?php if ($_GET['ordenar'] ?? '' === 'reciente') echo 'selected'; ?>>Más reciente</option>
          <option value="antiguo" <?php if ($_GET['ordenar'] ?? '' === 'antiguo') echo 'selected'; ?>>Más antiguo</option>
        </select>
        <input type="text" name="profesion" placeholder="Filtrar por profesión" value="<?php echo $_GET['profesion'] ?? ''; ?>">
        <select name="icbf">
          <option value="">¿Trabajó con ICBF?</option>
          <option value="1" <?php if ($_GET['icbf'] ?? '' === '1') echo 'selected'; ?>>Sí</option>
          <option value="0" <?php if ($_GET['icbf'] ?? '' === '0') echo 'selected'; ?>>No</option>
        </select>
        <select name="formacion_antiguedad">
          <option value="">Última formación profesional</option>
          <option value="1" <?php if ($_GET['formacion_antiguedad'] ?? '' === '1') echo 'selected'; ?>>Menos de 1 año</option>
          <option value="3" <?php if ($_GET['formacion_antiguedad'] ?? '' === '3') echo 'selected'; ?>>Menos de 3 años</option>
          <option value="5" <?php if ($_GET['formacion_antiguedad'] ?? '' === '5') echo 'selected'; ?>>Más de 5 años</option>
        </select>
        <button type="submit">Filtrar</button>
      </form>
    </div>
    <table>
      <thead>
        <tr>
          <th>Aplicante</th>
          <th>Profesión</th>
          <th>Correo</th>
          <th>Ciudad</th>
          <th>ICBF</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT a.id, a.nombres, a.apellidos, a.correo, a.ciudad, a.foto, a.profesion, a.trabaja_icbf, f.fecha_fin
                  FROM aplicaciones a
                  LEFT JOIN formacion_profesional f ON a.id = f.id_aplicacion
                  WHERE 1=1";

        if (!empty($_GET['buscar'])) {
          $buscar = $conexion->real_escape_string($_GET['buscar']);
          $query .= " AND (a.nombres LIKE '%$buscar%' OR a.apellidos LIKE '%$buscar%' OR a.cedula LIKE '%$buscar%')";
        }
        if (!empty($_GET['profesion'])) {
          $profesion = $conexion->real_escape_string($_GET['profesion']);
          $query .= " AND a.profesion LIKE '%$profesion%'";
        }
        if (isset($_GET['icbf']) && $_GET['icbf'] !== '') {
          $icbf = $conexion->real_escape_string($_GET['icbf']);
          $query .= " AND a.trabaja_icbf = '$icbf'";
        }
        if (!empty($_GET['formacion_antiguedad'])) {
          $años = intval($_GET['formacion_antiguedad']);
          if ($años == 5) {
            $query .= " AND TIMESTAMPDIFF(YEAR, f.fecha_fin, CURDATE()) > 5";
          } else {
            $query .= " AND TIMESTAMPDIFF(YEAR, f.fecha_fin, CURDATE()) <= $años";
          }
        }
        if (!empty($_GET['ordenar']) && $_GET['ordenar'] === 'antiguo') {
          $query .= " ORDER BY a.id ASC";
        } else {
          $query .= " ORDER BY a.id DESC";
        }

        $resultado = $conexion->query($query);
        if (!$resultado) {
          die("Error en la consulta: " . $conexion->error);
        }

        while ($fila = $resultado->fetch_assoc()) {
        ?>
        <tr>
          <td class="nombre-foto">
            <img src="../uploads/<?php echo $fila['foto']; ?>" alt="Foto" class="foto-aplicante">
            <?php echo $fila['nombres'] . ' ' . $fila['apellidos']; ?>
          </td>
          <td><?php echo $fila['profesion']; ?></td>
          <td><?php echo $fila['correo']; ?></td>
          <td><?php echo $fila['ciudad']; ?></td>
          <td><?php echo $fila['trabaja_icbf'] ? 'Sí' : 'No'; ?></td>
          <td>
            <a href="ver.php?id=<?php echo $fila['id']; ?>" class="btn-ver">Ver</a>
            <?php if ($rol === 'superadmin'): ?>
              <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn-editar">Editar</a>
              <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de eliminar esta aplicación?')">Eliminar</a>
            <?php endif; ?>
          </td>

        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
