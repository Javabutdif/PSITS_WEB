<?php
session_start();
include 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>



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
    
if(isset($_POST['submit'])){
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];

    //Admin Login
    $sqlAdmin = "SELECT * FROM `admin` WHERE id_number = '$id_number'";
    $resultAdmin = mysqli_query($conn,$sqlAdmin);
    $adminGet = mysqli_fetch_array($resultAdmin, MYSQLI_ASSOC);
    //User Login
    $sqlUser = "SELECT * FROM `students` WHERE id_number = '$id_number'";
    $resultUser = mysqli_query($conn,$sqlUser);
    $userGet = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);

    if($adminGet['id_number'] != null && password_verify($password,$adminGet['password'])){
        ini_set('session.cookie_lifetime', 1800);
        $_SESSION['adminId'] = $adminGet['id_number'];
        $_SESSION['adminName'] = $adminGet['name'];
        session_regenerate_id();
        header('Location: AdminDashboard.php');
        exit;
    }
    else if($userGet['id_number'] != null && $userGet['subscription'] == 'Approve' && password_verify($password,$userGet['password'])){
        ini_set('session.cookie_lifetime', 1800);
        $_SESSION['userId'] = $userGet['id_number'];
        $_SESSION['userName'] = $userGet['first_name']." ".$userGet['middle_name'].". ".$userGet['last_name'];
        session_regenerate_id();
        header('Location: UserDashboard.php');
        exit;
    }
    else if($userGet['id_number'] != null && $userGet['subscription'] == 'Pending' && password_verify($password,$userGet['password'])){
        echo '<script>Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "You Need to Pay for the Subscription at the PSITS Office!",
					
				  });</script>';
    }
    else{
        echo '<script>Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Incorret ID Number and Password!",
					
				  });</script>';
    }
}


?>