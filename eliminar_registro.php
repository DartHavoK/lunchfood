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
	
	$sql = "DELETE FROM usuarios WHERE id = '$id'";
	$resultado = $link->query($sql);
	
?>


		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<a href="busqueda.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
