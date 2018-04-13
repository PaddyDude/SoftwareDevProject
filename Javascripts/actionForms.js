function validateForm() {
  let x = document.querySelector("input[name='approve']").checked,
      w = document.querySelector("input[name='reject']").checked,
      y = document.querySelector("input[name='pd_appr']").checked,
      z = document.querySelector("input[name='fd_appr']").checked,
      submit = true;

    if (x === false && w === false) {
        apprError = 'Form cannot be submitted without an Approval or Rejection.';
        document.getElementById('appr_error').innerHTML = apprError;
        submit = false;
    }

    if (x === true && w === true) {
        apprError = 'Please only select one option.';
        document.getElementById('appr_error').innerHTML = apprError;
        submit = false;
    }

    if (y === false && x === true) {
        pdError = 'Form cannot be submitted without approval from the Village Police Chief.';
        document.getElementById('pd_error').innerHTML = pdError;
        submit = false;
    }

    if (z === false && x === true) {
        fdError = 'Form cannot be submitted without approval from the Village Fire Chief.';
        document.getElementById('fd_error').innerHTML = fdError;
        submit = false;
    }

    return submit;
}


function setCaseIdValue() {
  const caseId = document.getElementById('caseId_display').innerHTML;
  document.getElementById('caseId').value = caseId;
}

function removeWarning() {
  document.getElementById(this.id + '_error').innerHTML = '';
}


