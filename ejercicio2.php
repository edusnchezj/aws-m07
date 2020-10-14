<html>
  <head>
    <title>Calendario</title>
  </head>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $diasSemana = array();
  $diasDelMes = array();
  for($i = 1; $i <= date('t'); $i++) {
    $diasDelMes[] = $i;
  }

  array_unshift($diasDelMes, 0, 0, 0);
  $diasDelMes = array_chunk($diasDelMes, 7);
  for ($i=0; $i < count($diasDelMes); $i++) {
    $diasDelMes[$i] = array_pad($diasDelMes[$i], 7, 0);
  }

  //echo json_encode($diasDelMes, true);
  ?>
  <body>
    <table border="1" width="100%" height="100%">
      <tr style="text-align: center; font-weight: bold; text-transform: uppercase;">
        <td colspan="7"><?php echo date('F Y'); ?></td>
      </tr>
      <tr style="text-align: center; font-weight: bold;" >
        <td>Lunes</td>
        <td>Martes</td>
        <td>Miércoles</td>
        <td>Jueves</td>
        <td>Viernes</td>
        <td>Sabado</td>
        <td>Domingo</td>
      </tr>
      <?php
        for ($i=0; $i < count($diasDelMes); $i++) {
          echo '<tr style="text-align: right;">';
          foreach($diasDelMes[$i] as $semana) {
            if($semana == 0) {
              echo "<td style=\"background: #B0B0B0;\" rowspan=\"2\"></td>";
            } else if(date('j') == $semana) {
              echo "<td style=\"background: #E4DC8E; padding: 10px; text-align: center;\">$semana</td>";
            } else {
              echo "<td style=\"background: #F2F2F2; padding: 10px; text-align: center;\">$semana</td>";
            }
          }
          echo '</tr>';

          echo '<tr style="text-align: left;">';
          foreach($diasDelMes[$i] as $semana) {
            if($semana != 0) {
              if(date('j') != $semana) {
                  echo "<td style=\"padding: 10px; vertical-align: top;\"></td>";
              } else {
                  echo "<td style=\"padding: 10px; background-color: #E4DC8E; vertical-align: top;\"></td>";
              }
            }
          }
          echo '</tr>';
        }
      ?>
      <tr>
      </tr>
  </body>
</html>
