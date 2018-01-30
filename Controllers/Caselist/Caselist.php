
<?php
  include '../Templates/CaseFilters.php';

  abstract class Caselist {

    protected $startDate = '2012-01-01';
    protected $completionDate = '2012-01-31';
    protected $applicantEmail;
    protected $status;
    protected $deptName;
    protected $cases;
    protected $query;

    /*constructor and set methods create the query*/
    function __construct() {
    }

    function setDepartment($dept) {
      $this->deptName = $dept;
      $this->query.= "and department Like "."'".$this->deptName."'";
    }

    function get($caseNo){
      return $this->cases[$caseNo];
    }

    function getStartDate() {
      return $this->startDate;
    }

    function setStartDate($date) {
      $this->startDate = $date;

    }

    function getCompletionDate() {
      return $this->completionDate;
    }

    function setCompletionDate($date) {
      $this->completionDate = $date;
    }

    function getApplicantEmail(){
      return $this->applicantEmail;
    }

    function setApplicantEmail($email) {
      $this->applicantEmail = $email;
      $this->query .= " and employee_id = (Select employee_id FROM employee WHERE user_id = (Select user_id FROM users Where email = "."'".$this->applicantEmail."'))";
    }
    function getDepartment(){
      return $this->deptName;
    }

    //abstract function fetchCases();
  }
 ?>
