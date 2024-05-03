<?php
      include '../api/apiAdmin.php';
      $totalStudents = totalStudents();
      $totalRevenue = profit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
  <h1>Welcome! <?php echo $_SESSION['adminName'] ?></h1>
  <div class="row">
    <div class="col-md-4 mb-4"> 
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Subscribe Students</h5>
          <p class="card-text"><?php echo $totalStudents?></p>
        </div>
      </div>
    </div>
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
          <h5 class="card-title">Subscription Revenue</h5>
          <p class="card-text"><strong>Php <?php echo ($totalStudents*50) ?></strong> </p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4"> 
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Merchandise Revenue</h5>
          <p class="card-text"><strong>  Php <?php echo $totalRevenue ?></strong> </p>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
