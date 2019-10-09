<?php
if(!empty($_GET['id']) && $_GET['id']) {
	include_once("db_connect.php");
	$sql = "SELECT id, name, gender, age, skills, designation FROM developers WHERE id='".$_GET['id']."'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$developerDetails = mysqli_fetch_assoc($resultset);
	$password = strtolower(substr($developerDetails['name'], 0, 2));
	require('fpdf_protection.php');
	$pdf = new FPDF_Protection();
	$pdf->SetProtection(array('print'), $password); 
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 18);
	$pdf->Cell(100, 12, 'Employee Details', 0);
	$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 12);
	while ($column = mysqli_fetch_field($resultset)){
		$pdf->Cell(32,12, ucfirst($column->name), 1);
	}	
	$pdf->SetFont('Arial', '', 12);
	$pdf->Ln();
	foreach($developerDetails as $developer) {
		$pdf->Cell(32,12, ucfirst($developer), 1);
	}	
	$pdf->Output();
}
?>