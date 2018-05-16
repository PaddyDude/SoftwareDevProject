<?php

require_once('const_db.php');


$stmt = $mysqli->prepare("INSERT INTO `softwareproject1`.`parking_application` (path_to_form, applicant_username) VALUES (?, ?)");

/***************************************UPLOAD IMAGE TO SERVER****************************************/
$uploaddir = "Templates/tmp/parking_permit_signature_";//add session id to make it unique
$uploaddir2 = "Templates/tmp/parking_permit_license_";
$uploadfile = $uploaddir.basename($_FILES['Signature_picture']['name']);
$filename = $_FILES['Signature_picture']['name'];
$uploadfile2 = $uploaddir2.basename($_FILES['License_picture']['name']);
$filename2 = $_FILES['License_picture']['name'];

//echo "$_POST[Signature_picture]\n";

if (move_uploaded_file($_FILES['Signature_picture']['tmp_name'], $uploadfile)) {
  //echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}
if (move_uploaded_file($_FILES['License_picture']['tmp_name'], $uploadfile2)) {
  //echo "File is valid, and was successfully uploaded. 2\n";
} else {
   echo "Upload failed 2";
}

/***************************************CREATE PDF**************************************************/
require('fpdf.php');
//print_r($_POST);//prints all the (key, value pairs passed by the form)

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->Write(5, "Part 1: INFORMATION ABOUT PERSON WITH DISABILITY"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "First Name: $_POST[firstname]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Last Name: $_POST[lastname]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Middle Initial: $_POST[m_i]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Phone Number: $_POST[phonenumber]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Birth Date: $_POST[birth_date]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Do you have license plates for persons with disabilities?: $_POST[plates]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "If yes - my license plate number: $_POST[plate_num]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "NYS Permit Number: $_POST[nys_permit_num]"); //write
$pdf->Ln(5); // new line
$pdf->Ln(10); // new line

$pdf->Write(5, "Part 2: MEDICAL CERTIFICATION"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Temporary Disability: $_POST[temp_disability]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Expected Recovery Date: $_POST[rec_date]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Diagnosis: $_POST[diagnosis]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "What assistance device is needed: $_POST[assist_device]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Permanent Disability: $_POST[sev_disability]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Diagnosis: $_POST[diagnosis2]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Uses portable oxygen: $_POST[con1]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Legally blind: $_POST[con2]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Limited or no use of one or both legs: $_POST[con3]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Unable to walk 200 ft. without stopping: $_POST[con4]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Neuromuscular dysfunction that severely limits mobility: $_POST[con5]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Class III or IV cardiac condition. (American Heart Assoc. standards): $_POST[con6]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Severely limited in ability to walk due to an arthritic, neurological or orthopedic condition: $_POST[con7]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Restricted by lung disease to such an extent that forced (respiratory) expiratory volume for one second, when measured by spirometry, is less than one liter, or the arterial oxygen tension is less than sixty mm/hg of room air at rest: $_POST[con8]"); //write
$pdf->Ln(6); // new line
$pdf->Write(5, "Has a physical or mental impairment or condition not listed above which constitutes an equal degree of disability, and which imposes unusual hardship in the use of public transportation and prevents the person from getting around without great difficulty: $_POST[con9]"); //write
$pdf->Ln(6); // new line

$pdf->Write(5, "Email Address of Doctor: $_POST[email_doctor]"); //write
$pdf->Ln(10); // new line

$pdf->Write(5, "I legally verify that the uploaded file is my signature: $_POST[verify_signature]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Electronic Signature: "); //write
$pdf->Ln(5); // new line
$pdf->Image("$uploaddir"."$filename", $pdf->GetX() + 20, $pdf->GetY(), 33);
$pdf->Ln(33); // new line
$pdf->Write(5, "License: "); //write
$pdf->Ln(5); // new line
$pdf->Image("$uploaddir2"."$filename2", $pdf->GetX() + 20, $pdf->GetY(), 33);

$save_file_path = "Templates/".$_SESSION['login_user']."_parking_permit.pdf";

$stmt->bind_param("ss", $filepath, $user);

$filepath = $save_file_path;
$user = $_SESSION['login_user'];
if (!$stmt->execute()) {
    trigger_error('Error executing MySQL query: ' . $stmt->error);
}

//$pdf->Output( 'file.txt','I'); // display in browser. Good for testing if output is working
$pdf->Output($save_file_path,'F'); // save to file
//$pdf->Output('file.pdf','F'); // save to file
echo '<script> alert("Form is submitted successfully!!")</script>';

header("Location:index.php?controller=UserController&action=dashboard");
//sanitize html input
function val_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
