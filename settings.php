<?php
session_start();
require("assets/php/init.php");
?>
<style>
    .user_show i{
        font-size:1.5rem;
    }
    .options{
         padding:1rem;
         display:flex;
         align-items:center;
         cursor:pointer;
         border-bottom:1px solid #eee;
    }
    .options i{
        font-size:1.1rem;
        color:grey;
    }
    .set_item{
        margin-top:1rem;
        padding:5px;
        display:flex;
        background-color:rgba(0,0,0,0.02);
    }
    .set_item .bu{
         margin:10px;
         cursor:pointer;
         padding:10px;
         border-radius:5px;
    }
    .green{
        color:#fff;
        background-color:limegreen;
    }
    .orange{
        background-color:orange;
        color:#fff;
    }
    a{
        text-decoration:none;
        color:unset !important;
    }
</style>
    <div class="data_k">
        <h4 style='text-align:center' class='grey_text'>Settings</h4>
           <a id='logout'><div class='options'>
           Logout <i class="uil uil-sign-out-alt"></i>
           </div></a>
        <div class='set_item'>
        <a id='suspend'><div class="bu orange">Suspend</div></a>
        <a id='delete'> <div class="bu green">Delete</div></a>
        </div>
     <div class="note">Account suspends lasts for as long as you're not signed in. When suspended, your public data will be hidden.</div>
</div>
<script>
    $("#logout").click(function(){
      $(".confirm").css("display","flex");
      $(".yes").unbind("click").click(function(){
        window.location.href = "session_terminate.php";
      })
      setTimeout(() => {
         $(".confirm").css("display","none");
      }, 3000);
    })
    $("#suspend").click(function(){
      $(".confirm").css("display","flex");
      $(".yes").unbind("click").click(function(){
        window.location.href = "session_pause.php";
      })
      setTimeout(() => {
         $(".confirm").css("display","none");
      }, 3000);
    })
    $("#delete").click(function(){
      $(".confirm").css("display","flex");
      $(".yes").unbind("click").click(function(){
        window.location.href = "session_kill.php";
      })
      setTimeout(() => {
         $(".confirm").css("display","none");
      }, 3000);
    })
</script>