<?php
session_start();
require("assets/php/init.php");

if(isset($_SESSION['person'])){
    $person = $_SESSION['person'];
    $query = mysqli_query($init, "SELECT * FROM general_data WHERE unique_id = '$person'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        $arr = mysqli_fetch_array($query);
        $p_unique_id = $arr['unique_id'];
        $p_username = $arr['username'];
        $p_firstname = $arr['firstname'];
        $p_lastname = $arr['lastname'];
        $p_email_address = $arr['email_address'];
        $p_phone = $arr['phone'];
        $p_country = $arr['country'];
        $p_sex = $arr['sex'];
        $p_interest = $arr['interested'];
        $p_bio = $arr['bio'];
        $p_spotlight = $arr['spotlight'];
        $p_age = $arr['age'];
        $p_pp = $arr['profile_pic'];
    }
}

?>
<style>
    .img_hold{
        width:100%;
        height:50%;
        position:relative;
    }
    .img_hold img{
        width:100%;
        border-radius:8px;
        height:100%;
        position:relative;
        object-fit:cover;
    }
    .view_order{
        margin:10px;
    }
    .v_item{
        display:flex;
        align-items:center;
        padding:1rem;
        height:3rem;
        width:100%;
        border-bottom:1px solid #eee;
    }
    .v_text{
        color:black;
        font-weight:bold;
        margin-left:20px;
    }
   .perf  label{
        text-align:center;
        display:none;
    }
    .maniq{
        width:2rem;
        height:2rem;
    }
    .perf{
        margin:5px;
        height:100%;
    }
    .vkk{
        width:100% !important;
        margin-top:10px;
    }
    .a_s{
        position:absolute;
         bottom:0;

    }
    .as_{
        background:#fff !important;
        color:black;
        cursor:pointer;
        padding:15px !important;
        border-radius:8px;
    }
</style>
<div class='perf'>
<div class='img_hold'>
   <img src="user_media/<?php echo $p_spotlight  ?>" alt="">
   <div class="as as_"><i username='<?php echo $p_username  ?>' id='<?php echo $p_unique_id  ?>' fname='<?php echo $p_firstname?>' lname='<?php echo $p_lastname ?>' pp='<?php echo $p_pp ?>' class="message2 uil uil-comment-alt"></i> Chat</div>
</div>
<div class="desc_3 vkk"><?php  echo $p_bio ?></div>
<div class='view_order'>
<label for="">Username</label>
 <div class='v_item'>
 <div><img class='maniq' src="https://img.icons8.com/doodle/48/000000/name.png"/></div>
 <div class='v_text'><?php echo $p_username ?></div>

 </div>
 <br>
<label for="">Firstname</label>
 <div class='v_item'>
 <div><img class='maniq' src="https://img.icons8.com/doodle/48/000000/name.png"/></div>
 <div class='v_text'><?php echo "$p_firstname $p_lastname" ?></div>

 </div>
 <br>
<label for="">Country</label>
 <div class='v_item'>
 <div><img class='maniq' src="https://img.icons8.com/doodle/48/000000/country.png"/></div>
 <div class='v_text'><?php echo $p_country ?></div>

 </div>
 <br>
<label for="">Sex</label>
 <div class='v_item'>
 <div><img class='maniq' src="https://img.icons8.com/doodle/48/000000/male.png"/></div>
 <div class='v_text'><?php echo $p_sex ?></div>

 </div>
 <br>
<label for="">Interest</label>
 <div class='v_item'>
 <div><img class='maniq' src="https://img.icons8.com/doodle/48/000000/opposite-opinion.png"/></div>
 <div class='v_text'><?php echo $p_interest ?></div>

</div>
 <br>
<label for="">Age</label>
 <div class='v_item'>
 <div><img class='maniq' src="https://img.icons8.com/doodle/48/000000/age-timeline.png"/></div>
 <div class='v_text'><?php echo $p_age ?></div>

</div>
</div>
<script>
        $(".message2").click(function(){
            $("#data_change_232").text("Messages");
        var person = $(this).attr("id");
        var firstname = $(this).attr("fname");
        var lastname = $(this).attr("lname");
        var username = $(this).attr("username");
        var pp = $(this).attr("pp");
            $.ajax({
            url: "data_process.php",
            method: "post",
            async: false,
            data: {
            chat_spectrum: person,
            pp:pp,
            username:username
            },success:function(){
                show_pre();
                $(".sidepart").removeClass("noner");
                  $("#get_data_3432").load("chat_spectrum.php", function(){
                     $(".names").text(firstname+ " " +lastname);
                     $(".username").text("@"+username);
                     $(".pp_ img").attr("src", "user_media/"+pp)
                     $("#msg_feed").load("msg_feed.php",function(){
                       var view_name = document.querySelector(".msg_cont");
                       view_name.scroll({
                       top:9000000000
                     })    
                  });
              });
            }
        });
    })
</script>