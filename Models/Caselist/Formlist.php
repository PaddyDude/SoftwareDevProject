<?php
  include 'Caselist.php';
  include '../Models/Case/Form.php';
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
      $_type = filter_var($_type, FILTER_SANITIZE_STRING);
      $this->type=$_type;
      $this->updateQuery();
    }

    function updateQuery() {
        $this->query1 = "Select user.email, caseId, path_to_form, status, date_submitted, permit_type, pd_appr, fd_appr, null as dr_appr, null as dmv_appr, manager_appr FROM film_applications INNER JOIN user ON user.username=film_applications.applicant_username INNER JOIN user usrs ON usrs.username=film_applications.cur_assigned WHERE ".$this->applicantQuery." AND date_submitted <= '".$this->submittedBefore."' AND date_submitted >= '".$this->submittedAfter."' AND status Like '%".$this->status."%'AND permit_type Like '%".$this->type."%'";

        $this->query2 = "Select user.email, caseId, path_to_form, status, date_submitted, null as permit_type, null as pd_appr, null as fd_appr, dr_appr, dmv_appr, manager_appr FROM parking_application INNER JOIN user ON user.username=parking_application.applicant_username INNER JOIN user usr ON usr.username=parking_application.cur_assigned WHERE ".$this->applicantQuery." AND date_submitted <= '".$this->submittedBefore."' AND date_submitted >= '".$this->submittedAfter."'AND status Like '%".$this->status."%'";

        $this->query = $this->query1." UNION ".$this->query2;
        //$this->updateQuery();
    }

    function updateQueries() {
        $this->query = $this->query1." UNION ".$this->query2;
    }

    function fetchCases ($filter) {

      /*db variables located in const_db file*/
      include '../const_db.php';

      $db = new mysqli($server, $username, $password, $dbname);
      $result = mysqli_query($db, $this->query);

      $initsCount = $result->num_rows;
      //echo $initsCount;
     for ($i=0; $i<$initsCount; $i++){
          $row = $result->fetch_assoc();
          /*instantiates new permit and adds queried data*/
          $permit = new Form();
          $permit->submissionDate = $row['date_submitted'];
          $permit->status = $row['status'];
          $permit->applicantEmail = $row['email'];
          $permit->type = $row['permit_type'];
          $permit->caseId = $row['caseId'];
          $permit->pathToForm = $row['path_to_form'];
          $permit->hasFire = $row['fd_appr'];
          $permit->hasPolice = $row['pd_appr'];
          $permit->hasVillage = $row['manager_appr'];
          $permit->hasDoctor = $row['dr_appr'];

          /*get elements unique to each type of user*/
            if($this->userDepartment=='Fire') {
              if($permit->hasFire != null) {
                //if dashboard
                  if($filter==true) {
                    if($permit->hasFire == 0) {
                         array_push($this->cases, $permit);
                       }
                  } else {
                    array_push($this->cases, $permit);
                  }
              }
            } else if($this->userDepartment=='Police') {
              if($permit->hasPolice != null) {
                //if dashboard
                  if($filter==true) {
                    if($permit->hasPolice == 0) {
                         array_push($this->cases, $permit);
                       }
                  } else {
                    array_push($this->cases, $permit);
                  }
              }
            } else if($this->userDepartment=='Manager') {
                if($permit->hasVillage != null) {
                  //if dashboard
                    if($filter==true) {
                      if($permit->hasVilalge == 0) {
                           array_push($this->cases, $permit);
                         }
                    } else {
                      array_push($this->cases, $permit);
                    }
                }
              } else if($this->userDepartment=='Doctor') {
                  if($permit->hasDoctor != null) {
                    //if dashboard
                      if($filter==true) {
                        if($permit->hasDoctor == 0) {
                             array_push($this->cases, $permit);
                           }
                      } else {
                        array_push($this->cases, $permit);
                      }
                  }
                } else if($this->userDepartment=='') {
                  array_push($this->cases, $permit);
                }
      }
      return ($this->cases);
    }
  }

?>
