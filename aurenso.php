<?php
session_start();
include("assets/php/init.php");
if(!isset($_SESSION['indigo'])){
  ?>
  <script>
      window.location.href = "index.php";
  </script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@200&family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/styles/aurenso.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/styles/buttons.css">
    <link rel="stylesheet" href="assets/styles/form.css">
    <link rel="stylesheet" href="assets/styles/select.css">
    <link rel="stylesheet" href="assets/styles/spinner.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
    <script src="https://cdn.plyr.io/3.7.2/plyr.js"></script>
    <title>Aurenso - Account</title>
    <style>
        :root {
  --scrollback:#ebebeb;
  --background-color: #ffebee;
  --blue-50: #e3f2fd;
  --blue-100: #bbdefb;
  --blue-A700: #2962ff;
  --green-50: #e8f5e9;
  --green-100: #c8e6c9;
  --green-A700: #00c853;
  --purple-50: #f3e5f5;
  --purple-100: #e1bee7;
  --purple-A700: #aa00ff;
  --orange-50: #fff3e0;
  --orange-100: #ffe0b2;
  --orange-A700: #ff6d00;
  --orange-700: #f57c00;
  --grey-900: #212121;
  --white: #ffffff;
  --round-button-active-color: #212121;
  --translate-main-slider: 0%;
  --main-slider-color: #ffebee;
  --translate-filters-slider: 0;
  --filters-container-height: 3.8rem;
  --filters-wrapper-opacity: 1;
  --primary-color-hue: 252;
--dark-color-lightness: 17%;
--light-color-lightness: 95%;
--white-color-lightness: 100%;

--primary-color-hue: 252;
--color-white:hsl(252,30%, var(--white-color-lightness));
--color-light:hsl(252, 30%, var(--light-color-lightness));
--color-gray:hsl(var(--primary-color-hue), 15%, 65%);
--color-primary:hsl(var(--primary-color-hue), 75%, 60%);
--color-secondary:hsl(252, 100%, 90%);
--color-success:hsl(120, 95%, 65%);
--color-danger:hsl(0, 95%, 65%);
--color-dark: hsl(252, 30%, var(--dark-color-lightness));
--color-black:hsl(252, 30%, 10%);

--border-radius:2rem;
--card-border-radius:1rem;
--btn-padding:0.6rem 2rem;
--search-padding: 0.6rem 1rem;
--card-padding: 1rem;

--sticky-top-left:5.4rem;
--sticky-top-right: -18rem;
}

html{
-webkit-tap-highlight-color: rgba(0,0,0,0);
-webkit-tap-highlight-color: transparent;
}
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
    top: 10%;
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
    width:98%;
    height:98%;
    bottom:0;
    right:0;
    justify-content:space-between;
    left:0;
    margin:0 auto;
}
html {

}
body{
    transition: background-color 0.4s ease-in-out;
  background-color: var(--background-color) !important;
}
.note{
        padding:20px;
        border-radius:10px;
        background-color:black;
        color:#fff;
        margin-top:20px;
    }
    .left{
        background-color:#fff;
        width:50% !important;
        position:relative !important;
    }
    .right{
        background-color:rgb(251,251,251)!important;
        position:relative;
        height:100% !important;
        width:50% !important;
    }
    .right-top_bar{
        padding:1rem;
        display:flex;
        align-items:center;
        justify-content:space-between;
        height:10% !important;
        width:100%;
    }
    .search_holder {
        width: 80%;
        height: max-content;
        display: flex;
        align-items: center;
        position: relative;
        padding: 13px;
        justify-content: space-between;
        border-radius: 45px;
        background-color: #fff;
        display:none !important;
    }
    .search {
    background-color: transparent;
    border: none;
    width: 100%;
    outline: none;
}
.icon_holder {
    width: 2rem;
    position: absolute;
    right: 6px;
    margin: auto;
    height: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: rgb(244,245,247);
}
.settings_icon{
    font-size:1.5rem;
    cursor:pointer;
}
.settings_icon:hover{
    color:var(--background-color);
}
.notifications {
    width: 2.5rem;
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 50%;
    justify-content: center;
    height: 2.5rem;
    font-size: 1.2rem;
}
.container{
    background-color:transparent;
}

.other_container_user_data{
  
    width:100%;
    height:100%;
    background-color:#fff;
    
}
.container_hx {
padding:0px !important;
}
.text_1{
    padding:1rem;
        position:absolute;
        top:0;
        left:0;
        display:flex;
        align-items:center;
        justify-content:space-around;
        right:0;
        height:4rem;
        font-family: 'Pacifico', cursive !important;
        width:100%;
        color:black;
}

button {
  border: none;
  cursor: pointer;
  background-color: transparent;
  outline: none;
}

nav{
    width:100%;
}

nav.amazing-tabs {
  background-color: var(--white);
  border-radius: 2.5rem;
  user-select: none;
  padding-top: 1rem;
}

.main-tabs-container {
  padding: 0 1rem 1rem 1rem;
}

.main-tabs-wrapper {
  position: relative;
}

ul.main-tabs,
ul.filter-tabs {
  list-style-type: none;
  display: flex;
}

ul.main-tabs li {
  display: inline-flex;
  position: relative;
  padding: 1.5rem;
  z-index: 1;
}

