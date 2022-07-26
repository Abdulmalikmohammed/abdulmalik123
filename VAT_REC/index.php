<?php
    include "connect.php";

?>
<html lang="en">
<head>
  <title>Incoming File VAT Unit</title>
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
      <label for="taxpayer_name">Company Tin</label>
      <input type="text" class="form-control" id="company_tin" placeholder="Enter Company Tin" name="company_tin">
    </div>
    <div class="form-group">
      <label for="pwd">Received by:</label>
      <input type="text" class="form-control" id="received_by" placeholder="Enter Received by" name="received_by">
    </div>
    <!-- <div class="form-group">
      <label for="">Date Received:</label>  
      <input type="datetime-local" class="form-control" id="date" placeholder="Enter Date" name="date">
    </div> -->
    <div class="form-group">
      <label for="pwd">Officer Allocated Code to:</label>
      <input type="text" class="form-control" id="officer_incharge" placeholder="Enter Officer incharge of CODE" name="officer_incharge">
    </div>
    <div class="form-group">
      <label for="pwd">IRNO:</label>
      <input type="text" class="form-control" id="irno" placeholder="Enter IRNO" name="irno">
    </div>
    

    <button type="submit" name="insert" class="btn btn-default">Insert</button>
    
  </form>
</div>
</div>

<div class="col-lg-12">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>S/NO</th>
        <th>Taxpayer Name</th>
        <th>Company Tin</th>
        <th>Received by</th>
        <th>Date Received</th>
        <th>Officer Incharge of the Code</th>
        <th>IR NO</th>
     </tr>
    </thead>
    <thead>
        <?php
        $res = mysqli_query($link,"select * from vatinc_file");
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
                echo "<td>"; echo $row["id"];  echo "</td>";
                echo "<td>"; echo $row["taxpayer_name"]; echo "</td>";
                echo "<td>"; echo $row["company_tin"]; echo "</td>";
                echo "<td>"; echo $row["received_by"];  echo "</td>";
                echo "<td>"; echo $row["date"];  echo "</td>";
                echo "<td>"; echo $row["officer_incharge"];  echo "</td>";
                echo "<td>"; echo $row["irno"];  echo "</td>"; 
                echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>" <button type="button" class="btn btn-danger">Delete</button></a><?php echo "</td>";         
            echo "</tr>";

        }    

        ?>
    </tbody>
  </table>
</div>

</body>


<?php
    if (isset($_POST["insert"])) {
         

        mysqli_query($link,"insert into vatinc_file (taxpayer_name,company_tin, received_by, officer_incharge,irno) values('$_POST[taxpayer_name]','$_POST[company_tin]','$_POST[received_by]','$_POST[officer_incharge]','$_POST[irno]')");
        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
        </script>
        <?php

    }
    

    if (isset($_POST["delete"])) {
        mysqli_query($link,"delete from vatinc_files where taxpayer_name = '$_POST[taxpayer_name]'") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
        </script>
        <?php
    }
    
?>

</html>
