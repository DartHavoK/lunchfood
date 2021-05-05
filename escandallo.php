<?php 
    
    require('header.php');
    require('conexion.php');

    $id=$_GET['id'];
    //echo $id;
    


    $sql_datosplatillo="SELECT `id_platillo`,`nombre_platillo`,`porciones`,`tiempo_preparacion`,`costo_neto`, `categoria_platillo` FROM `platillo` WHERE `id_platillo`='$id' ";
    $get_dato_platillo = mysqli_query($link,$sql_datosplatillo);
    $platillo = mysqli_fetch_assoc($get_dato_platillo);

    $sql_dato_ingre="SELECT `id_ingrediente`,platillo.id_platillo,`peso_bruto`,`peso_neto`,coste_ingrediente,`merma`,`coste_unitario`,`coste_neto`,`pax_pesos`,ingredientes.codigo,ingredientes.nombre_ingrediente,unidad.des_unidad,platillo.costo_neto,`id_relacion`,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo = platillo.id_platillo INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE platillo_ingrediente.id_platillo  = '$id' ";
    $get_dato_ingre = mysqli_query($link,$sql_dato_ingre);

    
/* 
inicio autorefhers-no se usa este- 
    $sql_dato_compara="SELECT `id_ingrediente`,platillo.id_platillo,`peso_bruto`,`peso_neto`,coste_ingrediente,`merma`,`coste_unitario`,`coste_neto`,`pax_pesos`,ingredientes.codigo,ingredientes.nombre_ingrediente,unidad.des_unidad,platillo.costo_neto,`id_relacion`,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo = platillo.id_platillo INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE platillo_ingrediente.id_platillo  = '$id' ";
    $get_autorefresh = mysqli_query($link,$sql_dato_compara);//para obtener datos de ingredientes para el link
    //$autorefresh= mysqli_fetch_assoc($get_autorefresh);


    $sql_costo_neto="SELECT SUM(`coste_ingrediente`) as suma, SUM(`pax_pesos`) as suma_pax FROM `platillo_ingrediente` WHERE `id_platillo`='$id' ";
    $cosoto_neto= mysqli_query($link,$sql_costo_neto);
    $neton= mysqli_fetch_assoc($cosoto_neto);
    

    //Verifica si cambio el precio de un ingrediente

   $sql_comparativo="SELECT `costo_unitario`, platillo_ingrediente.coste_unitario FROM `ingredientes` INNER JOIN platillo_ingrediente ON ingredientes.id_ingredientes = platillo_ingrediente.id_ingrediente WHERE platillo_ingrediente.id_platillo = '$id' ";
    $costo_ing_nuevo = mysqli_query($link,$sql_comparativo);
    //$resultado= mysqli_fetch_assoc($costo_ing_nuevo);
    //$res= mysqli_fetch_array($resultado); 

//Si el ingrediente cambia en diferentes escandallos, el loop sigue comparando hasta que todos esten actualizados 
 while($res = mysqli_fetch_array($costo_ing_nuevo) and $autorefresh = mysqli_fetch_array($get_autorefresh)){
//echo "precio ingredientes: ".$res['costo_unitario']."<br />";
//echo "precio platillo_ingrediente: ".$res['coste_unitario']."<br />"."<br />";

if ($res['costo_unitario'] != $res['coste_unitario']) {
//echo "se envia formulario ...";
?>

<script language="JavaScript">
//alert("La información esta siendo actualizada, en un momento se mostrara la información solicitada...");
window.location="escandallo_editar.php?id_platillo=<?php echo $autorefresh['id_platillo']; ?>&id_rel=<?php echo $autorefresh['id_relacion']; ?>&id_ingre=<?php echo $autorefresh['id_ingrediente']; ?>&autorefresh=1";
</script>"
<?php   
  }
}

Fin de autorefgresh-no usar- */
?>



<div class="container">
      <table>
        <thead>
          <tr>
              <th>Platillo  </th>
              <th><?php echo $platillo['nombre_platillo']; ?></th> <!-- Atraccion segun el id de la tabla platillo -->
              <th>Porciones:  </th>
              <th><?php echo $platillo['porciones']; ?></th> <!-- Atraccion segun el id de la tabla platillo -->
              <th>Tiempo de preparacion</th>
              <th><?php echo $platillo['tiempo_preparacion']." Minutos "; ?></th> <!-- Atraccion segun el id de la tabla platillo -->
            </tr>
            
        </thead>
