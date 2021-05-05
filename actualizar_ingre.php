<!DOCTYPE html>
  <html>
      
      
      
      <?php 
        require'header.php';
        require'conexion.php';
      
        $id_ingre=$_GET['id'];
        $sql_ingre="SELECT `codigo`,`cantidad`,`categoria_ing`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario`,`cantidad_almacen`,`cant_resurtir`, `cant_max_almacen`,unidad.des_unidad,unidad.id_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad WHERE id_ingredientes = '$id_ingre'  ";
        $get_dato_ingre = mysqli_query($link,$sql_ingre);
        $ingre = mysqli_fetch_assoc($get_dato_ingre);
          
        $sql_unidades=" SELECT * FROM `unidad` ";
        $resultado = mysqli_query($link,$sql_unidades) or die(mysqli_error($link));

//$categoria_ing = $_POST['cat_prod'];

      ?>
    
      
    <div class="container">
    <h2>Actualizar ingrediente</h2>
    <form id="ingredientes" name="ingredientes" action="update_ingre.php" method="post">
    <div class="row">
        <div class="input-field col m4 s12">
            <select id="cat_prod" name="cat_prod" class="browser-default" required>
                <option value="<?php echo $ingre['categoria_ing'];  ?>" selected><?php echo $ingre['categoria_ing'];  ?></option>
                <option value="ABA" >Abarrotes</option>
                <option value="CAB" >Carne blanca</option>
                <option value="CAR" >Carne roja</option>
                <option value="EMB" >Embutidos</option>
                <option value="FRU" >Frutas</option>
                <option value="LAC" >Lácteos</option>
                <option value="MAR" >Mariscos</option>               
                <option value="TYT" >Tortillas y tosatadas</option>                
                <option value="PAN" >Panadería</option>                
                <option value="VEG" >Vegetales</option> 
                
            </select>              
        </div>
        <div class="input-field col m4 s12">
          <input id="nombre_ingrediente" name="nombre_ingrediente" value="<?php echo $ingre['nombre_ingrediente'];  ?>" type="text" class="validate" required>
          <label class="active" for="first_name2">Nombre del ingrediente</label>
        </div>
        <!--<div class="input-field col m4 s12">
          <input id="codigo" name="codigo" type="text" class="validate" value="<?php echo $ingre['codigo'];  ?>" required>
          <label class="active" for="first_name2">Codigo del ingrediente</label>
        </div>-->
    </div>
    <div class="row">
    <div class="input-field col m6 s12">
        <input id="cantidad" name="cantidad" type="number" value="<?php echo $ingre['cantidad'];  ?>" class="validate" onKeyUp="Suma()" step="any" required>
        <label class="active" for="first_name2">Cantidad</label>
    </div>
    <div class="input-field col m6 s12">
        <select id="unidad" name="unidad" class="browser-default" required>
      <option value="<?php echo $ingre['id_unidad'];  ?>" selected><?php echo $ingre['des_unidad'];  ?></option>
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
     <?php //if($_SESSION['tipo_usuario']!=2) { ?>   
    <div class="input-field col m6 s12 center">
        <input id="ppresentacion" name="ppresentacion" type="number" class="validate" value="<?php echo $ingre['costo_presentacion'];  ?>" onKeyUp="Suma()" step="any required">
        <label class="active" for="first_name2">Precio de presentacion</label>
    </div>
        
        
    <div class="input-field col m6 s12 center">
        <input id="punitario" name="punitario" type="number" value="<?php echo $ingre['costo_unitario'];  ?>" readonly step="any">
        <label class="active" for="first_name2">Precio unitario</label>
    </div>
     

    <div class="input-field col m6 s12 center">
        <input id="cant_almacen" name="cant_almacen" type="number" value="<?php echo $ingre['cantidad_almacen'];  ?>">
        <label class="active" for="first_name2">Cantidad en almacen</label>
    </div>
     

    <div class="input-field col m6 s12 center">
        <input id="resurtido" name="resurtido" type="number" value="<?php echo $ingre['cant_resurtir'];  ?>" >
        <label class="active" for="first_name2">Punto de resurtido</label>
    </div>
     

    <div class="input-field col m6 s12 center">
        <input id="cant_max" name="cant_max" type="number" value="<?php echo $ingre['cant_max_almacen'];  ?>" >
        <label class="active" for="first_name2">Cantidad máxima en almacen</label>
    </div>
     <?php //} ?>

    </div> 
        <div class="row" style="visibility: hidden;">
        <div class="col m4 s12" >
            <input type="number" value="<?php echo $id_ingre ?>" id="id" name="id" readonly>
        </div>
        </div>
        <!--<div class="row" style="visibility: hidden;">
            <div class="col m4 s12" >
                <input type="number" value="<?php echo $ingre['id_categoria']; ?>" id="id_categoria" name="id_categoria" readonly>
            </div>
        </div>-->
    </form> 
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="ingredientes" value="choose">Subir ingrediente
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="col s6">
                <a href="ingredientes.php" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
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