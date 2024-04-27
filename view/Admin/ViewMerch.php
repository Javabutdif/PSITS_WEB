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
        <table class="table table-borderless">
            <tbody>
                <tr>
                <td>
                    <img src="../../img/who.webp" class="same-size">
                    <p>Meme Hutao</p>
                    <p>Price: P 50</p>
                    <p>Stocks: 50</p>
                    <div class="d-flex flex-row gap-2 ">
                    <button class="btn btn-primary ">Edit</button>
                    <button class="btn btn-danger ">Delete</button>
                    </div>
                </td>
                  <td>
                    <img src="../../img/rey1.jpg" class="same-size">
                    <p>Rey Cutie Plushie</p>
                    <p>Price: P 100</p>
                    <p>Stocks: 50</p>
                    <div class="d-flex flex-row gap-2 ">
                    <button class="btn btn-primary ">Edit</button>
                    <button class="btn btn-danger ">Delete</button>
                    </div>
                </td>
                  <td>
                    <img src="../../img/rey2.jpg" class="same-size">
                    <p>Rey Adorable Eating</p>
                    <p>Price: P 90</p>
                    <p>Stocks: 50</p>
                    <div class="d-flex flex-row gap-2 ">
                    <button class="btn btn-primary ">Edit</button>
                    <button class="btn btn-danger ">Delete</button>
                    </div>
                </td>
                <td>
                    <img src="../../img/rey2.jpg" class="same-size">
                    <p>Rey Adorable Eating</p>
                    <p>Price: P 90</p>
                    <p>Stocks: 50</p>
                    <div class="d-flex flex-row gap-2 ">
                    <button class="btn btn-primary ">Edit</button>
                    <button class="btn btn-danger ">Delete</button>
                    </div>
                </td>
                </tr>
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
        <form method="post" action="ViewMerch.php" enctype="multipart/form-data">
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