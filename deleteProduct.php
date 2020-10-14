<?php
  if(isset($_GET['id']) && (!empty($_GET['id']) || $_GET['id'] == 0)) {
    $products = file('ejercicio3txt.txt') or die("Error al obtener los productos.");
    unset($products[$_GET['id']]);
    file_put_contents('ejercicio3txt.txt', implode('', $products));
    header('Location: ejercicios.php?deleteProducts');
  } else {
    header("HTTP/1.0 404 Not Found");
  }
