<?php
session_start();
include("assets/php/init.php");
if(isset($_SESSION['indigo'])){
  ?>
  <script>
      window.location.href = "aurenso.php";
  </script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@200&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/styles/aurenso.css">
    <link rel="stylesheet" href="assets/styles/buttons.css">
    <link rel="stylesheet" href="assets/styles/form.css">
    <link rel="stylesheet" href="assets/styles/select.css">
    <link rel="stylesheet" href="assets/styles/spinner.css">
    <title>Entangled - Signin</title>
    <style>
    .ghost{
      display:none;
      visibility: hidden;
      opacity:0;
    }
 
    .form_container{
        height:100%;
        overflow-x:hidden ;
    }

    form input, select{
    margin:15px 0;
    padding:15px 10px;
    width:100%;
    outline:none;
    border:1px solid #bbb;
    border-radius:20px;
    display:inline-block;
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box;
    -webkit-transition:0.2s ease all;
    -moz-transition:0.2s ease all;
    -ms-transition:0.2s ease all;
    -o-transition:0.2s ease all;
    transition:0.2s ease all;
    }

  .funky_1{
    position:absolute;
    right:10%;
    top:-2%;
    z-index:999;
    width:50px;
    transform:rotate(20deg);
    height:auto;
   }
  .funky_2{
      position:absolute;
      right:50px;
      bottom:40px;
      width:50px;
      z-index:999;
      height:auto;
  }

  .btn {
      background-color: white;
      color: rebeccapurple;
      font-family: inherit;
      font-weight: bold;
      padding: 1rem;
      border-radius: 5px;
      border: none;
      cursor: pointer;
  }

.btn:focus {
    outline: none;
}

.btn:active {
    transform: scale(.98);
}

#toasts {
    position: fixed;
    bottom: 10px;
    right: 10px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.toast {
    background-color: black;
    color: #fff;
    border-radius: 5px;
    padding: 1rem 2rem;
    margin: .5rem;
}
#toasts_2 {
    position: fixed;
    bottom: 10px;
    right: 10px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.toast {
    background-color: black;
    color: #fff;
    border-radius: 5px;
    padding: 1rem 2rem;
    margin: .5rem;
}

.lineloader{
  width:100%;
  max-height:2px !important;
  height:2px !important;
  background:linear-gradient(to right,  black,  black );
  background-color:transparent;
  position:absolute;
  top:0;
  left:0;
  display:none;
  z-index:999 !important;
  margin:0;
  background-size: 20%;
  background-repeat:repeat-y;
  background-position:-25% 0;
  animation: scroll 1.3s linear infinite;
}
@keyframes scroll{
  50%{
    background-size:70%;
  }
  100%{
    background-position:125% 0;
  }
}

.container{
    position:fixed;
    top:15px;
    left:15px;
}
html {
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
}
.note{
        padding:20px;
        border-radius:10px;
        background-color:black;
        color:#fff;
        font-size:14px !important;
        margin-top:20px;
    }
    @media screen and (max-width: 1035px){
      .left{
        display:none;
      }
      .right{
        width:100% !important;
      }
      .form_container{
        width:100% !important;
      }
      .form_container form{
        max-width:100%;
      }
      #logo{
        font-size:40px !important;
      }
    }
    </style>
</head>
<body>

          <div class="container">
               <div class="left">
                     <div class="rage_text_holder">
                        <div class="banner">
                            <video src="assets/media/production ID_4233023.mp4" autoplay muted loop type="video/mp4"></video>
                            <h2 class="rage_text">Entangled</h2>
                          </div>
                     </div>
                     <div>
                     </div>
               </div>
               <div class="right">
                <div class="lineloader"></div>
                <div id="toasts"></div>
                <img class="funky_1" src="assets/Funky Scribbbles/57.svg" alt="">
                     <div class="form_container">
                      
                        <form id="login_" class="bounce-in" method="post" action="">

                            <h3 id="logo">Log In</h3>
                          
                            <label for="email">Email address</label>
                            <input class="data_1" type="text" id="user" name="email" placeholder="Type in your email address.." autocomplete="off" required />
                          
                            <label for="password">Password</label>
                            <input class='data_2' type="password" id="password" name="password" placeholder="Enter your password.." autocomplete="off" required />
                            <a class="forgot" href="#">Forgot Password?</a>
                            <a class="register" href="#">Create account</a>
                            <input type="button" class="sub_1" name="submit" value="submit" />

                        </form>

                        <form id="signup_" class="bounce-in ghost" method="post" action="">

                            <h3 id="logo">Sign Up</h3>

                            <label for="username">Username</label>
                            <input type="text" class="data_3" id="username" name="username" placeholder="Type in your username.." autocomplete="off" required />
                          
                            <label for="email">Email address</label>
                            <input type="text" class="data_4"  id="user" name="email" placeholder="Type in your email address.." autocomplete="off" required />
                          
                            <label for="password">Password</label>
                            <input type="password" class="data_5" id="password" name="password" placeholder="Enter your password.." autocomplete="off" required />
                         

                            <a class="login_" href="#">Signin instead</a>
                          
                            <input type="button" class="sub_2" name="submit" value="submit" />
                          
                          </form> 

                        <form id="code_" class="bounce-in ghost" method="post" action="">

                            <h3 id="logo">Retrieve</h3>

                     
                            <label for="email">Email address</label>
                            <input type="text" class="data_6"  id="e_code" name="email" placeholder="Type in your email address.." autocomplete="off" required />

                            <a class="login_" href="#">Signin instead</a>
                            <a class="register" href="#">Create account</a>
                          
                            <input type="button" class="sub_3" name="submit" value="submit" />
                          
                          </form> 
              
                     </div>
                  
               </div>
          </div>
