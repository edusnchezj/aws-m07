<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP - Primeros pasos</title>
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

  <a href="ejercicio2.php"><button>Ir al ejercicio 2</button></a>
  <!-- </ejercicio_2> -->
</body>
</html>
