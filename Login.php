<?php
    
    include 'Backend/BackendLogin.php';
    include 'indexInherit.php';
  
if( $_SESSION['adminId'] != null){
    session_destroy();
}
if( $_SESSION['userId'] != null){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
</head>
<body>

    
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mt-5">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">Login</h5>
          <form action="Login.php" method="POST">
            <div class="mb-3">
              <label for="id_number" class="form-label">ID Number</label>
              <input type="text" class="form-control" id="id_number" name="id_number" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary">Login</button>
              <p>Don't have an account? <a href='Register.php'>Click here!</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

 
</body>
</html>