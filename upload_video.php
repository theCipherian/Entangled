
<?php
session_start();
include("assets/php/init.php");
    $person = $_SESSION['c_spec'];
    $output = "";
    $identifier = mt_rand(1000000,9999999);
if(is_array($_FILES)){
    foreach ($_FILES['files']['name'] as $name => $value){
        $file_name = $_FILES['files']['name'][$name];
        $accepted = array("mp4");
        $extention = pathinfo($file_name, PATHINFO_EXTENSION);
        if(!in_array($extention,$accepted)){
        exit();   
        }
        $unique_thing_main = mt_rand(000000,999999);
        $new_name = md5(rand()) . '.' . $extention;
        $sourcePath = $_FILES['files']['tmp_name'][$name];
        $targetPath = "chat_share_vid/".$new_name;
        $text = 'video';
        if(move_uploaded_file($sourcePath, $targetPath)){
            $query = mysqli_query($init, "DELETE FROM latest_messages WHERE sender = '$general_data' AND receiver = '$person' OR sender = '$person' AND receiver = '$general_data'");
            $query_two = mysqli_query($init, "INSERT INTO latest_messages VALUES ('', '$identifier', '$general_data', '$person', '$text','false','$quantum_time')");
            $query_three = mysqli_query($init, "INSERT INTO messages VALUES ('', '$identifier', '', '','$general_data', '$person','$text','','$new_name','false','$quantum_time')"); 
        }else{    
        }
    }
}
?>