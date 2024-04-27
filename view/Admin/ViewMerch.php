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
   <table class="table">
    <tbody>
        <?php
        $products_count = count($listProducts);
        for ($i = 0; $i < $products_count; $i += 3) {
            echo "<tr>";
            for ($j = $i; $j < min($i + 3, $products_count); $j++) {
                $product = $listProducts[$j];
        ?>
                <td>
                    <img src="data:<?php echo $product['type']; ?>;base64,<?php echo base64_encode($product['data']); ?>" alt="<?php echo $product['name']; ?>" class="product-image same-size">
                    <p><?php echo $product['product_id']; ?></p> 
                    <p><?php echo $product['product_name']; ?></p> 
                    <p><?php echo $product['product_type']; ?></p>
                    <p><?php echo $product['product_price']; ?></p>
                    <p><?php echo $product['product_stocks']; ?></p>
                    <div class="d-flex flex-row gap-2">
                        <button type="button" name="edit" class="btn btn-primary">Edit</button>
                        <button type="button" name="edit" class="btn btn-danger">Delete</button>
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


</body>
</html>