<?php
session_start();
require("assets/php/init.php");

?>
<style>
    .collection_list{
        padding:10px;
    }
    .collection_list div{
        margin:5px;
        padding-bottom:1rem;
    }
    .collection_list div:hover{
        color:black;
        text-decoration:underline;
        cursor:pointer;
    }
</style>
<div class="def bounce-in">
  <h3>Albums</h3>
  <br>
  <div class='cease show_f_g'>
   create collection <i class="uil uil-plus"></i>
  </div>

  <div class='data_h ghost fade-in-down'>
     <label for="">Collection name</label>
     <input class='desc_0' type="text">
     <div class="bbb bnm">Save</div>
  </div>
  <div class='collection_list' style='background-color:var(--main-slider-color);margin-top:10px;max-width:30rem;border-radius:15px;'>
    <?php
    $query = mysqli_query($init, "SELECT * FROM photo_collection WHERE user = '$indigo'");
    $is_it = mysqli_num_rows($query);
    if($is_it > 0){
        while($arr = mysqli_fetch_array($query)){
             $pc_id = $arr['unique_id'];
             $collection_name = $arr['collection_name'];
             ?>
               <div class='cc' data-true = "<?php echo $pc_id ?>"><span><?php  echo "$collection_name" ?></span> <i class="uil uil-angle-right"></i></div>
             <?php
        }
    }else{
        ?>
            <div class="">You have not collections yet.</div>
        <?php
    }
    ?>
  </div>
  <div>

  </div>
 </div>
 <script>
    var cc = document.querySelectorAll(".cc");
    cc.forEach(el => {
         el.addEventListener("click",function(){
            var data_true = this.getAttribute("data-true");
            $.ajax({
          url:"data_process.php",
          type:"post",
          async:false,
          data:{
            collection_data:data_true
          },success:function(data){
            $(".pop_bg").removeClass("ghost");
            $(".pop_cont").load("view_collection.php");
          }
        })
         })
    });
      $(".show_f_g").click(function(){
    $(".data_h").removeClass("ghost");
  })
  $(".bnm").click(function(){
        let data_save = $(".desc_0").val();
        if(data_save.length > 0){
        $.ajax({
          url:"data_process.php",
          type:"post",
          async:false,
          data:{
            collection:data_save
          },success:function(data){
            createNotification(data);
            if(data == 'Collection created')
            show_pre();
     setTimeout(() => {
      $(".g_holder").load("second_item.php");
      hide_pre();
     }, 500);
          }
        })
    }
    })
 </script>