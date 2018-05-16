<?php
  include 'Caselist.php';
  include 'Models/Case/Complaint.php';
  class ComplaintList extends Caselist {

    private $query1;
    private $query2;

    function __construct() {
      parent::__construct();
    }

    function setCaseId($id) {
    }

    function updateQuery() {
        $this->query = "Select user.email, status, regDate, nature, feedback FROM tblcomplaints INNER JOIN user ON user.username=complaints.username WHERE user.email LIKE '%".$this->applicantEmail."%' AND regDate <= '".$this->submittedBefore."' AND regDate >= '".$this->submittedAfter."' AND status Like '%".$this->status."%'";
    }

    function fetchCases () {

      /*db variables located in const_db file*/
      include 'const_db.php';
      //echo $this->query;
      //echo $this->query;
      $db = new mysqli($server, $username, $password, $dbname);
      $result = mysqli_query($db, $this->query);
      $initsCount = $result->num_rows;
      //echo $initsCount;

     for ($i=0; $i<$initsCount; $i++){
          $row = $result->fetch_assoc();

          /*instantiates new permit and adds queried data*/
          $complaint = new Complaint();
          $complaint->submissionDate = $row['regDate'];
          $complaint->status = $row['status'];
          $complaint->applicantEmail = $row['email'];
          $complaint->caseId = $row['complaintNumber'];
          $complaint->complaintDetails = $row['complaintDetails'];
          $complaint->subject = $row['nature'];

          //if($complaint->currentDept == $this->userDepartment) {
              array_push($this->cases, $complaint);
          //}
      }
    }
  }

?>
