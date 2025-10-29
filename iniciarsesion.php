<?php

session_start();
require_once __DIR__ . '/plantillas.php';

$auth = $_SESSION['auth'] ?? null;

if ($auth) {
    // Usuario autenticado
    header("Location: contenido.php");
} else {
    // Usuario no autenticado
    echo generarPaginaHTML('Ejemplo Mostrar Formulario', generarFormularioLogin());
}