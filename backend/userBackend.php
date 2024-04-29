<?php
    include 'connection.php';

   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <style>
        /* Add your custom styles here */
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }
        .dashboard-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../User/Dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Merchandise
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../User/Merchandise.php">Merchandise</a>
                    <a class="dropdown-item" href="../User/Orders.php">Orders</a>
                    <a class="dropdown-item" href="../User/History.php">History</a>
                </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Login.php">Logout</a>
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

$sqlTableProduct = " SELECT image.id , image.name , image.type , image.data ,product.product_id, product.product_name , product.product_type , product.product_price, product.product_stocks FROM image INNER JOIN product on image.product_id = product.product_id where product.product_stocks != 0 AND product.product_stocks > 0 ";
    $products = mysqli_query($conn, $sqlTableProduct);
    if(mysqli_num_rows($products) > 0)
        {
          $listProducts = []; 
          while($carts = mysqli_fetch_array($products)) {
              $listProducts[] = $carts;
   
        }
      }


      if(isset($_POST['orderConfirm'])){
        $product_id = $_POST['productId'];
        $product_name = $_POST['editName'];
        $product_price = $_POST['editPrice'];
        $product_qty = $_POST['qty'];
        $product_total = $_POST['total'];
        $id_number =   $_SESSION['userId'];

        $sqlGetProduct = "SELECT * FROM `product` WHERE product_id = '$product_id'";
        $resultDataProduct = mysqli_query($conn,$sqlGetProduct);
        $getProduct = mysqli_fetch_array($resultDataProduct, MYSQLI_ASSOC);

        $newStocks = $getProduct['product_stocks'] - $product_qty;
       

        $sqlUpdateStocks = "UPDATE `product` SET `product_stocks` = '$newStocks' WHERE product_id = '$product_id'";
        $sql = "INSERT INTO `orders` (`id_number`,`name`,`size`,`quantity`,`price`,`total`,`product_id`,`status`)
        VALUES('$id_number','$product_name','None','$product_qty','$product_price','$product_total','$product_id','Pending');";
        
        if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sqlUpdateStocks)){
                echo '<script>alert("Ordered Successfull");</script>';


                $conn->close();

            
                echo '<script>window.location.href = "../User/Merchandise.php";</script>';
            }
      }

      if(isset($_POST['cancel'])){
        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $qty = $_POST['quantity'];

        $sqlGetProduct = "SELECT * FROM `product` WHERE product_id = '$product_id'";
        $resultDataProduct = mysqli_query($conn,$sqlGetProduct);
        $getProduct = mysqli_fetch_array($resultDataProduct, MYSQLI_ASSOC);

        $newStocks = $getProduct['product_stocks'] + $qty;
        $sqlUpdateStocks = "UPDATE `product` SET `product_stocks` = '$newStocks' WHERE product_id = '$product_id'";
        $sqlDelete = "DELETE FROM `orders` WHERE order_id = '$order_id';";
   

    if(mysqli_query($conn,$sqlDelete)&&mysqli_query($conn,$sqlUpdateStocks)  ){
        echo '<script>alert("Cancel Successful");</script>';


        $conn->close();

       
        echo '<script>window.location.href = "../User/Orders.php";</script>';
    }
      }
?>