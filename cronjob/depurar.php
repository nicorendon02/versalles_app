<?php
// Script que elimina automaticamente las aplicaciones que tienen mas de 2 años de antiguedad
// Conexión a MySQL
$conexion = new mysqli('localhost', 'root', '', 'versalles');

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para eliminar aplicaciones antiguas
$query = "DELETE FROM aplicaciones WHERE fecha_aplicacion < NOW() - INTERVAL 2 YEAR";
if ($conexion->query($query) === TRUE) {
    echo "Aplicaciones eliminadas correctamente.";
} else {
    echo "Error al eliminar aplicaciones: " . $conexion->error;
}

// Cerrar conexión
$conexion->close();