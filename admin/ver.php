<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: ../login.php');
  exit;
}

$conexion = new mysqli('localhost', 'root', '', 'versalles');
$id = intval($_GET['id']);
$datos = $conexion->query("SELECT * FROM aplicaciones WHERE id = $id")->fetch_assoc();
// Obtener certificados de antecedentes
$certificados = $conexion->query("SELECT * FROM certificados_antecedentes WHERE id_aplicacion = $id")->fetch_assoc();


function mostrarArchivo($nombre, $label = 'Ver archivo') {
  return $nombre ? "<a href='../uploads/$nombre' target='_blank'>$label</a>" : "No disponible";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ver Aplicación</title>
  <link rel="stylesheet" href="../css/estilos.css">
  <style>
    body { font-family: 'Segoe UI', sans-serif; padding: 2rem; background: #f5f5f5; }
    .contenedor { background: white; padding: 2rem; border-radius: 20px; max-width: 1000px; margin: auto; }
    .perfil { display: flex; align-items: center; margin-bottom: 2rem; }
    .foto-perfil { width: 150px; height: 150px; object-fit: cover; border-radius: 100px; margin-right: 2rem; }
    .nombre { font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; }
    .seccion { margin-bottom: 2rem; }
    .seccion h3 { border-bottom: 1px solid #ccc; padding-bottom: 0.5rem; }
    .campo { margin: 0.5rem 0; }
    .archivo { margin-top: 0.5rem; }
    a.boton { display: inline-block; padding: 0.4rem 1rem; background: #2d4491; color: white; border-radius: 10px; text-decoration: none; margin-top: 0.5rem; }
  </style>
</head>
<body>
<div class="contenedor">
  <div class="perfil">
    <img class="foto-perfil" src="../uploads/<?php echo $datos['foto']; ?>" alt="Foto">
    <div>
      <div class="nombre"><?php echo $datos['nombres'] . ' ' . $datos['apellidos']; ?></div>
      <div><?php echo $datos['profesion']; ?></div>
      <div>Teléfono: <?php echo $datos['celular']; ?></div>
    </div>
  </div>

  <div class="seccion">
    <h3>Datos personales</h3>
    <div class="campo">Edad: <?php echo $datos['edad']; ?> | Cédula: <?php echo $datos['cedula']; ?></div>
    <div class="campo">Dirección: <?php echo $datos['direccion']; ?> | Ciudad: <?php echo $datos['ciudad']; ?></div>
    <div class="campo">Correo: <?php echo $datos['correo']; ?></div>
    <div class="campo">Perfil profesional: <?php echo $datos['perfil']; ?></div>
    <?php if (!empty($datos['tarjeta_profesional'])): ?>
    <div class="archivo">Tarjeta profesional: <?php echo mostrarArchivo($datos['tarjeta_profesional']); ?></div>
    <?php endif; ?>
    <div class="archivo">Firma digital: <?php echo mostrarArchivo($datos['firma_digital']); ?></div>
  </div>

  <?php
  function mostrarSubregistros($conexion, $tabla, $id, $campos, $titulo) {
    $res = $conexion->query("SELECT * FROM $tabla WHERE id_aplicacion = $id");
    if ($res->num_rows > 0) {
      echo "<div class='seccion'><h3>$titulo</h3>";
      while ($row = $res->fetch_assoc()) {
        echo "<div class='campo'>";
        foreach ($campos as $c) {
          if (isset($row[$c]) && !str_ends_with($c, 'certificado')) {
            echo ucfirst(str_replace('_', ' ', $c)) . ": " . $row[$c] . "<br>";
          }
        }
        foreach ($row as $key => $val) {
          if (str_contains($key, 'certificado')) {
            echo "Archivo: " . mostrarArchivo($val) . "<br>";
          }
        }
        echo "</div><hr>";
      }
      echo "</div>";
    }
  }

  mostrarSubregistros($conexion, 'formacion_academica', $id, ['titulo', 'institucion', 'fecha_inicio', 'fecha_fin'], 'Formación Académica');
  mostrarSubregistros($conexion, 'formacion_profesional', $id, ['titulo', 'institucion', 'fecha_inicio', 'fecha_fin'], 'Formación Profesional');
  mostrarSubregistros($conexion, 'experiencia_academica', $id, ['nombre_experiencia', 'institucion', 'fecha_inicio', 'fecha_fin'], 'Experiencia Académica');
  mostrarSubregistros($conexion, 'eventos', $id, ['nombre_evento', 'organizacion', 'fecha_evento'], 'Eventos');
  mostrarSubregistros($conexion, 'experiencia_laboral', $id, ['empresa', 'cargo', 'jefe_inmediato', 'telefono', 'ciudad', 'fecha_inicio', 'fecha_fin'], 'Experiencia Laboral');
  mostrarSubregistros($conexion, 'referencias', $id, ['nombre', 'cargo', 'telefono'], 'Referencias');
  ?>
  <?php if ($certificados && ($certificados['certificado_judicial'] || $certificados['certificado_fiscal'] || $certificados['certificado_disciplinario'])): ?>
  <h3>Certificados de Antecedentes</h3>
  <ul>
    <?php if ($certificados['certificado_judicial']): ?>
      <li>
        <a href="../uploads/<?php echo $certificados['certificado_judicial']; ?>" target="_blank">Certificado Judicial</a>
      </li>
    <?php endif; ?>
    <?php if ($certificados['certificado_fiscal']): ?>
      <li>
        <a href="../uploads/<?php echo $certificados['certificado_fiscal']; ?>" target="_blank">Certificado Fiscal</a>
      </li>
    <?php endif; ?>
    <?php if ($certificados['certificado_disciplinario']): ?>
      <li>
        <a href="../uploads/<?php echo $certificados['certificado_disciplinario']; ?>" target="_blank">Certificado Disciplinario</a>
      </li>
    <?php endif; ?>
  </ul>
<?php endif; ?>


  <a class="boton" href="dashboard.php">&larr; Volver al panel</a>
</div>
</body>
</html>
