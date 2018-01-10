<?php
  include 'Caselist.php';
  class formList extends Caselist {

    function __construct($dept) {
      $this->query = "SELECT * FROM FORM WHERE ";
      parent::__construct($dept);
    }
  }
?>
