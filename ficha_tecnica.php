<?php
    require('conexion.php');
    require('header.php');

    $id= $_GET['id'];

    //echo $id;
    $sql_platillo="SELECT unidad.des_unidad,`nombre_platillo`,`tiempo_preparacion`,`id_platillo`,`t_porciones`,`porciones`,`instr`, `instructivo_empaquetado` FROM `platillo` INNER JOIN unidad ON unidad.id_unidad = platillo.id_unidad WHERE `id_platillo` = '$id' ";
    $get_dato_platillo = mysqli_query($link,$sql_platillo);
    $platillo = mysqli_fetch_assoc($get_dato_platillo);

    $sql_ingredientes="SELECT unidad.des_unidad,`peso_neto`, ingredientes.codigo, ingredientes.cantidad, ingredientes.nombre_ingrediente,`id_relacion`,`peso_bruto` FROM `platillo_ingrediente` INNER JOIN ingredientes ON ingredientes.id_ingredientes = id_ingrediente INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad WHERE id_platillo = '$id' ";
    $resultado = mysqli_query($link,$sql_ingredientes) or die(mysqli_error($link));
?>
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<div class="container">
<table class="centered">
        <thead>
          <tr>
              <th><?php echo $platillo['nombre_platillo']; ?></th> <!--Con php meter el nombre de la receta segun el id-->
              <!--<th>algo</th>-->
          </tr>
        </thead>
</table>
<table>
        <thead>
          <tr>
              <th>Raciones:  </th>
              <th><?php echo $platillo['porciones']; ?></th> <!-- Atraccion segun el id de la tabla platillo -->
              <th>Tamaño de raciones:  </th>
              <th><?php echo $platillo['t_porciones'];
                  echo " "; 
                  echo $platillo['des_unidad']; ?></th> <!-- Atraccion segun el id de la tabla platillo -->
              <th>Tiempo de preparacion</th>
              <th><?php echo $platillo['tiempo_preparacion']." Minutos "; ?></th> <!-- Atraccion segun el id de la tabla platillo -->
              <th>No. Revisi&oacute;n</th>
              <th>000</th>
          </tr>
        </thead>
</table>
    <hr/>

    <div class="row">
        <div class="col m8">
        <table>       
        <thead>
          <tr>
              <th>Clave</th>
              <th>Cantidad</th>
              <th>Unidad</th>
              <th>Ingrediente</th>
          </tr>
        </thead>
        <tbody>
            <?php
			while($row = mysqli_fetch_array($resultado)):
			?>
          <tr><!-- dentro de un while para traer todo -->
            <td><?php echo $row['codigo']; ?></td><!--Toda esta ifnromacion es atraida segun el id de platillo en relacion con el ingrediente -->
            <td><?php echo round( (FLOAT)$row['peso_neto'],3,PHP_ROUND_HALF_UP); ?></td>
            <td><?php echo $row['des_unidad']; ?></td>
            <td><?php echo $row['nombre_ingrediente']; ?></td>
          </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
      </table>
       
        </div>
        <div class="col m4">
            
       <?php
            $id_imagen = $id; 
              $path = "foto_platillos/".$id_imagen;
              if(file_exists($path)){
                $directorio = opendir($path);
                while ($archivo = readdir($directorio))
                {
                  if (!is_dir($archivo)){
                    echo "<img src='foto_platillos/$id_imagen/$archivo' width='300' />";

                }
              }
            }
      ?>

        </div>
        
    </div>
    <hr/>
    <table>       
        <thead>
          <tr>
              <th class="centered">Metodo de preparacion </th>
          </tr>
        </thead>
        <tbody>
          <tr><!-- dentro de un while para traer todo -->
            <td><?php echo $platillo['instr']; ?></td><!--Toda esta ifnromacion es atraida segun el id de platillo en relacion con el ingrediente -->

          </tr>

          <tr>
              <th class="centered">Metodo de empaquetado </th>
          </tr>
        <tbody>
          <tr><!-- dentro de un while para traer todo -->
            <td><?php echo $platillo['instructivo_empaquetado']; ?></td><!--Toda esta ifnromacion es atraida segun el id de platillo en relacion con el ingrediente -->

          </tr>

        </tbody>
      </table>
    <br/>
    <br/>
    <br/>
    <div class="row center-align">
        <div class="col s6">
            <a class="waves-effect waves-light btn-large blue lighten-2" onClick="imprimir();"><i class="material-icons right">local_printshop</i>Imprimir</a>
        </div>
        <div class="col s6">
            <a href="javascript:history.back(-1)" class="waves-effect waves-light btn-large black center-align"><i class="material-icons right">keyboard_return</i>Volver a inicio</a>
        </div>
    </div>
    
    
</div>

</body>