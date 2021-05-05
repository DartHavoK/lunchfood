<?php

require('conexion.php');
require('header.php');

    $id_libre= $_GET['id'];
    
    if(isset($_GET['id_ingrediente'])){
        $id_ingrediente =$_GET['id_ingrediente'];
        $sql_get_ingredientes = "SELECT `id_ingredientes`,`codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario` ,unidad.des_unidad,unidad.id_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad WHERE `id_ingredientes`='$id_ingrediente' ORDER BY nombre_ingrediente ASC";
        $get_igredientes = mysqli_query($link,$sql_get_ingredientes);
        $nombreingrediente = mysqli_fetch_assoc($get_igredientes);
        $ingre="1";
    }else{
        echo "Esperando ingrediente";
        $ingre ="0";
    }
    

    $definir_platillo = "SELECT nombre_platillo,porciones,id_platillo,categoria_platillo from platillo where id_platillo ='$id_libre' ";
    $obtener_platillo = mysqli_query($link,$definir_platillo);
    $nombredelplatillo = mysqli_fetch_assoc($obtener_platillo);

    
echo "<div class='container center_align'><h3>Estas trabajando con el platillo ". $nombredelplatillo['nombre_platillo']."</h3></div>" ;
    
    $sql_ingredientes="SELECT * FROM `ingredientes` ORDER BY nombre_ingrediente ASC ";
    $obtener_ingredientes = mysqli_query($link,$sql_ingredientes);
?>
<div class="container">
    
<div class="row">
   <form id="ingredientes" action="anadir_ingredientes.php" method="get">
    <div class=" col m6 s12">
    <div style="visibility: hidden;">
        <input type="number" value="<?php echo $id_libre ?>" id="id" name="id">
    </div> 
    <label>Selecciona el ingrediente</label>
  <select class="browser-default" id="id_ingrediente" name="id_ingrediente" <?php if($ingre=="1"){ ?> <?php  }else{  ?>required <?php } ?>>
    <option value="" disabled selected>Elije un ingrediente</option>
    <?php
		while($row = mysqli_fetch_array($obtener_ingredientes)):
      ?>
    <option value="<?php echo $row['id_ingredientes']; ?>"><?php echo $row['nombre_ingrediente']; ?></option>
    <?php
      endwhile;
    ?>
  </select>
       
    </div>
    
    </form>
    <div class="col m6 s12">
       <br/>
       <br/>
       <br/>
        <button class="btn waves-effect waves-light" type="submit" name="action" form="ingredientes" value="choose">Obtener datos
            <i class="material-icons right">send</i>
        </button>
        
    </div>
    </div>
    <?php if($ingre=="1"){ ?>
    <div class="row">
       <div class="col m8 s12">
          <?php echo "Ingrediente seleccionado <b>".$nombreingrediente['nombre_ingrediente']."</b> con clave <b>".$nombreingrediente['codigo']."</b>"  ?> 
       </div>
        
    </div>
    <?php  } ?>
    <form id="envio_ingre" name="envio_ingre" method="post" action="subir_relacion_plaxingre.php">
<div class="row">
    <div class="input-field col m3 s6">
        <input id="bruto" name="bruto" type="number" class="validate" step="any" onkeyup="cant_neto();cost_neto();coste_ingediente();pax_pesos();" required>
        <label class="active" for="first_name2">Cantidad bruto</label>
    </div>
    <div class="col m1 s6">
        <?php if($ingre=="1"){ ?><p><?php echo $nombreingrediente['des_unidad']; $id_ingre=$nombreingrediente['id_unidad']; ?></p><?php } ?>
        
    </div>
    <div class="input-field col m2 s6">
        <input id="merma" name="merma" type="number" class="validate" onkeyup="cant_neto();cost_neto();" step="any" required <?php if($ingre=="1"){if($id_ingre=='5'){ echo "value='0' readonly"; }else{}} ?> >
        <label class="active" for="first_name2">Merma</label>
        
    </div>
    <div class="col m2 s6">
        <label>Tipo merma</label>
            <select class="browser-default" id="id_merma" name="id_merma" onchange="cant_neto();cost_neto();" required>
            <option value="1" selected>Porcentaje</option>
            <option value="2">Peso</option>
            </select>
    </div>
    <div class="input-field col m3 s12">
        <input id="neto" name="neto" type="number" class="validate" step="any" value="0" readonly required>
        <label class="active" for="first_name2">Peso neto</label>
    </div>
    <div class="col m1 s6">
        <?php if($ingre=="1"){ ?><p><?php echo $nombreingrediente['des_unidad']; ?></p><?php } ?>
    </div>
</div>
<div class="row">
    <div class="input-field col m3 s6">
        <input id="totalbruto" name="totalbruto" type="number" <?php if($ingre=="1"){ ?> value="<?php echo $nombreingrediente['costo_unitario']; ?>"  <?php } ?>class="validate" readonly step="any" required>
        <label class="active" for="first_name2">Coste unitario bruto</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="totalneto" name="totalneto" value="0" type="number" class="validate" step="any" readonly required>
        <label class="active" for="first_name2">Coste total neto</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="costingre" name="costingre" value="0" type="text" class="validate" onchange="" step="any" readonly required>
        <label class="active" for="first_name2">Coste ingrediente</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="paxpesos" name="paxpesos" value="0" type="text" class="validate" step="any" readonly required>
        <label class="active" for="first_name2">Precio por pax pesos</label>
    </div>
    
