<?php
    session_start();
 
    include 'connection.php';

    //Retrieve students in table
    $sqlStudents = "SELECT * FROM students WHERE status = 'TRUE' AND subscription = 'Approve'";
    $result = mysqli_query($conn, $sqlStudents);
    if(mysqli_num_rows($result) > 0)
        {
          $listPerson = [];   
          while($row = mysqli_fetch_array($result)) {
              $listPerson[] = $row;
          }
        }
       

    $sqlSubReport = " SELECT students.id_number , students.first_name, students.middle_name, students.last_name , sub_report.admin_name , sub_report.date, sub_report.time FROM students INNER JOIN sub_report ON sub_report.id_number = students.id_number;";
    $resultReport = mysqli_query($conn, $sqlSubReport);
    if(mysqli_num_rows($resultReport) > 0)
        {
          $reportSub = [];   
          while($row = mysqli_fetch_array($resultReport)) {
              $reportSub[] = $row;
          }
        }


    $sqlSubscribe = "SELECT * FROM students WHERE status = 'TRUE' AND subscription = 'Pending'";
    $resultSub = mysqli_query($conn, $sqlSubscribe);
    if(mysqli_num_rows($resultSub) > 0)
        {
          $listSub = [];   
          while($row = mysqli_fetch_array($resultSub)) {
              $listSub[] = $row;
          }
        }


    
    $sqlCount = "SELECT COUNT(*) AS total FROM students WHERE status = 'TRUE' AND subscription = 'Approve'";
    $count = mysqli_query($conn,$sqlCount);
    $numbers = mysqli_fetch_array($count, MYSQLI_ASSOC);
    if($numbers['total']!= null){
        $totalStudents = $numbers['total'];
    }
    
    $sqlTableProduct = " SELECT image.id , image.name , image.type , image.data ,product.product_id, product.product_name , product.product_type , product.product_price, product.product_stocks FROM image INNER JOIN product on image.product_id = product.product_id;";
    $products = mysqli_query($conn, $sqlTableProduct);
    if(mysqli_num_rows($products) > 0)
        {
          $listProducts = []; 
          while($carts = mysqli_fetch_array($products)) {
              $listProducts[] = $carts;
   
        }
      }

    $sqlUserOrder = "SELECT * FROM orders WHERE status = 'Pending' ";
    $orders = mysqli_query($conn, $sqlUserOrder);
    if(mysqli_num_rows($orders) > 0)
        {
          $listOrders = []; 
          while($order = mysqli_fetch_array($orders)) {
              $listOrders[] = $order;
   
        }
      }

      
    $sqlUserOrderDetails = "SELECT * FROM order_details  ";
    $ordersD = mysqli_query($conn, $sqlUserOrderDetails);
    if(mysqli_num_rows($ordersD) > 0)
        {
          $orderDetails = []; 
          while($orderD = mysqli_fetch_array($ordersD)) {
              $orderDetails[] = $orderD;
   
        }
      }

    


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
          <a class="nav-link" href="../Admin/Dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Admin/Students.php">Students</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Subscriptions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Admin/Subscription.php">View Pending</a>
            <a class="dropdown-item" href="../Admin/SubscriptionReport.php">History and Report</a>
        </div>
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
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Admin/ChangePassword.php">Change Password</a>
            <a class="dropdown-item" href="../Login.php">Logout</a>
        
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

//Login admin
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

//Retrive Edit student
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
//Change password
if(isset($_POST['changePass'])){
  $newPassword = $_POST['newPassword'];
  $adminId =  $_SESSION['adminId'];

  $sqlAdminPassword = "UPDATE `admin` SET `password` = '$newPassword' WHERE `id_number` = '$adminId' ";
    if(mysqli_query($conn,$sqlAdminPassword)){
        echo '<script>alert("Change Password Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../Admin/Dashboard.php";</script>';
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

    $sqlUpdate = "UPDATE `students` SET `first_name` = '$first_name',`middle_name` = '$middle_name',`last_name` = '$last_name',`email` = '$email',`course` = '$course',`year` = '$year' WHERE `id_number` = '$id_number'";

    if(mysqli_query($conn,$sqlUpdate)){
        echo '<script>alert("Edit Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../Admin/Students.php";</script>';
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

  

   $sql = "INSERT INTO `students` (`id_number`, `first_name`, `middle_name`, `last_name`, `email`,`course`,`year`,`password`, `status`,`subscription`)
    VALUES('$id_number','$first_name','$middle_name','$last_name','$email','$course','$year','$password' , 'TRUE','Pending')";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Register Successfull");</script>';
        $conn->close();  
    }
    else{
        echo '<script>alert("Duplicate Id Number");</script>';
        $conn->close();  
    }
}
//Delete Students
if(isset($_POST['delete'])){
    $id_number = $_POST['id_number'];

    $sqlDelete = "UPDATE `students` SET `status` = 'FALSE' WHERE `id_number` = '$id_number'";

    if(mysqli_query($conn,$sqlDelete)){
        echo '<script>alert("Delete Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../Admin/Students.php";</script>';
    }
}

