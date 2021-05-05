<script src="js/jquery-3.3.1.js"></script>
<script>

$(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
<?php 

$dondeestoy='3';
    require('header.php');
    require('conexion.php');

    $sql="SELECT *,proveedor.des_proveedor,unidad.des_unidad FROM `enpaque` INNER JOIN proveedor ON proveedor.id_proveedor=enpaque.id_proveedor INNER JOIN unidad ON unidad.id_unidad=enpaque.id_unidad WHERE `nombre` NOT LIKE 'Ninguno' ORDER BY `nombre` DESC;";
    $resultado_empaque = mysqli_query($link,$sql) or die(mysqli_error($link));
    $sql_proveedores="SELECT * FROM `proveedor` WHERE `des_proveedor` NOT LIKE 'Ninguno' ";
    $resultado_proveedores= mysqli_query($link,$sql_proveedores) or die (mysqli_error($link));



?>
<div class="container">
<div class="row">
 <div  class="col s12">
        </br>
        <h2>Empaques</h2>
        </br>
        </br>
       <div class="center"><a href="nuevo_empaque.php" class="center waves-effect waves-light btn">A&ntilde;adir nuevo empaque</a></div>
        </br>
        </br>
        </br>
        <table class="responsive-table">
        <thead>
          <tr>
              <th >Nombre</th>
              <th >Código</th>
              <th >Capacidad</th>
              <th >Precio presentacion</th>
              <th >Cantidad presentacion</th>
              <th >Precio unitario</th>
              <th >Proveedor</th>
              <th >Descripci&oacute;n</th>
              <th >Editar</th>
              <th >Borrar</th>
          </tr>
        </thead>

        <tbody>
            <?php
			while($row2 = mysqli_fetch_array($resultado_empaque)):
			?>
          <tr>
            <td ><?php echo $row2['nombre']; ?></td>
            <td ><?php echo $row2['codigo']; ?></td>
            <td ><?php echo $row2['capacidad']; ?></td>
            <td ><?php echo $row2['precio_presentacion']; ?></td>
            <td ><?php echo $row2['cantidad_presentacion']; ?></td>
            <td ><?php echo $row2['precio_unitario']; ?></td>
            <td ><?php echo $row2['des_proveedor']; ?></td>
            <td ><?php echo $row2['descripcion']; ?></td>
            
            <td ><a href="editar_empaque.php?id=<?php echo $row2['id_empaque']; ?>"><i class="material-icons">edit</i></a></td>
            <td ><a href="eliminar_empaque.php?id=<?php echo $row2['id_empaque']; ?>"><i class="material-icons">delete</i></a></td>
          </tr>
            <?php
				endwhile;
            ?>
        </tbody>
      </table> 
        
    </div>
</div>

<div class="row ">
 <div  class="col m6 s12">
        </br>
        <h2>Proveedores</h2>
        </br>
        </br>
       <div class="center"><a href="anadir_proveedor.php" class="center waves-effect waves-light btn">A&ntilde;adir nuevo proveedor</a></div>
        </br>
        </br>
        </br>
        
  <ul class="collapsible ">
      <?php
			while($row = mysqli_fetch_array($resultado_proveedores)):
			?>
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i><?php echo $row['des_proveedor']; ?></div>
      <div class="collapsible-body">
          <span><a href="editar_proveedor.php?id=<?php echo $row['id_proveedor']; ?>"> <i class="material-icons">edit</i> Editar</a></span><br/>
          <span><a href="eliminar_proveedor.php?id=<?php echo $row['id_proveedor']; ?>"><i class="material-icons">delete</i> Eliminar </a></span>  
        </div>
    </li>
      <?php
				endwhile;
            ?>
  </ul>   
    </div>
</div>
</div>
<!--JavaScript at end of body for optimized loading-->
    </div>
      <script type="text/javascript" src="js/materialize.min.js"></script>
        
    </body>
  </html>
        