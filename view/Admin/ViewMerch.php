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
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>