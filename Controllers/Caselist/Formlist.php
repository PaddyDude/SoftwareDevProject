<?php
  include 'Caselist.php';
  class FormList extends Caselist {

    function __construct() {
      $this->query = "Select * FROM film_permit_app WHERE submitted >= "."'".$this->startDate."'"." and completed >= "."'".$this->completionDate."'";
      //"SELECT * FROM film_permit_app, employee, applicant WHERE submitted= "."'".$this->deptName."'"."
      //parent::__construct($dept);
    }

    function fetchCases () {
      /*db variables located in const_db file*/
      include $_SERVER['DOCUMENT_ROOT'].'/SoftwareProject/const_db.php';

      $db = new mysqli($server, $username, $password, $dbname);
      if (mysqli_connect_errno()) { echo "Could not connect to the database!"; exit; }

      $result = $db->query($this->query);
      $initsCount = $result->num_rows;

      for ($i=0; $i<$initsCount; $i++){
          $row = $result->fetch_assoc();

          echo $row['status'];
          /*instantiates new permit and adds queried data*/
        /*  $permit = new userCase();
          $permit->submissionDate = $row['submitted'];
          $permit->status = $row['status'];*/
      }
    }
  }
?>