</body>
<script src="assets/js/toast.js"></script>
<script>    

let register, forget, email, password, spinner, sub_1, sub_2, data_1, data_2, data_3, data_4, data_5;

lineloader = document.querySelector(".lineloader");
register = document.querySelectorAll(".register");
sub_1 = document.querySelector(".sub_1");
sub_2 = document.querySelector(".sub_2");
sub_3 = document.querySelector(".sub_3");
data_1 = document.querySelector(".data_1");
data_2 = document.querySelector(".data_2");
data_3 = document.querySelector(".data_3");
data_4 = document.querySelector(".data_4");
data_5 = document.querySelector(".data_5");
data_6 = document.querySelector(".data_6");
login_ = document.getElementById("login_");
code_ = document.getElementById("code_");
log_switch = document.querySelectorAll(".login_");
signup_ = document.getElementById("signup_");
signin_ = document.getElementById("signin_");
forgot = document.querySelector(".forgot");
email = document.getElementById("email");
password = document.getElementById("password");
spinner = document.querySelector(".spinner");

show_pre = () => {
    lineloader.style.display = "block";
   }
  hide_pre = () => {
    setTimeout(() => {
      lineloader.style.display = "none";
    }, 2000);
  }

log_switch.forEach(e => {
  e.addEventListener("click", () => {
  signup_.classList.add("ghost");
  login_.classList.toggle("ghost");
  code_.classList.add("ghost");
})
});

register.forEach(p => {
  p.addEventListener("click", () => {
  signup_.classList.toggle("ghost");
  login_.classList.add("ghost");
  code_.classList.add("ghost");
})
})

forgot.addEventListener("click", () => {
  signup_.classList.add("ghost");
  login_.classList.add("ghost");
  code_.classList.toggle("ghost");
})

sub_1.addEventListener("click",function(){
    let request = new XMLHttpRequest();
        // Instantiating the request object
        request.open("GET", 'assets/php/data_process.php?d_1='+data_1.value+'&d_2='+data_2.value);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // Defining event listener for readystatechange event
        request.onreadystatechange = function() {
            show_pre();
            // Check if the request is compete and was successful
            if(this.readyState === 4 && this.status === 200) {
                // Inserting the response from server into an HTML element
                let convert = JSON.parse(this.responseText); 
                hide_pre();
                createNotification(convert[0].message);
                if(convert[0].message == 'Setting account session'){
                 window.location.href = "aurenso.php";
                }
            }
        };
        // Sending the request to the server
    request.send();
})

sub_2.addEventListener("click",function(){
    let request = new XMLHttpRequest();
        request.open("GET", 'assets/php/data_process.php?d_3='+data_3.value+'&d_4='+data_4.value+'&d_5='+data_5.value);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onreadystatechange = function() {
            show_pre();
            if(this.readyState === 4 && this.status === 200) {
                let convert = JSON.parse(this.responseText); 
                hide_pre();
                createNotification(convert[0].message);
                if(convert[0].message == 'Account created'){
                 window.location.href = "aurenso.php";
                }
            }
        };
    request.send();
})

sub_3.addEventListener("click", function(){
  let request = new XMLHttpRequest();
        request.open("GET", 'assets/php/data_process.php?d_6='+data_6.value);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onreadystatechange = function() {
            show_pre();
            if(this.readyState === 4 && this.status === 200) {
                let convert = JSON.parse(this.responseText); 
                hide_pre();
                createNotification(convert[0].message);
                if(convert[0].message == 'Code sent'){
                  $(".form_container").load("code_verif.php");
                }
            }
        };
    request.send();
})

</script>
</html>