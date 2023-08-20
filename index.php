<?php
 session_start();
include 'db.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
      if(isset($_GET['view'])){
       
    
        echo "<title>".$_GET['view']."</title>";
      }
      else{
        if(isset($_SESSION['user_id'])){
        echo "<title>Packageslipfrom </title>";
        }
        else{
          echo "<title>Login </title>";
        }
      } ?> 
 
  <link rel="icon" type="image/x-icon" href="assets/img/titallogo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css">
  <style>
    input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Works for Firefox */
      input[type="number"] {
        -moz-appearance: textfield;
      }
    body {
      position: relative;
      overflow-x: hidden;
      <?php 
         if($_GET['view'] == "login"){

         
      ?>
      background-image: url('assets/img/background.png');
      <?php } ?>
      /* background-color: #cfd8dc !important; */
    }

    body,
    html {
      height: 100%;
    }

    .nav .open>a,
    .nav .open>a:hover,
    .nav .open>a:focus {
      background-color: transparent;
    }

    /*-------------------------------*/
    /*           Wrappers            */
    /*-------------------------------*/
    fieldset {
      border-width: 2px;
      border-style: groove;
      border-color: rgb(192, 192, 192);
      border-image: initial;
    }

    legend {
      width: auto;
    }

    fieldset {
      background-color: #eeeeee;
      margin-bottom: 10px;
      padding: 10px;

    }

    legend {
      background-color: gray;
      color: white;
      padding: 2px 5px;
    }

    #wrapper {
      padding-left: 0;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
    }

    #wrapper.toggled {
      padding-left: 220px;
    }

    #sidebar-wrapper {
      z-index: 1000;
      left: 220px;
      width: 0;
      height: 100%;
      margin-left: -220px;
      overflow-y: auto;
      overflow-x: hidden;
      background: #1a1a1a;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
    }

    #sidebar-wrapper::-webkit-scrollbar {
      display: none;
    }

    #wrapper.toggled #sidebar-wrapper {
      width: 220px;
    }

    #page-content-wrapper {
      width: 100%;
      padding-top: 70px;
    }

    #wrapper.toggled #page-content-wrapper {
      position: absolute;
      margin-right: -220px;
    }

    /*-------------------------------*/
    /*     Sidebar nav styles        */
    /*-------------------------------*/
    .navbar {
      padding: 0;
    }

    .sidebar-nav {
      position: absolute;
      top: 0;
      width: 220px;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .sidebar-nav li {
      position: relative;
      line-height: 20px;
      display: inline-block;
      width: 100%;
    }

    .sidebar-nav li:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
      height: 100%;
      width: 3px;
      background-color: #1c1c1c;
      -webkit-transition: width 0.2s ease-in;
      -moz-transition: width 0.2s ease-in;
      -ms-transition: width 0.2s ease-in;
      transition: width 0.2s ease-in;
    }

    .sidebar-nav li:hover {
      background: skyblue !important;
      border-radius: 10px;
      margin-left: 10px;
      margin-right: 10px;
    }

    .sidebar-nav li:hover:before,
    .sidebar-nav li.open:hover:before {
      width: 100%;
      -webkit-transition: width 0.2s ease-in;
      -moz-transition: width 0.2s ease-in;
      -ms-transition: width 0.2s ease-in;
      transition: width 0.2s ease-in;
    }

    .sidebar-nav li a {
      display: block;
      color: #ddd;
      text-decoration: none;
      padding: 10px 15px 10px 30px;
    }

    .sidebar-nav li a:hover,
    .sidebar-nav li a:active,
    .sidebar-nav li a:focus,
    .sidebar-nav li.open a:hover,
    .sidebar-nav li.open a:active,
    .sidebar-nav li.open a:focus {
      color: #fff;
      text-decoration: none;
      background-color: transparent;
    }

    .sidebar-header {
      text-align: center;
      font-size: 20px;
      position: relative;
      width: 100%;
      display: inline-block;
    }

    .sidebar-brand {
      height: 65px;
      position: relative;
      background: #212531;
      background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
      padding-top: 1em;
    }

    .sidebar-brand a {
      color: #ddd;
    }

    .sidebar-brand a:hover {
      color: #fff;
      text-decoration: none;
    }

    .dropdown-header {
      text-align: center;
      font-size: 1em;
      color: #ddd;
      background: #212531;
      background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
    }

    .sidebar-nav .dropdown-menu {
      position: relative;
      width: 100%;
      padding: 0;
      margin: 0;
      border-radius: 0;
      border: none;
      background-color: #222;
      box-shadow: none;
    }

    .dropdown-menu.show {
      top: 0;
    }

    /*Fontawesome icons*/
    .nav.sidebar-nav li a::before {
      font-family: fontawesome;
      content: "\f12e";
      vertical-align: baseline;
      display: inline-block;
      padding-right: 5px;
    }

    a[href*="#home"]::before {
      content: "\f015" !important;
    }

    a[href*="#about"]::before {
      content: "\f129" !important;
    }

    a[href*="#events"]::before {
      content: "\f073" !important;
    }

    a[href*="#events"]::before {
      content: "\f073" !important;
    }

    a[href*="#team"]::before {
      content: "\f0c0" !important;
    }

    a[href*="#works"]::before {
      content: "\f0b1" !important;
    }

    a[href*="#pictures"]::before {
      content: "\f03e" !important;
    }

    a[href*="#videos"]::before {
      content: "\f03d" !important;
    }

    a[href*="#books"]::before {
      content: "\f02d" !important;
    }

    a[href*="#art"]::before {
      content: "\f1fc" !important;
    }

    a[href*="#awards"]::before {
      content: "\f02e" !important;
    }

    a[href*="#services"]::before {
      content: "\f013" !important;
    }

    a[href*="#contact"]::before {
      content: "\f086" !important;
    }

    a[href*="#followme"]::before {
      content: "\f099" !important;
      color: #0084b4;
    }

    /*-------------------------------*/
    /*       Hamburger-Cross         */
    /*-------------------------------*/

    .hamburger {
      position: fixed;
      top: 20px;
      z-index: 999;
      display: block;
      width: 32px;
      height: 32px;
      margin-left: 15px;
      background: transparent;
      border: none;
    }

    .hamburger:hover,
    .hamburger:focus,
    .hamburger:active {
      outline: none;
    }

    .hamburger.is-closed:before {
      content: "";
      display: block;
      width: 100px;
      font-size: 14px;
      color: #fff;
      line-height: 32px;
      text-align: center;
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
      -webkit-transition: all 0.35s ease-in-out;
    }

    .hamburger.is-closed:hover:before {
      opacity: 1;
      display: block;
      -webkit-transform: translate3d(-100px, 0, 0);
      -webkit-transition: all 0.35s ease-in-out;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom,
    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
      position: absolute;
      left: 0;
      height: 4px;
      width: 100%;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom {
      background-color: #1a1a1a;
    }

    .hamburger.is-closed .hamb-top {
      top: 5px;
      -webkit-transition: all 0.35s ease-in-out;
    }

    .hamburger.is-closed .hamb-middle {
      top: 50%;
      margin-top: -2px;
    }

    .hamburger.is-closed .hamb-bottom {
      bottom: 5px;
      -webkit-transition: all 0.35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-top {
      top: 0;
      -webkit-transition: all 0.35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-bottom {
      bottom: 0;
      -webkit-transition: all 0.35s ease-in-out;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
      background-color: #1a1a1a;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-bottom {
      top: 50%;
      margin-top: -2px;
    }

    .hamburger.is-open .hamb-top {
      -webkit-transform: rotate(45deg);
      -webkit-transition: -webkit-transform 0.2s cubic-bezier(0.73, 1, 0.28, 0.08);
    }

    .hamburger.is-open .hamb-middle {
      display: none;
    }

    .hamburger.is-open .hamb-bottom {
      -webkit-transform: rotate(-45deg);
      -webkit-transition: -webkit-transform 0.2s cubic-bezier(0.73, 1, 0.28, 0.08);
    }

    .hamburger.is-open:before {
      content: "";
      display: block;
      width: 100px;
      font-size: 14px;
      color: #fff;
      line-height: 32px;
      text-align: center;
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
      -webkit-transition: all 0.35s ease-in-out;
    }

    .hamburger.is-open:hover:before {
      opacity: 1;
      display: block;
      -webkit-transform: translate3d(-100px, 0, 0);
      -webkit-transition: all 0.35s ease-in-out;
    }

    /*-------------------------------*/
    /*            Overlay            */
    /*-------------------------------*/
  </style>
</head>

<body>
  <div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
 <?php     if(isset( $_SESSION['user_id']))
           include 'sidebar.php'; 
           
           ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <?php     if(isset( $_SESSION['user_id'])){
          ?>
      <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
      </button>
      <?php } ?>
      <!-- <div class="container">
        <div class="row"> -->
      <?php
      if(isset($_GET['view'])){
        if(isset( $_SESSION['user_id'])){
      include $_GET['view'].'.php';
        }
        else{
          include 'login.php';
        }
      }
      else{
        if(isset($_SESSION['user_id'])){
        include 'Packageslipfrom.php';
        }
        else{
          include 'login.php';
        }
      } ?> 
      <!-- </div>
      </div> -->
    </div>
    <!-- /#page-content-wrapper -->

  </div>


  <!-- /#wrapper -->
  <!-- /#wrapper -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>


  <script>
    $(document).ready(function() {
     var i =2;

     $("#removeproduct").click(function() {
        //  console.log(i-1);
        $(".profieldset"+(i-1)).remove();
        i--;
    });
      $("#addproductbtn").click(function() {
        $("#addinvoce").val(i);

    $("#addboxdiv").append('<fieldset class="profieldset'+i+'">   <legend>  product' + i + '</legend> <div class="form-row"> <div class="form-group col-md-6"> <label for="inputAddress2">Part No </label> <input type="text" class="form-control" id="addpacking" name="part_gid' +  i + '" placeholder="Part No."> </div> <div class="form-group col-md-6"> <label for="inputCity">Description of Goods </label> <input type="text" class="form-control" id="inputCity" name="part_description' + i + '" placeholder="Description of Goods">  </div>   <div class="form-group  col-md-6"><label for="inputZip">QUANTITY NOS</label><input type="text" class="form-control" id="inputZip" name="part_quantity' + i + '" placeholder="QUANTITY NOS"></div>  <div class="form-group  col-md-6"><label for="inputZip">Net Weight</label><input type="text" class="form-control" id="inputZip"name="part_netweight'  +i + '" placeholder="Net Weight"> </div>  <div class="form-group  col-md-6"><label for="part_hsn' + i + '">Hsn</label><input type="text" class="form-control" id="part_hsn'  +i + '" name="part_hsn'+ i + '" placeholder="Hsn"> </div></div> ');
  i++;    
  });



      var count = <?php echo isset($i)? $i-1 : 0; ?>;
      var pro = count;
      $("#numpart1").change(function() {
        var value = $("#numpart1").val();
        console.log("The value is=" + value);
        $(".addproduct1").empty();
        for (var i = 1; i <= value; i++) {
          $(".addproduct1").append('<fieldset>   <legend>  product ' + i + '</legend> <div class="form-row"> <div class="form-group col-md-6"> <label for="part_gid1' + i + '">Gid Part </label> <input type="number" class="form-control" id="part_gid1' + i + '" name="part_gid1' + i + '" placeholder="Gid Part"> </div> <div class="form-group col-md-6"> <label for="part_description1' + i + '">Description of Goods </label> <input type="text" class="form-control" id="part_description1' + i + '" name="part_description1' + i + '" placeholder="Description of Goods" >  </div>   <div class="form-group  col-md-6"><label for="part_quantity1' + i + '">QUANTITY NOS</label><input type="number" class="form-control" id="part_quantity11" name="part_quantity1' + i + '" placeholder="QUANTITY NOS"></div>  <div class="form-group  col-md-6"><label for="part_netweight1' + i + '">Net Weight</label><input type="number" class="form-control" id="part_netweight1' + i + '" name="part_netweight1' + i + '" placeholder="Net Weight"> </div>  <div class="form-group  col-md-6"><label for="part_hsn' + i + '">Hsn</label><input type="text" class="form-control" id="part_hsn1' + i + '" name="part_hsn1' + i + '" placeholder="Hsn"> </div></div> ');
        }
      });
      count++;

    

      $("#addbox").click(function() {

        $("#addboxdiv").append('<fieldset class="fildset'+count+'"> <legend>' + count + ' BOXES</legend> <div class="form-row"> <div class="form-group  col-md-6"> <label for="inputZip">DiMENTION OF BOXES</label> <input type="text" class="form-control" name="box_dimention' + count + '" id="inputZip"   placeholder="Place of Receipt of Pre-Carrier"> </div> <div class="form-group  col-md-6"> <label for="numpart">Number of parts</label> <input type="number" class="form-control" class="box_parts_count' + count + '" name="box_parts_count' + count + '" id="numpart' + count + '" placeholder="Number of parts"><input type="hidden" class="form-control" name="box_count" value="test"> </div> <div class="form-group  col-md-6"><label for="box_grossweight' + count + '">Gross Weight</label><input type="text" class="form-control" id="box_grossweight' + count + '" name="box_grossweight' + count + '" placeholder="Gross Weight"></div></div> <div class="addproduct' + count + ' "> </div></fieldset> ');
        var used = count;
        $("#numpart" + used).change(function() {
          var value = $('#numpart' + used).val();
          console.log("The value is=" + value);
          $(".addproduct" + used).empty();
          // console.log(used);
          for (var i = 1; i <= value; i++) {
            $(".addproduct" + used).append('<fieldset>   <legend>  product' + i + '</legend> <div class="form-row"> <div class="form-group col-md-6"> <label for="inputAddress2">Part No. </label> <input type="text" class="form-control" id="addpacking" name="part_gid' + used + i + '" placeholder="Part No"> </div> <div class="form-group col-md-6"> <label for="inputCity">Description of Goods </label> <input type="text" class="form-control" id="inputCity" name="part_description' + used + i + '" placeholder="Description of Goods">  </div>   <div class="form-group  col-md-6"><label for="inputZip">QUANTITY NOS</label><input type="number" class="form-control" id="inputZip" name="part_quantity' + used + i + '" placeholder="QUANTITY NOS"></div>  <div class="form-group  col-md-6"><label for="inputZip">Net Weight</label><input type="number" class="form-control" id="inputZip"name="part_netweight' + used + i + '" placeholder="Net Weight"> </div>  <div class="form-group  col-md-6"><label for="part_hsn' + i + '">Hsn</label><input type="text" class="form-control" id="part_hsn' +used + i + '" name="part_hsn' + used + i + '" placeholder="Hsn"> </div></div> ')
          }
        });
        count++;
      });
      $("#removebox").click(function() {
        if(count>=1){
        console.log(count);
        $(".fildset"+(count-1)).remove();
        count--;
        }
    });
    });
  </script>
  <script>
    $(document).ready(function() {
      var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

      trigger.click(function() {
        hamburger_cross();
      });

      function hamburger_cross() {

        if (isClosed == true) {
          overlay.hide();
          trigger.removeClass('is-open');
          trigger.addClass('is-closed');
          isClosed = false;
        } else {
          overlay.show();
          trigger.removeClass('is-closed');
          trigger.addClass('is-open');
          isClosed = true;
        }
      }

      $('[data-toggle="offcanvas"]').click(function() {
        $('#wrapper').toggleClass('toggled');
      });
    });
  </script>
</body>

</html>