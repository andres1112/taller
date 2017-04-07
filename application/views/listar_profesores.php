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
             <td><center><a href="<?php echo site_url("profesor/modificar/").$nueva->cedula?>"><button type="button" name="button">Modificar</button></a>
             </tr>
        <?php  } ?>
    </table>
  </body>
</html>

