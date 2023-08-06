<?php
require_once 'PHPExcel/Classes/PHPExcel.php';

// Crear una instancia de PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades del archivo Excel
$objPHPExcel->getProperties()->setTitle("Usuarios");

// Crear una hoja de cálculo
$objPHPExcel->setActiveSheetIndex(0);
$hoja = $objPHPExcel->getActiveSheet();

// Definir los encabezados de columna
$hoja->setCellValue('A1', 'ID');
$hoja->setCellValue('B1', 'Nombre');
$hoja->setCellValue('C1', 'Correo');
$hoja->setCellValue('D1', 'Teléfono');

// Establecer estilos para los encabezados
$headerStyle = $hoja->getStyle('A1:D1');
$headerStyle->getFont()->setBold(true);
$headerStyle->getFont()->setSize(24);
$headerStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$headerStyle->getFill()->getStartColor()->setARGB('FFCCCCCC'); // Color de fondo gris claro

// Obtener los datos de la tabla de usuarios
$lista = ControladorUsuarios::consultaUsuarios();

// Iniciar fila en 2 para los datos de usuarios
$row = 2;

// Recorrer los datos de usuarios y escribir en el archivo Excel
foreach ($lista as $item) {
    $hoja->setCellValue('A' . $row, $item[0]);
    $hoja->setCellValue('B' . $row, $item[1]);
    $hoja->setCellValue('C' . $row, $item[2]);
    $hoja->setCellValue('D' . $row, $item[3]);

    // Establecer color de fondo para las celdas en la fila actual
    $cellRange = 'A' . $row . ':D' . $row;
    $rowStyle = $hoja->getStyle($cellRange);
    $rowStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $rowStyle->getFill()->getStartColor()->setARGB('FFF2F2F2'); // Color de fondo gris claro

    $row++; // Incrementar la fila
}

// Ajustar el tamaño de las columnas automáticamente
foreach (range('A', 'D') as $column) {
  $hoja->getColumnDimension($column)->setAutoSize(true);
}

// Configurar el encabezado y tipo de contenido del archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="usuarios.xlsx"');
header('Cache-Control: max-age=0');

// Guardar el archivo Excel en el flujo de salida
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

exit;
?>
