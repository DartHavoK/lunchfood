<!DOCTYPE html>
  <html>
      
      
      
      <?php 
        require'header.php';
        require'conexion.php';
          
        $sql_unidades=" SELECT * FROM `unidad` ";
        $resultado = mysqli_query($link,$sql_unidades) or die(mysqli_error($link));
      
        $sql_proveedores=" SELECT * FROM `proveedor`";
        $resultado_proveedores = mysqli_query($link,$sql_proveedores) or die(mysqli_error($link));
      ?>
    
      
    <div class="container">
    <h2>Ingresar nuevo empaque</h2>
        
    <form id="ingredientes" name="ingredientes" action="add_proveedor.php" method="post">
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="nombreproveedor" name="nombreproveedor" type="text" class="validate" required>
      <label class="active" for="first_name2">Nombre del proveedor</label>
    </div>
    <div class="input-field col m6 s12" disabled>
      <input id="codigo" name="codigo" type="text" class="validate" disabled>
      <label class="active" for="first_name2">Numero telefonico</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col m6 s12" disabled>
      <input id="capacidad" name="capacidad" type="text" class="validate" disabled>
      <label class="active" for="first_name2">Direccion</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col m6 s12" disabled>
        <input id="cantidad" name="cantidad" type="number" class="validate" onKeyUp="Suma()" step="any" disabled>
        <label class="active" for="first_name2">Pagina</label>
    </div>
    
    
    </div> 

    <div class="input-field col m6 s12" diasbled>
          <textarea id="notas" name="notas" class="materialize-textarea" data-length="250" disabled></textarea>
          <label for="textarea1">Notas</label>
</div>
    </form> 
    <div class="container center-align">
        <div class="row">
            <div class="col s6">
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="ingredientes" value="choose">Subir empaque
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