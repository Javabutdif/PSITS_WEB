<?php   
    include '../../backend/adminBackend.php';
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
            height: 150px;
}
    </style>
</head>
<body>
    <h1>This is the View Merchandise Page</h1>
    
    <div class="container ">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Product</button>
        <br>
        <br>
    <h2>Products</h2>
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
                            <p><strong>Product Id:</strong> <?php echo $product['product_id']; ?></p> 
                            <p><strong>Product Name:</strong> <?php echo $product['product_name']; ?></p> 
                            <p><strong>Product Type:</strong> <?php echo $product['product_type']; ?></p>
                            <p><strong>Product Price:</strong> <?php echo $product['product_price']; ?></p>
                            <p><strong>Product Stocks:</strong> <?php echo $product['product_stocks']; ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row  gap-3">
                          <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-type="<?php echo $product['product_type']; ?>" data-product-price="<?php echo $product['product_price']; ?>" data-product-stocks="<?php echo $product['product_stocks']; ?>">Edit</button>

                        <form action="ViewMerch.php" method="POST" class="delete-form">
                            <input type="hidden" name="id_number" value="<?php echo $product['product_id']; ?>" />
                            <button type="submit" name="deleteProduct" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this Product?')">Delete</button>
                        </form>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" action="ViewMerch.php" enctype="multipart/form-data">
     <div class="modal-body">
    <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter product name" class="form-control">
    </div>
    <div class="form-group">
        <label for="type">Product Type:</label>
        <input type="text" id="type" name="type" placeholder="Enter product type" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Product Price:</label>
        <input type="text" id="price" name="price" placeholder="Enter product price" class="form-control">
    </div>
    <div class="form-group">
        <label for="stocks">Product Stocks:</label>
        <input type="text" id="stocks" name="stocks" placeholder="Enter product stocks" class="form-control">
    </div>
    
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  class="btn btn-primary">Add</button>
      </div>
            </form>
    </div>
  </div>
</div>


<!-- Modal for Editing Product -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        

      <form method="POST" action="ViewMerch.php" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="editProductId" name="editProductId">
          <div class="form-group">
            <label for="editImage">Upload Image:</label>
            <input type="file" id="editImage" name="editImage" class="form-control-file">
          </div>
           <div class="form-group">
            <label for="productId">Product Id:</label>
            <input type="text"  id="productId" name="productId"   class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="editName">Product Name:</label>
            <input type="text"  id="editName" name="editName" placeholder="Enter product name" class="form-control">
          </div>
          <div class="form-group">
            <label for="editType">Product Type:</label>
            <input type="text"  id="editType" name="editType" placeholder="Enter product type" class="form-control">
          </div>
          <div class="form-group">
            <label for="editPrice">Product Price:</label>
            <input type="text"  id="editPrice" name="editPrice" placeholder="Enter product price" class="form-control">
          </div>
          <div class="form-group">
            <label for="editStocks">Product Stocks:</label>
            <input type="text"  id="editStocks" name="editStocks" placeholder="Enter product stocks" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="editSubmit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    // JavaScript to handle click event of edit button
    document.querySelectorAll('.edit-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            // Get product details from data attributes
            var productId = this.getAttribute('data-product-id');
            var productName = this.getAttribute('data-product-name');
            var productType = this.getAttribute('data-product-type');
            var productPrice = this.getAttribute('data-product-price');
            var productStocks = this.getAttribute('data-product-stocks');

            // Populate form fields of edit modal with product details
            document.getElementById('editProductId').value = productId;
             document.getElementById('productId').value = productId;
            document.getElementById('editName').value = productName;
            document.getElementById('editType').value = productType;
            document.getElementById('editPrice').value = productPrice;
            document.getElementById('editStocks').value = productStocks;

            // Trigger the edit modal
         
        });
    });
</script>
    
<script>
document.getElementById("deleteBtn").addEventListener("click", function() {
    if (confirm("Are you sure you want to delete this Product?")) {
        document.getElementById("deleteForm").submit();
    }
});
</script>

</body>
</html>