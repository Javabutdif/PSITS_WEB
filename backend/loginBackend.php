<?php

if(isset($_POST['submit'])){
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];

    if($id_number == 'admin' && $password == 'admin'){
        header('Location: ../view/Admin/Dashboard.php');
    }
}

?>