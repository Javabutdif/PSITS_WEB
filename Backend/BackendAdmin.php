
<?php
session_start();
include 'connection.php';

function retrieveStudents(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    //Retrieve students in table
    $sqlStudents = "SELECT students.id_number, students.first_name, students.middle_name, students.last_name, students.year, students.course, students.email from students inner join renewal on students.id_number = renewal.id_number where students.status = 'TRUE' AND students.subscription = 'Approve' AND renewal.status = 'Deactivate' AND renewal.renewal_date = 'None'";
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
function renewalReport(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sql = "SELECT students.id_number , students.first_name, students.middle_name, students.last_name , renewal.admin_name , renewal.renewal_date  FROM students inner join renewal on students.id_number = renewal.id_number WHERE renewal.status = 'Paid'";
    $resultReport = mysqli_query($conn, $sql);
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
function renewalTable(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlStudents = "SELECT students.id_number, students.first_name, students.middle_name, students.last_name, students.year, students.course, students.email from students inner join renewal on students.id_number = renewal.id_number where students.status = 'TRUE' AND students.subscription = 'Approve' AND renewal.status = 'Activate';";
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
function membershipProfit(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlProfit = "SELECT COUNT(sub_id) as total from sub_report;";
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
    $ren = $conn->prepare("INSERT INTO renewal (id_number,status,admin_name,renewal_date) VALUES (?,'Deactivate','None','None')");
    $ren->bind_param("s", $id_number);
    $stmt->bind_param("ssssssss", $id_number, $first_name, $middle_name, $last_name, $email, $course, $year, $hashPassword);

        try {
            if ($stmt->execute() && $ren->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
       

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


function approve_membership($id_number,$admin_name,$time,$date){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlApprove = "UPDATE `students` SET `subscription` = 'Approve' WHERE `id_number` = '$id_number'";
    $sqlApproveAdmin = "INSERT INTO `sub_report` ( `id_number`, `admin_name`,`date`,`time`) VALUES('$id_number','$admin_name','$date','$time')";

    if(mysqli_query($conn,$sqlApprove) && mysqli_query($conn,$sqlApproveAdmin)){return true;}
    else{return false;}
}




function edit_product($product_id,$product_name,$product_type,$product_price,$product_stocks){
    $db = Database::getInstance();
    $conn = $db->getConnection();

     $sqlUpdateProducts = "UPDATE `product` SET `product_name` = ?, `product_type` = ?, `product_price` = ?, `product_stocks` = ? WHERE `product_id` = ?";
        $stmtProducts = $conn->prepare($sqlUpdateProducts);
        $stmtProducts->bind_param("ssdii", $product_name, $product_type, $product_price, $product_stocks, $product_id);
      
        if($stmtProducts->execute() ) {return true;}
        else{return false;}

}

function delete_product($id_number){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlDelete = "DELETE FROM `product` WHERE product_id = '$id_number';";
    $sqlDeleteImg = "DELETE FROM `image` WHERE product_id = '$id_number';";

    if(mysqli_query($conn,$sqlDelete) && mysqli_query($conn,$sqlDeleteImg)){return true;}
    else{return false;}

}


function payment($order_id, $product_id,$money,$change,$total,$id_number,$name,$size,$quantity,$admin_name,$date){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlUpdateOrder = "UPDATE `orders` SET `status` = 'Paid' WHERE order_id = '$order_id'";
    $sqlOrderDetails = "INSERT INTO `order_details`(`id_number`,`order_name`,`size`,`quantity`,`money`,`changeCoins`,`profit`,`admin_name`,`date`) VALUES ('$id_number','$name','$size','$quantity','$money','$change','$total','$admin_name','$date')";

    if(mysqli_query($conn,$sqlUpdateOrder) && mysqli_query($conn,$sqlOrderDetails)){return true;}
    else{return false;}

}
function order_result($order_id){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlGetData = "SELECT * FROM `orders` WHERE order_id = '$order_id'";
    $resultData = mysqli_query($conn,$sqlGetData);
    $orderResult = mysqli_fetch_array($resultData, MYSQLI_ASSOC);

    return $orderResult;
}

function renewal(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sql = "UPDATE `renewal` SET `status` = 'Activate' WHERE `renewal_date` = 'None'";
    if(mysqli_query($conn,$sql)){return true;}
    else{return false;}

}
function renewal_approve($id_number,$admin_name){
    $db = Database::getInstance();
    $conn = $db->getConnection();
    $date = date("Y-m-d H:i:s");

     $sql = "UPDATE `renewal` SET `status` = 'Paid',`admin_name` ='$admin_name', `renewal_date` = '$date'  WHERE `id_number` = '$id_number'";
     $ren = $conn->prepare("INSERT INTO renewal (id_number,status,admin_name,renewal_date) VALUES (?,'Deactivate','None','None')");
    $ren->bind_param("s", $id_number);

    if(mysqli_query($conn,$sql) && $ren->execute()){return true;}
    else{return false;}
}



  
?>
