<!DOCTYPE html>
<script src="js/jquery-3.3.1.js"></script>
  <?php 
    require('header.php'); 
    require('conexion.php');

    $sql_platillos="SELECT `id_platillo`,`nombre_platillo` FROM `platillo` WHERE `nombre_platillo`NOT LIKE 'Ninguno' ORDER BY `nombre_platillo`  ";
    $resultado_platillo = mysqli_query($link,$sql_platillos) or die(mysqli_error($link));
    
    $sql_ingredientes='SELECT `id_ingredientes`,`codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario`,unidad.des_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad ORDER BY ingredientes.id_ingredientes DESC ';
    $resultado = mysqli_query($link,$sql_ingredientes) or die(mysqli_error($link));
    
    
    ?>
    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs();
        });
        </script>
    <div class="container">
  <!--<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">JavaScript</a></li>
  </ul>-->
        
        <!--platillos-->
    <div  class="col s12">
        </br>
        <h2>Platillos</h2>
        </br>
        </br>
       <div class="center"><a href="nuevo_platillo.php" class="center waves-effect waves-light btn">Añadir nueva Guarnición</a></div>
        </br>
        </br>
        </br>
        <table class="responsive-table">
        <thead>
          <tr>
              <th >Nombre de Guarnición</th>
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
            <td ><a href="eliminar.php?id_plat=<?php echo $row2['id_platillo'] ?>"><i class="material-icons">delete</i></a></td>
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