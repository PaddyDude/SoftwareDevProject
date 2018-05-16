<?php

session_start();
include_once("Models/User.php");

class Controller {

    public $model;
    public $msg = " ";

    public function __construct() {
        $this->model = new Model();
    }

    public function remap() {

        $this->model->userCheck();
    }
    public function invoke() {
        $result = $this->model->getlogin();

        // 1= Admin; 2= User
        if ($result == '2') {
            include 'Views/dashboard.php';
        } else if ($result == '1') {
            include 'Views/dashboard.php';
        } else if ($result == '3') {
            include 'Views/dashboard.php';
         } else if ($result == '4') {
            include 'Views/dashboard.php';
        } else {
            include 'Views/login.php';
        }
    }

    public function signup() {
       include 'Views/registerUser.php';
       $msg = $this->model->addUser();
        //include 'Views/ActionForms.php';
    }



    public function changepass() {
        include 'Views/ChangePassword.php';
        $msg = $this->model->changePass();
    }

    public function submitComplaint() {
        include 'Views/submitComplaint.php';
        $msg = $this->model->submitComplaint();
    }

    public function CompHistory() {
        include 'Views/complaintHistory.php';
    }

    public function dashboard() {
        include 'Views/dashboard.php';
    }

         public function parking() {
        include 'Views/parking_permit.php';
    }

     public function film() {
        include 'Views/new film permit.php';
    }

    public function  actionfilm()
    {
        include 'Templates/action_film_permit.php';
    }
     public function  actionparking()
    {
        include 'Templates/action_parking_permit.php';
    }

    public function compDetail($cno) {


        include 'Views/Complaint-details.php';
    }

    public function admincompDetail($cno) {


        include 'Views/adminComplaint-details.php';
    }

     public function noprocessComplaint() {


        include 'Views/notprocess-complaint.php';
    }
     public function inprocessComplaint() {


        include 'Views/inprocess-complaint.php';
    }
    public function closedComplaint() {


        include 'Views/closed-complaint.php';
    }



     public function approverdashboard() {
	 include 'Templates/key_value.php';

        include 'Views/ApproverDashboard.php';
    }
  
  	public function listPage() {
      	include 'Models/Caselist/Formlist.php';
		include 'Views/FormListPage.php';
    }

    public function actionForm() {
      include 'Views/ActionForms.php';
    }

    public function updatecompDetail()
    {
         include 'Views/adminUpdateComplaint.php';
          $msg = $this->model->updateComplaint();
    }


     public function sendcompDetail()
    {
         include 'Views/adminSendComplaint.php';
          $msg = $this->model->sendComplaint();
    }

    public function logout()
    {
         include 'Views/logout.php';

    }

}
