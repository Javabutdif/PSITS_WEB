<?php
 
    include 'Backend/BackendRegister.php';
  include 'indexInherit.php';
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>


<style>
  body {
    background-color: #f8f9fa;
  }

  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    background-color: #074873;
    color: #fff;
    border-radius: 10px 10px 0 0;
  }

  .form-control {
    border-radius: 4px;
  }

  .btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 4px;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Register
        </div>
        <div class="card-body">
          
            <div class="mb-3">
              <label for="id_number" class="form-label">ID Number</label>
              <input type="text" class="form-control" id="id_number" name="id_number" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="confirmpassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
            </div>
            <span id="passwordMismatch" style="color: red; display: none;">Passwords do not match</span>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="first_name" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="middle_name" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="course" class="form-label">Course</label>
                  <select class="form-control" id="course" name="course" required>
                    <option value="">Select Course</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                    <option value="ACT">ACT</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="year" class="form-label">Year</label>
                  <select class="form-control" id="year" name="year" required>
                    <option value="">Select Year</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row justify-content-between align-items-center">
              <div class="col-md-6">
                <button type="button" class="btn btn-primary register-btn" data-toggle="modal" data-target="#exampleModal" disabled >Proceed</button>
                 <a href="Login.php" class="btn btn-danger">Back</a>
              </div>
            </div>
    
        </div>
      </div>
    </div>
  </div>
</div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review your information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
     <div class="modal-body">
      <p></p>
    <div class="form-group">
        <label for="id">Id Number:</label>
        <input type="text" id="id" name="id_number" class="form-control-file" readonly>
    </div>
     <div class="form-group">
        <input type="hidden" id="password1" name="password" class="form-control-file" >
    </div>
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name1" name="first_name" class="form-control" readonly>
    </div>
     <div class="form-group">
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name1" name="middle_name" class="form-control" readonly>
    </div>
     <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name1" name="last_name" class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email1" name="email"  class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="course">Course:</label>
        <input type="text" id="course1" name="course"  class="form-control" readonly>
    </div>
    <div class="form-group">
        <label for="year">Year:</label>
        <input type="text" id="year1" name="year"  class="form-control" readonly>
    </div>
    <div class="form-group text-center ">
    <strong style="color:red;">After completing the registration process, a fee of P50 is required to be paid.</strong>
    </div>
    </div>

      <div class="modal-footer">
        <button type="submit" name="submitRegister"  class="btn btn-primary">Register</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
            </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    function checkFields() {
      var id_number = $('#id_number').val();
      var password = $('#password').val();
      var first_name = $('#first_name').val();
      var middle_name = $('#middle_name').val();
      var last_name = $('#last_name').val();
      var email = $('#email').val();
      var course = $('#course').val();
      var year = $('#year').val();

      return (id_number !== "" && password !== "" && first_name !== "" && middle_name !== "" && last_name !== "" && email !== "" && course !== "" && year !== "");
    }
     $('#password, #confirmpassword').on('input', function() {
      var pass = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmpassword").value;
      var passwordMismatchSpan = $('#passwordMismatch');

      if (pass === confirmPassword) {
        passwordMismatchSpan.hide();
        $('.register-btn').prop('disabled', false);
      } else {
        passwordMismatchSpan.show();
        $('.register-btn').prop('disabled', true);
      }
    });
    $('#id_number, #password, #first_name, #middle_name, #last_name, #email, #course, #year').on('input', function() {
      
      
      if (checkFields()) {
        $('.register-btn').prop('disabled', false);
      } else {
        $('.register-btn').prop('disabled', true);
      }
    });

    $('.register-btn').click(function() {
     
      var id_number = $('#id_number').val();
      var password = $('#password').val();
      var first_name = $('#first_name').val();
      var middle_name = $('#middle_name').val();
      var last_name = $('#last_name').val();
      var email = $('#email').val();
      var course = $('#course').val();
      var year = $('#year').val();
      
     
   
      $('#id').val(id_number);
      $('#password1').val(password);
      $('#first_name1').val(first_name);
      $('#middle_name1').val(middle_name);
      $('#last_name1').val(last_name);
      $('#email1').val(email);
      $('#course1').val(course);
      $('#year1').val(year);

    
     
      
     
    });
  });
</script>


</body>
</html>



