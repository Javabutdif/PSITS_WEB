<?php   
     include 'apiAdmin.php';
     $listPerson = retrieveStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Students</title>
</head>
<body>
    
<h1 class="text-center">Students Information</h1>

 
<!-- Table -->
<div class="container d-flex flex-row  gap-3 ">
  <a class="btn btn-primary " href="AdminAddStudent.php">Add Student</a>
</div>

  
<div class="container">
<table id="example" class="table table-striped table-hover display compact " style="width:100%">
    <thead>
        <tr>
            <th>ID Number</th>
            <th>Name</th>
            <th>Year Level</th>
            <th>Course</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($listPerson as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['first_name']." ".$person['middle_name'].". ".$person['last_name']; ?></td>
                <td><?php echo $person['year']; ?></td>
                <td><?php echo $person['course']; ?></td>
                <td><?php echo $person['email']; ?></td>
               
                <td class="align-middle">
    <div  class="d-flex justify-content-center align-items-center gap-3">
    <form action="AdminStudents.php" method="POST">
        <button type="submit" name="editStudent" class="btn btn-primary">Edit</button>
        <input type="hidden" name="id_number" value="<?php echo $person['id_number']; ?>"/>
        </form>
        
        <form action="AdminStudents.php" method="POST" class="delete-form">
                            <input type="hidden" name="id_number" value="<?php echo $person['id_number']; ?>" />
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