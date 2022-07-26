
<?php
    include "connect.php";
    $id = $_GET["id"];
    $taxpayer_name = "";
    $received_by = "";
    $dt = "";
    $officer_incharge = "";
     

    $res = mysqli_query($link,"select * from vatinc_file where id = '$id'");
    while ($row = mysqli_fetch_array($res)) 
    {
        $taxpayer_name = $row["taxpayer_name"];
        $received_by = $row["received_by"];
        $dt = $row["date"];
        $officer_incharge = $row["officer_incharge"];
        
    }

?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
  <h2>VAT Unit Incoming File Records</h2>
  <form action="" name="foral" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="taxpayer_name">Taxpayer Name</label>
      <input type="taxpayer_name" class="form-control" id="taxpayer_name" placeholder="Enter Name of Taxpayer" name="taxpayer_name">
    </div>
    <div class="form-group">
      <label for="pwd">Received by:</label>
      <input type="text" class="form-control" id="received_by" placeholder="Enter Received by" name="received_by">
    </div>
    <div class="form-group">
      <label for="date">Date Received:</label>
      <input type="datetime-local" class="form-control" id="date" placeholder="Enter Datetime" name="date">
    </div>
    <div class="form-group">
      <label for="pwd">Officer Allocated Code to:</label>
      <input type="text" class="form-control" id="officer_incharge" placeholder="Enter Officer incharge of CODE" name="officer_incharge">
    </div>
        
    <button type="button" name="update" class="btn btn-default">Update</button>
    
  </form>
</div>
</div>

</div>

</body> 

<?php
if (isset($_POST["update"]))
 {

  mysqli_query($link,"update table1 set taxpayer_name ='$_POST[taxpayer_name]',received_by ='$_POST[received_by]',date='$_POST[date]',officer_incharge='$_POST[officer_incharge]' where id=$id");
 }
 else {
  
 }

          
    ?>
       <script type="text/javascript">
        window.location ="index.php";
       </script> 
    <?php

 

?>
    


</html>
