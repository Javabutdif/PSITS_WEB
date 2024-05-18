<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PSITS | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg " style="background-color:#074873">
    <div class="container-fluid">
      <img src="img/psits-logo.png" style="width:3rem; height:3rem;"/>
      <a class="navbar-brand text-white" href="index.php">Philippine Society of Information Technology Students</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Community
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Faculty Members</a>
              <a class="dropdown-item" href="Officers.php">Officers</a>
              <a class="dropdown-item" href="Developers.php">Developers</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="Login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="Register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){
        $('.carousel').carousel();
    });
</script>
</body>
</html>
