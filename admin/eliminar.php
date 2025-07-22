<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'superadmin') {
  header('Location: ../login.php');
  exit;
}

if (!isset($_GET['id'])) {
  header('Location: dashboard.php');
  exit;
}

$conexion = new mysqli('localhost', 'root', '', 'versalles');
$id = intval($_GET['id']);

// Eliminar de tablas hijas primero si no tienen ON DELETE CASCADE
$conexion->query("DELETE FROM referencias WHERE id_aplicacion = $id");
$conexion->query("DELETE FROM experiencia_laboral WHERE id_aplicacion = $id");
$conexion->query("DELETE FROM eventos WHERE id_aplicacion = $id");
$conexion->query("DELETE FROM experiencia_academica WHERE id_aplicacion = $id");
$conexion->query("DELETE FROM formacion_profesional WHERE id_aplicacion = $id");
$conexion->query("DELETE FROM formacion_academica WHERE id_aplicacion = $id");

// Eliminar la aplicación principal
$conexion->query("DELETE FROM aplicaciones WHERE id = $id");

header("Location: dashboard.php");
exit;
