
<?php
session_start();
include 'connection.php';

function retrieveStudents(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

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
    return $listPerson;
}
    
function membershipReport(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlSubReport = " SELECT students.id_number , students.first_name, students.middle_name, students.last_name , sub_report.admin_name , sub_report.date, sub_report.time FROM students INNER JOIN sub_report ON sub_report.id_number = students.id_number;";
    $resultReport = mysqli_query($conn, $sqlSubReport);
    if(mysqli_num_rows($resultReport) > 0)
        {
          $reportSub = [];   
          while($row = mysqli_fetch_array($resultReport)) {
              $reportSub[] = $row;
          }
        }
        return $reportSub;
}

function membership(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlSubscribe = "SELECT * FROM students WHERE status = 'TRUE' AND subscription = 'Pending'";
    $resultSub = mysqli_query($conn, $sqlSubscribe);
    if(mysqli_num_rows($resultSub) > 0)
        {
          $listSub = [];   
          while($row = mysqli_fetch_array($resultSub)) {
              $listSub[] = $row;
          }
        }
        return $listSub;
}

function profit(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlProfit = "SELECT SUM(ALL profit) as total from order_details;";
        $profit = mysqli_query($conn,$sqlProfit);
        $revenue = mysqli_fetch_array($profit, MYSQLI_ASSOC);
        if($revenue['total']!= null){
            $totalRevenue = $revenue['total'];
        }
         return $totalRevenue;
}
    
function totalStudents(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlCount = "SELECT COUNT(*) AS total FROM students WHERE status = 'TRUE' AND subscription = 'Approve'";
    $count = mysqli_query($conn,$sqlCount);
    $numbers = mysqli_fetch_array($count, MYSQLI_ASSOC);
    if($numbers['total']!= null){
        $totalStudents = $numbers['total'];
    }
      return $totalStudents;
}
 
function merchandise(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

     $sqlTableProduct = " SELECT image.id , image.name , image.type , image.data ,product.product_id, product.product_name , product.product_type , product.product_price, product.product_stocks FROM image INNER JOIN product on image.product_id = product.product_id;";
    $products = mysqli_query($conn, $sqlTableProduct);
    if(mysqli_num_rows($products) > 0)
        {
          $listProducts = []; 
          while($carts = mysqli_fetch_array($products)) {
              $listProducts[] = $carts;
   
        }
      }
       return $listProducts;

}

function orders(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlUserOrder = "SELECT * FROM orders WHERE status = 'Pending' ";
    $orders = mysqli_query($conn, $sqlUserOrder);
    if(mysqli_num_rows($orders) > 0)
        {
          $listOrders = []; 
          while($order = mysqli_fetch_array($orders)) {
              $listOrders[] = $order;
   
        }
      }
       return $listOrders;
}
   
function orderDetails(){
    $db = Database::getInstance();
    $conn = $db->getConnection();
   
    $sqlUserOrderDetails = "SELECT * FROM order_details  ";
    $ordersD = mysqli_query($conn, $sqlUserOrderDetails);
    if(mysqli_num_rows($ordersD) > 0)
        {
          $orderDetails = []; 
          while($orderD = mysqli_fetch_array($ordersD)) {
              $orderDetails[] = $orderD;
   
        }
      }
      return $orderDetails;
 
}

