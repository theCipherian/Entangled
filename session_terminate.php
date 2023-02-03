<?php
session_start();
    unset($_SESSION['indigo']);
    echo "<script> window.location.href = 'index.php' </script>";
?>