<!DOCTYPE html>
  <html>
      
      
      
      <?php 
        require'header.php';
        require'conexion.php';
          
        $id=$_GET['id'];
      
        $sql_proveedores=" SELECT * FROM `proveedor` WHERE `id_proveedor`='$id'";
        $resultado_proveedores = mysqli_query($link,$sql_proveedores) or die(mysqli_error($link));
        $proveedores= mysqli_fetch_assoc($resultado_proveedores);
      ?>
    
      
    <div class="container">
    <h2>Editar proveedor</h2>
        
    <form id="ingredientes" name="ingredientes" action="update_proveedor.php?id=<?php echo $id; ?>" method="post">
    <div class="row">
    <div class="input-field col m6 s12">
      <input id="nombreproveedor" name="nombreproveedor" value="<?php echo $proveedores['des_proveedor']; ?>" type="text" class="validate" required>
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
        <input id="cantidad" name="cantidad" type="number" class="validate"  step="any" disabled>
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
                <button class="btn-large waves-effect waves-light" type="submit" name="action" form="ingredientes" value="choose">Editar proveedor
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
      <script type="text/javascript"></script>
    </body>
  </html>