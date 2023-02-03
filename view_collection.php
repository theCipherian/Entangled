<?php
session_start();
require("assets/php/init.php");
if(isset($_SESSION['collection_data'])){
    $collection_data = $_SESSION['collection_data'];
    $query = mysqli_query($init, "SELECT * FROM photo_collection WHERE unique_id = '$collection_data'");
    $arr = mysqli_fetch_array($query);
    $col_name = $arr['collection_name'];
}
?>
<style>
    .user_show i{
        font-size:1.5rem;
    }
    .use_as{
      position:absolute;
      right:5px;
      bottom:5px;
      background-color:var(--background-color);
      padding:5px;
      border-radius:30px;
      min-width:6rem;
      text-align:center;
    }
</style>
    <div class="data_k">
        <h4 style='text-align:center' class='grey_text'>Album/<?php echo $col_name  ?></h4>
        <div class="note" style='display:flex;justify-content:space-evenly'><i class="uil uil-exclamation-triangle"></i><span>Every album has a maximum of 3 images</span></div>
        <br>
        <div style='display:flex'>
        <div class="cease mmm n_v" del='<?php echo $collection_data  ?>'><span>Remove all</span> <i class="uil uil-minus"></i></div>
        <div class="cease mmm m_v"><span>Upload new</span> <i class="uil uil-plus"></i></div>
        <form method="post" class='form_v' style='display:none' enctype="multipart/form-data">
        <input type="file" class='file_v' name="files[]" multiple>
        <input class='go_sub' type="submit" value="Upload File" name="submit">
        </form>
    </div>
<br>
    <div class='container_hx ' style='padding-right:0 !important;'>
    <?php
      $query = mysqli_query($init, "SELECT * FROM photos WHERE collection = '$collection_data' AND user = '$indigo' ORDER BY unique_id ASC LIMIT 3");
      $is_it = mysqli_num_rows($query);
      if($is_it > 0){
        while($arr = mysqli_fetch_array($query)){
        $m_uni = $arr['unique_id'];
        $media = $arr['photo_name'];
        ?>
                <div class='large data_<?php echo $m_uni ?>' >
                  <img src='user_media/<?php echo $media ?>'>
                  <div class='user_show'><i data-m='<?php echo $m_uni ?>' class="del_ uil uil-trash-alt"></i></div>
                  <div data-get = '<?php echo $media ?>' class='use_as'>use as</div>
                </div>
           
              <?php
            }
            }else{
              ?>
      <div style='text-align:center'>No media</div>
              <?php
            }
          ?>
        </div>
    </div>
<script>

var del_ = document.querySelectorAll(".del_");
del_.forEach(el => {
    el.addEventListener("click",function(){
      var data_m = this.getAttribute("data-m");
      $(".confirm").css("display","flex");
      $(".yes").unbind("click").click(function(){
        $(".data_"+data_m).addClass("ghost");
        $.ajax({
          url:"data_process.php",
          type:"post",
          async:false,
          data:{
            "del_img":data_m
          },success:function(data){
            $(".note_5").text(data);
            $(".note_5").removeClass("ghost");
            setTimeout(() => {
              $(".note_5").addClass("ghost");
            }, 2000);
          }
        })
      })
    setTimeout(() => {
        $(".confirm").css("display","none");
    }, 3000);
    })
});

$(".use_as").click(function(){
  var image = $(this).attr("data-get");
  $(".confirm_2").css("display","flex");
   $(".spot").unbind("click").click(function(){
      $.ajax({
        url:"data_process.php",
        type:"post",
        async:false,
        data:{
          "image":image
        },success:function(data){
          $(".note_5").text(data);
          $(".note_5").removeClass("ghost");
          setTimeout(() => {
            $(".note_5").addClass("ghost");
          }, 2000);
        }
      })
   })
   $(".pp").unbind("click").click(function(){
    $(".m_x").attr("src","user_media/"+image);
      $.ajax({
        url:"data_process.php",
        type:"post",
        async:false,
        data:{
          "image_2":image
        },success:function(data){
          $(".note_5").text(data);
          $(".note_5").removeClass("ghost");
          setTimeout(() => {
            $(".note_5").addClass("ghost");
          }, 2000);
        }
      })
   })
  setTimeout(() => {
    $(".confirm_2").css("display","none");
  }, 3000);
})

$(".m_v").click(function(){
     $(".file_v").click();
     var file_ = document.querySelector(".file_v");
     file_.addEventListener("change", ()=> {
         $(".go_sub").click();
     })
})

$(".n_v").click(function(){
     var all_del = this.getAttribute("del");
     $(".confirm").css("display","flex");
     $(".yes").unbind("click").click(function(){
     $.ajax({
          url:"data_process.php",
          type:"post",
          async:false,
          data:{
            "del_all":all_del
          },success:function(data){
            $(".note_5").text(data);
            $(".note_5").removeClass("ghost");
            setTimeout(() => {
              $(".note_5").addClass("ghost");
            }, 2000);
            $(".pop_bg").addClass("ghost");
            show_pre();
     setTimeout(() => {
      $(".g_holder").load("second_item.php");
      hide_pre();
     }, 500);
          }
        })
      })
        setTimeout(() => {
        $(".confirm").css("display","none");
    }, 3000);
})

var url = 'file_process.php';
var form = document.querySelector('.form_v');
form.addEventListener('submit', e => {
    show_pre();
    e.preventDefault();

    const files = document.querySelector('[type=file]').files;
    const formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        let file = files[i];

        formData.append('files[]', file);
    }
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => {
        return response.text();
    }).then(data => {
        $(".note_5").text(data)
        $(".note_5").removeClass("ghost");
      setTimeout(() => {
        $(".note_5").addClass("ghost");
        $(".pop_cont").load("view_collection.php", function(){
            hide_pre();
        });
      }, 2000);
    });
});

</script>