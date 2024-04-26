<?php
    include '../backend/loginBackend.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    background-color: #343a40;
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
          <form action="Register.php" method="POST">
            <div class="mb-3">
              <label for="id_number" class="form-label">ID Number</label>
              <input type="text" class="form-control" id="id_number" name="id_number" required>
            </div>
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
                  <input type="text" class="form-control" id="middle_name" name="middle_name">
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
                <button type="submit" name="submitRegister" class="btn btn-primary">Register</button>
                 <a href="Login.php" class="btn btn-danger">Back</a>
              </div>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
