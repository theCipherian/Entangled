<?php
session_start();
include("assets/php/init.php");
// Author - Okpala kenneth C. - Kencolony@gmail.com, Kace214@gmail.com
?>
<style>
    .all_chat_cont{
        width:100%;
        height:100%;
        position:relative;
    }
.chat_head{
display:flex;
align-items:center;
justify-content:space-between;
height:10%;
background-color:#fff;
box-shadow:  0 5px 5px -5px rgba(0,0,0,.1);
}
.pp_ img{
  width:50px;
  height:50px;
  object-fit:cover;
  border-radius:50%;
}
.user_data{
    display:flex;
    flex-direction:column;
    font-size:13px;
    padding:5px;
}
.msg_cont{
    overflow-y:scroll;
    overflow-x:hidden;
    padding:1rem;
    width:100%;
    height:80%;
}

.text_area{
    width:100%;
    right:0;
    display:flex;
    align-items:center;
}

.sidepart_items{
    padding:10px !important;
    box-sizing:border-box !important;
    right:0 !important;
}

.text-bar{
     width:90%;
     background: var(--main-slider-color);
     border-radius: var(--border-radius);
     align-items:center;
     display:flex;
     height:3rem;
     padding:var(--search-padding);
}

.text-bar input[type='text']{
    background:transparent;
    width:100%;
    margin-left:1rem;
    border:none !important;
    outline:none !important;
    font-size:0.9rem;
    padding:1.5rem !important;
    color:black !important;
}

.text-bar input[type='text']::placeholder{
    color:black !important;
}

.bx-camera{
    color:black;
}

.send_item{
    padding:1rem;
    cursor:pointer;
    font-size:1.2rem;
    color:black;
}

.msg_cont::-webkit-scrollbar{
    background-color:transparent;
}

.msg_cont::-webkit-scrollbar-thumb{
   background-color:#eee;
   border-radius:30px;
}
.message_blob{
margin:10px;
width:max-content;
max-width:100%;
background-color:var(--margin-right-color);
color:black;
white-space:pre-wrap;
margin-right:0;
word-wrap:break-word;
padding:15px;
display:flex;
flex-direction:column;
cursor:pointer;
border-bottom:1px solid #eee;
align-self:flex-end;
}
.message_blob .time_{
    float:right;
    font-size:12px;
}
.all_text{
    display:flex;
    flex-direction:column;

}
.c_322{
    width:30px !important;
    height:30px !important;
    min-width:30px !important;
    min-height:30px !important;
    float:right;
    margin-left:10px;
    border-radius:50%;
    object-fit:cover;
   max-width:30px !important;
   max-height:30px  !important;
}
.img_share img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    min-width: 100%;
    min-height: 100%;

}
.bx-video{
    margin-left:10px;
    color:black;
}
.c_321{
     display:flex;
     align-items:center;
     justify-content:space-between;
}
.text-bar i, .send_item{
    font-size:1.4rem !important;
}
</style>
<div class='all_chat_cont'>
<div class="chat_head">
    <div style='display:flex;'>
    <div class="pp_">
        <img  src="" alt="">
    </div>
    <div class="user_data">
        <span class='names'></span>
        <span class='text-muted username'></span>
    </div>
</div>
</div>
<div class='msg_cont' id='msg_feed'>


</div>
<div class='text_area'>
        <div class='text-bar'>
                <i class='bx bx-camera'></i>
                <i class='bx bx-video'></i>
                <input type="text" class='m_data' placeholder='your message'> 
           </div>
     <i id='send_text' class='bx bx-send send_item'></i>
</div>
</div>
<form style='opacity:0;display:none' id='upload_primary_image' action='upload_image.php' method='post'>
<input accept="image/*"  id='image_2289897' name="files[]" type='file' multiple />
<button class='sub_3043039403'></button>
</form>
<form style='opacity:0;display:none' id='upload_primary_video' action='upload_video.php' method='post'>
<input accept="video/*"  id='video_2289897' name="files[]" type='file' multiple />
<button class='sub_00384820293'></button>
</form>
<script>
        var view_name = document.querySelector(".msg_cont");
    $("#send_text").click(function(){
        var text_text = document.querySelector(".m_data");
        if(text_text.value.length < 1){
            show_pre();
        }else{
            $.ajax({
            url: "data_process.php",
            method: "post",
            async: false,
            data: {
            text:text_text.value
            },success:function(){
                text_text.value = "";
               hide_pre();
               $("#msg_feed").load("msg_feed.php",function(){
                    view_name.scroll({
                       top:9000000000
                    });
                });              
              }
            });
        }
    });
    
       $("#image_2289897").on("change",function(){
      setTimeout(() => {
        $(".sub_3043039403").unbind('click').click();
      }, 1000);
      $("#upload_primary_image").unbind('submit').on('submit', function(e){
       show_pre();
        e.preventDefault();  
        $.ajax({
          url:"upload_image.php",
          type: "POST",
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data){
            $("#msg_feed").load("msg_feed.php",function(){
                view_name.scroll({
                top:9000000000
                });
            });   
          },
          beforeSend:function(){
          hide_pre();
           
          }
        })
      })
    })
       $("#video_2289897").on("change",function(){
      setTimeout(() => {
        $(".sub_00384820293").unbind('click').click();
      }, 1000);
      $("#upload_primary_video").unbind('submit').on('submit', function(e){
      show_pre();
        e.preventDefault();  
        $.ajax({
          url:"upload_video.php",
          type: "POST",
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data){
            $("#msg_feed").load("msg_feed.php",function(){
                view_name.scroll({
                top:9000000000
                });
            });   
          },
          beforeSend:function(){
          hide_pre();
          }
        })
      })
    })
    $(".bx-camera").click(function(){
     setTimeout(() => {
      $("#image_2289897").click();
     }, 1000);
    })
    $(".bx-video").click(function(){
     setTimeout(() => {
      $("#video_2289897").click();
     }, 1000);
    })
</script>