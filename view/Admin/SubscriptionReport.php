<?php
    include '../../backend/adminBackend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Report</title>
</head>
<body>

 
<h1 class="text-center">Subscription Report</h1>

 

  
<div class="container">
<table id="example" class="table table-striped table-hover display compact " style="width:100%">
    <thead >
        <tr>
            <th >ID Number</th>
            <th >Name</th>
            <th >Approve By</th>
            <th >Date</th>
            <th >Time</th>
       
        </tr>
    </thead>

    <tbody>
        <?php foreach ($reportSub as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['first_name']." ".$person['middle_name'].". ".$person['last_name']; ?></td>
                <td><?php echo $person['admin_name']; ?></td>
                <td><?php echo $person['date']; ?></td>
                <td><?php echo $person['time']; ?></td>
               
               
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

  
<script>
 let myDataTable = new DataTable('#example', {
    layout: {
      topStart: {
        buttons: ['csv', 'excel', 'pdf', 'print']
      }
      
    }
    ,"oLanguage": {
   "sSearch": "Filter"
 }
    
  });
  </script>

    
</body>
</html>