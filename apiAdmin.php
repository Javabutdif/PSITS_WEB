<?php
    require_once 'BackendAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSITS</title>
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
          <a class="nav-link" href="AdminDashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AdminStudents.php">Students</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Subscriptions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="AdminSubscription.php">View Pending</a>
            <a class="dropdown-item" href="AdminSubscriptionReport.php">History and Report</a>
        </div>
        </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Merchandise
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="AdminViewMerch.php">View</a>
            <a class="dropdown-item" href="AdminOrderMerch.php">Orders</a>
            <a class="dropdown-item" href="AdminReportMerch.php">Reports</a>
        </div>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="AdminChangePassword.php">Change Password</a>
            <a class="dropdown-item" href="Login.php">Logout</a>
        
        </div>
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
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

</body>
</html>


<?php
//Actions
//Login Admin
loginAdmin();

//Cancel Order
if(isset($_POST['cancelOrder'])){
    $order_id = $_POST['order_id'];
    
    if(cancel_order($order_id)){
        echo '<script>alert("Cancel Successful");</script>';
        echo '<script>window.location.href = "AdminOrderMerch.php";</script>';
        exit;
    }
    else{
        echo '<script>alert("Cancel Unsuccessful");</script>';
        echo '<script>window.location.href = "AdminOrderMerch.php";</script>';
        exit;
    }
  
          
}
if(isset($_POST['editStudent'])){
    $id_number = $_POST['id_number'];
    edit_student($id_number);
}
//Change password
if(isset($_POST['changePass'])){
  $newPassword = $_POST['newPassword'];
  $adminId =  $_SESSION['adminId'];

  if(change_admin_password($newPassword,$adminId)){
    echo '<script>alert("Change Password Successful");</script>';
    echo '<script>window.location.href = "AdminDashboard.php";</script>';
    exit;
  }
  else{
    echo '<script>alert("Changed Password Unsuccessful");</script>';
    echo '<script>window.location.href = "AdminDashboard.php";</script>';
    exit;
  }
}

//Edit Student
if(isset($_POST['submitEdit'])){
    $id_number = $_POST['id_number'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    if(submit_edit_student($id_number,$first_name,$middle_name,$last_name,$email,$course,$year)){
        echo '<script>alert("Edit Successful");</script>';
        echo '<script>window.location.href = "AdminStudents.php";</script>';
        exit;
    }
    else{
        echo '<script>alert("Edit Unsuccessful");</script>';
        echo '<script>window.location.href = "AdminStudents.php";</script>';
        exit;
    }

}

//Register Student in admin side
if(isset($_POST['submitAdd'])){
  
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];

        if (submit_add_student($id_number,$password,$first_name,$middle_name,$last_name,$email,$course,$year)) {
            echo '<script>alert("Registration Successful");</script>';
            echo '<script>window.location.href = "AdminStudents.php";</script>';
            exit(); 
        } else {
            echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Duplicate ID Number",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "AdminStudents.php";
            }
        });
            </script>';
            exit(); 
        }
    }





?>