</table>
<hr/>
      <table class="responsive-table">
        <thead>
          <tr>
              <th>Clave</th>
              <th>Ingrediente</th>
              <th>Unidad</th>
              <th>Cantidad bruta</th>
              <th>Merma</th>
              <th>Cantidad Neta</th>
              <!--<th>Coste bruto ing</th>-->
              <th>Coste bruto</th>
              <th>Coste neto</th>
              <th>Coste ingrediente</th>
              <th>pax ($)</th>
              <th>pax (%)</th>
            <?php if($_SESSION['tipo_usuario']==1) { ?>  
              <th>Editar</th>
            <?php } ?>
              <th>Eliminar</th>
              
          </tr>
        </thead>

        <tbody>
            <?php
			while($row2 = mysqli_fetch_array($get_dato_ingre)):

			?>
          <tr>
            <td><?php echo $row2['codigo']; ?></td>
            <td><?php echo $row2['nombre_ingrediente']; ?></td>
            <td><?php echo $row2['des_unidad']; ?></td>
            <td><?php echo $row2['peso_bruto']; ?></td>
            <td><?php echo $row2['merma']." | ".$row2['melma']; ?></td>
            <td><?php echo round( (FLOAT)$row2['peso_neto'],3,PHP_ROUND_HALF_UP); ?></td>
            <!--<td><?//php echo round((FLOAT)$row2['costo_unitario'],3,PHP_ROUND_HALF_UP);?></td>-->
            <td><?php echo round((FLOAT)$row2['coste_unitario'],3,PHP_ROUND_HALF_UP);?></td>
            <td><?php echo round((FLOAT)$row2['coste_neto'],3,PHP_ROUND_HALF_UP) ; ?></td>
            <td><?php echo round((FLOAT)$row2['coste_ingrediente'],3,PHP_ROUND_HALF_UP); ?></td>
            <td><?php echo round( (FLOAT)$row2['pax_pesos'], 3, PHP_ROUND_HALF_UP); ?></td>
            <td><?php echo round(((FLOAT)$row2['coste_neto'] / (FLOAT)$neton['suma'])*100,3,PHP_ROUND_HALF_UP); ?></td>
            <?php if($_SESSION['tipo_usuario']==1) { ?>  
            <td><a href="escandallo_editar.php?id_platillo=<?php echo $row2['id_platillo']; ?>&id_rel=<?php echo $row2['id_relacion']; ?>&id_ingre=<?php echo $row2['id_ingrediente']; ?>"><i class="material-icons">edit</i></a></td>
           <?php } ?> 
            <td><a href="escandillo_eliminar_rel.php?id_platillo=<?php echo $row2['id_platillo']; ?>&id_rel=<?php echo $row2['id_relacion']; ?>&id_ingre=<?php echo $row2['id_ingrediente'];?>"><i class="material-icons">delete</i></a></td>
            <?php
				endwhile;
            ?>
          </tr>
        </tbody>
      </table>
    <br/>
    <div class="row right-align">
        <div class="col s6">
            <table>
        <thead>
            <tr>
                <th>Total neto</th>
                <th>
                    <?php echo round($neton['suma'],3,PHP_ROUND_HALF_UP); ?>
                </th>
            </tr>
                </thead>
            </table>
        </div>
        <div class="col s6">
            <table>
        <thead>
            <tr>
                <th>Total Pax pesos</th>
                <th>
                    <?php echo round($neton['suma_pax'],3,PHP_ROUND_HALF_UP); ?>
                </th>
            </tr>
                </thead>
            </table>
        </div>
        
    </div>
    <br/>
    <br/>
    <div class="row center-align">
        <div class="col s12">
          <?php 
        if ($platillo['categoria_platillo'] == 1) {
            echo "<a href='entradas.php' class='waves-effect waves-light btn-large black center-align'><i class='material-icons right'>keyboard_return</i>Volver a inicio</a>";
        }elseif ($platillo['categoria_platillo'] == 2) {
            echo "<a href='platillos.php' class='waves-effect waves-light btn-large black center-align'><i class='material-icons right'>keyboard_return</i>Volver a inicio</a>";
        }else{
            echo "<a href='guarniciones.php' class='waves-effect waves-light btn-large black center-align'><i class='material-icons right'>keyboard_return</i>Volver a inicio</a>";
        }

         ?>



        <!--<a href="javascript:history.back(-1)" class="waves-effect waves-light btn-large black center-align"><i class="material-icons right">keyboard_return</i>Volver a inicio</a>-->
        </div>
    </div>
    <tr>
              <th>No. Revisi&oacute;n</th>
              <th>001</th>
          </tr>
    
</div>