.avatar,
.avatar img {
  height: 4rem;
  width: 4rem;
  border-radius: 50%;
  pointer-events: none;
}

.avatar img {
  object-fit: cover;
}

.round-button {
  height: 4.8rem;
  width: 4.8rem;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  color: var(--grey-900);
  transition: color 0.2s ease-in-out;
}

.round-button:hover,
.round-button.active {
  color: var(--round-button-active-color);
}

.round-button svg, img {
  pointer-events: none;
  height: 1.5rem;
  width: 1.5rem;
  transform: translate(0, 0);
}
.pulse {
  display: block;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: limegreen;
  cursor: pointer;
  box-shadow: 0 0 0 rgba(204,169,44, 0.4);
  animation: pulse 1s infinite;
 
}
.pulse:hover {
  animation: none;
}

@-webkit-keyframes pulse {
  0% {
    -webkit-box-shadow: 0 0 0 0 rgb(50, 205, 50, 0.4);
  }
  70% {
      -webkit-box-shadow: 0 0 0 20px rgb(50, 205, 50, 0);
  }
  100% {
      -webkit-box-shadow: 0 0 0 0 rgb(50, 205, 50, 0);
  }
}
@keyframes pulse {
  0% {
    -moz-box-shadow: 0 0 0 0 rgb(50, 205, 50, 0.4);
    box-shadow: 0 0 0 0 rgb(50, 205, 50, 0.4);
  }
  70% {
      -moz-box-shadow: 0 0 0 20px rgb(50, 205, 50, 0);
      box-shadow: 0 0 0 20px rgb(50, 205, 50, 0);
  }
  100% {
      -moz-box-shadow: 0 0 0 0 rgb(50, 205, 50, 0);
      box-shadow: 0 0 0 0 rgb(50, 205, 50, 0);
  }
}
.main-slider {
  pointer-events: none;
  position: absolute;
  top: 0;
  left: 0;
  padding: 1.5rem;
  z-index: 0;
  transition: transform 0.4s ease-in-out;
  transform: translateX(var(--translate-main-slider));
}

.main-slider-circle {
  height: 4.8rem;
  width: 4.8rem;
  border-radius: 50%;
  transition: background-color 0.4s ease-in-out;
  background-color: var(--main-slider-color);
}

.animate-jello {
  animation: jello-horizontal 0.9s both;
}

@keyframes jello-horizontal {
  0% {
    transform: scale3d(1, 1, 1);
  }
  30% {
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    transform: scale3d(1, 1, 1);
  }
}

.filters-container {
  overflow: hidden;
  padding: 0 3rem;
  transition: max-height 0.4s ease-in-out;
  max-height: var(--filters-container-height);
}

.filters-wrapper {
  position: relative;
  transition: opacity 0.2s ease-in-out;
  opacity: var(--filters-wrapper-opacity);
}

.filter-tabs {
  border-radius: 1rem;
  padding: 0.3rem;
  overflow: hidden;
  background-color: var(--orange-50);
}

.filter-tabs li {
  position: relative;
  z-index: 1;
  display: flex;
  flex: 1 0 33.33%;
}

.filter-button {
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 0.8rem;
  flex-grow: 1;
  height: 3rem;
  padding: 0 1.5rem;
  color: var(--orange-700);
  font-family: "Open Sans", sans-serif;
  font-weight: 400;
  font-size: 1.4rem;
}

.filter-button.filter-active {
  transition: color 0.4s ease-in-out;
  color: var(--grey-900);
}

.filter-slider {
  pointer-events: none;
  position: absolute;
  padding: 0.3rem;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 0;
}

.filter-slider-rect {
  height: 3rem;
  width: 33.33%;
  border-radius: 0.8rem;
  background-color: var(--white);
  box-shadow: 0 0.1rem 1rem -0.4rem rgba(0, 0, 0, 0.12);
  transition: transform 0.4s ease-in-out;
  transform: translateX(var(--translate-filters-slider));
}

.other_cont{
  padding-right:5px;
  height:100%;
  overflow-y:scroll;
  width:100;
  background-color:transparent;
}
::-webkit-scrollbar {
    width: 5px;
}
 
::-webkit-scrollbar-track {
    background-color: transparent;
    -webkit-border-radius: 10px;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background:rgba(243,243,243);
}
.container_hx {
  width:100%;
  margin: 0em auto;
  padding-right:5px;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  grid-auto-rows: 50px;
  grid-auto-flow: dense;
  grid-gap: 5px;
}

.large, .medium, .small {
  display: flex;
  height: 100%;
  width: 100%;
  cursor:pointer;
  position:relative;
  grid-column: auto / span 1;
}

.large {
  grid-row: span 10;
}

.medium {
  grid-row: span 3;
}

.small {
  grid-row: span 2;
}

