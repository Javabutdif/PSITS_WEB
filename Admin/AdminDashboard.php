<?php
require_once '../Controller/apiAdmin.php';
$totalStudents = totalStudents();
$totalRevenue = profit();
$membershipProfit = membershipProfit();
$orders = orders();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    #card-h {
      background-color: #144c94;
      color: white;
    }
  </style>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="row ms-1">
    <div class="d-flex flex-row container pt-2 gap-3" style="margin-right:18%">
      <div class="card " style="width: 20rem; height:32rem">
        <h5 class=" card-header text-white text-center " id="card-h">Officer Information</h5>
        <div class="card-body text-center">
          <img class=" card-img rounded-circle" style="height:10rem;width:10rem" src="../img/me.jpg">
          <br>
          <button type="button" class="btn btn-light text-center mt-3">Edit Profile</button>
          <hr>
          <p class="card-text text-left"><i class="fa-solid fa-graduation-cap"></i> <strong>ID Number:</strong>
            <?php echo $_SESSION['adminId']; ?></p>
          <p class="card-text text-left"><i class="fa-solid fa-user-large"></i> <strong>Name:</strong>
            <?php echo $_SESSION['adminName']; ?></p>
          <p class="card-text text-left"><i class="fa-solid fa-graduation-cap"></i> <strong>Role:</strong> Developer</p>


        </div>
      </div>
      <div class="column">
          <div class="card" style="width:17rem">
          <h5 class="card-header"  id="card-h">Total Students</h5>
            <div class="card-body">

              <p class="card-text"><?php echo $totalStudents ?></p>
            </div>
    
        </div>
      
          <div class="card mt-4" style="width:17rem; height: 24.5rem;">
          <h5 class="card-header"  id="card-h">Orders</h5>
            <div class="card-body">
            <div style="overflow-y: auto; max-height: 270px;">
                            <p> <?php foreach ($orders as $row) : ?>
                            <p ><strong>ID: <?php echo $row['rfid'] ?></strong></p>
                            <p><strong>Order Name: </strong><?php echo $row['name'] ?></p>
                            <p><strong>Quantity: </strong><?php echo $row['quantity'] ?></p>
                            <p><strong>Total: ₱</strong><?php echo $row['total'] ?></p>
                            <hr>
                        <?php endforeach; ?>
                        </div>
            </div>
          </div>
      
      </div>

 

  </div>

  <div class="container mt-5">

    <div class="row">

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Orders</h5>
            <p class="card-text">This is some content for orders.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Membership Revenue</h5>
            <p class="card-text"><strong>Php <?php echo ($membershipProfit * 50) ?></strong> </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Merchandise Revenue</h5>
            <p class="card-text"><strong> Php <?php echo $totalRevenue ?></strong> </p>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>