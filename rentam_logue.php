<?php
session_start();
include("assets/php/init.php");
// Author - Okpala kenneth C. - Kencolony@gmail.com, Kace214@gmail.com
?>
<style>

.message{
    padding:1rem !important;
   
}
.search-bar{
     background: var(--color-light);
     border-radius: var(--border-radius);
     padding:var(--search-padding);
}
.search-bar input[type='search']{
    background:transparent;
    width:30vw;
    border:none !important;
    outline:none !important;
    margin-left:1rem;
    font-size:0.9rem;
    color:var(--color-dark);
}
.search-bar input[type='search']::placeholder{
    color:var(--color-gray);
}
.message-body div{
    font-size:13px;
}
.cs_423{
width:100% !important;
}
 .right_{
    height:max-content;
    position:sticky;
    top:var(--sticky-top-right);
    bottom:0;
}


.right_ .messages{
    background: var(--color-white);
    border-radius:var(--card-padding);
    padding:var(--card-padding);
}
.right_ .messages .heading{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:1rem;
}

.right_ .messages i{
    font-size: 1.4rem;
}
 .right_ .messages .search-bar{
     display:flex;
     margin-bottom:1rem;
 }

 .right_ .messages .category{
     display:flex;
     justify-content:space-betweeen;
     margin-bottom:1rem;
 }
 .right_ .messages .category h6{
     width:100%;
     text-align:center;
     border-bottom:4px solid var(--color-light);
     padding-bottom:0.5rem;
     font-size:0.85rem;
 }

 .right_ .messages .category .active{
     border-color:var(--color-dark);
 }

 .right_ .messages .message{
     display:flex;
     gap:1rem;
     cursor:pointer;
     font-weight:bold !important;
     margin-bottom:1rem;
     transition:all 0.5s ease;
  align-items:start;
    }
 .right_ .messages .message:hover{
   opacity:0.50;
   transition:all 0.5s ease;
    }
    .right_ .message .profile-photo{
        position:relative;
        overflow:visible;
    }

    .right_ .profile-photo img{
        border-radius:50%;
    }
 .right_ .messages .message:last-child{
     margin:0;
 }
 .right_ .messages .message p{
     font-size:0.8rem;
     font-weight:bold;
 }

 .right_ .messages .message p{
     font-size:0.8rem;
     
 }

 .right_ .messages .message .profile-photo .active{
     width:0.8rem;
     height:0.8rem;
     border-radius:50%;
     border:3px solid var(--color-white);
     background:var(--color-success);
     position:absolute;
     bottom:0;
     right:0;

 }
 .clear_img{
  object-fit:cover;
 }
</style>
<div class='right_'>
<div class="messages">
                   <div class="heading" style='flex-direction:column;align-items:start;'>
                       <!-- <h4>Your messages</h4> -->

                       <div class='note'>
                          <small>Note: Entangled is not liable to any misunderstandings</small>

                       </div>
                   </div>
                   <div class="search-bar">
                       <i class="uil uil-search"></i>
                       <input type="search" placeholder="search people" class='cs_423' id="message-search">
                   </div>
                   <div class="category">
                       <h6 class="">Your messages are secured with our A790 encryption.</h6>  
                   </div>
                   <?php
                     $query = mysqli_query($init, "SELECT * FROM latest_messages WHERE sender = '$general_data' OR receiver = '$general_data' ORDER BY date DESC");
                    $num = mysqli_num_rows($query);
                    if($num < 1){
                         ?>
                          <div class='note'>
                          <small>You currently have no conversations. You think this is a mistake? &nbsp <span style='text-decoration:underline;cursor:pointer'>Contact us</span></small>
                       </div>
                         <?php
                     }else{
                         while($array = mysqli_fetch_array($query)){
                              $msg_uni = $array['unique_id'];
                              $msg_sender = $array['sender'];
                              $msg_receiver = $array['receiver'];
                              $text_data = $array['text_data'];
                              $seen = $array['seen'];
                              $msg_date = $array['date'];
                              if($msg_sender == $general_data){
                                  $person = $msg_receiver;
                                  $query_two = mysqli_query($init, "SELECT * FROM general_data WHERE unique_id = '$person'");
                                  $array_two = mysqli_fetch_array($query_two);
                                  $p_first_name = $array_two['firstname'];
                                  $p_last_name = $array_two['lastname'];
                                  $p_pp = $array_two['profile_pic'];
                                  $name_data = $array_two['username'];
                                  $pp_data = $array_two['profile_pic'];
                                    }elseif ($msg_receiver == $general_data) {
                                  $person = $msg_sender;
                                  $query_two = mysqli_query($init, "SELECT * FROM general_data WHERE unique_id = '$person'");
                                  $array_two = mysqli_fetch_array($query_two);
                                  $p_first_name = $array_two['firstname'];
                                  $p_last_name = $array_two['lastname'];
                                  $p_pp = $array_two['profile_pic'];
                                  $name_data = $array_two['username'];
                                  $pp_data = $array_two['profile_pic'];
                                   }
                                  ?>
                                      <div username='<?php echo $name_data  ?>' class="message" id='<?php echo $person  ?>'fname='<?php echo $p_first_name ?>' lname='<?php echo $p_last_name ?>' pp='<?php echo $p_pp ?>'>
                                        <div class="profile-photo">
                                            <img class='clear_img' src="user_media/<?php echo $pp_data; ?>" alt="">
                                                <!-- <div class="active"></div> -->
                                        </div>
                                        <div class="message-body">
                                                <h5><?php echo $name_data  ?></h5>
                                                <?php 
                                                if($seen == 'false'){
                                                    ?>
                                                        <div class="text-bold"><?php echo $text_data  ?></div>
                                                    <?php
                                                }else{
                                                    ?>
                                                         <div class="text-muted"><?php echo $text_data  ?></div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                             <?php
                         }
                         
                     }
                   ?>
                  
            </div>
</div>
<script>
       var messages = document.querySelector(".message");
    var message = document.querySelectorAll(".message");
    var messageSearch = document.querySelector("#message-search");
    var searchMessage = () => {
        var val = messageSearch.value.toLowerCase();
        console.log(val);
        message.forEach(chat => {
            let name = chat.querySelector("h5").textContent.toLocaleLowerCase();
            if(name.indexOf(val) != -1){
                chat.style.display = "flex";
            }else{
                chat.style.display = "none";
            }
        })
    }
    messageSearch.addEventListener("keyup",searchMessage);
    $(".message").click(function(){
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
                  $("#get_data_3432").load("chat_spectrum.php", function(){
                     $(".names").text(firstname+ " " +lastname);
                     $(".username").text("@"+username);
                     $(".pp_ img").attr("src", "user_media/"+pp)
                     $("#msg_feed").load("msg_feed.php",function(){
                       var view_name = document.querySelector(".msg_cont");
                       view_name.scroll({
                       top:9000000000
                     })    
                     hide_pre();
                  });
              });
            }
        });
    })
</script>