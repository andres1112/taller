<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?= validation_errors(); ?>

    <?php $documento = $profesor['cedula']; ?>

    <?= form_open("profesor/modificar/"."$documento"."/true")?>

    <label for="id">cedula</label>
    <input type="input" name="cedula" value="<?php echo $profesor['cedula'];?>" /><br />

    <label for="nombre">NOMBRE</label>
    <input type="input" name="nombre" value="<?php echo $profesor['nombre'];?>" /><br />
    
    <label for="fecha">FECHA</label>
    <input type="input" name="fecha" value="<?php echo $profesor['fecha'];?>" /><br />

    <label for="lugar_nacimiento">LUGAR DE NACIMIENTO</label>
    <input type="input" name="lugar_nacimiento" value="<?php echo $profesor['lugar_nacimiento'];?>" /><br />

    <label for="titulo">TITULO</label>
    <input type="input" name="titulo" value="<?php echo $profesor['titulo'];?>" /><br />
    
    <label for="departamento">DEPARTAMENTO</label>
    <input type="input" name="departamento" value="<?php echo $profesor['departamento'];?>" /><br />


   <input type="submit" name="modificar" value="Modificar" />

  <?= form_close()?>

  </body>
</html>
