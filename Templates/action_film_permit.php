<?php


require_once('const_db.php');

$stmt = $mysqli->prepare("INSERT INTO `softwareproject1`.`film_applications` (path_to_form, applicant_username) VALUES (?, ?)");

/***************************************UPLOAD IMAGE TO SERVER****************************************/
$uploaddir = "Templates/tmp/film_permit_";
$uploadfile = $uploaddir.basename($_FILES['Signature_picture2']['name']);
$filename = $_FILES['Signature_picture2']['name'];

//echo "$_POST[Signature_picture]\n";

if (move_uploaded_file($_FILES['Signature_picture2']['tmp_name'], $uploadfile)) {
  //echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}

/***************************************CREATE PDF**************************************************/
require('fpdf.php');
//print_r($_POST);//prints all the (key, value pairs passed by the form)

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->Write(5, "Part 1: Applicant"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "First Name: $_POST[firstname]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Last Name: $_POST[lastname]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Phone Number: $_POST[phonenumber]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Street: $_POST[app_street]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "City: $_POST[app_city]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "State: $_POST[app_state]"); //write
$pdf->Ln(7); // new line

$pdf->Write(5, "Part 2: Location of Filming"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Street: $_POST[loc_street]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "City: $_POST[loc_city]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "State: $_POST[loc_state]"); //write
$pdf->Ln(7); // new line

$pdf->Write(5, "Part 3: Dates of Filming"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Start Date: $_POST[start_date]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "End Date: $_POST[end_date]"); //write
$pdf->Ln(7); // new line

$pdf->Write(5, "Part 4: Purpose of Filming"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "$_POST[film_purpose]"); //write
$pdf->Ln(7); // new line

$pdf->Write(5, "Part 5: Nuber of Vehicles Associated With Film"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Number of Vehicles: $_POST[number_trucks]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Types of Trucks at Filming Site: $_POST[type_trucks]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Will Trucks be Parked on The Street: $_POST[truck_parking]"); //write
$pdf->Ln(7); // new line

$pdf->Write(5, "Part 6: It is understood that the filming, including setting up, operating and removing equipment, shall be conducted between the hours of 8:00 a.m. and 7:00 p.m."); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "$_POST[iUnderstand]"); //write
$pdf->Ln(7); // new line

$pdf->Write(5, "Part 7: Applicant affirms, under penalty of perjury that all statements contained in this application are true."); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Date: $_POST[current_date]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Company Name: $_POST[company_name]"); //write
$pdf->Ln(7); // new line

$pdf->Write(5, "I legally verify that the uploaded file is my signature: $_POST[verify_signature]"); //write
$pdf->Ln(5); // new line
$pdf->Write(5, "Electronic Signature: "); //write
$pdf->Ln(5); // new line
$pdf->Image("$uploaddir"."$filename", $pdf->GetX() + 20, $pdf->GetY(), 33);

$save_file_path = "Templates/".$_SESSION['login_user']."_film_permit.pdf";

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
//header("index.php?controller=UserController&action=dashboard")
/*
//connect to db
$conn = new mysqli($servername, $username, $password, $dbname);

//sanitize the html input
    //this code is in the film permit action php page

//sanitize the input before writting to db
//Prepared statement
if(!($stmt = $mysql->prepare("INSERT INTO disability_permit_app(column1, colum2, ...)
VALUES (value1, value2, ...)")))//use ?(place holder) for the values and fill in with the variables in the bind.
{   echo "Prepare failed."  }

//Bind the parameters
/*
The "sss" argument lists the types of data that the parameters are. The s character tells mysql that
the parameter is a string. The argument may be one of four types:
i - integer
d - double
s - string
b - BLOB
We must have one of these for each parameter.
*/
/*
if(!($stmt->bind_param("ss", $firstname, $lastname, $...)))
{   echo "Bind failed."  }

//execute the statements then close
$stmt->execute();
$stmt->close();

//close the connection to the db
$conn->close();

*/
//sanitize html input
function val_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
