<?php
session_start();
require("assets/php/init.php");
$query = mysqli_query($init, "DELETE FROM general_data WHERE unique_id = '$indigo'");
unset($_SESSION['indigo']);
echo "<script> window.location.href = 'index.php'</script>";
?>