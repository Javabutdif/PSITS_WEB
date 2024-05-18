<?php

require '../Controller/ControllerAdmin.php';
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
                <td style="color:green"><?php echo $person['membership']; ?></td>
               
                <td class="align-middle">
    <div  class="d-flex justify-content-center align-items-center gap-3">
      
        
    
    <button type="button" class="btn btn-success mr-2 approve_btn" data-toggle="modal" data-target="#exampleModal"  data-id_number="<?php echo $person['id_number']; ?>" id="approveBtn">Approve</button>


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


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scan RFID Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" action="AdminMembership.php">
     <div class="modal-body">

    <div class="form-group">
        <label for="rfid">RFID: </label>
        <input type="text" id="rfid" name="rfid" class="form-control">
        <input type="hidden" id="idNum" name="id_number" class="form-control">
     
    </div>
    
    
    </div>

      <div class="modal-footer">
        <button type="submit" name="approveMembership" class="btn btn-primary">Approve</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </form>
    </div>
  </div>
</div>

    


    <script>
new DataTable('#example');
  </script>

<script>

document.querySelectorAll('.approve_btn').forEach(function(button) {
    button.addEventListener('click', function() {

        var id = this.getAttribute('data-id_number');
        document.getElementById('idNum').value = id;
        
    });
});
</script>

     
<script>
document.getElementById("deleteBtn").addEventListener("click", function() {
    if (confirm("Are you sure you want to cancel this membership?")) {
        document.getElementById("deleteForm").submit();
    }
});
</script>



</body>
</html>