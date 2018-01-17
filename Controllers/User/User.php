<?php

  class User {

    protected $firstName;
    protected $lastName;
    protected $email;
    protected $address;
    protected $age;
    protected $userId;

    function __construct($fname, $lname, $_email, $_age, $_address, $id) {
      $this->firstName = $fname;
      $this->lastName = $lname;
      $this->email = $_email;
      $this->age = $_age;
      $this->address = $_address;
      $this->userId = $id;
    }

    function getFirstname() {
      return $this->firstName;
    }

    function setFirstName($fName) {
      $this->firstName = $fName;
    }

    function getLastName() {
      return $this->lastName;
    }

    function setLastName($lName) {
      $this->lastName = $lName;
    }

    function getEmail() {
      return $this->email;
    }

    function setEmail($_email) {
      $this->email = $_email;
    }

    function getAddress() {
      return $this->address;
    }

    function setAddress($_address)
    {
      $this->address = $_address;
    }

    function printInfo()
    {

    }
  }

?>
