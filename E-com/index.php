<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/menu.css">
  </head>
  <style media="screen">
  .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
  }

  .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
  }

  .sidenav a:hover {
      color: #f1f1f1;
  }

  .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  #search{
    display: none;
  }
  </style>
  <body>
    <!-- //slider
      <a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
      <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
      <a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
      <a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
-->
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
      </div>
      <span style="font-size:20px;cursor:pointer;position:fixed;top:20px;right:0px;" onclick="openNav()">&#9776; open</span>

<div id="main">


        <form id="search" action="index.html" method="post" >
          <input type="text" class="text-light" name="" value="Search" style="border-radius:7px;width:100%;height:35px;background-color:black;opacity:0.5">
        </form>
        <span class="fa fa-search" id="searchIcon" style="font-size:20px;cursor:pointer;position:fixed;top:25px;right:70px;" > search</span>

          <a href="admin/index.php">Admin login</a>
</div>
<!--script for opning navagation menu-->
      <script>
      function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
              document.getElementById("main").style.marginLeft = "250px";
      }

      function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
             document.getElementById("main").style.marginLeft= "0";
      }

      </script>
      <!--script for toggling between form for searching -->
      <script type="text/javascript">
        $("#searchIcon").click(function(){
            $("#search").toggle();
            $(this).toggleClass("fa fa-search fa fa-close");
            $("body").scrollTop(0);
        });
      </script>
  </body>
</html>