function loginAdmin(){
    
if ($_SESSION['adminId'] != null && !isset($_SESSION['success_toast_displayed'])) {
    echo '<script>
            const Toast = Swal.mixin({
              toast: true,
              position: "top-start",
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
     echo '<script>window.location.href = "Login.php";</script>';
}
}
      
    
function cancel_order($order_id){
    $db = Database::getInstance();
    $conn = $db->getConnection();
    $sqlDelete = "DELETE FROM `orders` WHERE order_id = '$order_id';";
   

    if(mysqli_query($conn,$sqlDelete) ){
       return true;
    }
    else{
        return false;
    }
}

function edit_student($id_number){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlEdit = "SELECT * FROM students WHERE id_number = ?";
    $stmt = $conn->prepare($sqlEdit);
    $stmt->bind_param('s', $id_number);
    $stmt->execute();
    $resultEdit = $stmt->get_result();
    $userEdit = $resultEdit->fetch_assoc();
    if($userEdit !== null){
      
        $_SESSION['id_number'] = $userEdit['id_number'];
        $_SESSION['first_name'] = $userEdit['first_name'];
        $_SESSION['middle_name'] = $userEdit['middle_name'];
        $_SESSION['last_name'] = $userEdit['last_name'];
        $_SESSION['email'] = $userEdit['email'];
        $_SESSION['course'] = $userEdit['course'];
        $_SESSION['year'] = $userEdit['year'];

        echo '<script>window.location.href = "AdminEdit.php";</script>';
    }

}

function change_admin_password($newPassword, $adminId){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    
    $hashPassword = password_hash($newPassword,PASSWORD_DEFAULT );
    $sqlAdminPassword = "UPDATE `admin` SET `password` = '$hashPassword' WHERE `id_number` = '$adminId' ";
    if(mysqli_query($conn,$sqlAdminPassword)){
        return true;
    }
    else{
        return false;
    }
    
}

function submit_edit_student($id_number,$first_name,$middle_name,$last_name,$email,$course,$year){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlUpdate = "UPDATE `students` SET `first_name` = '$first_name',`middle_name` = '$middle_name',`last_name` = '$last_name',`email` = '$email',`course` = '$course',`year` = '$year' WHERE `id_number` = '$id_number'";

    if(mysqli_query($conn,$sqlUpdate)){return true;}
    else{return false;}

}

function submit_add_student($id_number,$password,$first_name,$middle_name,$last_name,$email,$course,$year){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO students (id_number, first_name, middle_name, last_name, email, course, year, password, status, subscription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'TRUE', 'Pending')");
    $stmt->bind_param("ssssssss", $id_number, $first_name, $middle_name, $last_name, $email, $course, $year, $hashPassword);

        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
        $stmt->close();

}

function delete_student($id_number){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlDelete = "UPDATE `students` SET `status` = 'FALSE' WHERE `id_number` = '$id_number'";

    if(mysqli_query($conn,$sqlDelete)){return true;}
    else{return false;}
}

function cancel_membership($id_number){
    $db = Database::getInstance();
    $conn = $db->getConnection();
    
    $sqlCancel = "DELETE FROM `students` WHERE id_number = '$id_number';";
     if(mysqli_query($conn,$sqlCancel)){return true;}
     else{return false;}
}




//Membership Delete
if(isset($_POST['deleteMembership'])){
     $id_number = $_POST['id_number'];
     $sqlDelete = "DELETE FROM `students` WHERE id_number = '$id_number';";
     if(mysqli_query($conn,$sqlDelete)){
        echo '<script>alert("Delete Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "AdminStudents.php";</script>';
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

       
        echo '<script>window.location.href = "AdminSubscription.php";</script>';
    }
}
//Upload Product and Data
if(isset($_POST['submit'])) {
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Get uploaded image details
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];

        // Resize image
        $max_width = 300; // Set maximum width for the resized image
        $max_height = 300; // Set maximum height for the resized image
        list($width, $height) = getimagesize($tmp_name);
        $ratio = min($max_width/$width, $max_height/$height);
        $new_width = $width * $ratio;
        $new_height = $height * $ratio;

        // Create new image from uploaded file
        switch($type) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($tmp_name);
                break;
            case 'image/png':
                $image = imagecreatefrompng($tmp_name);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($tmp_name);
                break;
            default:
                // Unsupported image type
                echo '<script>alert("Unsupported image type");</script>';
                exit();
        }

        // Create resized image
        $image_resized = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        // Output resized image to a temporary file
        $tmp_resized_name = tempnam(sys_get_temp_dir(), 'resized_image_');
        switch($type) {
            case 'image/jpeg':
            case 'image/jpg':
                imagejpeg($image_resized, $tmp_resized_name);
                break;
            case 'image/png':
                imagepng($image_resized, $tmp_resized_name);
                break;
            case 'image/gif':
                imagegif($image_resized, $tmp_resized_name);
                break;
        }

        // Read resized image data
        $data = file_get_contents($tmp_resized_name);

        // Data for product
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
            echo '<script>window.location.href = "AdminViewMerch.php";</script>';
        } else {
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }

        // Close statements and connection
        $stmtProduct->close();
        $stmtImage->close();
        $conn->close();

        // Clean up temporary files
        imagedestroy($image_resized);
        unlink($tmp_resized_name);
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
            echo '<script>window.location.href = "AdminViewMerch.php";</script>';
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

       
        echo '<script>window.location.href = "AdminViewMerch.php";</script>';
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

      
       

        $id_number = $orderResult['id_number'];
        $name = $orderResult['name'];
        $size = $orderResult['size'];
        $quantity = $orderResult['quantity'];
        $admin_name =  $_SESSION['adminName'];
        $date = date('Y-m-d');
      

       
        $sqlUpdateOrder = "UPDATE `orders` SET `status` = 'Paid' WHERE order_id = '$order_id'";
       $sqlOrderDetails = "INSERT INTO `order_details`(`id_number`,`order_name`,`size`,`quantity`,`money`,`changeCoins`,`profit`,`admin_name`,`date`) VALUES ('$id_number','$name','$size','$quantity','$money','$change','$total','$admin_name','$date')";

         if(mysqli_query($conn,$sqlUpdateOrder) && mysqli_query($conn,$sqlOrderDetails)){
            echo '<script>alert("Ordered Successfully");</script>';
            $conn->close();
            echo '<script>window.location.href = "AdminOrderMerch.php";</script>';
        }

    }


}


  
?>
