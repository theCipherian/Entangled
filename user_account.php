<?php
session_start();
require("assets/php/init.php");
?>
<style>
    .def{
        width:100%;
        margin-bottom:5rem;

    }
    .bnm{
        border-radius:5px !important;
    }
    .note_6{
        border-radius:5px !important;
    }
</style>
<div class="def bounce-in">
  <h3>Your account</h3>
  <br>
  <div class='data_h fade-in-down'>
     <label for="">Username</label>
     <input class='data_1' type="text">
     <div class="bbb bnm d_1">Save</div>
  </div>
  <div class="note_6"><?php echo $username ?></div>
  <br>
  <div class='data_h fade-in-down'>
     <label for="">Firstname</label>
     <input class='data_2' type="text">
     <div class="bbb bnm d_2">Save</div>
  </div>
  <div class="note_6"><?php echo $first_name ?></div>
  <br>
  <div class='data_h fade-in-down'>
     <label for="">Lastname</label>
     <input class='data_3' type="text">
     <div class="bbb bnm d_3">Save</div>
  </div>
  <div class="note_6"><?php echo $last_name ?></div>
  <br>
  <div class='data_h fade-in-down'>
 <label for="">Country</label>
<select id="country" class='data_4' name="country" style='width:20rem;margin-bottom:0 !important'>
    <option>country</option>
    <option value="DZ">Algeria</option>
    <option value="AO">Angola</option>
    <option value="BJ">Benin</option>
    <option value="BW">Botswana</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="CM">Cameroon</option>
    <option value="CV">Cape Verde</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo, Democratic Republic of the Congo</option>
    <option value="CI">Cote D'Ivoire</option>
    <option value="DJ">Djibouti</option>
    <option value="EG">Egypt</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="ET">Ethiopia</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GH">Ghana</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="KE">Kenya</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libyan Arab Jamahiriya</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="ML">Mali</option>
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Mayotte</option>
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="NA">Namibia</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="RE">Reunion</option>
    <option value="RW">Rwanda</option>
    <option value="SH">Saint Helena</option>
    <option value="ST">Sao Tome and Principe</option>
    <option value="SN">Senegal</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    <option value="SS">South Sudan</option>
    <option value="SD">Sudan</option>
    <option value="SZ">Swaziland</option>
    <option value="TZ">Tanzania, United Republic of</option>
    <option value="TG">Togo</option>
    <option value="TN">Tunisia</option>
    <option value="UG">Uganda</option>
    <option value="EH">Western Sahara</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select>
<div class="bbb bnm d_4">Save</div>
  </div>
  <div class="note_6"><?php echo $country ?></div>
  <br>
  <div class='data_h fade-in-down'>
 <label for="">Sex</label>
<select id="Sex" class='data_5' name="sex" style='width:20rem;margin-bottom:0 !important'>
<option value="M">Male</option>
<option value="F">Female</option>
<option value="O">Other</option>
</select>
<div class="bbb bnm d_5">Save</div>
  </div>
  <div class="note_6"><?php echo $sex ?></div>
  <br>
  <div class='data_h fade-in-down'>
     <label for="">Age</label>
     <input class='data_6' type="number">
     <div class="bbb bnm d_6">Save</div>
  </div>
  <div class="note_6"><?php echo $age ?></div>
  <br>
  <br>
</div>
<script>
    $(".d_1").click(function(){
        var data_1 = document.querySelector(".data_1");
        if(data_1.value.length < 1){
            createNotification("Field empty");
        }else if(data_1.value.length > 50){
            createNotification("Username too long");
        }else{
            $.ajax({
                url:"data_process.php",
                type:"post",
                async:false,
                data:{
                    data_1:data_1.value
                },
                success:function(data){
                    $(".note_5").text(data);
                    $(".note_5").removeClass("ghost");
                    setTimeout(() => {
                        $(".note_5").addClass("ghost");
                    }, 2000);
                    $(".g_holder").load("user_account.php");
                }
            })
        }
    })
    $(".d_2").click(function(){
        var data_1 = document.querySelector(".data_2");
        if(data_1.value.length < 1){
            createNotification("Field empty");
        }else if(data_1.value.length > 50){
            createNotification("Username too long");
        }else{
            $.ajax({
                url:"data_process.php",
                type:"post",
                async:false,
                data:{
                    data_2:data_1.value
                },
                success:function(data){
                    $(".note_5").text(data);
                    $(".note_5").removeClass("ghost");
                    setTimeout(() => {
                        $(".note_5").addClass("ghost");
                    }, 2000);
                    $(".g_holder").load("user_account.php");
                }
            })
        }
    })
    $(".d_3").click(function(){
        var data_1 = document.querySelector(".data_3");
        if(data_1.value.length < 1){
            createNotification("Field empty");
        }else if(data_1.value.length > 50){
            createNotification("Username too long");
        }else{
            $.ajax({
                url:"data_process.php",
                type:"post",
                async:false,
                data:{
                    data_3:data_1.value
                },
                success:function(data){
                    $(".note_5").text(data);
                    $(".note_5").removeClass("ghost");
                    setTimeout(() => {
                        $(".note_5").addClass("ghost");
                    }, 2000);
                    $(".g_holder").load("user_account.php");
                }
            })
        }
    })
    $(".d_4").click(function(){
        var data_1 = document.querySelector(".data_4");
        if(data_1.value.length < 1){
            createNotification("Field empty");
        }else if(data_1.value.length > 50){
            createNotification("Username too long");
        }else{
            $.ajax({
                url:"data_process.php",
                type:"post",
                async:false,
                data:{
                    data_4:data_1.value
                },
                success:function(data){
                    $(".note_5").text(data);
                    $(".note_5").removeClass("ghost");
                    setTimeout(() => {
                        $(".note_5").addClass("ghost");
                    }, 2000);
                    $(".g_holder").load("user_account.php");
                }
            })
        }
    })
    $(".d_5").click(function(){
        var data_1 = document.querySelector(".data_5");
        if(data_1.value.length < 1){
            createNotification("Field empty");
        }else if(data_1.value.length > 50){
            createNotification("Username too long");
        }else{
            $.ajax({
                url:"data_process.php",
                type:"post",
                async:false,
                data:{
                    data_5:data_1.value
                },
                success:function(data){
                    $(".note_5").text(data);
                    $(".note_5").removeClass("ghost");
                    setTimeout(() => {
                        $(".note_5").addClass("ghost");
                    }, 2000);
                    $(".g_holder").load("user_account.php");
                }
            })
        }
    })
    $(".d_6").click(function(){
        var data_1 = document.querySelector(".data_6");
        if(data_1.value.length < 1){
            createNotification("Field empty");
        }else if(data_1.value.length > 50){
            createNotification("Username too long");
        }else{
            $.ajax({
                url:"data_process.php",
                type:"post",
                async:false,
                data:{
                    data_6:data_1.value
                },
                success:function(data){
                    $(".note_5").text(data);
                    $(".note_5").removeClass("ghost");
                    setTimeout(() => {
                        $(".note_5").addClass("ghost");
                    }, 2000);
                    $(".g_holder").load("user_account.php");
                }
            })
        }
    })
</script>
