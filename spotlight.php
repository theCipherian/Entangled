<?php
session_start();
include("assets/php/init.php");
?>
<div class='container_hx'>
                <?php
                  $query = mysqli_query($init, "SELECT unique_id, spotlight, username FROM general_data WHERE sex = '$interest' ORDER BY RAND()");
                  $is_it = mysqli_num_rows($query);
                  if($is_it > 0){
                     while($arr = mysqli_fetch_array($query)){
                      $uni_ = $arr['unique_id'];
                      $user_ = $arr['username'];
                      $spotlight = $arr['spotlight'];
                     ?>
                        <div class='large' data-get='<?php echo $uni_  ?>'>
                          <img src='user_media/<?php echo $spotlight ?>'>
                          <div class='user_show as'><?php echo $user_ ?></div>
                        </div>      
                       
                     <?php
                    }
                  }
                ?>
               <script>
                $(".large").click(function(){
                      var ele = $(this).attr("data-get");
                      $.ajax({
                        url:"data_process.php",
                        type:"post",
                        async:false,
                        data:{
                           "user":ele
                        },success:function(data){
                          $(".pop_bg").removeClass("ghost");
                          $(".pop_cont").load("user_view.php");
                        }
                      })
                })
               </script>
              </div>