<?php
	require'header.php'; 
	require 'conexion.php';
	require 'funcs/funcs.php';
	
	$id = $_POST['id'];
	$usuario = $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$area_trabajo = $_POST['area_trabajo'];
	$activacion = isset($_POST['activacion']) ? $_POST['activacion'] : 0;
	$id_tipo = isset($_POST['id_tipo']) ? $_POST['id_tipo'] : 2;
	
	
	$sql = "INSERT INTO usuarios (usuario,nombre, correo, area_trabajo, activacion, id_tipo) VALUES ('$usuario','$nombre', '$email', '$area_trabajo', '$activacion', '$id_tipo')";
	$resultado = $link->query($sql);
	
?>


		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="busqueda.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
