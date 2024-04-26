<?php
    session_start();
    include 'connection.php';

    //Retrieve students in table
    $sqlStudents = "SELECT * FROM students";
    $result = mysqli_query($conn, $sqlStudents);
    if(mysqli_num_rows($result) > 0)
        {
          $listPerson = [];   
          while($row = mysqli_fetch_array($result)) {
              $listPerson[] = $row;
          }
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
        <li class="nav-item">
          <a class="nav-link" href="#">Merchs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Login.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
</body>
</html>

<?php


if ($_SESSION['adminId'] == 1 && !isset($_SESSION['success_toast_displayed'])) {
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
else if($_SESSION['adminId'] != 1 ){
    header('Location: ../Login.php');
}
?>
