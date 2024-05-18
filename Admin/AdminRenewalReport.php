<?php
      require '../Controller/ControllerAdmin.php';
     $reportSub = renewalReport();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renewal Report</title>
</head>
<body>

 
<h1 class="text-center">Renewal Report</h1>

 

  
<div class="container">
<table id="example" class="table table-striped table-hover table-responsive-lg  " style="width:100%; overflow:auto">
    <thead >
        <tr>
            <th >ID Number</th>
            <th>RFID</th>
            <th >Student Name</th>
            <th >Status</th>
            <th >Approve By</th>
            <th >Date</th>
     
       
        </tr>
    </thead>

    <tbody>
        <?php foreach ($reportSub as $person): ?>
            <tr>
                <td><?php echo $person['id_number']; ?></td>
                <td><?php echo $person['rfid']; ?></td>
                <td><?php echo $person['first_name']." ".$person['middle_name'].". ".$person['last_name']; ?></td>
                <td style="color:green">Paid</td>
                <td><?php echo $person['admin_name']; ?></td>
                <td><?php echo $person['renewal_date']; ?></td>
          
               
               
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
 
    
  });
  </script>

    
</body>
</html>