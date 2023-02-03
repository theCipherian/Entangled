<?php
session_start();
require("assets/php/init.php");
?>

<style>
.notification_list{
}
.notif_data{
    padding:10px;
    border-bottom:1px solid #eee;
}
</style>
    <div class="data_k">
        <h4 style='text-align:center' class='grey_text'>notifications</h4>
        <div class='notification_list'>
            <?php
            $query = mysqli_query($init, "SELECT * FROM notifications WHERE user_id = '$indigo'");
            $is_it = mysqli_num_rows($query);
            if($is_it > 0){
                $arr = mysqli_fetch_array($query);
                $notification_data = $arr['notification_data'];
            }else{
                ?>
 <div style='text-align:center;margin-top:1rem;'>No notifications yet</div>
                <?php
            }
            ?>
        </div>
</div>
