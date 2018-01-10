<?php
  include 'Case.php';

  abstract class Form extends AbstractCase
  {
      abstract protected function approve();
      abstract protected function reject();
  }

?>
