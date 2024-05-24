<?php
error_reporting(0);
session_start();
if ($_SESSION['position'] == "President" || $_SESSION['position'] == "Developer") {
  require '../Controller/ControllerSuperAdmin.php';
} else {
  require '../Controller/ControllerAdmin.php';
}
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