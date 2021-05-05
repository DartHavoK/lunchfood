<?php 
session_start();
if(empty($_SESSION['id_usuario'])){
?>
    <script>
      window.location.replace("index.php");
    </script>

<?php } ?>
<?php
	require'header2.php'; 
	require 'conexion.php';

	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = $link->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>

		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="usuario" class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" value="<?php echo $row['usuario']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['correo']; ?>"  required>
					</div>
				</div>				
				
				<div class="form-group">
					<label for="area_trabajo" class="col-sm-2 control-label">Area de trabajo</label>
					<div class="col-sm-10">
						<select class="form-control" id="area_trabajo" name="area_trabajo">
							<option value="Cocina" <?php if($row['area_trabajo']=='Cocina') echo 'selected'; ?>>Cocina</option>
							<option value="Almacen" <?php if($row['area_trabajo']=='Almacen') echo 'selected'; ?>>Almacen</option>
							<option value="Administracion" <?php if($row['area_trabajo']=='Administracion') echo 'selected'; ?>>Administracion</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="activacion" class="col-sm-2 control-label">Usuario activo?</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="activacion" name="activacion" value="1" <?php if($row['activacion']=='1') echo 'checked'; ?>> SI
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="activacion" name="activacion" value="0" <?php if($row['activacion']=='0') echo 'checked'; ?>> NO
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="id_tipo" class="col-sm-2 control-label">Permisos</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="id_tipo" name="id_tipo" value="1" <?php if($row['id_tipo']=='1') echo 'checked'; ?>> Administrador
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="id_tipo" name="id_tipo" value="2" <?php if($row['id_tipo']=='2') echo 'checked'; ?>> Usuario-cocina
						</label>
						<label class="radio-inline">
							<input type="radio" id="id_tipo" name="id_tipo" value="3" <?php if($row['id_tipo']=='3') echo 'checked'; ?>> Usuario-almacen
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="busqueda.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>