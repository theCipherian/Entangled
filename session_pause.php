<?php
session_start();
require("assets/php/init.php");
$query = mysqli_query($init, "UPDATE general_data SET account_status = 'suspended' WHERE unique_id = '$indigo'");
unset($_SESSION['indigo']);
echo "<script> window.location.href = 'index.php' </script>";
?>