
<?php

  abstract class Caselist {

    public $userDepartment = "";
    protected $submittedAfter = '2012-01-01';
    protected $submittedBefore = '2419-01-31';
    protected $applicantEmail="";
    protected $status="";
    protected $deptName;
    public $cases;
    protected $selectFrom;
    public $query;
    protected $caseIdj;
    public $errors;
    protected $applicantQuery;

    abstract function updateQuery();

    /*constructor and set methods create the query*/
    function __construct() {
      $this->applicantQuery = "user.email LIKE '%".$this->applicantEmail."%'";
      $this->updateQuery();
      $this->cases = array();
    }

    function setCaseId($id) {
      if (!filter_var($id, FILTER_VALIDATE_INT)) {
        array_push($this->errors, "Case ID must be a number");
      } else {
        $this->caseId = $id;
      }
    }

    function getCaseId() {
      return $this->caseId;
    }

    function setUserDepartment($_dept) {
      //$dept = filter_var($dept, FILTER_SANITIZE_STRING);
      $this->userDepartment = $_dept;
    }

    function setDepartment($dept) {
      $dept = filter_var($dept, FILTER_SANITIZE_STRING);
      $this->deptName = $dept;
    }


    function get($caseNo){
      return $this->cases[$caseNo];
    }

    function getBefore() {
      return $this->submittedBefore;
    }

    function setBefore($date) {
      //  echo"In date";
      if($date != '') {
      //  $date = $this->validateDate($date);
        $this->submittedBefore = $date;
        //echo "date before is ".$date;
        $this->updateQuery();
      }
    }

    function getAfter() {
      return $this->submittedAfter;
    }

    function setAfter($date) {
      //echo"In date";
      if($date != '') {
      //  echo "date is ".$date;
        //$date = $this->validateDate($date);
        $this->submittedAfter = $date;
        //  echo "date after is ".$date;
        $this->updateQuery();
      }
    }

    function getApplicantEmail(){
      return $this->applicantEmail;
    }

    function setApplicantEmail($email, $applicantUser) {
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $this->applicantEmail = $email;

      $this->applicantQuery = "user.email LIKE '%".$this->applicantEmail."%'";

      $this->updateQuery();
    }
    function getDepartment(){
      return $this->deptName;
    }

    function setStatus($_status) {
      $_status = filter_var($_status, FILTER_SANITIZE_STRING);
      $this->status=$_status;
      $this->updateQuery();
    }

    function getCases() {
      echo count($this->cases);
      return $this->cases;
    }

    function validateDate($date)
    {
    /*$format = 'y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;*/
    }

    //abstract function fetchCases();
  }
 ?>
