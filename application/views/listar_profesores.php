<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listar Profesores</title>
  </head>
  <body>
    <table>
      <tr>
        <tr>
			<th>
				CEDULA
			</th>
			<th>
				NOMBRE
			</th>
			<th>
				TITULO
			</th>
            <th>
				OPCIONES
			</th>
      </tr>
      <tr>
        <?php
        for ($i=0; $i < $cantidad ; $i++) {
          $nueva = ${"profesor".($i+1)} ;?>
          <tr>
             <td><center><?= $nueva->cedula?></center></td>
             <td><center><?= $nueva->nombre?></center></td>
             <td><center><?= $nueva->titulo?></center></td>
             
             </tr>
        <?php  } ?>
    </table>
  </body>
</html>

