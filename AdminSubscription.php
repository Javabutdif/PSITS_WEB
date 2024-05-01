<?php
      include 'BackendAdmin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
</head>
<body>
<h1 class="text-center">Pending Student Subscription</h1>

 

<div class="container">
<table id="example" class="table table-striped table-hover display compact " style="width:100%">
    <thead>
        <tr>
            <th class="text-white">ID Number</th>
            <th class="text-white">Name</th>
            <th class="text-white">Year Level</th>
            <th class="text-white">Course</th>
            <th class="text-white">Email</th>
            <th class="text-white">Status</th>
            <th class="text-white">Actions</th>
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
        <form action="AdminSubscription.php" method="POST" class="approve-form" id="approveForm">
            <input type="hidden" name="id_number" value="<?php echo $person['id_number']; ?>" />
            <button type="submit" name="approve" class="btn btn-success mr-2" id="approveBtn" >Approve</button>
        </form>

        <form action="AdminSubscription.php" method="POST" class="delete-form">
                            <input type="hidden" name="id_number" value="<?php echo $person['id_number']; ?>" />
                            <button type="submit" name="deleteMembership" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this Student?')">Delete</button>
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
    if (confirm("Are you sure you want to delete this Student?")) {
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