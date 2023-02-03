<?php
session_start();
require("assets/php/init.php");


if(isset($_POST['bio'])){
    $bio = htmlspecialchars($_POST['bio']);
    if(strlen($bio) < 1){
        echo "Cannot be empty";
    }else if(strlen($bio) > 120){
        echo "Cannot exceed 120 characters";
    }else{
        $query = mysqli_query($init, "UPDATE general_data SET bio = '$bio' WHERE unique_id = '$indigo'");
        if($query){
            echo "Updated";
        }
    }
}


if(isset($_POST['collection'])){
    $collection = htmlspecialchars($_POST['collection']);
    if(strlen($collection) < 1){
        echo "Cannot be empty";
    }else if(strlen($collection) > 120){
        echo "Cannot exceed 120 characters";
    }else{
        $query = mysqli_query($init, "SELECT collection_name FROM photo_collection WHERE collection_name = '$collection' AND user = '$indigo'");
        $is_it = mysqli_num_rows($query);
        if($is_it > 0){
            echo "Collection name exists";
        }else{
            $uni = mt_rand(0000000,9999999);
            $query_2 = mysqli_query($init, "INSERT INTO photo_collection VALUES ('$uni', '$collection', '$indigo')");
            if($query_2){
                echo "Collection created";
            }
        }
    }
}

if(isset($_POST['collection_data'])){
    $_SESSION['collection_data'] = $_POST['collection_data'];
}

if(isset($_POST['del_img'])){
    $del_img = htmlspecialchars($_POST['del_img']);
    $query = mysqli_query($init, "DELETE FROM photos WHERE unique_id = '$del_img'");
    if($query){
        echo "File removed";
    }
}

if(isset($_POST['del_all'])){
    $del_all = htmlspecialchars($_POST['del_all']);
    $query = mysqli_query($init, "DELETE FROM photo_collection WHERE unique_id = '$del_all'");
    if($query){
        echo "Collection_removed";
    }
}
if(isset($_POST['data_1'])){
    $data_1 = $_POST['data_1'];
    $query = mysqli_query($init, "SELECT username FROM general_data WHERE username = '$data_1'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
       echo "Exists";
       exit;
    }else{
        $query = mysqli_query($init, "UPDATE general_data SET username = '$data_1' WHERE unique_id = '$indigo'");
        if($query){
            echo "Changed";
        }
    }
}
if(isset($_POST['data_2'])){
    $data_1 = $_POST['data_2'];
        $query = mysqli_query($init, "UPDATE general_data SET firstname = '$data_1' WHERE unique_id = '$indigo'");
        if($query){
            echo "Changed";
        }
}
if(isset($_POST['data_3'])){
    $data_1 = $_POST['data_3'];
        $query = mysqli_query($init, "UPDATE general_data SET lastname = '$data_1' WHERE unique_id = '$indigo'");
        if($query){
            echo "Changed";
        }
}

if(isset($_POST['data_4'])){
    $data_1 = $_POST['data_4'];
        $query = mysqli_query($init, "UPDATE general_data SET country = '$data_1' WHERE unique_id = '$indigo'");
        if($query){
            echo "Changed";
        }
}

if(isset($_POST['data_5'])){
    $data_1 = $_POST['data_5'];
        $query = mysqli_query($init, "UPDATE general_data SET sex = '$data_1' WHERE unique_id = '$indigo'");
        if($query){
            echo "Changed";
        }
}

if(isset($_POST['data_6'])){
    $data_1 = $_POST['data_6'];
        $query = mysqli_query($init, "UPDATE general_data SET age = '$data_1' WHERE unique_id = '$indigo'");
        if($query){
            echo "Changed";
        }
}


if(isset($_POST['image'])){
   $image = $_POST['image'];
   $query = mysqli_query($init, "UPDATE general_data SET spotlight = '$image' WHERE unique_id = '$indigo'");
   if($query){
    echo "Spotlight updated";
   }
}

if(isset($_POST['image_2'])){
    $image = $_POST['image_2'];
    $query = mysqli_query($init, "UPDATE general_data SET profile_pic = '$image' WHERE unique_id = '$indigo'");
    if($query){
     echo "Profile picture updated";
    }
}

if(isset($_POST['user'])){
    $_SESSION['person'] = $_POST['user'];
}

if(isset($_POST['chat_spectrum'], $_POST['pp'], $_POST['username'])){
    $chat_spec = $_POST['chat_spectrum'];
    $chat_spec2 = $_POST['pp'];
    $chat_spec3 = $_POST['username'];
    $_SESSION['c_spec'] = $chat_spec;
    $_SESSION['c_spec_pp'] = $chat_spec2;
    $_SESSION['c_spec_name'] = $chat_spec3;
}

if(isset($_POST['text'])){
    $person = $_SESSION['c_spec'];
    $text = $_POST['text'];
    $text = str_replace("'", "\'", $text);
    if(strlen($text) > 10000 || strlen($text) < 1){
        exit;
    }else{
    $mt_data = mt_rand(0000000,9999999);
    $query = mysqli_query($init, "DELETE FROM latest_messages WHERE sender = '$general_data' AND receiver = '$person' OR sender = '$person' AND receiver = '$general_data'");
    $query_two = mysqli_query($init, "INSERT INTO latest_messages VALUES ('', '$mt_data', '$general_data', '$person', '$text','false','$quantum_time')");
    $query_three = mysqli_query($init, "INSERT INTO messages VALUES ('','$mt_data', '','','$general_data', '$person','$text','','','false','$quantum_time')"); 
   }
   }

   if(isset($_POST['type_1'])){
    $query  = mysqli_query($init, "UPDATE general_data SET interested = 'M' WHERE unique_id = '$indigo'");
    if($query){
        echo "Preference changed";
    }
   }

   if(isset($_POST['type_2'])){
    $query  = mysqli_query($init, "UPDATE general_data SET interested = 'F' WHERE unique_id = '$indigo'");
    if($query){
        echo "Preference changed";
    }
   }
