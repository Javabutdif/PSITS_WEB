<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];

    if($id_number == 'admin' && $password == 'admin'){
        header('Location: ../view/Admin/Dashboard.php');
        $_SESSION['adminId'] = 1;
        exit;
    }
}

if($_SESSION['adminId'] = 1){
    session_destroy();
}

if(isset($_POST['submitRegister'])){
    $id_number = $_POST['id_number'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    $sql = "INSERT INTO `students` (`id_number`, `first_name`, `middle_name`, `last_name`, `email`,`course`,`year`)
    VALUES('$id_number','$first_name','$middle_name','$last_name','$email','$course','$year')";

    if(mysqli_query($conn, $sql)){
        echo 'Register Successfull';
    }   
}

?>