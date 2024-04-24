<?php
$conn=mysqli_connect("localhost","root","","db_tasks");
if (mysqli_connect_errno()) {
    die("error in connection ");
}
else{
echo "connected";
}
?>