<?php
    session_start();
    include '../../backend/userBackend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

<!-- Dashboard Header -->
<div class="dashboard-header">
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['userName'] ?></h1>
    </div>
</div>

<!-- Dashboard Content -->
<div class="dashboard-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Recent Activity</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id
                            venenatis
                            neque. Vestibulum nec orci vitae nunc ultricies tincidunt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Notifications</h5>
                        <p class="card-text">Nulla facilisi. Morbi non ante vitae justo tristique tristique non vel
                            metus. Integer varius justo nec felis tempus, ac eleifend lacus aliquet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
