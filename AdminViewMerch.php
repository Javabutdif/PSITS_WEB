<?php   
     include 'apiAdmin.php';
    
    $listProducts = merchandise();
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

    <div class="container align-content-center p-5">

    <h2 class="text-center" style="color:#074873">Merchandise</h2>
   <table class="table table-responsive table-borderless ">
    <tbody >
        <?php
        $products_count = count($listProducts);
        for ($i = 0; $i < $products_count; $i += 3) {
            echo "<tr>";
            for ($j = $i; $j < min($i + 3, $products_count); $j++) {
                $product = $listProducts[$j];
        ?>      
                <td class="product-cell ">
                    <div class="card" style="width: 20rem; height:30rem">
                     <div class="card-img-container">
                       <img class="card-img-top product-image same-size" src="data:<?php echo $product['type']; ?>;base64,<?php echo base64_encode($product['data']); ?>" alt="<?php echo $product['name']; ?>" >
                     </div>
                        <div class="card-body">
                         <p class="card-text"><strong>Product Id:</strong> <?php echo $product['product_id']; ?></p> 
                            <p class="card-text" style="width: 200px;"><strong>Product Name:</strong> <?php echo $product['product_name']; ?></p> 
                            <p class="card-text"><strong>Product Type:</strong> <?php echo $product['product_type']; ?></p>
                            <p class="card-text"><strong>Product Price:</strong> <?php echo $product['product_price']; ?></p>
                            <p class="card-text"><strong>Product Stocks:</strong> <?php echo $product['product_stocks']; ?></p>
                        </div>
                        <div class="d-flex flex-row  gap-3 card-footer ">
                          <button class="btn btn-primary ">Add Stocks</button>
                           <button type="button" class="btn btn-dark edit-btn" data-toggle="modal" data-target="#editModal" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-type="<?php echo $product['product_type']; ?>" data-product-price="<?php echo $product['product_price']; ?>" data-product-stocks="<?php echo $product['product_stocks']; ?>" data-product-img="<?php echo base64_encode($product['data']); ?>" data-product-img-type="<?php echo $product['type']; ?>">Edit</button>


                        <form action="AdminViewMerch.php" method="POST" class="delete-form">
                            <input type="hidden" name="id_number" value="<?php echo $product['product_id']; ?>" />
                            <button type="submit" name="deleteProduct" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this Product?')">Delete</button>
                        </form>
                        </div>
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
        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        

      <form method="POST" action="AdminViewMerch.php" enctype="multipart/form-data">
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

<script>
    // Check if products count is zero, then trigger the Add Product modal
    document.addEventListener("DOMContentLoaded", function() {
        var productsCount = <?php echo $products_count; ?>;
        if (productsCount === 0) {
            $('#exampleModal').modal('show');
        }
    });
</script>

</body>
</html>