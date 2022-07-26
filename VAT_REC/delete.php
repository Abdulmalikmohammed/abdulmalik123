<?php
include "connect.php";
$id = $_GET["id"];
mysqli_query($link,"delete from vatinc_file where id = '$id'");
mysqli_query($link,"delete from vatout_file where id = '$id'");

?>

<script type="text/javascript">
    window.location="index.php";
</script>