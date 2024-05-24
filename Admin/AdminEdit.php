<?php
session_start();
if ($_SESSION['position'] == "President" || $_SESSION['position'] == "Developer") {
  require '../Controller/ControllerSuperAdmin.php';
} else {
  require '../Controller/ControllerAdmin.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit</title>

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
          Edit Student
        </div>
        <div class="card-body">
          <form action="AdminEdit.php" method="POST">
            <div class="mb-3">
              <label for="id_number" class="form-label">ID Number</label>
              <input type="text" value="<?php echo $_SESSION['id_number'] ?>" class="form-control" id="id_number" name="id_number" readonly>
            </div>
            <div class="mb-3">
              <label for="rfid" class="form-label">RFID</label>
              <input type="text" value="<?php echo $_SESSION['rfid'] ?>" class="form-control" id="rfid" name="rfid" >
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="first_name" class="form-label">First Name</label>
                  <input type="text" value="<?php echo $_SESSION['first_name'] ?>" class="form-control" id="first_name" name="first_name" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="middle_name" class="form-label">Middle Name</label>
                  <input type="text" value="<?php echo $_SESSION['middle_name'] ?>" class="form-control" id="middle_name" name="middle_name" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" value="<?php echo $_SESSION['last_name'] ?>" class="form-control" id="last_name" name="last_name" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" value="<?php echo $_SESSION['email'] ?>" class="form-control" id="email" name="email" required>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="course" class="form-label">Course</label>
                  <select class="form-control"  id="course" name="course" required>
                    <option value="BSIT" <?php if($_SESSION['course'] == "BSIT") echo 'selected'; ?>>BSIT</option>
                    <option value="BSCS" <?php if($_SESSION['course'] == "BSCS") echo 'selected'; ?>>BSCS</option>
                    <option value="ACT" <?php if($_SESSION['course'] == "ACT") echo 'selected'; ?>>ACT</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <select class="form-control" id="year" name="year" required>
                        <option value="1" <?php if($_SESSION['year'] == 1) echo 'selected'; ?>>1</option>
                        <option value="2" <?php if($_SESSION['year'] == 2) echo 'selected'; ?>>2</option>
                        <option value="3" <?php if($_SESSION['year'] == 3) echo 'selected'; ?>>3</option>
                        <option value="4" <?php if($_SESSION['year'] == 4) echo 'selected'; ?>>4</option>
                    </select>
                </div>
            </div>

            </div>
            <div class="row justify-content-between align-items-center">
              <div class="col-md-6">
                <button type="submit" name="submitEdit" class="btn btn-primary">Save</button>
                 <a href="AdminStudents.php" class="btn btn-danger">Back</a>
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
