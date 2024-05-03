<?php 
    include 'indexInherit.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philippine Society of Information Technology Students</title>
   
</head>
<body>
    <div id="carouselData" class="carousel slide container p-5" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="width:30rem; height:50rem; overflow:hidden;" src="img/psits.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="width:10rem; height:25rem overflow-hidden " src="img/psits.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="width:10rem; height:25rem overflow-hidden " src="img/psits.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselData" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselData" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>    



<script>
    $('.carousel').carousel();
    </script>
</body>
</html>
