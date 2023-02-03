<?php
session_start();
require("init.php");
header('Content-type: application/json');
date_default_timezone_set('UTC');
$date = date('m/d/Y h:i:s a', time());
function generateRandomString($length = 35) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_GET['d_1'], $_GET['d_2'])){
    $response = array();
    $data_1 = htmlspecialchars($_GET['d_1']);
    $data_2 = htmlspecialchars($_GET['d_2']);
    if(strlen($data_1) < 1 || strlen($data_2) < 1){
        $response[0] = array(
            'message' => 'Cannot leave fields empty'
        );
      echo json_encode($response); 
      exit;
    }
    
        $query  = mysqli_query($init, "SELECT * FROM general_data WHERE email_address  = '$data_1' AND account_key = '$data_2'");
        $num = mysqli_num_rows($query);
        if($num > 0){
        $response[0] = array(
            'message' => 'Setting account session'
        );
        $arr = mysqli_fetch_array($query);
        $indigo = $arr['unique_id'];
        
        $_SESSION['indigo'] = $indigo;
      echo json_encode($response); 
    }else{
        $response[0] = array(
            'message' => 'Account does not exist'
        );
      echo json_encode($response); 
    }
     }

if(isset($_GET['n_1'], $_GET['n_2'], $_GET['n_3'], $_GET['n_4'])){
    if(isset($_SESSION['code_data'])){
    $code_data = $_SESSION['code_data'];
    }else{
        $code_data = "not";
    }
    $response = array();
    $data_1 = htmlspecialchars($_GET['n_1']);
    $data_2 = htmlspecialchars($_GET['n_2']);
    $data_3 = htmlspecialchars($_GET['n_3']);
    $data_4 = htmlspecialchars($_GET['n_4']);
    $v_code = "$data_1"."$data_2"."$data_3"."$data_4";
    if(strlen($data_1) < 1 || strlen($data_2) < 1 || strlen($data_3) < 1 || strlen($data_4) < 1){
        $response[0] = array(
            'message' => 'Cannot leave fields empty'
        );
      echo json_encode($response); 
      exit;
    }

    $query  = mysqli_query($init, "SELECT unique_id FROM general_data WHERE email_address  = '$code_data' AND v_code = '$v_code'");
    $num = mysqli_num_rows($query);

    if($num > 0){
    $response[0] = array(
    'message' => 'Signing in'
    );
    $query_2  = mysqli_query($init, "UPDATE general_data SET v_code = '' WHERE email_address  = '$code_data' AND v_code = '$v_code'");
    $arr = mysqli_fetch_array($query);
    $indigo = $arr['unique_id'];

    $_SESSION['indigo'] = $indigo;
    echo json_encode($response); 
    }else{
        $response[0] = array(
            'message' => 'Account does not exist'
        );
      echo json_encode($response); 
    }
     }


if(isset($_GET['d_3'], $_GET['d_4'], $_GET['d_5'])){
    $response = array();
    $data_3 = htmlspecialchars($_GET['d_3']);
    $data_4 = htmlspecialchars($_GET['d_4']);
    $data_5 = htmlspecialchars($_GET['d_5']);
    if(strlen($data_3) < 1 || strlen($data_4) < 1 || strlen($data_5) < 1){
        $response[0] = array(
            'message' => 'Cannot leave fields empty'
        );
      echo json_encode($response); 
      exit;
    }
    $query_1  = mysqli_query($init, "SELECT email_address FROM general_data WHERE email_address  = '$data_4'");
        $num = mysqli_num_rows($query_1);
        if($num > 0){
        $response[0] = array(
            'message' => 'An account with this email exists'
     );
     echo json_encode($response); 
     exit;
    }else{
        $uni = generateRandomString();
        $query = mysqli_query($init, "INSERT INTO general_data (unique_id, username, email_address, account_key, profile_pic, spotlight) VALUES ('$uni','$data_3','$data_4','$data_5','pp.jpg','spotlight.jpg')");
        if($query){
            $_SESSION['indigo'] = $uni;
            $response[0] = array(
                'message' => 'Account created'
            );
          echo json_encode($response); 
        }
    }
}

if(isset($_GET['d_6'])){
    $response = array();
    $code_ = mt_rand(0000,9999);
    $data_6 = htmlspecialchars($_GET['d_6']);
    if(strlen($data_6) < 1){
        $response[0] = array(
            'message' => "Field can't be empty"
        );
        echo json_encode($response); 
        exit;
    }
    $query = mysqli_query($init, "SELECT email_address FROM general_data WHERE email_address = '$data_6'");
    $is_it = mysqli_num_rows($query);
    
    if($is_it > 0){
        $query_1 = mysqli_query($init, "UPDATE general_data SET v_code = '$code_' WHERE email_address = '$data_6'");
        $_SESSION['code_data'] = $data_6;
        $response[0] = array(
            'message' => 'Code sent'
        );
      echo json_encode($response); 
    }else{
        $response[0] = array(
            'message' => 'Account does not exist'
        );
      echo json_encode($response); 
    }
}