.container_hx img {
  width: 100%;
  height: auto;
  -o-object-fit: cover;
  object-fit: cover;
}
.bottom_thing{
  display:none ;
}
.user_show{
  position:absolute;
  bottom:0;
  left:0;
  right:0;
  width:100%;
  padding:10px;
  color:#fff;
}
.def{
  padding-left:3rem;
}
.desc_3{
  padding-left:3rem;
  padding:10px;
  width:30rem;
  border-radius:8px;
  position:relative;
  min-height:3rem;
  height:max-content;
  border:none;
  background-color:var(--main-slider-color);
}
.first_row{
  letter-spacing:1px;
  padding:10px;

}
.second_row{
  display:flex;
  width:10rem;
  padding:10px;
  justify-content:space-between;
}
.set_1{
  color:grey;
}
.set{
  color:grey;

}
.icon_holder_1 {
    width: 2rem;
    position: absolute;
    right: -10%;
    top:5px;
    margin: auto;
    height: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color:#fff;
    background-color: #343434;
    cursor:pointer;
}
.bbb{
  background-color: black;
    color: #fff;
    width:30rem;;
    text-align:center;
    border-radius: 5px;
    padding: 1rem 1rem;
    cursor:pointer;
    margin-top:10px;
}
.lineloader{
  display:none;
}
.cease{
  width:max-content;
  cursor:pointer;
  padding:10px;
  border-radius:30px;
  background-color:var(--main-slider-color);
}
.data_h{
  margin-top:10px;
  display:flex;
  flex-direction:column;
}
.data_h input, select{
  width:20rem;
  height:3rem;
  outline:none;
  border:2px solid black;
  border-radius:5px;
  padding:10px
}
.bnm{
  max-width:20rem;
  min-width:20rem;
}
.ghost{
  display:none;
  visibility:hidden;
  opacity;
}
.fade-in-down {
  animation: fade-in-down 1s
}
@keyframes fade-in-down {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
#toasts{
  position:absolute !important;

  
}
.pop_bg{
  position:fixed;
  left:0;
  right:0;
  bottom:0;
  top:0;
  width:100%;
  background-color:rgba(255,255,255,0.60);
  height:100%;
  z-index:999999;
}

.pop{
  position:absolute;
  left:0;
  right:0;
  bottom:0;
  box-shadow: 0 1px 5px rgba(0,0,0,0.05), 0 1px 4px rgba(0,0,0,0.05);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  height:100%;
  border-top-right-radius:10px;
  border-top-left-radius:10px;
  width:40%;
  background-color:#fff;
  margin:auto;
  padding:10px;
}

.pop_cont{
  height:100%;
  min-width:100%;
  overflow-y:scroll;
}

.data_k{
  padding:1rem;
  margin-bottom:10%;
  min-height:min-content !important;
}

.grey_text{
  color:grey;
}

.note{
  background-color:rgba(133, 255, 0, 0.10);
  color:limegreen;
}

.cease{
  margin-right:10px;
}
.mmm{
  background-color:rgb(245,245,245);
}
.confirm{
  position:fixed;
  right:10px;
  box-shadow: 0 1px 5px rgba(0,0,0,0.05), 0 1px 4px rgba(0,0,0,0.05);
  border-radius:5px;
  top:10px;
  display:flex;
  padding:10px;
  align-items:center;
  justify-content:space-around;
  width:10rem;
  background-color:#fff;
  z-index:999999999;
  height:3rem;
  display:none;
}
.confirm_2{
  position:fixed;
  right:10px;
  box-shadow: 0 1px 5px rgba(0,0,0,0.05), 0 1px 4px rgba(0,0,0,0.05);
  border-radius:5px;
  top:10px;
  display:flex;
  padding:10px;
  align-items:center;
  justify-content:space-around;
  width:20rem;
  background-color:#fff;
  z-index:999999999;
  height:3rem;
  display:none;
}
.yes{
  width:100%;
  background:rgba(251,251,251);
  padding:10px;
  border-radius:5px;
  cursor:pointer;
  text-align:center;
}
.spot, .pp{
  width:100%;
  background:rgba(251,251,251);
  padding:10px;
  margin:2px;
  border-radius:5px;
  cursor:pointer;
  text-align:center;
}
.no:hover{
  background-color:var(--main-slider-color);
  color:black;
}
.yes:hover{
  background-color:var(--main-slider-color);
  color:black;
}
.spot:hover{
  background-color:var(--main-slider-color);
  color:black;
}
.pp:hover{
  background-color:var(--main-slider-color);
  color:black;
}
.no{
  width:48%;
  background:rgba(251,251,251);
  padding:10px;
  border-radius:5px;
  text-align:center;
  cursor:pointer;
}
.note_5{
  position:fixed;
  bottom:0;
  left:0;
  width:100%;
  background-color:black;
  color:#fff;
  text-align:center;
  height:2.5rem;
  display:none;
  display:flex;
  align-items:center;
  justify-content:center;
  z-index:99999999;

}
.bounce-in-right {
  animation: bounce-in-right 1s ease;
}
@keyframes bounce-in-right {
  0% {
    opacity: 0;
    transform: translateX(2000px);
  }
  60% {
    opacity: 1;
    transform: translateX(-30px);
  }
  80% { transform: translateX(10px); }
  100% { transform: translateX(0); }
}

.g_holder{
min-height:min-content;
overflow-x:hidden;
overflow-y:hidden !important;
}
.left{
  overflow-y:scroll !important;
  min-height:min-content !important;
}
.def{
  overflow-x:hidden !important;
  overflow-y:hidden !important;
}
.note_6{
  padding:1rem;
  display:flex;
  width:20rem;
  min-width:max-content;
  margin-top:10px;
  border-radius:15px;
  background-color:var(--background-color);
}

