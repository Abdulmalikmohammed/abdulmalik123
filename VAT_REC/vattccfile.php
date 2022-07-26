<?php
    include "connect.php";

?>
<html lang="en">
<head>
  <title>Tcc Processing File Movement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
  <h2>VAT Unit TCC File Movement</h2>
  <form action="" name="foral" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="taxpayer_name">Taxpayer Name</label>
      <input type="taxpayer_name" class="form-control" id="taxpayer_name" placeholder="Enter Name of Taxpayer" name="taxpayer_name">
    </div>
    <div class="form-group">
      <label for="taxpayer_tin">Company Tin</label>
      <input type="text" class="form-control" id="taxpayer_tin" placeholder="Enter Taxpayer Tin" name="taxpayer_tin">
    </div>
    <div class="form-group">
      <label for="pwd">Treated By:</label>
      <input type="text" class="form-control" id="treated_by" placeholder="Enter Officer Treating The File " name="treated_by">
    </div>
    <div class="form-group">
      <label for="pwd">IRNO:</label>
      <input type="text" class="form-control" id="irno" placeholder="Enter IRNO" name="irno">
    </div>
    <!-- <div class="form-group">
      <label for="">Date Received:</label>  
      <input type="datetime-local" class="form-control" id="date" placeholder="Enter Date" name="date">
    </div> -->
    <div class="form-group">
      <label for="pwd">Remarks:</label>
      <input type="text" class="form-control" id="remarks" placeholder="Enter Remarks" name="remarks">
    </div>
    <div class="form-group">
      <label for="pwd">Forwarded To:</label>
      <Select type="text" name="forwarded_to" class="form-control" class="btn btn-primary">
      <option value="">---Select Unit</option>
      <option value="VAT Unit">VAT Unit</option> 
      <option value="Tax Accounting Unit" >Tax Acounting Unit</option>
      <option value="RPP Unit">RPP  Unit</option>
      <option value="FDA&E Unit">FDA&E Unit</option>
      <option value="Central Registry Unit">Central Registry Unit</option>
      <option value="Taxpayer Service Unit" >Taxpayer Service Unit</option>
      <option value="Tc Office"> TC Office Unit</option>
    </Select>
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
        <th>Taxpayer Tin</th>
        <th>traeted By</th>
        <th>IRNO</th>
        <th>Remarks</th>
        <th>Forwarded To</th>
     </tr>
    </thead>
    <thead>
        <?php
        $res = mysqli_query($link,"select * from vattccfilemove");
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
                echo "<td>"; echo $row["id"];  echo "</td>";
                echo "<td>"; echo $row["taxpayer_name"]; echo "</td>";
                echo "<td>"; echo $row["taxpayer_tin"]; echo "</td>";
                echo "<td>"; echo $row["treated_by"];  echo "</td>";
                echo "<td>"; echo $row["irno"];  echo "</td>";
                echo "<td>"; echo $row["remarks"];  echo "</td>";
                echo "<td>"; echo $row["forwarded_to"];  echo "</td>";
                echo "<td>"; echo $row["date"];  echo "</td>";
                echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>" <button type="button" class="btn btn-success">Edit</button></a><?php  echo "</td>";
                echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>" <button type="button" class="btn btn-danger">Delete</button></a><?php  echo "</td>";         
            echo "</tr>";

        }    

        ?>
    </tbody>
  </table>
</div>

</body>


<?php
    if (isset($_POST["insert"])) {
         

        mysqli_query($link,"insert into vattccfilemove (taxpayer_name,taxpayer_tin, treated_by, irno,remarks,forwarded_to) values('$_POST[taxpayer_name]','$_POST[taxpayer_tin]','$_POST[treated_by]','$_POST[irno]','$_POST[remarks]','$_POST[forwarded_to]')");
        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
        </script>
        <?php

    }
    

    if (isset($_POST["delete"])) {
        mysqli_query($link,"delete from vattccfilemove where taxpayer_name = '$_POST[taxpayer_name]'") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
        </script>
        <?php
    }
    
?>

</html>
