<?php
    $link = mysqli_connect("localhost","root", "", "") or die(mysqli_error($link));
    mysqli_select_db($link, "wuse2msto_reports") or die(mysqli_error($link));


?>
