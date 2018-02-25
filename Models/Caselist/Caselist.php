
<?php

  abstract class Caselist {

    protected $submittedAfter = '2012-01-01';
    protected $submittedBefore = '2419-01-31';
    protected $applicantEmail="";
    protected $status="";
    protected $deptName;
    public $cases;
    protected $selectFrom;
    protected $query;
    protected $caseId;


    abstract function updateQuery();

    /*constructor and set methods create the query*/
    function __construct() {
      $this->updateQuery();
      $this->cases = array();
    }

    function setCaseId($id) {
      $this->caseId = $id;
    }

    function getCaseId() {
      return $this->caseId;
    }

    function setDepartment($dept) {
      $this->deptName = $dept;
    }

    function get($caseNo){
      return $this->cases[$caseNo];
    }

    function getBefore() {
      return $this->submittedBefore;
    }

    function setBefore($date) {
      $this->submittedBefore = $date;
      $this->updateQuery();
    }

    function getAfter() {
      return $this->submittedAfter;
    }

    function setAfter($date) {
      $this->submitedAfter = $date;
      $this->updateQuery();
    }

    function getApplicantEmail(){
      return $this->applicantEmail;
    }

    function setApplicantEmail($email) {
      $this->applicantEmail = $email;
      $this->updateQuery();
    }
    function getDepartment(){
      return $this->deptName;
    }

    function setStatus($_status) {
      $this->status=$_status;
      $this->updateQuery();
    }

    //abstract function fetchCases();
  }
 ?>
