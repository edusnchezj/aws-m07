<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP - Primeros pasos</title>
  <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  ?>
  <style>
  div {
    padding: 10px;
    background: #EFEFEF;
    height: auto;
    overflow: hidden;
  }

  table {
    width: 100%;
  }

  td {
    padding: 10px;
  }
  </style>
</head>
<body>

  <h1>PHP - Primeros pasos</h1>
  <h2>Ejercicios introductorios</h2>

  <!-- <ejercicio_1> -->
  <h3>Ejercicio 1</h3>
  <ul><li>Crea una tabla con la variable global llamada $_SERVER.</li></ul>

  <button id="ejercicio1b" onclick="
  document.getElementById('ejercicio1').style.display = 'block';
  document.getElementById('ejercicio1b').style.display = 'none';
  ">Mostrar el ejercicio</button>
  <div id="ejercicio1" style="display: none;">
    <table border="1" width="100%">
      <tr style="font-weight: bold;">
        <td>SERVER KEY</td>
        <td>SERVER VALUE</td>
      </tr>
      <?php
      foreach ($_SERVER as $key => $value) {
        echo "
        <tr>
        <td>$key</td>
        <td>$value</td>
        </tr>
        ";
      }
      ?>
    </table>
  </div>
  <!-- </ejercicio_1> -->

  <!-- <ejercicio_2> -->
  <h3>Ejercicio 2</h3>
  <ul><li>Crea un calendario.</li></ul>

  <div id="ejercicio2">
    <a href="ejercicio2.php">
      <button>Ir al ejercicio 2</button>
    </a>
  </div>
  <!-- </ejercicio_2> -->

  <!-- <ejercicio_3> -->
  <h3>Ejercicio 3</h3>
  <ul><li>A partir de un archivo de texto, coge los productos de una tienda y enseñalos.</li></ul>

  <div id="ejercicio3">
    <?php
      $articles = file('ejercicio3txt.txt') or die("Error al obtener los productos.");
      foreach ($articles as $article) {
        $product[] = explode(';', $article);
      }
      echo '<table>
        <tr style="text-transform: uppercase; font-weight: bold;">
          <td>Producto</td>
          <td>Descripción</td>
          <td>Coste</td>
        <tr>';
      for ($c=0; $c < count($product); $c++) {
        echo '
        <tr>
          <td>'.$product[$c][0].'</td>
          <td>'.$product[$c][1].'</td>
          <td>'.$product[$c][2].'€</td>
        </tr>';
      }
      echo '</table>';
    ?>
  </div>
  <!-- </ejercicio_3> -->
</body>
</html>
