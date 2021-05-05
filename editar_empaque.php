<!DOCTYPE html>
  <html>
      
      
      
      <?php 
        require'header.php';
        require'conexion.php';
      
        $id = $_GET['id'];
      
        $sql_datos="SELECT *,unidad.id_unidad,unidad.des_unidad,proveedor.id_proveedor,proveedor.des_proveedor FROM `enpaque` INNER JOIN unidad ON unidad.id_unidad=enpaque.id_unidad INNER JOIN proveedor ON proveedor.id_proveedor=enpaque.id_proveedor WHERE `id_empaque` ='$id'; ";
        $get_datos = mysqli_query($link,$sql_datos);
        $datos = mysqli_fetch_assoc($get_datos);
          
        $sql_unidades=" SELECT * FROM `unidad` ";
        $resultado = mysqli_query($link,$sql_unidades) or die(mysqli_error($link));
      
        $sql_proveedores=" SELECT * FROM `proveedor`";
        $resultado_proveedores = mysqli_query($link,$sql_proveedores) or die(mysqli_error($link));
      ?>
    
      
    <div class="container">
    <h2>Ingresar nuevo empaque</h2>
        
    <form id="ingredientes" name="ingredientes" action="update_empaque.php?id=<?php echo  $id ?>" method="post">
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="nombreempque" name="nombreempque" type="text" class="validate" value="<?php echo $datos['nombre']; ?>" required>
      <label class="active" for="first_name2">Nombre del empaque</label>
    </div>
    <div class="input-field col m6 s12">
      <input id="codigo" name="codigo" type="text" class="validate" value="<?php echo $datos['codigo']; ?>" required>
      <label class="active" for="first_name2">Codigo del empaque</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="capacidad" name="capacidad" type="text" class="validate" value="<?php echo $datos['capacidad']; ?>" required>
      <label class="active" for="first_name2">Capacidad</label>
    </div>
    <div class="input-field col m6 s12">
        <select id="unidad" name="unidad" class="browser-default" required>
      <option value="<?php echo $datos['id_unidad']; ?>"  selected><?php echo $datos['des_unidad']; ?></option>
      <option value="" disabled >Unidad de medida</option>
    <?php
			while($row = mysqli_fetch_array($resultado)):
			
		?>
      <option value="<?php echo $row['id_unidad'] ?>" ><?php echo $row['des_unidad']; ?></option>
            
    <?php
				endwhile;
            ?>
    </select>
    </div> 
    </div>
    <div class="row">
    <div class="input-field col m6 s12">
        <input id="cantidad" name="cantidad" type="number" class="validate" onKeyUp="Suma()" step="any" value="<?php echo $datos['cantidad_presentacion']; ?>" required>
        <label class="active" for="first_name2">Cantidad presentacion</label>
    </div>
    
    
    </div>
    <?php if($_SESSION['tipo_usuario']!=2) { ?>
    <div class="row">
    <div class="input-field col m6 s12 center">
        <input id="ppresentacion" name="ppresentacion" type="number" class="validate" onKeyUp="Suma()" value="<?php echo $datos['precio_presentacion']; ?>" required>
        <label class="active" for="first_name2">Precio de presentacion</label>
    </div>
        
        
    <div class="input-field col m6 s12 center">
        <input id="punitario" name="punitario" type="number" readonly step="any" value="<?php echo $datos['precio_unitario']; ?>">
        <label class="active" for="first_name2">Precio unitario</label>
    </div>
        
    </div>
    <?php } ?>  
    <div class="row">
        <div class="input-field col m6 s12">
        <select id="proveedor" name="proveedor" class="browser-default" required>
      <option value="<?php echo $datos['id_proveedor']; ?>"  selected><?php echo $datos['des_proveedor']; ?></option>
      <option value="" disabled>Proveedores</option>
    <?php
			while($row2 = mysqli_fetch_array($resultado_proveedores)):
			
		?>
      <option value="<?php echo $row2['id_proveedor'] ?>" ><?php echo $row2['des_proveedor']; ?></option>
            
    <?php
				endwhile;
            ?>
    </select>
    </div> 
    <div class="input-field col m6 s12">
          <textarea id="notas" name="notas" class="materialize-textarea" data-length="250"><?php echo $datos['descripcion']; ?></textarea>
          <label for="textarea1">Notas</label>
</div>
    </div>
    </form> 
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="ingredientes" value="choose">Editar empaque
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="col s6">
                <a href="empaques.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
            </div>
        </div>
            
    </div>
    </div>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
            $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                    }
                    });
                    });
        </script>
        
        <script>
        //Función que realiza la suma
            function Suma() {
                var ingreso1 = document.ingredientes.cantidad.value;
                var ingreso2 = document.ingredientes.ppresentacion.value;
            try{
        //Calculamos el número escrito:
            ingreso1 = (isNaN(parseFloat(ingreso1)))? 0 : parseFloat(ingreso1);
            ingreso2 = (isNaN(parseFloat(ingreso2)))? 0 : parseFloat(ingreso2);
            document.ingredientes.punitario.value = ingreso2/ingreso1;
            }
        //Si se produce un error no hacemos nada
            catch(e) {}
            }
</script>
    </body>
  </html>