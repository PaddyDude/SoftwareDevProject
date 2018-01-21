<?php
  include 'Caselist.php';
  class formList extends Caselist {

    function __construct($dept) {
      $this->query = "SELECT * FROM FORM WHERE ";
      parent::__construct($dept);
    }

    function fetchCases () {
      /*db variables located in const_db file*/
      include $_SERVER['DOCUMENT_ROOT'].'/SoftwareProject/const_db.php';

      $db = new mysqli($server, $username, $password, $dbname);
      if (mysqli_connect_errno()) { echo "Could not connect to the database!"; exit; }

      $result = $db->query($this->query);
      $initsCount = $result->num_rows;

      for ($i=0; $i<$initsCount; $i++){
      /*$case = new Case();
        $row = $result->fetch_assoc();
        $case->setCaseId($row["id"]);
        echo $case->caseId;*/
      }
    }
  }
?>
