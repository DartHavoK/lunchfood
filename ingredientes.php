 <!DOCTYPE html>
<script src="js/jquery-3.3.1.js"></script>
  <?php 

    $dondeestoy= "1";
    require('header.php'); 
    require('conexion.php');

    $sql_platillos="SELECT `id_platillo`,`nombre_platillo` FROM `platillo` ";
    $resultado_platillo = mysqli_query($link,$sql_platillos) or die(mysqli_error($link));
    
    $sql_ingredientes='SELECT `id_ingredientes`,`codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario`, `cantidad_almacen`,`cant_resurtir`, `cant_max_almacen`,unidad.des_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad ORDER BY ingredientes.nombre_ingrediente ASC ';
    $resultado = mysqli_query($link,$sql_ingredientes) or die(mysqli_error($link));
    
    
    ?>
    
    <div class="container">
  <!--<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">JavaScript</a></li>
  </ul>-->
        
        <!--platillos
    <div id="platillos" class="col s12">
        </br>
        <h2>Platillos</h2>
        </br>
        </br>
       <div class="center"><a href="nuevo_platillo.php" class="center waves-effect waves-light btn">A&ntilde;adir nuevo platillo</a></div>
        </br>
        </br>
        </br>
        <table>
        <thead>
          <tr>
              <th>Nombre de Platillo</th>
              <th>Escandallo</th>
              <th>Ficha tecnica</th>
              <th>Añadir ingredientes</th>
              <th>Editar</th>
              <th>Borrar</th>
          </tr>
        </thead>

        <tbody>
            <?php
			//while($row2 = mysqli_fetch_array($resultado_platillo)):
			?>
          <tr>
            <td><?php //echo $row2['nombre_platillo']; ?></td>
            <td><a href="escandallo.php?id=<?php //echo $row2['id_platillo'] ?>"><i class="material-icons center-align">developer_board</i></a></td>
            <td><a href="ficha_tecnica.php?id=<?php //echo $row2['id_platillo']  ?>"><i class="material-icons center-align">import_contacts</i></a></td>
            <td><a href="anadir_ingredientes.php?id=<?php //echo $row2['id_platillo']  ?>"><i class="material-icons center-align">forward</i></a></td>
            <td><a href="actualizar_platillos.php?id=<?php //echo $row2['id_platillo'] ?>"><i class="material-icons">edit</i></a></td>
            <td><a href="eliminar.php?id_plat=<?php //echo $row2['id_platillo'] ?>"><i class="material-icons">delete</i></a></td>
          </tr>
            <?php
				//endwhile;
            ?>
        </tbody>
      </table> 
        
    </div>-->
        
        <!--Ingredientes-->
  <div id="ingredientes" class="col s12">
      
      </br>
        </br>
        <h2>Ingredientes</h2>
        </br>

       <div class="center"><a href="nuevo_ingrediente.php"  class="center waves-effect waves-light btn">A&ntilde;adir nuevo ingrediente</a> 

        <div class="right"><a  href="ingredientes_reporte.php"  class="center waves-effect waves-light btn">Descargar excel</a></div>
       </div>
       
        </br>
        </br>
        </br>
      <table class="responsive-table">
        <thead>
          <tr>
              <th>Nombre ingrediente</th>
              <th>Clave</th>
              <th>Cantidad</th>
              <th>Unidad</th>
              <th>Precio unitario</th>
              <th>Precio total</th>
              <th>Cantidad en almacen</th>
              <th>punto de reabastecimiento</th>
              <th>Cantidad máxima en almacen</th>
              <th>Editar</th>
              <th>Borrar</th>
          </tr>
        </thead>
          <?php
			while($row = mysqli_fetch_array($resultado)):
			?>
        <tbody>
          <tr>
            
            <td><?php echo $row['nombre_ingrediente']; ?></td>
            <td><?php echo $row['codigo']; ?></td>
            <td><?php echo round( (FLOAT)$row['cantidad'],3,PHP_ROUND_HALF_UP); ?></td>
            <!--<td><?php echo $row['cantidad']; ?></td>-->
            <td><?php echo $row['des_unidad']; ?></td>
            <td><?php echo $row['costo_unitario']; ?></td>
            <td><?php echo $row['costo_presentacion']; ?></td>
            <td><?php echo $row['cantidad_almacen']; ?></td>
            <td><?php echo $row['cant_resurtir']; ?></td>
            <td><?php echo $row['cant_max_almacen']; ?></td>
            <td><a href="actualizar_ingre.php?id=<?php echo $row['id_ingredientes']; ?>"><i class="material-icons">edit</i></a></td>
            <td><a href="eliminar_ingre.php?id_ingre=<?php echo $row['id_ingredientes']; ?>"><i class="material-icons">delete</i></a></td>
          </tr>
        </tbody>
           <?php
				endwhile;
            ?>
      </table>
    </div>
 
        
          

      <!--JavaScript at end of body for optimized loading-->
    </div>
      <script type="text/javascript" src="js/materialize.min.js"></script>
        
    </body>
  </html>