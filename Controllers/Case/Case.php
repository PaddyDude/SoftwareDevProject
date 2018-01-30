<?php

 class userCase
  {
       $caseId;
       $status;
       $submissionDate;
       $completionDate;
       $currentDept;
       $nextDept;
       $applicantId;
       $fetchQuery;
       $type;

    /*  abstract protected function sign();
      abstract protected function addToDb();*/

      /*calls appropriate constructor*/
      function __construct() {
        $args = func_get_args();
        $num = func_num_args();
        if (method_exists($this, $fname='__construct'.$num)) {
            call_user_func_array(array($this, $fname), $args);
        }
      }

      /*Constructor for a new case*/
      function __construct0(){

	     }

      /*constructor for fetching case data by id*/
      function __construct1($id){
        /*db variables located in const_db file*/
        include $'../const_db.php';

        $db = new mysqli($server, $username, $password, $dbname);
        if (mysqli_connect_errno()) { echo "Could not connect to the database!"; exit; }

        $result = $db->query($this->fetchQuery);
        $row = $result->fetch_assoc();

        echo $row["Title"];
      }

      function getCaseId() {
        return $this->caseId;
      }

      function setCaseId($id) {
        $this->caseId = $id;
      }

      function getType() {
        return $this->type;
      }

      function setCaseType($t) {
        $this->type = $t;
      }

      function getStatus() {
        return $this->status;
      }

      function setStatus($_status) {
        $this->status = $status;
      }

      function getSubmissionDate() {
        return $this->submissionDate;
      }

      function setSubmissionDate($date) {
        $this->submissionDate = $date;
      }

      function getCompletionDate() {
        return $this->completionDate;
      }

      function setCompletionDate($date) {
        $this->completionDate = $date;
      }

      function getCurrentDept() {
        return $this->currentDept;
      }

      function setCurrentDept($deptId) {
        $this->currentDept = $deptId;
      }

      function getNextDept() {
        return $this->nextDept;
      }

      function setNextDept($deptId) {
        $this->nextDept = $deptId;
      }

      function getApplicantid() {
        return $this->applicantId;
      }

      function setApplicantId($userId) {
        $this->applicantId = $userId;
      }

      function isValid() {
        if(count($this->errorMessages==0)) {
          return true;
        } else {
          return false;
        }
      }

      function submit() {
        if(isValid){
          addToDb();
        }
      }

  }

?>
