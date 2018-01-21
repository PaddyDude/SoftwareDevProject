
<?php
  include $_SERVER['DOCUMENT_ROOT'].'/SoftwareProject/Templates/CaseFilters.php';

  abstract class Caselist {

    protected $startDate;
    protected $completionDate;
    protected $applicantEmail;
    protected $deptName;
    protected $cases;
    protected $query;

    /*constructor and set methods create the query*/
    function __construct($dept) {
      $this->deptName = $dept;
      $this->query.= "Department = "."'".$this->deptName."'";
    }

    function get($caseNo){
      return $this->cases[$caseNo];
    }

    function getStartDate() {
      return $this->startDate;
    }

    function setStartDate($date) {
      $this->startDate = $date;
      $this->query.=" and Start Date = "."'".$this->startDate."'";
    }

    function getCompletionDate() {
      return $this->completionDate;
    }

    function setCompletionDate($date) {
      $this->completionDate = $date;
      $this->query.=" and Completion Date = "."'".$this->completionDate."'";
    }

    function getApplicantEmail(){
      return $this->applicantEmail;
    }

    function setApplicantEmail($email) {
      $this->applicantEmail = $email;
      $this->query .= " and applicantEmail = "."'".$this->applicantEmail."'";
    }

    function getDepartment(){
      return $this->deptName;
    }

    function setDepartment($dept) {
      $this->deptName = $dept;
      $this->query .= " and department = "."'".$this->department."'";
    }

    abstract function fetchCases(); 
  }
 ?>
