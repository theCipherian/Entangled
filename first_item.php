<?php
session_start();
require("assets/php/init.php");
?>
<style>
  [type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #eee;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: var(--background-color);
    position: absolute;
    top: 4px;
    left: 4px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
.mercy{
  display:flex;
}
.mercy p{
  margin:10px;
}
</style>

<div class='def fade-in-down'>
 <div class="first_row"><h3><?php echo $username  ?> - <?php echo "$first_name $last_name";  ?></h3></div>
 <div class="second_row">
  <div class='sex'><span class='set'>Sex</span> <span class='set_3'><?php 
  if($sex == ''){
    echo "Unset";
  }else{
    echo $sex;
  }
   ?></span></div>
  <div class='age'><span class='set_1'>Age</span> <span class='set_4'>
  <?php 
  if($age == ''){
    echo "1";
  }else{
    echo $age;
  }
   ?>
  </span></div>
 </div>
 <div class="desc_3">
    <div class='desc_9' contenteditable="false"><?php echo $bio ?></div>
  <div class="icon_holder_1">
    <i class="uil uil-pen"></i></div>
 </div>
<div class="bbb save_ fade-in-down ghost">Save changes</div>
<div class="bbb" id='g_v'>Edit profile information</div>
<br>
<h3>Interested in</h3>
<div class='mercy'>
  <p>
    <input type="radio" id="test1" name="radio-group" <?php if($interest == 'M'){echo "checked";}   ?>>
    <label for="test1">Men</label>
  </p>
  <p>
    <input type="radio" id="test3" name="radio-group" <?php if($interest == 'F'){echo "checked";}   ?>>
    <label for="test3">Women</label>
  </p>
</div>
</div>
<script>
    $(".icon_holder_1").click(function(){
      $(".desc_9").attr("contenteditable","true");
      $(".desc_9").focus();
      $(".save_").removeClass("ghost");
    })
    $(".save_").click(function(){
        let data_save = $(".desc_9").text();
        $.ajax({
          url:"data_process.php",
          type:"post",
          async:false,
          data:{
            bio:data_save
          },success:function(data){
            createNotification(data);
          }
        })
    })

    $("#test1").click(function(){
      show_pre();
      $.ajax({
        url:"data_process.php",
        type:"post",
        async:false,
        data:{
          "type_1":"type_1"
        },success:function(data){
          $(".other_cont").load("spotlight.php",function(){
            hide_pre();
          });
          createNotification(data);
        }
      })
    })
    $("#test3").click(function(){
      show_pre();
      $.ajax({
        url:"data_process.php",
        type:"post",
        async:false,
        data:{
          "type_2":"type_2"
        },success:function(data){
          $(".other_cont").load("spotlight.php",function(){
            hide_pre();
          });
          createNotification(data);
        }
      })
    })
    $("#g_v").click(function(){
      show_pre();
     setTimeout(() => {
      $(".g_holder").load("user_account.php");
      hide_pre();
     }, 500);
    })
</script>