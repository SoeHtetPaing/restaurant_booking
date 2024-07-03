<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Booking</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=PT+Sans+Narrow:wght@400;700&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Italianno&family=Reenie+Beanie&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./asset/css/style.css">
    
    <style>
        .nav-pills.nav-fill > li.nav-item > a.active,
        .nav-pills.nav-fill > li.nav-item > a:hover,
        .nav-pills.nav-fill > li.nav-item > a:focus {
            background-color: rgb(255, 103, 13, 0.7);
            color: #fff;
            border-top-left-radius:10px;
            border-top-right-radius:10px;
        }

        .menu-list {
            background-color: rgb(255, 103, 13, 0.5);
            color: #fff;
        }

        .menu-list:hover {
            background-color: rgb(255, 103, 13, 0.7);
            color: #fff;
        }

        .text-food {
            color: rgb(255, 103, 13, 0.7);
        }

        .round-table{
          height: 200px;
          width: 200px;
          background: antiquewhite;
          border-radius: 50%;
          text-align: center;
        }
        .menu-toggler2{
          position: absolute;
          display: block;
          top: 0;
          bottom: 0;
          right: 0;
          left: 0;
          margin: auto;
          width: 40px;
          height: 40px;
          z-index: 2;
          opacity: 1;
          cursor: pointer;
        }
        .menu-toggler2:hover + label, .menu-toggler2:hover + label:before, .menu-toggler2:hover + label:after{
          background: white;
        }
        .menu-toggler2:checked + label{
          background: transparent;
        }
        .menu-toggler2:checked + label:before, .menu-toggler2:checked + label:after{
          top: 0;
          width: 50px;
          transform-origin: 50% 50%;
        }
        .menu-toggler2:checked + label:before{
          transform: rotate(45deg);
        }
        .menu-toggler2:checked + label:after{
          transform: rotate(-45deg);
        }
        .menu-toggler2:checked  ~ ul .menu-item2{
          opacity: 1;
        }
        .menu-toggler2:checked  ~ ul .menu-item2:nth-child(1){
          transform: rotate(0deg) translateX(-40px);
        }
        .menu-toggler2:checked  ~ ul .menu-item2:nth-child(2){
          transform: rotate(60deg) translateX(-40px);
        }
        .menu-toggler2:checked  ~ ul .menu-item2:nth-child(3){
          transform: rotate(120deg) translateX(-40px);
        }
        .menu-toggler2:checked  ~ ul .menu-item2:nth-child(4){
          transform: rotate(180deg) translateX(-40px);
        }
        .menu-toggler2:checked  ~ ul .menu-item2:nth-child(5){
          transform: rotate(240deg) translateX(-40px);
        }
        .menu-toggler2:checked  ~ ul .menu-item2:nth-child(6){
          transform: rotate(300deg) translateX(-40px);
        }
        .menue-toggler2:checked ~ ul .menu-item2 a{
          pointer-events: auto;
        }
        .menue-toggler2 + label{
          width: 40px;
          height: 5px;
          display: block;
          z-index: 1;
          border-radius: 2.5px;
          background: rgba(255,255,255,0.7);
          transition: transform 0.5s, top 0.5s;
          position: absolute;
          display: block;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          margin: auto;
        }
        .menue-toggler2 + label:before, .menue-toggler2 + label:after{
          width: 40px;
          height: 5px;
          display: block;
          z-index: 1;
          border-radius: 2.5px;
          background: rgba(255,255,255,0.7);
          transition: transform 0.5s, top 0.5s;
          content: "";
          position: absolute;
          left: 0;
        }
        .menue-toggler2 + label:before{
          top: 10px;
        }
        .menue-toggler2 + label:after{
          top: -10px;
        }
        .menu-item2:nth-child(1) a {
          transform: rotate(0deg);
        }
        .menu-item2:nth-child(2) a {
          transform: rotate(-60deg);
        }
        .menu-item2:nth-child(3) a {
          transform: rotate(-120deg);
        }
        .menu-item2:nth-child(4) a {
          transform: rotate(-180deg);
        }
        .menu-item2:nth-child(5) a {
          transform: rotate(-240deg);
        }
        .menu-item2:nth-child(6) a {
          transform: rotate(-300deg);
        }
        .menu-item2{
          position: absolute;
          display: block;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          margin: auto;
          width: 80px;
          height: 80px;
          opacity: 0;
          transition: 0.5s;
        }
        .menu-item2 input[type="checkbox"]{
          height: 20px;
          width: 20px;
        }
        .menu-item2 a{
          display: block;
          width: inherit;
          height: inherit;
          line-height: 80px;
          color: rgba(255,255,255,0.7);
          background: rgb(211, 153, 16);
          border-radius: 50%;
          text-align: center;
          text-decoration: none;
          font-size: 40px;
          pointer-events: none;
          transition: 0.2s;
        }
        .menu-item2 a:hover{
          box-shadow: 0 0 0 2px rgba(255,255,255,0.3);
          color: white;
          background: rgba(255,255,255,0.3);
          font-size: 44.44444px;
        
        }
    </style>
</head>
<body>
<div class="header-gallery">
    <div class="container py-5">
        <nav class="d-flex justify-content-between" style="position: sticky; top: 50px; z-index: 100;">
            <div class="">
                <h5>Restaurant Booking</h5>
            </div>
            <div class="">
                <ul style="list-style-type: none;" class="">
                    <li class="mx-2"><a class="navbar-item active-link" href="index.php">HOME</a></li>
                    <?php if(!isset($_SESSION['isLoggedIn'])){ ?>
                        <li class="link mx-2"><a class="navbar-item" href="./register.php">REGISTER</a></li>
                        <li class="link mx-2"><a class="navbar-item" href="./login.php">LOGIN</a></li>
	                <?php }elseif (isset($_SESSION['isLoggedIn'])) { ?>
	                <li class="mx-2"><a class="navbar-profile" href="./logout.php"><?php echo $_SESSION['name']; ?>(Logout)</a></li>
	                <?php } ?>    
                </ul>
            </div>
        </nav>