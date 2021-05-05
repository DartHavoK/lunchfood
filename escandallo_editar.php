<?php

require('conexion.php');
require('header.php');
    $cat_platillos = $_GET['cat_platillo'];
    $autorefresh = $_GET['autorefresh'];
    $id_libre= $_GET['id_platillo'];
    $id_relacion= $_GET['id_rel'];
    
    if(isset($_GET['id_ingre'])){
        $id_ingrediente =$_GET['id_ingre'];
        $sql_get_ingredientes = "SELECT `id_ingredientes`,`codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario` ,unidad.des_unidad, unidad.id_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad WHERE `id_ingredientes`='$id_ingrediente' ";
        $get_igredientes = mysqli_query($link,$sql_get_ingredientes);
        $nombreingrediente = mysqli_fetch_assoc($get_igredientes);
        $ingre="1";
    }else{
        echo "Esperando ingrediente";
        $ingre ="0";
    }

        $relacion_datos="SELECT *,merma.des_merma AS melma FROM `platillo_ingrediente` INNER JOIN merma on platillo_ingrediente.id_tipo_merma=merma.id_merma WHERE `id_relacion`='$id_relacion' ";
        $get_relacion = mysqli_query($link,$relacion_datos);
        $datos_relacion = mysqli_fetch_assoc($get_relacion);
    

    $definir_platillo = "SELECT nombre_platillo,porciones,id_platillo from platillo where id_platillo ='$id_libre' ";
    $obtener_platillo = mysqli_query($link,$definir_platillo);
    $nombredelplatillo = mysqli_fetch_assoc($obtener_platillo);

    
echo "<div class='container center_align'><h3>Estas trabajando con el platillo <b>". $nombredelplatillo['nombre_platillo']."</b></h3></div>" ;
    
    $sql_ingredientes="SELECT * FROM `ingredientes` ";
    $obtener_ingredientes = mysqli_query($link,$sql_ingredientes);

$id_ingre=$nombreingrediente['id_unidad'];

if ($autorefresh==1){
//echo "funciona";
?>
<script type="text/javascript">
/*Probar despues
function submitform(){
//alert("La información esta siendo actualizada, espere por favor...");
document.getElementById('envio_ingre').submit();
}*/
$(document).ready(function(){
   $(".cargar").click();
});
function myFunction(){

   console.log("cargando");

}


</script>
<?php    
}

?>

<div class="container">
    

    <?php if($ingre=="1"){ ?>
    <div class="row">
       <div class="col m8 s12">
          <?php echo "<h3>Ingrediente seleccionado <b>".$nombreingrediente['nombre_ingrediente']."</b> con clave <b>".$nombreingrediente['codigo']."</b></h3>"  ?> 
       </div>
        
    </div>
    <?php  } ?>
    <form onsubmit="cant_neto();cost_neto();coste_ingediente();pax_pesos();" id="envio_ingre" name="envio_ingre" method="post" action="update_escandillo.php">
<div class="row">
    <div class="input-field col m3 s6">
        <input id="bruto" name="bruto" value="<?php echo $datos_relacion['peso_bruto'];  ?>" type="number" class="validate" step="any" onkeyup="cant_neto();cost_neto();coste_ingediente();pax_pesos();" required>
        <label class="active" for="first_name2">Cantidad bruto</label>
    </div>
    <div class="col m1 s6">
        <?php if($ingre=="1"){ ?><p><?php echo $nombreingrediente['des_unidad']; ?></p><?php } ?>
    </div>
    <div class="input-field col m2 s6">
        <input id="merma" name="merma" type="number" value="<?php echo $datos_relacion['merma'];  ?>"  class="validate" onkeyup="cant_neto();cost_neto();" step="any" required <?php if($id_ingre=='5'){ echo "value='0' readonly"; }else{} ?>>
        <label class="active" for="first_name2">Merma</label>
    </div>
    <div class="col m2 s6">
        <label>Tipo merma</label>
            <select class="browser-default" id="id_merma" name="id_merma" onchange="cant_neto();cost_neto();" required>
            <option value="<?php echo $datos_relacion['id_tipo_merma']; ?>" selected ><?php echo $datos_relacion['melma']; ?></option>
            <option value="1" >Porcentaje</option>
            <option value="2">Peso</option>
            </select>
    </div>
    <div class="input-field col m3 s12">
        <input id="neto" name="neto" type="number" value="<?php echo $datos_relacion['peso_neto'];  ?>" class="validate" step="any" readoly required>
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
        <input id="totalneto" name="totalneto" value="<?php echo $datos_relacion['coste_neto'];  ?>" type="number" class="validate" step="any" required>
        <label class="active" for="first_name2">Coste total neto</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="costingre" name="costingre" value="<?php echo $datos_relacion['coste_ingrediente'];  ?>" type="text" class="validate" onchange="" step="any" readonly required>
        <label class="active" for="first_name2">Coste ingrediente</label>
    </div>
    <div class="input-field col m3 s6">
        <input id="paxpesos" name="paxpesos" value="<?php echo $datos_relacion['pax_pesos'];  ?>" readonly type="text" class="validate" step="any" required>
        <label class="active" for="first_name2">Precio por pax pesos</label>
    </div>
    
</div>
<div class="row" style="visibility: hidden;">
    <div class="col  s1" >
            <input type="number" value="<?php if ($autorefresh == 1){ echo(1);} ?>" id="autorefresh" name="autorefresh" readonly>
        </div>
    <div class="col  s1" >
        <input type="number" value="<?php echo($cat_platillos) ?>" id="cat_platillo" name="cat_platillo" readonly>
    </div>    
    <div class="col  s1" >
            <input type="number" value="<?php echo  $id_relacion ?>" id="relacion" name="relacion" readonly>
        </div>
    <div class="col  s1" >
        <input type="number" id="anteriorneto" name="anteriorneto" value="<?php echo  $datos_relacion['coste_neto']; ?>" readonly>
    </div>
   <div class="col  s1" >
        <input type="number" id="id_recetaa" name="id_recetaa" value="<?php echo  $nombredelplatillo['id_platillo']; ?>" readonly>
    </div>
    <div class="col  s1" >
            <input type="number" value="<?php echo  $nombredelplatillo['porciones']; ?>" id="porciones" name="porciones" disabled>
        </div>
    <div class="col  s1" >
        <input type="number" id="id_unidad" name="id_unidad" value="<?php echo  $nombreingrediente['id_unidad']; ?>" readonly>
    </div>
</div>
</form>
    <div class="container center-align">
<div class="row">
    <div class="col s6">
    
        <button class="cargar btn-large waves-effect waves-light" type="submit" id="action" name="action" form="envio_ingre" value="choose" >Editar
            <i class="material-icons right">send</i>
        </button>    
    </div>
    <div class="col s6">
        <a href="escandallo.php?id=<?php echo $id_libre; ?>" class="waves-effect waves-light btn-large red accent-4"><i class="material-icons right">close</i>Cancelar</a>
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