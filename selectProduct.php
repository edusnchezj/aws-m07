<?php
session_start();
  if(isset($_GET['id']) && (!empty($_GET['id']) || $_GET['id'] == 0)) {
    $articles = file('ejercicio3txt.txt') or die("Error al obtener los productos.");
    foreach ($articles as $article) {
      $product[] = explode(';', $article);
    }

    function clear_input($str) {
        return strip_tags(trim($str));
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assignQuantity'])) {
      $newProducte['quantity'] = clear_input($_POST['quantity']);
      $newProducte['prize'] = str_replace(' €', '', clear_input($_POST['prize']));

      if(!empty($newProducte['quantity']) && !empty($newProducte['prize'])) {
        if(!filter_var($newProducte['quantity'], FILTER_VALIDATE_INT)) {
          $errs[] = 'La cantidad no es un número válido.';
        }

        if(!filter_var($newProducte['prize'], FILTER_VALIDATE_FLOAT)) {
          $errs[] = 'El precio no es un número válido.';
        } else if($newProducte['prize'] <= 0) {
          $errs[] = 'El precio es inferior o igual a 0. (¡Psst! Las cosas no son gratis -por ahora-.)';
        } else {
          if(round($product[$_GET['id']][2] * $newProducte['quantity'], 2) != $newProducte['prize']) {
            $errs[] = 'El precio no es válido con la cantidad asignada.';
          }
        }
      } else {
        $errs[] = 'Todos los campos deben de estar rellenados.';
      }

      if(@$errs) {
        foreach ($errs as $err) {
          echo '<span style="color: red;">'.$err.'</span><br>';
        }
      } else {
        array_push($product[$_GET['id']], $newProducte['quantity'], $newProducte['prize']);
        $_SESSION['carroCompra'][] = $product[$_GET['id']];
        header('Location: ejercicios.php');
      }
    }
    echo '
    <h3>Información del producto #'.$_GET['id'].'</h3>
    <a href="ejercicios.php">Volver</a>
    <form method="POST" style="margin-top: 10px;">
      <input type="text" value="'.$product[$_GET['id']][0].'" disabled>
      <input type="text" value="'.$product[$_GET['id']][2].' €" name="prize" id="prize">
      <input type="number" min="1" value="1" oninput="duplicatePrize()" id="quantity" name="quantity">
      <input type="submit" value="Asignar cantidad" name="assignQuantity">
    </form>';
    echo $products[$_GET['id']];
  } else {
    header("HTTP/1.0 404 Not Found");
  }
?>

<script>
  var defaultPrize = document.getElementById("prize").value.replace(' €', '');
  function duplicatePrize() {
    var total = document.getElementById("quantity").value * defaultPrize;
    document.getElementById("prize").value = (Math.round(total * 100) / 100) + ' €';
  }
</script>