.notifications{
  cursor:pointer;
}
.as{
      position:absolute;
      right:5px;
      bottom:5px;
      background-color:rgba(0,0,0,0.50);
      padding:5px;
      border-radius:30px;
      left:10px !important;
      min-width:6rem;
      width:max-content;
      text-align:center;
    }
    .sidepart{
    animation: sikes 1s ease;
    position:fixed;
    right:0;
    bottom:0;
    width:50%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100% !important;
    z-index:99999 !important;
    box-shadow: -5px 0 5px -5px rgba(0,0,0,.1);
}
@media screen and (max-width:800px){
    .sidepart{
        width:100%;
    }
}
.sidepart_items{
   overflow-x:hidden;
   overflow-y:scroll;
   bottom:0;
   left:0;
   position:absolute;
   right:1rem;
   height:90%;
   bottom:0;
   padding:10px;
}

.sidepart_items::-webkit-scrollbar{
    background-color:rgba(255, 166, 0, 0.01);
}

.sidepart_items::-webkit-scrollbar-thumb{
    border-radius:30px;
    background-color:rgba(138, 43, 226, 0.09);
}

@keyframes sikes {
    0%{
        transform:translateX(100%);
    }
    100%{
        transform:translateX(0%);
    }
}
.sidepart_header{
    position:absolute;
    left:0;
    padding:1rem;
    font-size:15px;
    width:100%;
    flex-direction:row-reverse;
    background-color:#fff;
    top:5px;
    display:flex;
    height:10%;
    justify-content:space-between;
    align-items:center;
}
.sidepart_header i{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    cursor:pointer;
}
.thing_345{
    font-weight:bolder;
}
.control{
    display:flex;
    align-items:center;
    justify-content:flex-end;

}
.control .line{
    width:250px;
    height:8px;
    background:#eee;
    margin:0 20px;
    border-radius:4px;
}
.control .line span{
    width:50%;
    height:8px;
    border-radius:4px;
    display:block;
    background:var(--color-primary);
}
.sidepart_items{
    right:0px !important;
}
.noner{
  display:none;
}








@keyframes msg {
	 50% {
		 transform: scale(1.1);
	}
}
 @keyframes home {
	 50% {
		 transform: translateY(-55px);
	}
}
 @keyframes bell {
	 50% {
		 transform: rotate(-10deg);
	}
}
 @keyframes clickCircle {
	 100% {
		 opacity: 0;
	}
}


 .bar {
	 background-color: #fff;
	 position: fixed;
	 left: 0;
   z-index:999999;
	 bottom: 0;
	 width: 100%;
	 height: 60px;
	 display: none;
	 align-items: center;
	 justify-content: space-around;
}
  .icon {
	 width: 40px;
	 height: 40px;
	 padding: 10px;
	 cursor: pointer;
	 position: relative;
}
 .icon.active::after {
	 transform: translateY(0px);
}
  .icon.active::before {
	 opacity: 1;
	 width: 35px;
	 height: 35px;
	 animation: clickCircle linear 0.5s forwards;
}
 .icon.active svg {
	 fill: #8c69e6;
	 stroke: #8c69e6;
}
 .icon.active .msg {
	 animation: msg linear 0.5s alternate;
	 animation-delay: 0.2s;
}
 .icon.active .home .roof, #app .icon.active .user .head {
	 animation: home linear 0.5s alternate;
	 animation-delay: 0.2s;
}
  .icon.active .bell {
	 animation: bell linear 0.5s alternate;
	 animation-delay: 0.2s;
}
  .icon::after {
	 content: '';
	 display: block;
	 width: 3px;
	 height: 3px;
	 border-radius: 50%;
	 background-color: #8c69e6;
	 margin: 2px auto 0;
	 transform: translateY(20px);
	 transition: transform 0.2s;
}
  .icon::before {
	 content: '';
	 display: block;
	 width: 20px;
	 height: 20px;
	 border-radius: 50%;
	 border: 1px solid #c6b6f1;
	 position: absolute;
	 top: 50%;
	 left: 50%;
	 transform: translate(-50%, -50%);
	 opacity: 0;
	 transition: 0.5s;
}
  .icon .home, #app .icon .msg, #app .icon .user {
	 stroke-width: 15;
	 stroke: #000;
}
.bottom_thing_2 {
  display:none;
}
 .button {
	 width: 55px;
	 height: 55px;

	 background-color: var(--background-color);
	 border-radius: 50%;
	 transform: translateY(-20px);
	 transition: 0.5s;
   display:flex;
   align-items:center;
   color:black;
   justify-content:center;
	 position: relative;
}
  .button.active {
	 transform: translateY(-20px) rotate(-45deg);
	 background-color: #9b2ce6;
}
  .button.active i {
	 stroke-width: 15;
	 stroke: #fff;
	 fill: white;
}
  .button.active .tag {
	 top: 20px;
	 transform: translate(44px, -64px) scale(1) rotate(90deg);
}
  .button.active .heart {
	 top: 20px;
	 transform: translate(90px, -110px) scale(1) rotate(45deg);
}
  .button::after, .button::before {
	 display: none;
}
  .button i {
	 stroke-width: 15;
	 stroke: #fff;
	 fill: white;
}
 .button.tag, .button.heart {
	 background-color: #6e41ed;
	 transition: transform 0.5s;
	 position: absolute;
	 top: 0px;
	 left: 0;
	 transform: translate(0, 0) scale(0) rotate(0deg);
}
.note_6{
  background-color:#fff !important;
}
 @media screen and (max-width:1220px){
  .desc_3, .bbb{

    width:24rem !important;
  }
  .icon_holder_1{
    right:-11% !important;
  }
 }
 .notifications i{
  font-size:1.5rem !important;
 }
 @media screen and (max-width:1000px){
  .bottom_thing {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    background-color:var(--background-color);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    height: 3rem;
    width: 5rem;
    color: black;
    z-index: 999999!important;
    
    box-shadow: 0px 0px 20px 20px rgb(0 0 0 / 3%);
}
.bottom_thing_2 {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex !important;
    align-items: center;
    justify-content: center;
    margin: auto;
    background-color:var(--background-color);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    height: 3rem;
    width: 5rem;
    color: black;
    z-index: 99999999!important;
    
    box-shadow: 0px 0px 20px 20px rgb(0 0 0 / 3%);
}
.bottom_thing_2 i{
  font-size:1.5rem;
}

 .right{
  display:none;
 }
 .left{
  width:100% !important;
 }
 .desc_3, .bbb{

width:90% !important;
}
.container{
  width:96% !important;
}
.pop{
  width:70%;
}
.def{
  padding-left:2rem !important;
  padding-right:2rem !important;
}
.
.icon_holder_1{
right:-11% !important;
}

.data_h input, select {
    width: 100%;
    
}
.bnm {
    max-width: 100%;
    min-width: 100%;
}
.other_cont {
  padding-right:0px !important;
}
.container_hx{
  padding-right:0px !important;
}
 }
 @media screen and (max-width:650px){
  .right{
        background-color:rgb(245,245,245)!important;
        position:relative;
        height:100% !important;
        width:50% !important;
    }
  .pop{
  width:80%;
}
.bottom_thing_2 {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex !important;
    align-items: center;
    justify-content: center;
    margin: auto;
    background-color:var(--background-color);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    height: 3rem;
    width: 5rem;
    color: black;
    z-index: 99999999!important;
    
    box-shadow: 0px 0px 20px 20px rgb(0 0 0 / 3%);
}
.bottom_thing_2 i{
  font-size:1.5rem;
}
 }

 
