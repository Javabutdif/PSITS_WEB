<?php
    include 'connection.php';
  

 
function loginUser(){
    
if ($_SESSION['userId'] != null && !isset($_SESSION['success_toast_displayed'])) {
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
else if($_SESSION['userId'] == null ){
     echo '<script>window.location.href = "../Login.php";</script>';
}
}


function product_table(){
    $db = Database::getInstance();
    $conn = $db->getConnection(); 
    
    $sqlTableProduct = " SELECT image.id , image.name , image.type , image.data ,product.product_id, product.product_name , product.product_type , product.product_price, product.product_stocks FROM image INNER JOIN product on image.product_id = product.product_id where product.product_stocks != 0 AND product.product_stocks > 0 ";
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

function order_confirm($product_id,$product_name,$product_price,$product_qty,$product_total,$id_number){
    $db = Database::getInstance();
    $conn = $db->getConnection(); 
    $newStocks = get_product($product_id,$product_qty);

    $sqlUpdateStocks = "UPDATE `product` SET `product_stocks` = '$newStocks' WHERE product_id = '$product_id'";
        $sql = "INSERT INTO `orders` (`rfid`,`name`,`size`,`quantity`,`price`,`total`,`product_id`,`status`)
        VALUES('$id_number','$product_name','None','$product_qty','$product_price','$product_total','$product_id','Pending');";
        
        if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sqlUpdateStocks)){return true;}
        else{return false;}

}
function get_product($product_id,$product_qty){
    $db = Database::getInstance();
    $conn = $db->getConnection(); 

    $sqlGetProduct = "SELECT * FROM `product` WHERE product_id = '$product_id'";
    $resultDataProduct = mysqli_query($conn,$sqlGetProduct);
    $getProduct = mysqli_fetch_array($resultDataProduct, MYSQLI_ASSOC);

    return $newStocks = $getProduct['product_stocks'] - $product_qty;
}

function cancel_order($order_id,$product_id,$qty){
    $db = Database::getInstance();
    $conn = $db->getConnection(); 

    $sqlGetProduct = "SELECT * FROM `product` WHERE product_id = '$product_id'";
    $resultDataProduct = mysqli_query($conn,$sqlGetProduct);
    $getProduct = mysqli_fetch_array($resultDataProduct, MYSQLI_ASSOC);

    $newStocks = $getProduct['product_stocks'] + $qty;
    $sqlUpdateStocks = "UPDATE `product` SET `product_stocks` = '$newStocks' WHERE product_id = '$product_id'";
    $sqlDelete = "DELETE FROM `orders` WHERE order_id = '$order_id';";
   

    if(mysqli_query($conn,$sqlDelete)&&mysqli_query($conn,$sqlUpdateStocks)  ){return true;}
    else{return false;}

}

function user_history($id_number){
    $db = Database::getInstance();
    $conn = $db->getConnection(); 

    $sqlUser = "SELECT * FROM orders WHERE rfid = '$id_number' AND status= 'Paid' ";
    $orders = mysqli_query($conn, $sqlUser);
    if(mysqli_num_rows($orders) > 0)
        {
          $listOrders = []; 
          while($order = mysqli_fetch_array($orders)) {
              $listOrders[] = $order;
   
        }
      }
      return $listOrders;
}

function user_orders($id_number){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sqlOrder = "SELECT * FROM orders WHERE rfid = '$id_number' AND status= 'Pending' ";
    $orders = mysqli_query($conn, $sqlOrder);
    if(mysqli_num_rows($orders) > 0)
        {
          $listOrders = []; 
          while($order = mysqli_fetch_array($orders)) {
              $listOrders[] = $order;
   
        }
      }
      return $listOrders;
}

  
?>