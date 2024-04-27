<?php
    session_start();
 
    include 'connection.php';

    //Retrieve students in table
    $sqlStudents = "SELECT * FROM students WHERE status = 'TRUE'";
    $result = mysqli_query($conn, $sqlStudents);
    if(mysqli_num_rows($result) > 0)
        {
          $listPerson = [];   
          while($row = mysqli_fetch_array($result)) {
              $listPerson[] = $row;
          }
        }
    $sqlCount = "SELECT COUNT(*) AS total FROM students WHERE status = 'TRUE'";
    $count = mysqli_query($conn,$sqlCount);
    $numbers = mysqli_fetch_array($count, MYSQLI_ASSOC);
    if($numbers['total']!= null){
        $totalStudents = $numbers['total'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="../Admin/Dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Admin/Students.php">Students</a>
        </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Merchs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Admin/ViewMerch.php">View</a>
            <a class="dropdown-item" href="../Admin/OrderMerch.php">Orders</a>
            <a class="dropdown-item" href="../Admin/ReportMerch.php">Reports</a>
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Login.php">Logout</a>
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


if ($_SESSION['adminId'] != null && !isset($_SESSION['success_toast_displayed'])) {
    echo '<script>
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "success",
              title: "Logged In!"
            });
          </script>';

  
    $_SESSION['success_toast_displayed'] = true;
}
else if($_SESSION['adminId'] == null ){
    header('Location: ../Login.php');
}

if(isset($_POST['edit'])){
    $id_number = $_POST['id_number'];
    $sqlEdit = "SELECT * FROM students WHERE id_number = '$id_number'";

    $result = mysqli_query($conn,$sqlEdit);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($user['id_number'] != null){
        $_SESSION['id_number'] = $user['id_number'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['middle_name'] = $user['middle_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['course'] = $user['course'];
        $_SESSION['year'] = $user['year'];

        header('Location: ../Admin/Edit.php ');
    }
}

if(isset($_POST['submitEdit'])){
    $id_number = $_POST['id_number'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    $sqlUpdate = "UPDATE `students` SET `first_name` = '$first_name',`middle_name` = '$middle_name',`last_name` = '$last_name',`email` = '$email',`course` = '$course',`year` = '$year' WHERE `id_number` = '$id_number'";

    if(mysqli_query($conn,$sqlUpdate)){
        echo '<script>alert("Edit Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../Admin/Students.php";</script>';
    }

}

if(isset($_POST['submitAdd'])){
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];

  

    $sql = "INSERT INTO `students` (`id_number`, `first_name`, `middle_name`, `last_name`, `email`,`course`,`year`,`password`)
    VALUES('$id_number','$first_name','$middle_name','$last_name','$email','$course','$year','$password')";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Register Successfull");</script>';
        $conn->close();  
    }
    else{
        echo '<script>alert("Duplicate Id Number");</script>';
        $conn->close();  
    }
}

if(isset($_POST['delete'])){
    $id_number = $_POST['id_number'];

    $sqlDelete = "UPDATE `students` SET `status` = 'FALSE' WHERE `id_number` = '$id_number'";

    if(mysqli_query($conn,$sqlDelete)){
        echo '<script>alert("Delete Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../Admin/Students.php";</script>';
    }
}

?>
