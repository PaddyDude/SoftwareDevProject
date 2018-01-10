<?php

  abstract class AbstractCase
  {
      protected $caseId;
      protected $status;
      protected $submissionDate;
      protected $completionDate;
      protected $currentDept;
      protected $nextDept;
      protected $applicantId;

      abstract protected function sign();

      function getCaseId() {
        return $this->caseId;
      }

      function setCaseId($id) {
        $this->caseId = $id;
      }

      function getStatus() {
        return $this->status;
      }

      function setStatus($_status) {
        $this->status = $status;
      }

      function getSubmissionDate() {
        return $this->submissionDate;
      }

      function setSubmissionDate($date) {
        $this->submissionDate = $date;
      }

      function getCompletionDate() {
        return $this->completionDate;
      }

      function setCompletionDate($date) {
        $this->completionDate = $date;
      }

      function getCurrentDept() {
        return $this->currentDept;
      }

      function setCurrentDept($deptId) {
        $this->currentDept = $deptId;
      }

      function getNextDept() {
        return $this->nextDept;
      }

      function setNextDept($deptId) {
        $this->nextDept = $deptId;
      }

      function getApplicantid() {
        return $this->applicantId;
      }

      function setApplicantId($userId) {
        $this->applicantId = $userId;
      }
  }

?>
