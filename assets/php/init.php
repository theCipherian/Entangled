<?php
// Author - Okpala kenneth C. - thecipheriansvault@gmail.com, Kace214@gmail.com
?>
<?php
$url = "localhost";
$username9 = "root";
$password = "";
$database = "aurenso";
$init = mysqli_connect($url, $username9, $password, $database);
if(!$init){
    "Please exit!";
}
if(isset($_SESSION['time_zone'])){
    $time_zone = $_SESSION['time_zone'];
}elseif (!isset($_SESSION['time_zone'])) {
    $time_zone = date_default_timezone_get();
}
if($init){
date_default_timezone_set("UTC");
$quantum_time = date('Y-m-d H:i:s ', time());
function last_time( $time ) {
    if(isset($_SESSION['time_zone'])){
    $time_zone = $_SESSION['time_zone'];

}elseif (!isset($_SESSION['time_zone'])) {
    $time_zone = date_default_timezone_get();
}
    date_default_timezone_set($time_zone);
    $time_ago = strtotime( $time );
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes = round( $seconds / 60 );
    $hours = round( $seconds / 3600 );

    $days = round( $seconds / 86400 );
    $weeks  = round( $seconds / 604800 );
    $months = round( $seconds / 2629440 );
    $years = round( $seconds / 31553280 );

    if ( $seconds <= 10 ) {
        return 'Just now';
    } else if ( $seconds <= 50 ) {
        return 'a few seconds ago';
    } else if ( $minutes <= 60 ) {
        if ( $minutes == 1 ) {
            return 'a min ago';
        } else {
            return "$minutes mins ago";
        }
    } else if ( $hours <= 24 ) {
        if ( $hours == 1 ) {
            return'an hr ago';
        } else {
            return "$hours hrs ago";
        }
    } else if ( $days <= 7 ) {
        if ( $days == 1 ) {
            return 'yesterday';
        } else {
            return"$days days ago";
        }
    } else if ( $weeks <= 4.3 ) {
        if ( $weeks == 1 ) {
            return 'a week ago';
        } else {
            return "$weeks weeks ago";
        }
    } else if ( $months <= 12 ) {
        if ( $months == 1 ) {
            return 'a month ago';
        } else {
            return "$months months ago";
        }
    } else {
        if ( $years == 1 ) {
            return 'a year ago';
        } else {
            return"$years years ago";
        }
    }
}
}

if($init){
    if(isset($_SESSION['indigo'])){
    $indigo = $_SESSION['indigo'];
    $general_data = $_SESSION['indigo'];
    $query = mysqli_query($init, "SELECT * FROM general_data WHERE unique_id = '$indigo'");
    $is_it = mysqli_num_rows($query);
    if($is_it < 1){ 
    }else{
        $arr = mysqli_fetch_array($query);

        $first_name = $arr['firstname'];
        $last_name = $arr['lastname'];
        $username = $arr['username'];
        $email_address = $arr['email_address'];
        $phone = $arr['phone'];
        $country = $arr['country'];
        $sex = $arr['sex'];
        $age = $arr['age'];
        $interest = $arr['interested'];
        $profile_pic = $arr['profile_pic'];
        $bio = $arr['bio'];
        $account_key = $arr['account_key'];
        $spotlight = $arr['spotlight'];
        
    }
  }
}

?>