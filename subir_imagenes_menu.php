<?php 
//subir imagenes entradas 1
if($_FILES["img_entrada"] ["error"]>0 ){
        echo "Error al cargar las imagenes: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_entrada"] ["type"],$permitidos) && $_FILES["img_entrada"] ["size"] <= $limite_kb * 1024) {
            
            $ruta_entrada_pre = 'foto_menus/presentacion/entrada/'.$id_insert.'/';
            $archivo_entrada_pre = $ruta_entrada_pre.$_FILES["img_entrada"] ["name"];

            if (!file_exists($ruta_entrada_pre)) {
                mkdir($ruta_entrada_pre);
            }

            if (!file_exists($archivo_entrada_pre)) {
                
                $resultado1 = @move_uploaded_file($_FILES["img_entrada"] ["tmp_name"], $archivo_entrada_pre);              
                if ($resultado1) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes 1
    
if($_FILES["img_emp_entrada"] ["error"]>0){
        echo "Error al cargar las imagenes de empaquetado: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_emp_entrada"] ["type"],$permitidos) && $_FILES["img_emp_entrada"] ["size"] <= $limite_kb * 1024) {
            $ruta_entrada_emp = 'foto_menus/empaquetado/entrada/'.$id_insert.'/';
            $archivo_entrada_emp = $ruta_entrada_emp.$_FILES["img_emp_entrada"] ["name"];

            if (!file_exists($ruta_entrada_emp)) {
                mkdir($ruta_entrada_emp);
            }

            if (!file_exists($archivo_entrada_emp)) {
                
                $resultado2 = @move_uploaded_file($_FILES["img_emp_entrada"] ["tmp_name"], $archivo_entrada_emp);                
                if ($resultado2) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes entradas 2

if($_FILES["img_emp_ent"] ["error"]>0){
        echo "Error al cargar las imagenes de empaquetado: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_emp_ent"] ["type"],$permitidos) && $_FILES["img_emp_ent"] ["size"] <= $limite_kb * 1024) {
            $ruta_entrada_emp = 'foto_menus/empaque_final/entrada/'.$id_insert.'/';
            $archivo_entrada_emp = $ruta_entrada_emp.$_FILES["img_emp_ent"] ["name"];

            if (!file_exists($ruta_entrada_emp)) {
                mkdir($ruta_entrada_emp);
            }

            if (!file_exists($archivo_entrada_emp)) {
                
                $resultado2 = @move_uploaded_file($_FILES["img_emp_ent"] ["tmp_name"], $archivo_entrada_emp);                
                if ($resultado2) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes entradas 3


//******************************************* subir imagenes fuerte 1
if($_FILES["img_fuerte"] ["error"]>0 ){
        echo "Error al cargar las imagenes: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_fuerte"] ["type"],$permitidos) && $_FILES["img_fuerte"] ["size"] <= $limite_kb * 1024) {
            
            $ruta_fuerte_pre = 'foto_menus/presentacion/fuerte/'.$id_insert.'/';
            $archivo_fuerte_pre = $ruta_fuerte_pre.$_FILES["img_fuerte"] ["name"];

            if (!file_exists($ruta_fuerte_pre)) {
                mkdir($ruta_fuerte_pre);
            }

            if (!file_exists($archivo_fuerte_pre)) {
                
                $resultado3 = @move_uploaded_file($_FILES["img_fuerte"] ["tmp_name"], $archivo_fuerte_pre);              
                if ($resultado3) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes 1
    
if($_FILES["img_emp_fuerte"] ["error"]>0){
        echo "Error al cargar las imagenes de empaquetado: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_emp_fuerte"] ["type"],$permitidos) && $_FILES["img_emp_fuerte"] ["size"] <= $limite_kb * 1024) {
            $ruta_fuerte_emp = 'foto_menus/empaquetado/fuerte/'.$id_insert.'/';
            $archivo_fuerte_emp = $ruta_fuerte_emp.$_FILES["img_emp_fuerte"] ["name"];

            if (!file_exists($ruta_fuerte_emp)) {
                mkdir($ruta_fuerte_emp);
            }

            if (!file_exists($archivo_fuerte_emp)) {
                
                $resultado4 = @move_uploaded_file($_FILES["img_emp_fuerte"] ["tmp_name"], $archivo_fuerte_emp);                
                if ($resultado4) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes fuerte 2


if($_FILES["img_empaquef"] ["error"]>0){
        echo "Error al cargar las imagenes de empaquetado: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_empaquef"] ["type"],$permitidos) && $_FILES["img_empaquef"] ["size"] <= $limite_kb * 1024) {
            $ruta_fuerte_emp = 'foto_menus/empaque_final/fuerte/'.$id_insert.'/';
            $archivo_fuerte_emp = $ruta_fuerte_emp.$_FILES["img_empaquef"] ["name"];

            if (!file_exists($ruta_fuerte_emp)) {
                mkdir($ruta_fuerte_emp);
            }

            if (!file_exists($archivo_fuerte_emp)) {
                
                $resultado4 = @move_uploaded_file($_FILES["img_empaquef"] ["tmp_name"], $archivo_fuerte_emp);                
                if ($resultado4) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes fuerte 3



//******************************************* subir imagenes guarnicion 1
if($_FILES["img_guar1"] ["error"]>0 ){
        echo "Error al cargar las imagenes: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_guar1"] ["type"],$permitidos) && $_FILES["img_guar1"] ["size"] <= $limite_kb * 1024) {
            
            $ruta_guar1_pre = 'foto_menus/presentacion/guarnicion1/'.$id_insert.'/';
            $archivo_guar1_pre = $ruta_guar1_pre.$_FILES["img_guar1"] ["name"];

            if (!file_exists($ruta_guar1_pre)) {
                mkdir($ruta_guar1_pre);
            }

            if (!file_exists($archivo_guar1_pre)) {
                
                $resultado5 = @move_uploaded_file($_FILES["img_guar1"] ["tmp_name"], $archivo_guar1_pre);              
                if ($resultado5) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes 1
    
if($_FILES["img_emp_guar1"] ["error"]>0){
        echo "Error al cargar las imagenes de empaquetado: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 2000;

        if (in_array($_FILES["img_emp_guar1"] ["type"],$permitidos) && $_FILES["img_emp_guar1"] ["size"] <= $limite_kb * 1024) {
            $ruta_guar1_emp = 'foto_menus/empaquetado/guarnicion1/'.$id_insert.'/';
            $archivo_guar1_emp = $ruta_guar1_emp.$_FILES["img_emp_guar1"] ["name"];

            if (!file_exists($ruta_guar1_emp)) {
                mkdir($ruta_guar1_emp);
            }

            if (!file_exists($archivo_guar1_emp)) {
                
                $resultado6 = @move_uploaded_file($_FILES["img_emp_guar1"] ["tmp_name"], $archivo_guar1_emp);                
                if ($resultado6) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes guarnicion 1



//******************************************* subir imagenes guarnicion 2
if($_FILES["img_guar2"] ["error"]>0 ){
        echo "Error al cargar las imagenes: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_guar2"] ["type"],$permitidos) && $_FILES["img_guar2"] ["size"] <= $limite_kb * 1024) {
            
            $ruta_guar2_pre = 'foto_menus/presentacion/guarnicion2/'.$id_insert.'/';
            $archivo_guar2_pre = $ruta_guar2_pre.$_FILES["img_guar2"] ["name"];

            if (!file_exists($ruta_guar2_pre)) {
                mkdir($ruta_guar2_pre);
            }

            if (!file_exists($archivo_guar2_pre)) {
                
                $resultado7 = @move_uploaded_file($_FILES["img_guar2"] ["tmp_name"], $archivo_guar2_pre);              
                if ($resultado7) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes 2
    
if($_FILES["img_emp_guar2"] ["error"]>0){
        echo "Error al cargar las imagenes de empaquetado: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_emp_guar2"] ["type"],$permitidos) && $_FILES["img_emp_guar2"] ["size"] <= $limite_kb * 1024) {
            $ruta_guar2_emp = 'foto_menus/empaquetado/guarnicion2/'.$id_insert.'/';
            $archivo_guar2_emp = $ruta_guar2_emp.$_FILES["img_emp_guar2"] ["name"];

            if (!file_exists($ruta_guar2_emp)) {
                mkdir($ruta_guar2_emp);
            }

            if (!file_exists($archivo_guar2_emp)) {
                
                $resultado2 = @move_uploaded_file($_FILES["img_emp_guar2"] ["tmp_name"], $archivo_guar2_emp);                
                if ($resultado2) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir imagenes guarnicion 2    

//inicio subir imagenes presentacion final  
if($_FILES["img_emp_menu"] ["error"]>0){
        echo "Error al cargar las imagenes de empaquetado: ";
    } else {
        $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
        $limite_kb = 200;

        if (in_array($_FILES["img_emp_menu"] ["type"],$permitidos) && $_FILES["img_emp_menu"] ["size"] <= $limite_kb * 1024) {
            $ruta_emp_menu = 'foto_empaque/'.$id_insert.'/';
            $archivo_emp_menu = $ruta_emp_menu.$_FILES["img_emp_menu"] ["name"];

            if (!file_exists($ruta_emp_menu)) {
                mkdir($ruta_emp_menu);
            }

            if (!file_exists($archivo_emp_menu)) {
                
                $resultado2 = @move_uploaded_file($_FILES["img_emp_menu"] ["tmp_name"], $archivo_emp_menu);                
                if ($resultado2) {
                    echo "Archivo guardado";
                }else{
                    echo "Error al guardar";
                }

            }else{
                echo "El archivo ya existe";
            }

        }else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }//fin subir presentacion final     
 ?>




 ?>

