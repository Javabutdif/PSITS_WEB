<?php   
    include '../../backend/adminBackend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise</title>
</head>
<body>
    <h1 class="text-center">This is the Report Merchandise Page</h1>

    
<div class="container">
<table id="example" class="table table-striped table-hover display compact " style="width:100%">
    <thead>
        <tr>
            <th >Order Id</th>
            <th >Student Id Number</th>
            <th >Name</th>
            <th >Size</th>
            <th >Quantity</th>
            <th >Money</th>
            <th >Change</th>
            <th >Profit</th>
            <th >Admin Approval</th>
            <th >Date</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($orderDetails as $person): ?>
            <tr>
                <td><?php echo $person['order_details_id']; ?></td>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['order_name'] ?></td>
                <td><?php echo $person['size']; ?></td>
                <td><?php echo $person['quantity']; ?></td>
                <td><?php echo $person['money']; ?></td>
                 <td><?php echo $person['changeCoins']; ?></td>
                 <td><?php echo $person['profit']; ?></td>
                 <td><?php echo $person['admin_name']; ?></td>
                 <td><?php echo $person['date']; ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  </div>

  
<script>
new DataTable('#example');
  </script>

</body>
</html>