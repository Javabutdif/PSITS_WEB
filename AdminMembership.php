<?php
     include 'apiAdmin.php';
     $listSub = membership();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership</title>
</head>
<body>
<h1 class="text-center">Student Membership</h1>

 

<div class="container">
<table id="example" class="table table-striped table-hover display compact " style="width:100%; overflow:auto">
    <thead>
        <tr>
            <th>ID Number</th>
            <th>Name</th>
            <th>Year Level</th>
            <th>Course</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listSub as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['first_name']." ".$person['middle_name'].". ".$person['last_name']; ?></td>
                <td><?php echo $person['year']; ?></td>
                <td><?php echo $person['course']; ?></td>
                <td><?php echo $person['email']; ?></td>
                <td style="color:green"><?php echo $person['subscription']; ?></td>
               
                <td class="align-middle">
    <div  class="d-flex justify-content-center align-items-center gap-3">
        <form action="AdminMembership.php" method="POST" class="approve-form" id="approveForm">
            <input type="hidden" name="id_number" value="<?php echo $person['id_number']; ?>" />
            <button type="submit" name="approve" class="btn btn-success mr-2" id="approveBtn" >Approve</button>
        </form>

        <form action="AdminMembership.php" method="POST" class="delete-form">
                            <input type="hidden" name="id_number" value="<?php echo $person['id_number']; ?>" />
                            <button type="submit" name="cancelMembership" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to cancel this membership?')">Cancel</button>
        </form>
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
document.getElementById("deleteBtn").addEventListener("click", function() {
    if (confirm("Are you sure you want to cancel this membership?")) {
        document.getElementById("deleteForm").submit();
    }
});
</script>
<script>
document.getElementById("approveBtn").addEventListener("click", function() {
    if (confirm("Proceed?")) {
        document.getElementById("approveForm").submit();
    }
});
</script>


</body>
</html>