//Approve Subscription
if(isset($_POST['approve'])){
  $id_number = $_POST['id_number'];
  $adminName = $_SESSION['adminName'];
  $time = date("h:i:sa");
  $date = date('Y-m-d');
  $sqlApprove = "UPDATE `students` SET `subscription` = 'Approve' WHERE `id_number` = '$id_number'";
  $sqlApproveAdmin = "INSERT INTO `sub_report` ( `id_number`, `admin_name`,`date`,`time`) VALUES('$id_number','$adminName','$date','$time')";

   if(mysqli_query($conn,$sqlApprove) && mysqli_query($conn,$sqlApproveAdmin)){
        echo '<script>alert("Approve Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../Admin/Subscription.php";</script>';
    }
}
  //Upload Product and Data
if(isset($_POST['submit'])) {
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $data = file_get_contents($_FILES['image']['tmp_name']);

        // Data
        $product_id = rand(111111,999999);
        $product_name = $_POST['name'];
        $product_type = $_POST['type'];
        $product_price = $_POST['price'];
        $product_stocks = $_POST['stocks'];

        // SQL queries with prepared statements
        $sqlProduct = "INSERT INTO product (`product_id`,`product_name`,`product_type`,`product_price`,`product_stocks`)
                       VALUES (?,?,?,?,?)";
        $sqlImage = "INSERT INTO image (`name`,`type`,`data`,`product_id`)
                     VALUES (?,?,?,?)";

        // Prepare statements
        $stmtProduct = $conn->prepare($sqlProduct);
        $stmtImage = $conn->prepare($sqlImage);

        // Bind parameters and execute statements
        $stmtProduct->bind_param("issss", $product_id, $product_name, $product_type, $product_price, $product_stocks);
        $stmtImage->bind_param("sssi", $name, $type, $data, $product_id);

        // Execute statements
        if($stmtImage->execute() && $stmtProduct->execute()) {
            echo '<script>alert("Add Product Successful");</script>';
            echo '<script>window.location.href = "../Admin/ViewMerch.php";</script>';
        } else {
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }

        // Close statements and connection
        $stmtProduct->close();
        $stmtImage->close();
        $conn->close();
    } else {
        echo '<script>alert("Error uploading image");</script>';
    }
}
if(isset($_POST['editSubmit'])){
   

        $product_id = $_POST['editProductId'];
        $product_name = $_POST['editName'];
        $product_type = $_POST['editType'];
        $product_price = $_POST['editPrice'];
        $product_stocks = $_POST['editStocks'];

        // SQL query to update product details
        $sqlUpdateProducts = "UPDATE `product` SET `product_name` = ?, `product_type` = ?, `product_price` = ?, `product_stocks` = ? WHERE `product_id` = ?";
        $stmtProducts = $conn->prepare($sqlUpdateProducts);
        $stmtProducts->bind_param("ssdii", $product_name, $product_type, $product_price, $product_stocks, $product_id);

        // SQL query to update image details
      
        if($stmtProducts->execute() ) {
            echo '<script>alert("Edit Product Successful");</script>';
            $conn->close();
            echo '<script>window.location.href = "../Admin/ViewMerch.php";</script>';
        } else {
            echo '<script>alert("Error: Edit Product Failed");</script>';
        }
    }


if(isset($_POST['deleteProduct'])){
    $id_number = $_POST['id_number'];

    $sqlDelete = "DELETE FROM `product` WHERE product_id = '$id_number';";
    $sqlDeleteImg = "DELETE FROM `image` WHERE product_id = '$id_number';";

    if(mysqli_query($conn,$sqlDelete) && mysqli_query($conn,$sqlDeleteImg)){
        echo '<script>alert("Delete Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../Admin/ViewMerch.php";</script>';
    }
}

if(isset($_POST['submitPayment'])){
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $money = $_POST['money'];
    $total = $_POST['total'];

    if($money < $total){
        echo '<script>alert("Not Enough Money");</script>';
       
    }
    else{
        $change = $money - $total;

        $sqlGetData = "SELECT * FROM `orders` WHERE order_id = '$order_id'";
        $resultData = mysqli_query($conn,$sqlGetData);
        $orderResult = mysqli_fetch_array($resultData, MYSQLI_ASSOC);

        $sqlGetProduct = "SELECT * FROM `product` WHERE product_id = '$product_id'";
        $resultDataProduct = mysqli_query($conn,$sqlGetProduct);
        $getProduct = mysqli_fetch_array($resultDataProduct, MYSQLI_ASSOC);
       

        $id_number = $orderResult['id_number'];
        $name = $orderResult['name'];
        $size = $orderResult['size'];
        $quantity = $orderResult['quantity'];
        $admin_name =  $_SESSION['adminName'];
        $date = date('Y-m-d');
        $newStocks = $getProduct['product_stocks'] - $quantity;

       $sqlUpdateStocks = "UPDATE `product` SET `product_stocks` = '$newStocks' WHERE product_id = '$product_id'";
        $sqlUpdateOrder = "UPDATE `orders` SET `status` = 'Paid' WHERE order_id = '$order_id'";
       $sqlOrderDetails = "INSERT INTO `order_details`(`id_number`,`order_name`,`size`,`quantity`,`money`,`changeCoins`,`profit`,`admin_name`,`date`) VALUES ('$id_number','$name','$size','$quantity','$money','$change','$total','$admin_name','$date')";

         if(mysqli_query($conn,$sqlUpdateOrder) && mysqli_query($conn,$sqlOrderDetails)&& mysqli_query($conn,$sqlUpdateStocks)){
            echo '<script>alert("Ordered Successfully");</script>';
            $conn->close();
            echo '<script>window.location.href = "../Admin/OrderMerch.php";</script>';
        }

    }


}


  
?>
