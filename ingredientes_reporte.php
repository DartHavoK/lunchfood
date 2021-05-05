<?php 

    require 'conexion.php';
    require 'Classes/PHPExcel.php';

    //Consulta  
    $sql_ingredientes='SELECT `id_ingredientes`,`codigo`,`cantidad`,`nombre_ingrediente`,`costo_presentacion`,`costo_unitario`, `cantidad_almacen`,`cant_resurtir`, `cant_max_almacen`,unidad.des_unidad FROM `ingredientes` INNER JOIN unidad ON ingredientes.id_unidad = unidad.id_unidad ORDER BY ingredientes.nombre_ingrediente ASC ';
    $resultado = mysqli_query($link,$sql_ingredientes) or die(mysqli_error($link));

    $gdImage = imagecreatefrompng('img/lunchlogo.png');//Logotipo

    $fila = 7;//Indica en que fila se inicia el reporte


    //Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Nombre creador documento")->setDescription("Reporte de inngredientes");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Ingredientes");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:I4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:I6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE PRODUCTOS');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'ID');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'CODIGO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'NOMBRE INGREDIENTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'COSTO PRESENTACION');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'COSTO UNITARIO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'CANTIDAD');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'CANTIDAD ALMACEN');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', 'PUNTO DE RESURTIDO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', 'CANTIDAD MAXIMA EN ALMACEN');



	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['id_ingredientes']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['codigo']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['nombre_ingrediente']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['costo_presentacion']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['costo_unitario']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['cantidad']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['cantidad_almacen']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['cant_resurtir']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['cant_max_almacen']);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}

	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:I".$fila);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="ingredientes.xlsx"');
	header('Cache-Control: max-age=0');

	$writer = new PHPExcel_Writer_Excel2007($objPHPExcel);	
	$writer->save('php://output');

 ?>