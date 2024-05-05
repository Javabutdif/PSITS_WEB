<?php
session_start();
include 'connection.php';
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
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
 <nav class="navbar navbar-expand-sm" style="background-color:#074873">
  <div class="container">
    <img src="img/psits-logo.png" style="width:3rem; height:3rem;"/>
    <a class="navbar-brand text-white" href="index.php"> Philippine Society of Information Technology Students</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
         <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Home</a>
        </li>
         <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Community
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Faculty Members</a>
            <a class="dropdown-item" href="Officers.php">Officers</a>
            <a class="dropdown-item" href="Developers.php">Developers</a>
        </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white" href="Login.php">Login</a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-white" href="Register.php">Register</a>
        </li>
       
       
      </ul>
    </div>
  </div>
</nav>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>


    
</body>
</html>


<?php
   $db = Database::getInstance();
    $conn = $db->getConnection(); 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];


    $hashPassword = password_hash($password, PASSWORD_DEFAULT);


    $stmt = $conn->prepare("INSERT INTO students (id_number, first_name, middle_name, last_name, email, course, year, password, status, subscription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'TRUE', 'Pending')");
    $stmt->bind_param("ssssssss", $id_number, $first_name, $middle_name, $last_name, $email, $course, $year, $hashPassword);


     try {
        if ($stmt->execute()) {
            echo '<script>alert("Registration Successful");</script>';
            echo '<script>window.location.href = "Login.php";</script>';
            exit(); 
        } else {
            echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Duplicate ID Number",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "Register.php";
            }
        });
    </script>';
            exit(); 
        }
    } catch (mysqli_sql_exception $e) {
         echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Duplicate ID Number",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "Register.php";
            }
        });
    </script>';
 
        exit(); 
    }



    $stmt->close();
    $conn->close();

    }

?>