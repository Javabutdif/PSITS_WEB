<?php

require '../Backend/BackendUser.php';
require '../assets/navbar_user.php';
?>


<?php
loginUser();

if(isset($_POST['orderConfirm'])){
    $product_id = $_POST['productId'];
    $product_name = $_POST['editName'];
    $product_price = $_POST['editPrice'];
    $product_qty = $_POST['qty'];
    $product_total = $_POST['total'];
    $id_number =   $_SESSION['user_id'];
    $rfid = $_SESSION['user_rfid'];

        
    if(order_confirm($product_id,$product_name,$product_price,$product_qty,$product_total,$id_number,$rfid)){
        echo '<script>alert("Ordered Successfull");</script>';
        echo '<script>window.location.href = "../User/UserMerchandise.php";</script>';
        exit;
    }else{
        echo '<script>alert("Ordered Unsuccessfull");</script>';
        echo '<script>window.location.href = "../User/UserMerchandise.php";</script>';
        exit;
    }
}
if(isset($_POST['cancel'])){
        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $qty = $_POST['quantity'];

       
   

    if(cancel_order($order_id,$product_id,$qty) ){
        echo '<script>alert("Cancel Successful");</script>';
        echo '<script>window.location.href = "../User/UserOrders.php";</script>';
        exit;
    }
    else{
        echo '<script>alert("Unsuccessful");</script>';
        echo '<script>window.location.href = "../User/UserOrders.php";</script>';
        exit;
    }
}


?>