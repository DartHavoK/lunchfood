

  <?php 
    require ('header.php'); 
    require ('conexion.php');

    

    $sql_platillos="SELECT `id_platillo`,`categoria_platillo`,`nombre_platillo` FROM `platillo` WHERE `nombre_platillo` NOT LIKE 'Ninguno' AND `categoria_platillo` = 1 ORDER BY `nombre_platillo`  ";
    $resultado_platillo = mysqli_query($link,$sql_platillos) or die(mysqli_error($link));
    
    /*$sql_ingredientes='SELECT `id_ingredientes`,`codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario`,unidad.des_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad ORDER BY ingredientes.id_ingredientes DESC ';
    $resultado = mysqli_query($link,$sql_ingredientes) or die(mysqli_error($link));*/
    
    
    ?>
    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs();
        });
        </script>

<?php //inicio auto refresh

$sql_cons_ingredientes="SELECT id_ingredientes, costo_unitario FROM ingredientes ";
$sql_datos_ingredientes = mysqli_query($link,$sql_cons_ingredientes);
$res_ingredientes = mysqli_fetch_array($sql_datos_ingredientes);

//Obtenemos el id de cada platillo que se imprime
$sql_idplatillo="SELECT `id_platillo`,`categoria_platillo` FROM `platillo` WHERE `nombre_platillo` NOT LIKE 'Ninguno' AND  `categoria_platillo` = 1 ORDER BY `id_platillo` ASC";
    $resultado_platillo_comp = mysqli_query($link,$sql_idplatillo);
    while ($sacaid = mysqli_fetch_array($resultado_platillo_comp)) {
      $id = $sacaid['id_platillo'];

$sql_dato_compara="SELECT `id_ingrediente`,platillo.id_platillo,`peso_bruto`,`peso_neto`,coste_ingrediente,`merma`,`coste_unitario`,`coste_neto`,`pax_pesos`,ingredientes.codigo,ingredientes.nombre_ingrediente,unidad.des_unidad,platillo.costo_neto,`id_relacion`,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN ingredientes ON platillo_ingrediente.id_ingrediente = ingredientes.id_ingredientes INNER JOIN platillo ON platillo_ingrediente.id_platillo = platillo.id_platillo INNER JOIN unidad ON unidad.id_unidad = ingredientes.id_unidad INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE platillo_ingrediente.id_platillo  = '$id' ";
    $get_autorefresh = mysqli_query($link,$sql_dato_compara);//para obtener datos de ingredientes para el link    

//Obtenemos datos a comparar, se compara el precio anterior con el nuevo
$sql_consulta_platillos="SELECT `costo_unitario`, platillo_ingrediente.coste_unitario FROM `ingredientes` INNER JOIN platillo_ingrediente ON ingredientes.id_ingredientes = platillo_ingrediente.id_ingrediente WHERE platillo_ingrediente.id_platillo = '$id' ";
$sql_datos_platillos = mysqli_query($link,$sql_consulta_platillos);

  
while($res_platillo = mysqli_fetch_array($sql_datos_platillos) and $autorefresh = mysqli_fetch_array($get_autorefresh)) {
  //solo usar en debug
 //echo "ID ingrediente t/ing".$res_platillo['costo_unitario']."<br />";
// echo "ID ingrediente t/pla".$res_platillo['coste_unitario']."<br /><br />";

if ($res_platillo['costo_unitario'] != $res_platillo['coste_unitario']) {
 echo "ID Platillo".$id."<br />";
 echo "Estos ingredientes han cambiado: ID->".$res_platillo['id_ingrediente']."Costo nuevo->".$res_platillo['costo_unitario']."   Costo anterior->".$res_platillo['coste_unitario']."<br /><br />";
?>

<script language="JavaScript">
//alert("La información esta siendo actualizada, en un momento se mostrara la información solicitada...");
window.location="escandallo_editar.php?cat_platillo=1id_platillo=<?php echo $autorefresh['id_platillo']; ?>&id_rel=<?php echo $autorefresh['id_relacion']; ?>&id_ingre=<?php echo $autorefresh['id_ingrediente']; ?>&autorefresh=1";
</script>"

<?php 
  } 

}//fin segundo while

}//fin primer while
//fin auto refresh ?>
  

        
    <div class="container">
  <!--<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">JavaScript</a></li>
  </ul>-->
        
        <!--platillos-->
    <div  class="col s12">
        </br>
        <h2>Entradas</h2>
        </br>
        </br>
        <p id="mensaje"></p>
       <div class="center"><a href="nueva_entrada.php" class="center waves-effect waves-light btn">Añadir nueva entrada</a></div>

       <!--<div class="right"><button onclick="autoRefresh()" class="center waves-effect waves-light btn">Actualizar precios</button></div>-->
        </br>
        </br>
        </br>
        <table class="responsive-table">
        <thead>
          <tr>
              <th >Nombre de Entrada</th>
              <th >Escandallo</th>
              <th >Ficha tecnica</th>
              <th >Pax $</th>
              <th >Añadir ingredientes</th>
              <th >Editar</th>
              <th >Borrar</th>
          </tr>
        </thead>

        <tbody>
            <?php
			while($row2 = mysqli_fetch_array($resultado_platillo)):
			?>
          <tr>
            <td ><?php echo $row2['nombre_platillo']; ?></td>
            <td ><a href="escandallo.php?id=<?php echo $row2['id_platillo'] ?>"><i class="material-icons center-align">developer_board</i></a></td>
            <td ><a href="ficha_tecnica.php?id=<?php echo $row2['id_platillo']  ?>"><i class="material-icons center-align">import_contacts</i></a></td>
            <td >
            <?php
              $id=$row2['id_platillo'];
              $sql_get_pax="SELECT SUM(`pax_pesos`) AS suma FROM `platillo_ingrediente` WHERE `id_platillo`='$id';";
              $get_pax = mysqli_query($link,$sql_get_pax);
              $pax_pesos = mysqli_fetch_assoc($get_pax);
                   echo round( $pax_pesos['suma'],3,PHP_ROUND_HALF_UP);
            ?>
            </td>
            <td ><a href="anadir_ingredientes.php?id=<?php echo $row2['id_platillo']  ?>"><i class="material-icons center-align">forward</i></a></td>
            <td ><a href="actualizar_platillos.php?id=<?php echo $row2['id_platillo'] ?>"><i class="material-icons">edit</i></a></td>
            <td ><a href="eliminar.php?id_plat=<?php echo $row2['id_platillo'].'&cat='.$row2['categoria_platillo'] ?>"><i class="material-icons">delete</i></a></td>
          </tr>
            <?php
				endwhile;
            ?>
        </tbody>
      </table> 
        
    </div>
        
        <!--Ingredientes
  <div id="ingredientes" class="col s12">
      
      </br>
        </br>
        <h2>Ingredientes</h2>
        </br>
       <div class="center"><a href="nuevo_ingrediente.php"  class="center waves-effect waves-light btn">A&ntilde;adir nuevo ingrediente</a></div>
        </br>
        </br>
        </br>
      <table>
        <thead>
          <tr>
              <th>Nombre ingrediente</th>
              <th>Clave</th>
              <th>Cantidad</th>
              <th>Unidad</th>
              <th>Precio unitario</th>
              <th>Precio total</th>
              <th>Editar</th>
              <th>Borrar</th>
          </tr>
        </thead>
          <?php
			 //while($row = mysqli_fetch_array($resultado)):
			?>
        <tbody>
          <tr>
            
            <td><?php // echo $row['nombre_ingrediente']; ?></td>
            <td><?php  //echo $row['codigo']; ?></td>
            <td><?php  //echo $row['cantidad']; ?></td>
            <td><?php  //echo $row['des_unidad']; ?></td>
            <td><?php  //echo $row['costo_unitario']; ?></td>
            <td><?php // echo $row['costo_presentacion']; ?></td>
            <td><a href="actualizar_ingre.php?id=<?php  //echo $row['id_ingredientes']; ?>"><i class="material-icons">edit</i></a></td>
            <td><a href="eliminar_ingre.php?id_ingre=<?php  //echo $row['id_ingredientes']; ?>"><i class="material-icons">delete</i></a></td>
          </tr>
        </tbody>
           <?php
				 //endwhile;
            ?>
      </table>
    </div>-->
 
        
          

      <!--JavaScript at end of body for optimized loading-->
    </div>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>