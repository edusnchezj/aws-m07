<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['purchase'])) {
    echo '<span style="color: green;">Comprado.</span>
    <meta http-equiv="refresh" content="5; url=ejercicios.php">';
    unset($_SESSION['carroCompra']);
  }
  if(isset($_SESSION['carroCompra'])) {
    echo '<table>
      <tr style="text-transform: uppercase; font-weight: bold; text-align: center;">
        <td>Producto</td>
        <td>Cantidad</td>
        <td>Precio/c</td>
      </tr>';
    $total = 0;
    foreach($_SESSION['carroCompra'] as $product) {
      $total += $product[4];
      echo '
      <tr>
        <td>'.$product[0].'</td>
        <td style="text-align: center;">'.$product[3].'</td>
        <td style="text-align: center;">'.$product[4].'€</td>
      </tr>';
    }

    echo '
    <tr>
      <td></td>
      <td style="text-align: center; text-transform: uppercase; font-weight: bold;">total</td>
      <td style="text-align: center;">'.$total.'€</td>
    </tr>
    <tr>
      <td colspan="3"><form method="POST"><button name="purchase" style="width: 100%;">Pagar</button></form></td>
    </tr>';

    echo '</table>';

    echo json_encode($_SESSION['carroCompra'], true);



  } else if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("HTTP/1.0 404 Not Found");
  }
