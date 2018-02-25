<?php
  include 'Caselist.php';
  include '../Controllers/Case/Form.php';
  class FormList extends Caselist {

    private $query1;
    private $query2;

    function __construct() {
      parent::__construct();
    }

    function setCaseId($id) {
        $this->caseId = $id;
        $this->query1 = $this->query1."AND application_id = '".$id."' ";
        $this->query2 = $this->query1."AND application_id = '".$id."' ";
        $this->updateQueries();
    }

    function setCaseType($_type) {
      $this->type=$_type;
      $this->updateQuery();
    }
    function updateQuery() {
        $this->query1 = "Select users.email, status, submitted, permit_type, police_approval, fire_approval, null as doctor_sig, village_approval FROM film_permit_app INNER JOIN users ON users.id=film_permit_app.applicant_id  INNER JOIN users usrs ON usrs.user_id=film_permit_app.employee_id WHERE users.email LIKE '%".$this->applicantEmail."%' AND submitted <= '".$this->submittedBefore."' AND submitted >= '".$this->submittedAfter."' AND Status Like '%".$this->status."%'AND permit_type Like '%".$this->type."%'";

        $this->query2 = "Select users.email, status, submitted, permit_type, null as police_approval, null as fire_approval, doctor_sig, village_approved FROM disability_permit_app INNER JOIN users ON users.id=disability_permit_app.applicant_id  INNER JOIN users usrs ON usrs.user_id=disability_permit_app.employee_id WHERE users.email LIKE '%".$this->applicantEmail."%' AND submitted <= '".$this->submittedBefore."' AND submitted >= '".$this->submittedAfter."'AND Status Like '%".$this->status."'AND permit_type Like '%".$this->type."%'";

        $this->query = $this->query1." UNION ".$this->query2;
        //$this->updateQuery();
    }

    function updateQueries() {
        $this->query = $this->query1." UNION ".$this->query2;
    }
    function fetchCases () {

      /*db variables located in const_db file*/
      include '../const_db.php';
      //echo $this->query;
      $db = new mysqli($server, $username, $password, $dbname);
      $result = mysqli_query($db, $this->query);
      $initsCount = $result->num_rows;
      //echo $initsCount;

     for ($i=0; $i<$initsCount; $i++){
          $row = $result->fetch_assoc();

          /*instantiates new permit and adds queried data*/
          $permit = new Form();
          $permit->submissionDate = $row['submitted'];
          $permit->status = $row['status'];
          $permit->applicantEmail = $row['email'];
          $permit->type = $row['permit_type'];
          $permit->caseId = $row['application_id'];
          $permit->hasFire = $row['fire_approval'];
          $permit->hasPolice = $row['police_approval'];
          $permit->hasVillage = $row['village_approval'];

          /*get elements unique to film*/

          array_push($this->cases, $permit);
      }
    }
  }

?>
