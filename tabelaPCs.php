<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include './Classes/PHPExcel.php';
include './Classes/PHPExcel/IOFactory.php' ;

$objReader2 = PHPExcel_IOFactory::createReader('Excel2007');
$objReader2->setReadDataOnly(true);
$objPHPExcel2 = $objReader2->load("levantamento.xlsx");
$objWorksheet2 = $objPHPExcel2->setActiveSheetIndex(0);
$highestRow2 = $objWorksheet2->getHighestRow();

echo"<table class='table'>";
for ($row2 = 1; $row2 <= $highestRow2; $row2++) {
	if($row2==1){
		echo"<thead class='thead-inverse'><tr>";
		echo "<th>".$objPHPExcel2-> getActiveSheet() -> getCell('A'.$row2)->getValue()."</th>";
		echo  "<th>".$objPHPExcel2-> getActiveSheet() -> getCell('B'.$row2)->getValue()."</th>";
		echo  "<th>".$objPHPExcel2-> getActiveSheet() -> getCell('C'.$row2)->getCalculatedValue()."</th>";
		echo  "<th></th>";
		echo  "<th></th>";
		echo" </thead>";
	}else{
		echo"<tr>";
		echo "<td><b>".$objPHPExcel2-> getActiveSheet() -> getCell('A'.$row2)->getValue()."</b></td>";
		echo  "<td>".$objPHPExcel2-> getActiveSheet() -> getCell('B'.$row2)->getValue()."</td>";
		if($objPHPExcel2-> getActiveSheet() -> getCell('C'.$row2)->getCalculatedValue()=="PC"){
			echo  "<td><font color='#ff0000'>".$objPHPExcel2-> getActiveSheet() -> getCell('C'.$row2)->getCalculatedValue()."</font></td>";
		}else{
			echo  "<td><font color='#009900'>".$objPHPExcel2-> getActiveSheet() -> getCell('C'.$row2)->getCalculatedValue()."</font></td>";
		}
		echo  "<td><b>".$objPHPExcel2-> getActiveSheet() -> getCell('D'.$row2)->getCalculatedValue()."</b></td>";
		echo  "<td><b>".$objPHPExcel2-> getActiveSheet() -> getCell('E'.$row2)->getCalculatedValue()."</b></td>";
		echo"</tr>";
	}
}
echo"</table>";
?>