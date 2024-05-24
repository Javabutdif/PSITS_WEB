<?php
include 'Backend/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
            <form action="RegisterAdmin.php" method="POST">
              <div class="mb-3">
                <label for="id_number" class="form-label">ID Number</label>
                <input type="text" class="form-control" id="id_number" name="id_number" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select class="form-control" id="position" name="position" required>
                  <option value="">Select Position</option>
                  <option value="President">President</option>
                  <option value="Vice-President Internal">Vice-President Internal</option>
                  <option value="Vice-President External">Vice-President External</option>
                  <option value="Auditor">Auditor</option>
                  <option value="Secretary">Secretary</option>
                  <option value="Treasurer">Treasurer</option>
                  <option value="Assistant Treasurer">Assistant Treasurer</option>
                  <option value="P.I.O">P.I.O</option>
                  <option value="P.R.O">P.R.O</option>
                  <option value="Chief Volunteer">Chief Volunteer</option>
                  <option value="1st Year Representative">1st Year Representative</option>
                  <option value="2nd Year Representative">2nd Year Representative</option>
                  <option value="3rd Year Representative">3rd Year Representative</option>
                  <option value="4th Year Representative">4th Year Representative</option>
                </select>
              </div>




              <div class="row justify-content-between align-items-center">
                <div class="col-md-6">
                  <button type="submit" name="addAdmin" class="btn btn-primary register-btn">Proceed</button>
                  <a href="Login.php" class="btn btn-danger">Back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php


if (isset($_POST['addAdmin'])) {
  $id_number = $_POST['id_number'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $position = $_POST['position'];
  $db = Database::getInstance();
  $conn = $db->getConnection();



  $hashPassword = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO `admin` (`id_number`, `password`, `name`,`Position`)
    VALUES('$id_number','$hashPassword','$name','$position')";

  if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Register Successfull");</script>';
    $conn->close();
  } else {
    echo '<script>alert("Duplicate Id Number");</script>';
    $conn->close();
  }
}

?>