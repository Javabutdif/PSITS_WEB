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
                            <p><strong>Product Id:</strong> <?php echo $product['product_id']; ?></p> 
                            <p style="width: 200px;"><strong>Product Name:</strong> <?php echo $product['product_name']; ?></p> 
                            <p><strong>Product Type:</strong> <?php echo $product['product_type']; ?></p>
                            <p><strong>Product Price:</strong> <?php echo $product['product_price']; ?></p>
                            <p><strong>Product Stocks:</strong> <?php echo $product['product_stocks']; ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row  gap-3">
                       <button type="button" name="order" class="btn btn-primary ">Order</button>
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
    
</body>
</html>