</div>
<div class="row" style="visibility: hidden;">
    <div class="col m3 s3" >
            <input type="number" value="<?php echo  $nombredelplatillo['porciones']; ?>" id="porciones" name="porciones" disabled>
        </div>
    <div class="col m3 s3" >
        <input type="number" id="id_recetaa" name="id_recetaa" value="<?php echo  $nombredelplatillo['id_platillo']; ?>" readonly>
    </div>
    <div class="col m3 s3" >
        <input type="number" id="id_ingreeee" name="id_ingreee" value="<?php echo  $nombreingrediente['id_ingredientes']; ?>" readonly>
    </div>
    <div class="col m3 s3" >
        <input type="number" id="id_unidad" name="id_unidad" value="<?php echo  $nombreingrediente['id_unidad']; ?>" readonly>
    </div>
</div>
</form>
    <div class="container center-align">
<div class="row">
    <div class="col s6">
    
        <button class="btn-large waves-effect waves-light" type="submit" name="action" form="envio_ingre" value="choose">Añadir otro ingrediente
            <i class="material-icons right">send</i>
        </button>    
    </div>
    <div class="col s6">
        <?php 
        if ($nombredelplatillo['categoria_platillo'] == 1) {
            echo "<a href='entradas.php' title='Ir la página anterior' class='waves-effect waves-light btn-large red accent-4'><i class='material-icons right'>close</i>Cancelar</a>";
        }elseif ($nombredelplatillo['categoria_platillo'] == 2) {
            echo "<a href='platillos.php' title='Ir la página anterior' class='waves-effect waves-light btn-large red accent-4'><i class='material-icons right'>close</i>Cancelar</a>";
        }else{
            echo "<a href='guarniciones.php' title='Ir la página anterior' class='waves-effect waves-light btn-large red accent-4'><i class='material-icons right'>close</i>Cancelar</a>";
        }

         ?>
         <!--<a href="javascript:history.back(-1);" title="Ir la página anterior" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>-->
    </div>
    
    </div>
</div>
</div>

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
        //Función que realiza operacion para peso neto
            function cant_neto() {
                var ingreso1 = document.envio_ingre.bruto.value;
                var ingreso2 = document.envio_ingre.merma.value;
            try{
        //Calculamos el número escrito:
            ingreso1 = (isNaN(parseFloat(ingreso1)))? 0 : parseFloat(ingreso1);
            ingreso2 = (isNaN(parseFloat(ingreso2)))? 0 : parseFloat(ingreso2);
                if(document.envio_ingre.id_merma.value=='1'){
                        document.envio_ingre.neto.value = ingreso1*((100-ingreso2)/100);
                    }else{
                        document.envio_ingre.neto.value = ingreso1-ingreso2;
                    }
            }
        //Si se produce un error no hacemos nada
            catch(e) {}
            }
</script>

<script>
        //Función que realiza operacion para coste total neto
            function cost_neto() {
                var ingresoc1 = document.envio_ingre.totalbruto.value;
                var ingresoc2 = document.envio_ingre.bruto.value;
                var ingresoc3 = document.envio_ingre.neto.value;
                
                
            try{
        //Calculamos el número escrito:
            ingresoc1 = (isNaN(parseFloat(ingresoc1)))? 0 : parseFloat(ingresoc1);
            ingresoc2 = (isNaN(parseFloat(ingresoc2)))? 0 : parseFloat(ingresoc2);
            ingresoc3 = (isNaN(parseFloat(ingresoc3)))? 0 : parseFloat(ingresoc3);
            if(document.envio_ingre.id_unidad.value=='5'){
                document.envio_ingre.totalneto.value = ingresoc1*ingresoc3;
            }else{
                document.envio_ingre.totalneto.value = ingresoc1+((ingresoc2-ingresoc3)*ingresoc1);
                }
            }
        //Si se produce un error no hacemos nada
            catch(e) {}
            }
</script>

<script>
        //Función que realiza operacion para coste total neto
            function pax_pesos() {
                var ingresop1 = document.envio_ingre.costingre.value;
                var ingresop2 = document.envio_ingre.porciones.value;
                var ingresop3 = document.envio_ingre.totalbruto.value;
                
            try{
        //Calculamos el número escrito:
            ingresop1 = (isNaN(parseFloat(ingresop1)))? 0 : parseFloat(ingresop1);
            ingresop2 = (isNaN(parseFloat(ingresop2)))? 0 : parseFloat(ingresop2);
            ingresop3 = (isNaN(parseFloat(ingresop3)))? 0 : parseFloat(ingresop3);
            if(document.envio_ingre.id_unidad.value=='5'){
                document.envio_ingre.paxpesos.value = ingresop3  ;
            }else{
            document.envio_ingre.paxpesos.value = (ingresop1/ingresop2).toFixed(2);
            }
            }
        //Si se produce un error no hacemos nada
            catch(e) {}
            }
</script>
<script>
        //Función que realiza operacion para coste del ingrediente
            function coste_ingediente() {
                var ingresoing1 = document.envio_ingre.bruto.value;
                var ingresoing2 = document.envio_ingre.totalneto.value;
                var ingresoing3 = document.envio_ingre.totalbruto.value;
                
                
            try{
        //Calculamos el número escrito:
            ingresop1 = (isNaN(parseFloat(ingresoing1)))? 0 : parseFloat(ingresoing1);
            ingresop2 = (isNaN(parseFloat(ingresoing2)))? 0 : parseFloat(ingresoing2);
            ingresop3 = (isNaN(parseFloat(ingresoing3)))? 0 : parseFloat(ingresoing3);
                
            if(document.envio_ingre.id_unidad.value=='5'){
                document.envio_ingre.costingre.value = ingresoing3;
            }else{
                document.envio_ingre.costingre.value = ingresoing1*ingresoing2;
            }
            }
        //Si se produce un error no hacemos nada
            catch(e) {}
            }
</script>

</body>
</html>