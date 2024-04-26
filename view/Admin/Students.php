<?php   
    include '../../backend/adminBackend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Students</title>
</head>
<body>
    
<h1 class="text-center">Students Information</h1>

 
<!-- Table -->
<div class="container d-flex flex-row  gap-3 ">
  <a class="btn btn-primary " href="Add.php">Add Students</a>
</div>

  
<div class="container">
<table id="example" class="table table-striped table-hover display compact " style="width:100%">
    <thead>
        <tr>
            <th class="text-white">ID Number</th>
            <th class="text-white">Name</th>
            <th class="text-white">Year Level</th>
            <th class="text-white">Course</th>
            <th class="text-white">Remaining Session</th>
            <th class="text-white">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listPerson as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['firstName']." ".$person['middleName'].". ".$person['lastName']; ?></td>
                <td><?php echo $person['yearLevel']; ?></td>
                <td><?php echo $person['course']; ?></td>
                <td><?php echo $person['session']; ?></td>
               
                <td class="align-middle">
    <div  class="d-flex justify-content-center align-items-center gap-3">
    <form action="Admin.php" method="POST">
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>"/>
        </form>
        <form action="Students.php" method="POST" class="delete-form">
                            <input type="hidden" name="idNum" value="<?php echo $person['id_number']; ?>" />
                            <button type="submit" name="delete" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this Student?')">Delete</button>
                        </form>
        </div>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  </div>
  <br>
  <br>
    

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

</body>
</html>