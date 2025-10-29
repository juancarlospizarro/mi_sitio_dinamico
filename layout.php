<?php
// Debug temporal
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi primer sitio modular con PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container py-4">

    <!-- Encabezado -->
    <?php
      $hdr = __DIR__ . '/elementos/header.php';
      if (is_file($hdr) && is_readable($hdr)) {
        require_once $hdr;
      } else {
        echo '<div class="alert alert-danger">No se encuentra/lee header: ' . htmlspecialchars($hdr) . '</div>';
      }
    ?>

    <!-- Contenido principal -->
    <main class="mt-4">
      <?php
        $pagina = $_GET['pagina'] ?? 'inicio';
        $archivo = __DIR__ . "/elementos/{$pagina}.php";
        
        
        if (is_file($archivo) && is_readable($archivo)) {
          require_once $archivo;
        } else {
          echo '<div class="alert alert-warning">Página no encontrada: ' . htmlspecialchars($pagina) . '</div>';
        }
      ?>
    </main>

    <!-- Pie de página -->
    <?php
      $ftr = __DIR__ . '/elementos/footer.php';
      if (is_file($ftr) && is_readable($ftr)) {
        require_once $ftr;
      } else {
        echo '<div class="alert alert-danger">No se encuentra/lee footer: ' . htmlspecialchars($ftr) . '</div>';
      }
    ?>

  </div>
</body>
</html>
