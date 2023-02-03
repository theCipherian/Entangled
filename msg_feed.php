<?php
session_start();
include("assets/php/init.php");
// Author - Okpala kenneth C. - Kencolony@gmail.com, Kace214@gmail.com
?>
<style>
    .t_info{
        padding:5px;
        margin:5px;
        border-radius:30px;
    }
    .time_{
        margin-top:5px;
    }
    .relation{
        width:100%;
        padding:10px;
        border:1px solid #eee;
        border-radius:4px;
    }
    .n_5{
        top:0!important;
        position:relative !important;
        border-radius:5px;
    }
    
</style>
<div class='note_5 n_5' style='text-align:center;'>
<small>Note: Aurenso is not liable to any misunderstandings.</small>
</div>
 <div class='all_text'>
     <?php
         $msg_person = $_SESSION['c_spec']; 
         $msg_pp = $_SESSION['c_spec_pp'];
         $msg_name = $_SESSION['c_spec_name'];
         $query = mysqli_query($init, "SELECT * FROM messages WHERE sender = '$general_data' AND receiver = '$msg_person' OR sender = '$msg_person' AND receiver = '$general_data'");
         $is_it = mysqli_num_rows($query);
         if($is_it < 1){
         ?>
    <?php
}else{
    while($array = mysqli_fetch_array($query)){
        $msg_uni = $array['unique_id'];
        $sender = $array['sender'];
        $ref = $array['ref'];
        $type = $array['type'];
        $receiver = $array['receiver'];
        $text_data = $array['text_data'];
        $image_data = $array['image_data'];
        $video_data = $array['video_data'];
        $seen = $array['seen'];
        $msg_date = $array['date'];
        $msg_date = last_time($msg_date);
     
        if($sender == $general_data && $image_data == '' && $video_data == '' && $type !== 'query' ){
    ?>
    <div class="message_blob"><div class='c_321'><span>You</span>  <img class='c_322' src="user_media/<?php echo $profile_pic ?>" alt=""></div> <small class='t_info'> <?php echo $text_data ?> </small><small class='time_'><?php  echo $msg_date;  ?></small></div>
    <?php
    }elseif ($sender == $msg_person && $image_data == '' && $video_data == '' && $type !== 'query' ) {
    ?>
      <div class="message_blob"><div class='c_321'><span><?php echo $msg_name ?></span>  <img class='c_322' src="user_media/<?php echo $msg_pp ?>" alt=""></div> <small class='t_info'> <?php echo $text_data ?> </small><small class='time_'><?php  echo $msg_date;  ?></small></div>
<?php
    }
    elseif($sender == $general_data && $image_data !== '' && $text_data == 'image'){
        ?>
<div class="message_blob"><div class='c_321'><span>You</span>  <img class='c_322' src="user_media/<?php echo $profile_pic ?>" alt=""></div>
 <div class='img_share'>
    <img src="chat_share_img/<?php echo $image_data ?>" alt="">
 </div>
 <small class='time_'><?php  echo $msg_date;  ?></small>
</div>
<?php
    }elseif($sender == $msg_person && $image_data !== '' && $text_data == 'image') {
        ?>
<div class="message_blob"><div class='c_321'><span><?php echo $msg_name ?></span>  <img class='c_322' src="user_media/<?php echo $msg_pp ?>" alt=""></div>
 <div class='img_share'>
    <img src="chat_share_img/<?php echo $image_data ?>" alt="">
 </div>
 <small class='time_'><?php  echo $msg_date;  ?></small>
</div>
        <?php
    }elseif($sender == $general_data && $video_data !== '' && $text_data == 'video') {
        ?>
<div class="message_blob"><div class='c_321'><span>You</span>  <img class='c_322' src="user_media/<?php echo $profile_pic ?>" alt=""></div>
 <div class='img_share'>
      <video  style='width:100%;'  class='player'
            controls
            crossorigin
            playsinline
            data-poster=''>
            <source
             src='chat_share_vid/<?php echo $video_data  ?>'
            />
 </div>
 <small class='time_'><?php  echo $msg_date;  ?></small>
</div>
<?php
    }elseif($sender == $msg_person && $video_data !== '' && $text_data == 'video') {
        ?>
<div class="message_blob"><div class='c_321'><span><?php echo $msg_name ?></span>  <img class='c_322' src="user_media/<?php echo $msg_pp ?>" alt=""></div>
 <div class='img_share'>
     <video   style='width:100%;'  class='player'
            controls
            crossorigin
            playsinline
            data-poster=''>
            <source
             src='chat_share_vid/<?php echo $video_data  ?>'
            />
 </div>
 <small class='time_'><?php  echo $msg_date;  ?></small>
</div>
        <?php
    }
  }
}
?>
 </div>
 <script>
     var players = Array.from(document.querySelectorAll('.player')).map((p) => new Plyr(p));</script>