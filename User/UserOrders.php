<?php
   
   require '../Controller/ControllerUser.php';
    $id_number = $_SESSION['user_id'];
    $listOrders = user_orders($id_number);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
<h1 class="text-center">Orders</h1>

<div class="container">
<table id="example" class="table table-striped table-hover table-responsive-lg  " style="width:100%; overflow:auto;">
    <thead>
        <tr>
            <th >Order Id</th>
            <th >Name</th>
            <th >Size</th>
            <th >Quantity</th>
            <th >Price</th>
            <th >Total</th>
            <th >Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listOrders as $person): ?>
            <tr>
                <td><?php echo $person['order_id']; ?></td>
                <td><?php echo $person['name'] ?></td>
                <td><?php echo $person['size']; ?></td>
                <td><?php echo $person['quantity']; ?></td>
                <td><?php echo $person['price']; ?></td>
                 <td><?php echo $person['total']; ?></td>
                <td class="align-middle">
    <div  class="d-flex justify-content-center align-items-center gap-3">
        <form action="UserOrders.php" method="POST" class="delete-form">
                            <input type="hidden" name="order_id" value="<?php echo $person['order_id']; ?>" />
                            <input type="hidden" name="product_id" value="<?php echo $person['product_id']; ?>" />
                            <input type="hidden" name="quantity" value="<?php echo $person['quantity']; ?>" />
                            <button type="submit" name="cancel" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                        </form>
        </div>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  </div>
  <br>
  <br>
    

<script>
new DataTable('#example');
  </script>

    
<script>
document.getElementById("deleteBtn").addEventListener("click", function() {
    if (confirm("Are you sure you want to cancel this order?")) {
        document.getElementById("deleteForm").submit();
    }
});
</script>
    
</body>
</html>