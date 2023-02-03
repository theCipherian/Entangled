<?php 
session_start();
include("assets/php/init.php");
if(isset($_SESSION['collection_data'])){
    $collection_data = $_SESSION['collection_data'];
    $query = mysqli_query($init, "SELECT unique_id FROM photos WHERE collection = '$collection_data' AND user = '$indigo'");
    $is_it = mysqli_num_rows($query);
    if($is_it == 3 || $is_it > 3){
        echo "Album maximum reached";
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['files'])) {
        $errors = [];
        $path = 'user_media/';
	    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
		
        $all_files = count($_FILES['files']['tmp_name']);

        for ($i = 0; $i < $all_files; $i++) {  
		$file_name = mt_rand(000000,999999).$_FILES['files']['name'][$i];
		$file_tmp = $_FILES['files']['tmp_name'][$i];
		$file_type = $_FILES['files']['type'][$i];
		$file_size = $_FILES['files']['size'][$i];
		$tmp = explode('.', $_FILES['files']['name'][$i]);
		$file_ext = strtolower(end($tmp));

		$file = $path . $file_name;

		if (!in_array($file_ext, $extensions)) {
			echo "Invalid file type";
            exit;
		}

		if ($file_size > 20097152) {
			echo "File upload limit exceeded";
            exit;
		}

		if (empty($errors)) {
			move_uploaded_file($file_tmp, $file);
            $uni = mt_rand(00000000,9999999);
            $query = mysqli_query($init, "INSERT INTO photos VALUES ('$uni','$collection_data','$file_name','$indigo')");
            if($query){
              echo "Album updated";
            }
		}
	}

	
    }

}