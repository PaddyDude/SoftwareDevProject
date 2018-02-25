<?php
//session_start();
include_once("../Models/User/User.php");

class UserController {
     public $user;
     public $msg=" ";


     public function __construct()
     {
          $this->user = new User();


     }

     public function remap()
    {

                $this->user->userCheck();

    }

     public function invoke()
     {
          $result=$this->user->getlogin();

             if($result == 'login')
            {
                include '../Views/welcome.php';
            }
           else
           {
               include '../Views/login.php';

           }

     }
     public function signup()
     {
         include '../Views/registerUser.php';
         $msg=$this->user->addUser();
     }
}
