<?php
header('Content-Type: application/json');
session_start();

// Conexión a MySQL
$conexion = new mysqli('localhost', 'root', '', 'versalles');
if ($conexion->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Error de conexión']);
    exit;
}

function subirArchivo($archivo, $carpeta = 'uploads', $prefijo = '') {
    if ($archivo['error'] === 0 && $archivo['size'] <= 10 * 1024 * 1024) {
        $nombre = $prefijo . time() . '_' . basename($archivo['name']);
        move_uploaded_file($archivo['tmp_name'], $carpeta . '/' . $nombre);
        return $nombre;
    }
    return null;
}

$tarjeta = subirArchivo($_FILES['tarjeta'], 'uploads', 'tarjeta_');
$foto = subirArchivo($_FILES['foto'], 'uploads', 'foto_');
$firma = subirArchivo($_FILES['firma_digital'], 'uploads', 'firma_');

$trabaja_icbf = isset($_POST['trabaja_icbf']) ? 1 : 0;

// Aplicaciones
$stmt = $conexion->prepare("INSERT INTO aplicaciones (nombres, apellidos, edad, profesion, cedula, direccion, celular, correo, ciudad, perfil, tarjeta_profesional, foto, trabaja_icbf, tiempo_grado, firma_digital) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssissssssssssss',
    $_POST['nombres'], $_POST['apellidos'], $_POST['edad'], $_POST['profesion'], $_POST['cedula'],
    $_POST['direccion'], $_POST['celular'], $_POST['correo'], $_POST['ciudad'], $_POST['perfil'],
    $tarjeta, $foto, $trabaja_icbf, $_POST['tiempo_grado'], $firma
);
$stmt->execute();
$id_aplicacion = $stmt->insert_id;
$stmt->close();

// Formación académica y profesional
for ($i = 1; $i <= 5; $i++) {
    if (!empty($_POST["fa{$i}_titulo"])) {
        $archivo = subirArchivo($_FILES["fa{$i}_certificado"], 'uploads', "fa{$i}_");
        $stmt = $conexion->prepare("INSERT INTO formacion_academica (id_aplicacion, titulo, institucion, fecha_inicio, fecha_fin, archivo_certificado) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssss', $id_aplicacion, $_POST["fa{$i}_titulo"], $_POST["fa{$i}_institucion"], $_POST["fa{$i}_inicio"], $_POST["fa{$i}_fin"], $archivo);
        $stmt->execute();
        $stmt->close();
    }
    if (!empty($_POST["fp{$i}_titulo"])) {
        $archivo = subirArchivo($_FILES["fp{$i}_certificado"], 'uploads', "fp{$i}_");
        $stmt = $conexion->prepare("INSERT INTO formacion_profesional (id_aplicacion, titulo, institucion, fecha_inicio, fecha_fin, archivo_certificado) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssss', $id_aplicacion, $_POST["fp{$i}_titulo"], $_POST["fp{$i}_institucion"], $_POST["fp{$i}_inicio"], $_POST["fp{$i}_fin"], $archivo);
        $stmt->execute();
        $stmt->close();
    }
    if (!empty($_POST["ea{$i}_nombre"])) {
        $archivo = subirArchivo($_FILES["ea{$i}_certificado"], 'uploads', "ea{$i}_");
        $stmt = $conexion->prepare("INSERT INTO experiencia_academica (id_aplicacion, nombre_experiencia, institucion, fecha_inicio, fecha_fin, archivo_certificado) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssss', $id_aplicacion, $_POST["ea{$i}_nombre"], $_POST["ea{$i}_institucion"], $_POST["ea{$i}_inicio"], $_POST["ea{$i}_fin"], $archivo);
        $stmt->execute();
        $stmt->close();
    }
}

// Eventos
for ($i = 1; $i <= 3; $i++) {
    if (!empty($_POST["ev{$i}_nombre"])) {
        $stmt = $conexion->prepare("INSERT INTO eventos (id_aplicacion, nombre_evento, organizacion, fecha_evento) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isss', $id_aplicacion, $_POST["ev{$i}_nombre"], $_POST["ev{$i}_organizacion"], $_POST["ev{$i}_fecha"]);
        $stmt->execute();
        $stmt->close();
    }
}

// Experiencia laboral
for ($i = 1; $i <= 5; $i++) {
    if (!empty($_POST["el{$i}_empresa"])) {
        $stmt = $conexion->prepare("INSERT INTO experiencia_laboral (id_aplicacion, empresa, cargo, jefe_inmediato, telefono, ciudad, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssssss', $id_aplicacion, $_POST["el{$i}_empresa"], $_POST["el{$i}_cargo"], $_POST["el{$i}_jefe"], $_POST["el{$i}_telefono"], $_POST["el{$i}_ciudad"], $_POST["el{$i}_inicio"], $_POST["el{$i}_fin"]);
        $stmt->execute();
        $stmt->close();
    }
}

// Guardar experiencia con ICBF (hasta 3 formularios)
for ($i = 1; $i <= 3; $i++) {
  $empresa = $_POST["icbf_empresa_$i"] ?? null;
  $programa = $_POST["icbf_programa_$i"] ?? null;
  $funciones = $_POST["icbf_funciones_$i"] ?? null;
  $cargo = $_POST["icbf_cargo_$i"] ?? null;
  $fecha_inicio = $_POST["icbf_fecha_inicio_$i"] ?? null;
  $fecha_fin = $_POST["icbf_fecha_fin_$i"] ?? null;
  $certificado = $_FILES["icbf_certificado_$i"]['name'] ?? '';

  // Si hay algún campo diligenciado o archivo cargado
  if ($empresa || $programa || $funciones || $cargo || $fecha_inicio || $fecha_fin || $certificado) {
    if ($certificado) {
      move_uploaded_file($_FILES["icbf_certificado_$i"]['tmp_name'], 'uploads/' . $certificado);
    }

    $conexion->query("INSERT INTO experiencia_icbf (id_aplicacion, empresa, programa, funciones, cargo, fecha_inicio, fecha_fin, certificado)
      VALUES ('$id_aplicacion', '$empresa', '$programa', '$funciones', '$cargo', '$fecha_inicio', '$fecha_fin', '$certificado')");
  }
}


// Referencias
for ($i = 1; $i <= 3; $i++) {
    if (!empty($_POST["ref{$i}_nombre"])) {
        $stmt = $conexion->prepare("INSERT INTO referencias (id_aplicacion, nombre, cargo, telefono) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isss', $id_aplicacion, $_POST["ref{$i}_nombre"], $_POST["ref{$i}_cargo"], $_POST["ref{$i}_telefono"]);
        $stmt->execute();
        $stmt->close();
    }
}

$conexion->close();
echo json_encode(['success' => true]);
