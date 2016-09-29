<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

//include './Classes/PHPExcel.php';
//include './Classes/PHPExcel/IOFactory.php' ;

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("levantamento.xlsx");
$objWorksheet = $objPHPExcel->setActiveSheetIndex(2);
$highestRow = $objWorksheet->getHighestRow();

echo"<table class='table'>";
for ($row = 1; $row <= $highestRow; $row++) {
	if($row==1){
		echo"<tr>";
		echo "<th>".$objPHPExcel-> getActiveSheet() -> getCell('A'.$row)->getValue()."</th>";
		echo  "<th>".$objPHPExcel-> getActiveSheet() -> getCell('B'.$row)->getValue()."</th>";
		echo  "<th>".$objPHPExcel-> getActiveSheet() -> getCell('C'.$row)->getCalculatedValue()."</th>";
		echo  "<th>".$objPHPExcel-> getActiveSheet() -> getCell('D'.$row)->getCalculatedValue()."</th>";
		echo  "<th>".$objPHPExcel-> getActiveSheet() -> getCell('E'.$row)->getCalculatedValue()."</th>";
		echo"</th>";
	}else{
		echo"<tr>";
		echo "<td>".$objPHPExcel-> getActiveSheet() -> getCell('A'.$row)->getValue()."</td>";
		echo  "<td>".$objPHPExcel-> getActiveSheet() -> getCell('B'.$row)->getValue()."</td>";
		echo  "<td>".$objPHPExcel-> getActiveSheet() -> getCell('C'.$row)->getCalculatedValue()."</td>";
		echo  "<td><b>".$objPHPExcel-> getActiveSheet() -> getCell('D'.$row)->getCalculatedValue()."</b></td>";
		echo  "<td><b>".$objPHPExcel-> getActiveSheet() -> getCell('E'.$row)->getCalculatedValue()."</b></td>";
		echo"</tr>";
	}
}
echo"</table>";
?>