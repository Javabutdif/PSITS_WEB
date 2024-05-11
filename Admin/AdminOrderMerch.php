<?php   
     require '../Controller/apiAdmin.php';
     $listOrders = orders();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise</title>
</head>
<body>
    <h1 class="text-center">This is the Order Merchandise Page</h1>

    

<div class="container">
<table id="example" class="table table-striped table-hover display compact " style="width:100%; overflow:auto">
    <thead>
        <tr>
            <th >Order Id</th>
            <th >Student Id Number</th>
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
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['name'] ?></td>
                <td><?php echo $person['size']; ?></td>
                <td><?php echo $person['quantity']; ?></td>
                <td><?php echo $person['price']; ?></td>
                 <td><?php echo $person['total']; ?></td>
                <td class="d-flex flex-row gap-3">
     
           <button type="button" class="w-50 h-50 btn btn-success pay-btn" data-toggle="modal" data-target="#exampleModal" data-order-id = "<?php echo $person['order_id']; ?>" data-product-id = "<?php echo $person['product_id']; ?>"  data-total-id = "<?php echo $person['total']; ?>">Pay</button>

        <form action="AdminOrderMerch.php" method="POST" class="delete-form">
                            <input type="hidden" name="order_id" value="<?php echo $person['order_id']; ?>" />
                            <button type="submit" name="cancelOrder" class="btn btn-danger " onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
            </form>
      
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  </div>
  <br>
  <br>

  
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" action="AdminOrderMerch.php">
     <div class="modal-body">

    <div class="form-group">
        <label for="money">Amount</label>
        <input type="number" id="money" name="money" class="form-control">
        <input type="hidden" id="orderId" name="order_id" class="form-control">
        <input type="hidden" id="totalls" name="total" class="form-control">
        <input type="hidden" id="productId" name="product_id" class="form-control">
    </div>
    
    
    </div>

      <div class="modal-footer">
        <button type="submit" name="submitPayment" class="btn btn-primary">Pay</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </form>
    </div>
  </div>
</div>

    

<script>
new DataTable('#example');
  </script>

<script>

    document.querySelectorAll('.pay-btn').forEach(function(button) {
        button.addEventListener('click', function() {

            var order_id = this.getAttribute('data-order-id');
            var totals = this.getAttribute('data-total-id');
            var product_id = this.getAttribute('data-product-id');
            document.getElementById('orderId').value = order_id;
            document.getElementById('totalls').value = totals;
            document.getElementById('productId').value = product_id;
            
        });
    });
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