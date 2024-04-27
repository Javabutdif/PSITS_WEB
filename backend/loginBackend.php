<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];

    $sqlAdmin = "SELECT * FROM `admin` WHERE id_number = '$id_number' AND password = '$password'";
    $resultAdmin = mysqli_query($conn,$sqlAdmin);
    $adminGet = mysqli_fetch_array($resultAdmin, MYSQLI_ASSOC);

    if($adminGet['id_number'] != null){
        header('Location: ../view/Admin/Dashboard.php');
        $_SESSION['adminId'] = $adminGet['id_number'];
        $_SESSION['adminName'] = $adminGet['name'];
        exit;
    }
}

if(isset($_SESSION['adminId']) && $_SESSION['adminId'] != null){
    session_destroy();
}

if(isset($_POST['submitRegister'])){
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


?>