.sidepart{
  z-index:99999999 !important;
}
.bottom_thing i{
    font-size:1.8rem;
}
.bottom_thing{
    z-index:99;
}
.bottom_thing{
    margin:0 !important;
    left:10%;
}

.active2{
  animation: sikes 1s ease;
    position:fixed !important;
    right:0 !important;
    top:0 !important;
    bottom:0 !important;
    min-width:100% !important; 
    background-color:#fff;
   
    transform:translateX(0%);
    max-height:100% !important;
    z-index:99999 !important;
    box-shadow: -5px 0 5px -5px rgba(0,0,0,.1);
}

@media screen and (max-width:530px){
  ::-webkit-scrollbar {
    width: unset !important;
  }.bottom_thing_2 {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex !important;
    align-items: center;
    justify-content: center;
    margin: auto;
    background-color:var(--background-color);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    height: 3rem;
    width: 5rem;
    color: black;
    z-index: 99999999!important;  
    box-shadow: 0px 0px 20px 20px rgb(0 0 0 / 3%);
  }
  .bottom_thing_2 i{
    font-size:1.5rem;
  }
  .pop{
    width:100%;
  }
  ::-webkit-scrollbar-track {
      background-color: unset !important;
      -webkit-border-radius:unset !important;
      border-radius: unset !important;
  }

  ::-webkit-scrollbar-thumb {
      -webkit-border-radius:unset !important;
      border-radius: unset !important;
      background:unset !important;
  }
  .n_o{
    display:none !important;
  }
  .bottom_thing{
    display:none !important;
  }
  .bar{
    display:flex;
  }
  .icon_holder_1{
right:-13% !important;
}
.desc_3, .bbb{
  width:95% !important;
}
.data_1, select{
  min-width:100% !important;
}
.note_6{
  width:100%;
  background-color:#fff !important;
}
html{
  font-size:13px !important;
}
}




