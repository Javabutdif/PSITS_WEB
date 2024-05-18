<?php
    
    require '../Controller/ControllerUser.php';
    $listProducts = product_table();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise</title>
    <style>
       
        .same-size {
            width: 10rem; 
            height: 10rem;
            overflow: hidden;
        
}
        .card-img-top {
            
              object-fit: cover; 
            }
          
            .card-img-container {
              display: flex;
              align-items: center;
              justify-content: center;
              height: 200px;
            }
    </style>
</head>
<body>


<h2 class="text-center my-xl-4 " style="color:#074873">Merchandise</h2>

<div class="container ">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">

    <?php foreach($listProducts as $product): ?>
    <div class="col">
            <div class="card mb-3" style="max-height:30rem">
                <div class="card-img-container">
                <img class="card-img-top  same-size" src="<?php echo $product['filepath']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
                <div class="card-body">
                    <p class="card-text" style="width: 200px;"><strong><?php echo $product['product_name']; ?></strong></p> 
                           
                    <p class="card-text"><strong>₱ <?php echo $product['product_price']; ?>.00</strong> </p>
                    <p class="card-text"><strong>Stocks: <?php echo $product['product_stocks']; ?></strong> </p>
                </div>
                <div class="d-flex flex-row  gap-3 card-footer ">
                  <button type="button" class="btn btn-primary order-btn" data-toggle="modal" data-target="#editModal" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['product_name']; ?>"  data-product-price="<?php echo $product['product_price']; ?>" data-product-stocks="<?php echo $product['product_stocks']; ?>" >Order</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>





<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        

      <form method="POST" action="UserMerchandise.php" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="productId" name="productId">
          
           
          <div class="form-group">
            <label for="editName">Name:</label>
            <input type="text"  id="editName" name="editName" placeholder="Enter product name" class="form-control" readonly>
          </div>
          
          <div class="form-group">
            <label for="editPrice">Price: ₱</label>
            <input type="text"  id="editPrice" name="editPrice" placeholder="Enter product price" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="editStocks">Product Stocks:</label>
            <input type="text"  id="editStocks" name="editStocks" placeholder="Enter product stocks" class="form-control" readonly>
          </div>
           <div class="form-group">
            <label for="qty">Quantity:</label>
            <input type="number" value="1"  id="qty" name="qty" placeholder="Enter Quantity" class="form-control" >
            <small id="quantityHelp" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="total">Total:</label>
            <input type="text"   id="total" name="total" placeholder="Total" class="form-control" readonly>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="orderConfirm" class="btn btn-primary" disabled>Order</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>

</script>

<script>
  function checkStocks() {
    var stocks = parseInt(document.getElementById('editStocks').value);
    var orderButton = document.querySelector('[name="orderConfirm"]');
    
    if (stocks <= 0) {
      orderButton.disabled = true;
    } else {
      orderButton.disabled = false;
    }
  }

  
  checkStocks();
  document.getElementById('editStocks').addEventListener('input', checkStocks);
    

    document.querySelectorAll('.order-btn').forEach(function(button) {
        button.addEventListener('click', function() {
          
            var productId = this.getAttribute('data-product-id');
            var productName = this.getAttribute('data-product-name');
            var productPrice = this.getAttribute('data-product-price');
            var productStocks = this.getAttribute('data-product-stocks');



             document.getElementById('productId').value = productId;
            document.getElementById('editName').value = productName;
            document.getElementById('editPrice').value = productPrice;
            document.getElementById('total').value = productPrice;
            document.getElementById('editStocks').value = productStocks;
        
             checkStocks();

         
        });
    });
     
    document.getElementById('qty').addEventListener('change', function() {
        var stocks = parseInt(document.getElementById('editStocks').value);
        var quantity = parseInt(this.value);
        var productPrice = parseFloat(document.getElementById('editPrice').value); // Parse float for price
        var totalInput = document.getElementById('total'); // Get the total input element

        var quantityHelp = document.getElementById('quantityHelp');

        if (quantity > stocks) {
            quantityHelp.innerHTML = '<strong>Quantity exceeds available stocks</strong>';
            this.value = stocks; 
        }
        else if(quantity <= 0){
    quantityHelp.innerHTML = '<strong>Please enter a quantity greater than zero</strong>';
    this.value = stocks;
      }

         else {
            quantityHelp.textContent = '';
            var total = quantity * productPrice; // Calculate total price
            totalInput.value = total.toFixed(2); // Update the total input field with the calculated total
        }
    });

</script>

    
</body>
</html>