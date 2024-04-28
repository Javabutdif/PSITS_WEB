<?php
    session_start();
    include '../../backend/userBackend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise</title>
    <style>
        .same-size {
            width: 200px; 
            height: 200px;
        }
    </style>
</head>
<body>

<div class="container ">
    <h2>Merchandise</h2>
   <table class="table">
    <tbody>
        <?php
        $products_count = count($listProducts);
        for ($i = 0; $i < $products_count; $i += 3) {
            echo "<tr>";
            for ($j = $i; $j < min($i + 3, $products_count); $j++) {
                $product = $listProducts[$j];
        ?>
                <td class="product-cell">
                    <div class="product-info">
                        <img src="data:<?php echo $product['type']; ?>;base64,<?php echo base64_encode($product['data']); ?>" alt="<?php echo $product['name']; ?>" class="product-image same-size">
                         <br>
                        <br>
                        <div class="product-details">
                       
                            <p style="width: 200px;"><strong>Product Name:</strong> <?php echo $product['product_name']; ?></p> 
                            <p><strong>Product Type:</strong> <?php echo $product['product_type']; ?></p>
                            <p><strong>Product Price:</strong> <?php echo $product['product_price']; ?></p>
                            <p><strong>Product Stocks:</strong> <?php echo $product['product_stocks']; ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row  gap-3">
                       <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-type="<?php echo $product['product_type']; ?>" data-product-price="<?php echo $product['product_price']; ?>" data-product-stocks="<?php echo $product['product_stocks']; ?>" data-product-img="<?php echo base64_encode($product['data']); ?>" data-product-img-type="<?php echo $product['type']; ?>">Order</button>
                    </div>
                </td>
        <?php
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>



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
        

      <form method="POST" action="Merchandise.php" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="editProductId" name="editProductId">
          <div class="form-group">
            <img id="productImage" class="img-fluid same-size" alt="Product Image" >
        
            <input type="hidden" id="productImgData" name="productImgData">
            <input type="hidden" id="productImgType" name="productImgType">
          </div>
           <div class="form-group">
            <label for="productId">Product Id:</label>
            <input type="text"  id="productId" name="productId"   class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="editName">Product Name:</label>
            <input type="text"  id="editName" name="editName" placeholder="Enter product name" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="editType">Product Type:</label>
            <input type="text"  id="editType" name="editType" placeholder="Enter product type" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="editPrice">Product Price:</label>
            <input type="text"  id="editPrice" name="editPrice" placeholder="Enter product price" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="editStocks">Product Stocks:</label>
            <input type="text"  id="editStocks" name="editStocks" placeholder="Enter product stocks" class="form-control" readonly>
          </div>
           <div class="form-group">
            <label for="qty">Quantity:</label>
            <input type="number"  id="qty" name="qty" placeholder="Enter Quantity" class="form-control" >
            <small id="quantityHelp" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="total">Total:</label>
            <input type="text"  id="total" name="total" placeholder="Total" class="form-control" readonly>
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

  // Call the function initially and whenever the input value changes
  checkStocks();
  document.getElementById('editStocks').addEventListener('input', checkStocks);
    

    document.querySelectorAll('.edit-btn').forEach(function(button) {
        button.addEventListener('click', function() {
          
            var productId = this.getAttribute('data-product-id');
            var productName = this.getAttribute('data-product-name');
            var productType = this.getAttribute('data-product-type');
            var productPrice = this.getAttribute('data-product-price');
            var productStocks = this.getAttribute('data-product-stocks');
            var productImgData = this.getAttribute('data-product-img'); 
            var productImgType = this.getAttribute('data-product-img-type'); 


         
            document.getElementById('editProductId').value = productId;
             document.getElementById('productId').value = productId;
            document.getElementById('editName').value = productName;
            document.getElementById('editType').value = productType;
            document.getElementById('editPrice').value = productPrice;
            document.getElementById('editStocks').value = productStocks;
            var productImage = document.getElementById('productImage');
            productImage.src = 'data:' + productImgType + ';base64,' + productImgData;

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
        } else {
            quantityHelp.textContent = '';
            var total = quantity * productPrice; // Calculate total price
            totalInput.value = total.toFixed(2); // Update the total input field with the calculated total
        }
    });

</script>

    
</body>
</html>