.loading-wrapper {
    width: 100%;
}
.title-block {
  padding-bottom: 24px;
  padding-top: 8px;
}
.list-block {
  padding-top: 12px;
}
.loading { 
  -webkit-animation-duration: 1s;
  -webkit-animation-fill-mode: forwards;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-name: placeHolderShimmer;
  -webkit-animation-timing-function: linear;
  background: #f6f7f8;
  background-image: -webkit-gradient(linear, left center, right center, from(#f6f7f8), color-stop(.2, #edeef1), color-stop(.4, #f6f7f8), to(#f6f7f8));
  background-image: -webkit-linear-gradient(left, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
  background-repeat: no-repeat;
  border-radius: 2px;
}
.title {
  height: 10px;
  width: 25%;
  margin-bottom: 28px;
}
.content {
  height: 10px;
  margin-bottom: 12px;
}
.content.line-item {
  margin-bottom: 28px;
}
.last-row {
  width: 90%;
  margin-bottom: 0px;
}


@-webkit-keyframes placeHolderShimmer {
  0% {
    background-position: -468px 0;
  }

  100% {
    background-position: 468px 0;
  }
}

.ui-layout {
    max-width: 1036px;
    margin: 20px auto;
}
.ui-layout__sections {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-top: -20px;
    margin-left: -20px;
    padding-top: 0;
}
.ui-layout__section {
    min-width: 0;
    max-width: 100%;
    display: flex;
    -webkit-flex: 1 1 100%;
    -ms-flex: 1 1 100%;
    flex: 1 1 100%;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-content: flex-start;
    margin-top: -20px;
    margin-left: -20px;
    padding-top: 20px;
    padding-left: 20px;
}
.ui-layout__section--primary {
    -webkit-flex: 2 1 480px;
    -ms-flex: 2 1 480px;
    flex: 2 1 480px;
}
.ui-layout__item {
    min-width: 0;
    max-width: 100%;
    flex: 2 1 480px;
    padding-top: 20px;
    padding-left: 20px;
}
.ui-card {
  background-color: #ffffff;
  border-radius: 3px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 20px;
  height: auto;
}

.ui-layout{
  
}
</style>
</head>
<body>
          <div class="container ">
          <div class='sidepart noner'>
      <div class='sidepart_header'> <span class='thing_345' id='data_change_232'> @DATATEXT</span> 
        <div id='sidepart_terminate'> <i class='bx bx-chevron-right '></i></div>
         </div>
         <div class='sidepart_items' id='get_data_3432'>
         </div>
        <div class='downsider'>
       </div>
     </div>
          <div class='bottom_thing'><i class="uil uil-ellipsis-h"></i></div>
          <div class="bar">
        <div class="icon b_c" id='get_11'>
            <svg class="home" xmlns="http://www.w3.org/2000/svg" viewBox="0 -20 512 512">
                <path class="roof" d="M506.555 208.064L263.859 30.367a13.3 13.3 0 00-15.716 0L5.445 208.064c-5.928 4.341-7.216 12.665-2.875 18.593s12.666 7.214 18.593 2.875L256 57.588l234.837 171.943a13.236 13.236 0 007.848 2.57c4.096 0 8.138-1.885 10.744-5.445 4.342-5.927 3.054-14.251-2.874-18.592z" />
                <path d="M442.246 232.543c-7.346 0-13.303 5.956-13.303 13.303v211.749H322.521V342.009c0-36.68-29.842-66.52-66.52-66.52s-66.52 29.842-66.52 66.52v115.587H83.058V245.847c0-7.347-5.957-13.303-13.303-13.303s-13.303 5.956-13.303 13.303V470.9c0 7.347 5.957 13.303 13.303 13.303h133.029c6.996 0 12.721-5.405 13.251-12.267.032-.311.052-.651.052-1.036V342.01c0-22.009 17.905-39.914 39.914-39.914s39.914 17.906 39.914 39.914V470.9c0 .383.02.717.052 1.024.524 6.867 6.251 12.279 13.251 12.279h133.029c7.347 0 13.303-5.956 13.303-13.303V245.847c-.001-7.348-5.957-13.304-13.304-13.304z" />
            </svg>
        </div>
        <div class="icon b_i" id='get_31'>
        <img src="assets/media/6391520041543238940.svg" alt="">
        </div>
        <div class="icon button alpha">
        <i class="uil uil-circle"></i>
        </div>
        <div class="icon b_e" id='messages_2'>
        <img src="assets/media/13877055191561029724.svg" alt="">
        </div>
        <div class="icon b_o" id='get_21'>
        <img src="assets/media/9759849541543238891.svg" alt="">
        </div>
    </div>
            <div class='note_5 ghost'>
                 Hello
            </div>
            <div class='confirm bounce-in-right'>
                 <div class="yes">Confirm</div>
            </div>
            <div class='confirm_2 bounce-in-right'>
                 <div class="pp">Profile</div>
                 <div class="spot">Spotlight</div>
            </div>
            <div class='pop_bg ghost'>
                  <div class="pop">
                    <div class='pop_cont'>
    
                    </div>
                    <div class="bottom_thing_2"><i class="uil uil-x"></i></div>
                  </div>
            </div>
          <div class="lineloader"></div>
            <div class="left" style='position:absolute'>
            <div style='z-index:99999' id="toasts"></div>
                 <div class='text_1'>
                    Entangled
                 </div>
                <div class="other_container_user_data">
                <nav class="amazing-tabs">
  <!-- <div class="filters-container">
    <div class="filters-wrapper">
      <ul class="filter-tabs">
        <li>
          <button class="filter-button filter-active" data-translate-value="0">
            New
          </button>
        </li>
        <li>
          <button class="filter-button" data-translate-value="100%">
            Popular
          </button>
        </li>
        <li>
          <button class="filter-button" data-translate-value="200%">
            Following
          </button>
        </li>
      </ul>
      <div class="filter-slider" aria-hidden="true">
        <div class="filter-slider-rect">&nbsp;</div>
      </div>
    </div>
  </div> -->
  <div class="main-tabs-container">
    <div class="main-tabs-wrapper" style='display:flex;align-items:center;'>
      <ul class="main-tabs" style=''>
        <li>
          <button class="round-button grudge active" id='get_1' style="--round-button-active-color: #2962ff" data-translate-value="0" data-color="red">
            <span class="avatar">
              <img class='m_x' src="user_media/<?php echo  $profile_pic ?>" alt="user avatar" />
            </span>
          </button>
        </li>
        <li class='n_o'>
          <button class="round-button" id='get_2' style="--round-button-active-color: #2962ff" data-translate-value="100%" data-color="blue">
         <img src="assets/media/9759849541543238891.svg" alt="">
          </button>
        </li>
        <li class='n_o'>
          <button class="round-button" id='get_3' style="--round-button-active-color: #00c853" data-translate-value="200%" data-color="green">
        <img src="assets/media/6391520041543238940.svg" alt="">
          </button>
        </li>
        <li class='n_o'>
          <button class="round-button" id='messages' style="--round-button-active-color: #aa00ff" data-translate-value="300%" data-color="purple">
          <img src="assets/media/13877055191561029724.svg" alt="">
          </button>
        </li>
      </ul>
      <div class="main-slider" aria-hidden="true">
        <div class="main-slider-circle">&nbsp;</div>
      </div>
    </div>
  </div>
</nav>
<div class='g_holder'>
   </div>
           </div>
            </div>
            <div class="right">
         
            <div class="right-top_bar">
                <div class='settings_icon'>
                <i class="uil uil-setting"></i>
                </div>
           
         
<span class="pulse"></span>
             
             <div class="search_holder">
             <input class="search" placeholder=" &nbsp;    Discover people" type="text">
             <div class="icon_holder"><i class="uil uil-search"></i> </div>
             </div>
             <div class="notifications"><i class="uil uil-bell"></i></div>
             </div>
             <div class='other_cont'>   
               
             <div class="ui-layout">
  <div class="ui-layout__sections">
    <div class="ui-layout__section ui-layout__section--primary">
      <div class="ui-layout__item">
        <!-- *** YO *** -->
        <!-- start rendering 'admin/reports/summary_cards/report_summary' with locals '[:section]'-->
        <!-- start ui_card -->
        <section class="ui-card reports-index-card"> 
          <!-- SKELETON LOADING -->
          <div class="loading-wrapper">
            <div class="title-block">
              <div class="loading title"></div>
              <div class="loading content"></div>
              <div class="loading content last-row"></div>
            </div>
            <div class="list-block">
              <div class='loading content line-item'></div>
              <div class='loading content line-item-last'></div>
            </div>
          </div>
          <!-- END OF SKELETON LOADING -->
        </section>
        <!-- finish rendering ui_card -->
      </div>
      
      
      
      <div class="ui-layout__item">
        <!-- *** YO *** -->
        <!-- start rendering 'admin/reports/summary_cards/report_summary' with locals '[:section]'-->
        <!-- start ui_card -->
        <section class="ui-card reports-index-card">
          <!-- SKELETON LOADING -->
          <div class="loading-wrapper">
            <div class="title-block">
              <div class="loading title"></div>
              <div class="loading content"></div>
              <div class="loading content last-row"></div>
            </div>
            <div class="list-block">
              <div class='loading content line-item'></div>
              <div class='loading content line-item-last'></div>
            </div>
          </div>
          <!-- END OF SKELETON LOADING -->
        </section>
        <!-- finish rendering ui_card -->
      </div>
      
      <div class="ui-layout__item">
        <!-- *** YO *** -->
        <!-- start rendering 'admin/reports/summary_cards/report_summary' with locals '[:section]'-->
        <!-- start ui_card -->
        <section class="ui-card reports-index-card"> 
          <!-- SKELETON LOADING -->
          <div class="loading-wrapper">
            <div class="title-block">
              <div class="loading title"></div>
              <div class="loading content"></div>
              <div class="loading content last-row"></div>
            </div>
            <div class="list-block">
              <div class='loading content line-item'></div>
              <div class='loading content line-item'></div>
              <div class='loading content line-item-last'></div>
            </div>
          </div>
          <!-- END OF SKELETON LOADING -->
        </section>
        <!-- finish rendering ui_card -->
      </div>
      
    </div>
  </div>
</div>

             </div>
            </div>
           </div>
</body>
<script src="assets/js/toast.js"></script>
<script>
  $(".alpha").click(function(){
    $('.right').toggle();
    $(".right").toggleClass('active2');
    return false;
  })
  $(".bottom_thing").click(function(){
        $('.right').toggle();
    $(".right").toggleClass('active2');
    return false;
   })

</script>
<script>
  $("#messages").click(function(){
    $(".sidepart").removeClass("noner");
            $("#data_change_232").text("Messages");
            $("#get_data_3432").load("rentam_logue.php");
        })
  $("#messages_2").click(function(){
    $(".sidepart").removeClass("noner");
            $("#data_change_232").text("Messages");
            $("#get_data_3432").load("rentam_logue.php");
        })
$(".message").click(function(){
           $("#data_change_232").text("Messages");
        var person = $(this).attr("id");
        var firstname = $(this).attr("fname");
        var lastname = $(this).attr("lname");
        var username = $(this).attr("username");
        var pp = $(this).attr("pp");
            $.ajax({
            url: "properties.php",
            method: "post",
            async: false,
            data: {
            chat_spectrum: person,
            pp:pp,
            username:username
            },success:function(){
                run_seq_1();
                  $("#get_data_3432").load("chat_spectrum.php", function(){
                     $(".names").text(firstname+ " " +lastname);
                     $(".username").text("@"+username);
                     $(".pp_ img").attr("src", "user_pp_media/"+pp)
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
  $("#sidepart_terminate").click(function () {
        $(".sidepart").addClass("noner");
  })

   var wrapper = document.getElementsByClassName('pop_bg')[0];
    wrapper.addEventListener('click', function (event) {
    const self = event.target.closest('.pop');
    if (!self) {
        wrapper.classList.add('ghost')
    }
})
var hum = function(){
    $(".right").removeClass('active2');
    $(".right").css("display","none");
}
$(".bottom_thing_2").click(function(){
  $(".pop_bg").addClass("ghost");
})

$(".settings_icon").click(function(){
  $(".pop_bg").removeClass("ghost"); 
  $(".pop_cont").load("settings.php");  
})
$(".notifications").click(function(){
  $(".pop_bg").removeClass("ghost"); 
  $(".pop_cont").load("notifications.php");  
})

$(document).ready(function(){
  $("#get_1").click();
})

setTimeout(() => {
  $(".other_cont").load("spotlight.php");
}, 1000);
  $("#get_1").click(function(){
    
     show_pre();
     setTimeout(() => {
      $(".g_holder").load("first_item.php");
      hide_pre();
     }, 500);
})
  $("#get_11").click(function(){
     show_pre();
     setTimeout(() => {
      $(".g_holder").load("first_item.php");
      hide_pre();
     }, 500);
     hum();
})

  $("#get_2").click(function(){
     show_pre();
     setTimeout(() => {
      $(".g_holder").load("second_item.php");
      hide_pre();
     }, 500);
  })
  $("#get_21").click(function(){
     show_pre();
     setTimeout(() => {
      $(".g_holder").load("second_item.php");
      hide_pre();
     }, 500);
     hum();
  })
  $("#get_3").click(function(){
     show_pre();
     setTimeout(() => {
      $(".g_holder").load("user_account.php");
      hide_pre();
     }, 500);
  })
  $("#get_31").click(function(){
     show_pre();
     setTimeout(() => {
      $(".g_holder").load("user_account.php");
      hide_pre();
     }, 500);
     hum();
  })
</script>
<script>
    // resources in description
const mainTabs = document.querySelector(".main-tabs");
const mainSliderCircle = document.querySelector(".main-slider-circle");
const roundButtons = document.querySelectorAll(".round-button");

const colors = {
  blue: {
    50: {
      value: "#e3f2fd"
    },
    100: {
      value: "#bbdefb"
    }
  },
  green: {
    50: {
      value: "#e8f5e9"
    },
    100: {
      value: "#c8e6c9"
    }
  },
  purple: {
    50: {
      value: "#f3e5f5"
    },
    100: {
      value: "#e1bee7"
    }
  },
  orange: {
    50: {
      value: "#ffe0b2"
    },
    100: {
      value: "#ffe0b2"
    }
  },
  red: {
    50: {
      value: "#ffebee"
    },
    100: {
      value: "#ffcdd2"
    }
  }
};

const getColor = (color, variant) => {
  return colors[color][variant].value;
};

const handleActiveTab = (tabs, event, className) => {
  tabs.forEach((tab) => {
    tab.classList.remove(className);
  });

  if (!event.target.classList.contains(className)) {
    event.target.classList.add(className);
  }
};
const root = document.documentElement;
$(".b_i").click(function(){
  root.style.setProperty("--main-slider-color", "#e8f5e9");
    root.style.setProperty("--background-color", "#c8e6c9");
})
$(".b_c").click(function(){
  root.style.setProperty("--main-slider-color", "#ffebee");
    root.style.setProperty("--background-color", "#ffcdd2");
})
$(".b_o").click(function(){
  root.style.setProperty("--main-slider-color", "#e3f2fd");
    root.style.setProperty("--background-color", "#bbdefb");
})
mainTabs.addEventListener("click", (event) => {
  const targetColor = event.target.dataset.color;
  const targetTranslateValue = event.target.dataset.translateValue;

  if (event.target.classList.contains("round-button")) {
    mainSliderCircle.classList.remove("animate-jello");
    void mainSliderCircle.offsetWidth;
    mainSliderCircle.classList.add("animate-jello");

    root.style.setProperty("--translate-main-slider", targetTranslateValue);
    root.style.setProperty("--main-slider-color", getColor(targetColor, 50));
    root.style.setProperty("--background-color", getColor(targetColor, 100));

    handleActiveTab(roundButtons, event, "active");

    if (!event.target.classList.contains("grudge")) {
      root.style.setProperty("--filters-container-height", "0");
      root.style.setProperty("--filters-wrapper-opacity", "0");
    } else {
      root.style.setProperty("--filters-container-height", "3.8rem");
      root.style.setProperty("--filters-wrapper-opacity", "1");
    }
  }
});

const filterTabs = document.querySelector(".filter-tabs");
const filterButtons = document.querySelectorAll(".filter-button");

filterTabs.addEventListener("click", (event) => {
  const root = document.documentElement;
  const targetTranslateValue = event.target.dataset.translateValue;

  if (event.target.classList.contains("filter-button")) {
    root.style.setProperty("--translate-filters-slider", targetTranslateValue);
    handleActiveTab(filterButtons, event, "filter-active");
  }
});

</script>
<script>    

let lineloader;

lineloader = document.querySelector(".lineloader");

show_pre = () => {
    lineloader.style.display = "block";
   }
  hide_pre = () => {
    setTimeout(() => {
      lineloader.style.display = "none";
    }, 2000);
  }

</script>
</html>