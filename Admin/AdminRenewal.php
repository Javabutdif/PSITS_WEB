<?php
error_reporting(0);
session_start();
if ($_SESSION['position'] == "President" || $_SESSION['position'] == "Developer") {
    require '../Controller/ControllerSuperAdmin.php';
} else {
    require '../Controller/ControllerAdmin.php';
}
     $listSub = renewalTable();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership</title>
</head>
<body>
<h1 class="text-center">Student Membership Renewal</h1>

 

<div class="container">
<table id="example" class="table table-striped table-hover table-responsive-lg " style="width:100%; overflow:auto">
    <thead>
        <tr>
            <th>ID Number</th>
            <th>RFID</th>
            <th>Name</th>
            <th>Year Level</th>
            <th>Course</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listSub as $students): ?>
            <tr>
                <td><?php echo $students['id_number']; ?></td>
                <td><?php echo $students['rfid']; ?></td>
                <td><?php echo $students['first_name']." ".$students['middle_name'].". ".$students['last_name']; ?></td>
                <td><?php echo $students['year']; ?></td>
                <td><?php echo $students['course']; ?></td>
                <td><?php echo $students['email']; ?></td>
                <td style="color:green">Pending</td>
               
                <td class="align-middle">
    <div  class="d-flex justify-content-center align-items-center gap-3">
        <form action="AdminRenewal.php" method="POST" class="approve-form" id="approveForm">
            <input type="hidden" name="id_number" id="idnumber" />
            <input type="hidden" name="admin_name" id="admin" />
            
            <input type="hidden" name="approveRenewal" />
           
        </form>
        <button type="submit"  class="btn btn-success mr-2" data-id_number="<?php echo $students['id_number']; ?>" data-admin_name="<?php echo $_SESSION['adminName'] ?>" id="approveBtn" >Approve</button>

        </div>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  </div>
    <script>
new DataTable('#example');
  </script>

     

<script>
  document.getElementById("approveBtn").addEventListener("click", function(event) {
    if (confirm("Proceed?")) {
        var idNum = this.getAttribute('data-id_number');
        var ad = this.getAttribute('data-admin_name');
        document.getElementById('idnumber').value = idNum;
        document.getElementById('admin').value = ad;
        document.getElementById('approveForm').submit(); // Submit the form
    }
});
</script>


</body>
</html>