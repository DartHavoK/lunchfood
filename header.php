<html>
<?php  
session_start();
if(empty($_SESSION['id_usuario'])){
?>
    <script>
      window.location.replace("index.php");
    </script>

<?php } ?>
<?php 
require 'funcs/funcs.php'; 

?>
    <head>
      <script src="js/jquery-3.3.1.js"></script>
       <script src="js/jquery-3.1.1.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--css menu-->
      <link type="text/css" rel="stylesheet" href="css/drop-menu.css" />

      <script type="text/javascript">
        $(document).ready(function(){
          $('.delete').click(function(){
            var parent = $(this). parent().attr('id');
            var service = $(this). parent().attr('data');
            var dataString ='id='+service;

            $.ajax({
              type: "POST",
              url: "del_imagen.php",
              data: dataString,
              success: function() {
                location.reload();
              }

            });
          });
        });    
      </script>
      <script>
        function imprimir(){
          if (parseInt(navigator.appVersion)>4)
            window.print();
        }
      </script>



      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title> Lunch menu creator </title>
    </head>

    <body>
        
         
<div class="brand-logo">
  <a href="welcome.php"><img src="img/lunchlogo.png"></a>   
</div>   
<nav id="drop-menu">
  <ul>
    <li><a href="welcome.php">Home</a></li>
    <?php if($_SESSION['tipo_usuario']<3) { ?>
    <li class="dropmenu">
      <a href="javascript:void(0)" class="dropbtn">Platillos+</a>
      <div class="dropmenu-content">
        <a href="entradas.php">Entradas</a>
        <a href="platillos.php">Platillos</a>
        <a href="guarniciones.php">Guarniciones</a>
      </div>
    </li>
    <?php } ?>
    <li <?php if(isset($dondeestoy)){if($dondeestoy='1'){  ?> <?php }} ?>><a href="ingredientes.php">Ingredientes</a></li>
    <li <?php if(isset($dondeestoy)){if($dondeestoy='2'){  ?> <?php }} ?>><a href=empaques.php>Empaques</a></li>
    <?php if($_SESSION['tipo_usuario']!=3) { ?>
    <li <?php if(isset($dondeestoy)){if($dondeestoy='3'){  ?> <?php }} ?>><a href="menus.php">Menus</a></li>
    <?php } ?>
    <?php if($_SESSION['tipo_usuario']==1) { ?>
    <li><a href="busqueda.php">Administrar usuarios</a></li>
    <?php } ?>
    <li><a href="logout.php">cerrar sesión</a></li>
  </ul>
</nav>