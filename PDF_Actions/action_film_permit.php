<?php

require('fpdf.php');
//print_r($_POST);//prints all the (key, value pairs passed by the form)

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
foreach ($_POST as $key=>$data)
{
  $pdf->Write(5, "$key: $data"); //write
  $pdf->Ln(10); // new line
}
//$pdf->Output( 'file.txt','I'); // display in browser. Good for testing if output is working
$pdf->Output('file.pdf','F'); // save to file

//sanitize html input
function val_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//sanitize html input
function val_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
