<?php
  include 'Form.php';

  class FilmPermit extends Form {
    //protected $;
    //protected $hasPoliceSig;

    public $hasFire;
    public $hasPolice;
    public $hasManager;

    function __construct1($id) {
      $this->fetchQuery = "SELECT * FROM FORM WHERE id = ".$id;
      parent::__construct1($id);
    }

    function approve() {

    }

    function reject(){

    }

    function sign() {

    }

    function addToDb() {

    }
  }

?>
