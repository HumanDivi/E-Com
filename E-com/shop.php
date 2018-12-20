<!-- make categories using select*   -->
<?php
include("config.php") ;
 ?>
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
  </head>
  <style media="screen">
    span{
        color: #181c27;
        margin-bottom: 20px;
        font-size: 1.1em;
        font-weight: 600;
    }

    .slidecontainer {
        width: 25%;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height:5px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: black;
        cursor: pointer;
    }
    ul{
      list-style-type: none
    }
    li {
      padding-left: 2em;
      text-indent: -3.5em;
    }
    </style>
    <body>
  <div class="container-fluid">
    <h3 >Price Range</h3>
    <div class="slidecontainer .col-md-4 .col-sm-4">
      <input type="range" min="1" max="900" value="450" class="slider" id="myRange">
      <p>Value: <span id="demo"></span></p>
    </div>

<div class="category">
    <h3 class=".col-md-4 .col-sm-4">Footware</h3>
    <ul  class=".col-md-4 .col-sm-4" style="">
      <li>
        <input class="womensck" type="checkbox" value="1" onchange="wochange()"/>
        <span class="span" >Women's Footware</span>
      </li>
      <li>
        <input class="mensck "type="checkbox"  value="1" onchange="menchange()"/>
        <span class="span" >Men's Footware</span>
      </li>
      <li>
        <input class="kidsck " type="checkbox"  value="1" onchange="kidchange()"/>
        <span class="span" >Kid's Footware</span>
      </li>
    </ul>
</div>


<div class="womensfoot"  style="display:block">
  <h3 class=".col-md-4 .col-sm-4">Category</h3>
  <ul  class=".col-md-4 .col-sm-4" style="">
  <li>
  <?php
  include("config.php") ;
$sql = "SELECT * from  subcategory where MainCategory='1' ";
$Result=$conn->query($sql);

echo "<div class='category'> <select class='maincat' name='maincat'>";
echo "<option value=''>Select Main Category</option>";
    if ($Result->num_rows > 0) {
       while($row = $Result->fetch_assoc()) {
         $name = $row['CategoryName'];
         $id =$row['MainCatID'];
         echo "<option value='$id '>$name</option>";
       }
         echo "</select>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  echo  "</select> </div>";

   ?>

<input type="checkbox" class="checked">adsadasdsadsa</input>

          <input type="checkbox" class="checked">
          <span class="span">Casuals</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">Heels</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">Wedding</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">Ethnic</span>
        </li>
      </ul>
  </div>

  <div class="mensfoot" style="display:none">
        <h3 class=".col-md-4 .col-sm-4">Category</h3>
        <ul  class=".col-md-4 .col-sm-4" style="">
          <li>
            <input type="checkbox" class="checked">
            <span class="span">Casuals</span>
          </li>
          <li>
            <input type="checkbox" class="checked">
            <span class="span">Party</span>
          </li>
          <li>
            <input type="checkbox" class="checked">
            <span class="span">Formal</span>
          </li>
          <li>
            <input type="checkbox" class="checked">
            <span class="span">Ethnic</span>
          </li>
          <li>
            <input type="checkbox" class="checked">
            <span class="span">Slippers</span>
          </li>
        </ul>
    </div>
    <div class="kidsfoot" style="display:none">
          <h3 class=".col-md-4 .col-sm-4">Category</h3>
          <ul  class=".col-md-4 .col-sm-4" style="">
            <li>
              <input type="checkbox" class="checked">
              <span class="span">Casuals</span>
            </li>
            <li>
              <input type="checkbox" class="checked">
              <span class="span">Party</span>
            </li>
            <li>
              <input type="checkbox" class="checked">
              <span class="span">Formal</span>
            </li>
            <li>
              <input type="checkbox" class="checked">
              <span class="span">Sandals</span>
            </li>
            <li>
              <input type="checkbox" class="checked">
              <span class="span">Ethnic</span>
            </li>

          </ul>
      </div>
    <!-- // preference -->
    <!-- discounts -->
    <div class="discount" style="display:none">
      <h3  class=".col-md-4 .col-sm-4">Discount</h3>
      <ul  class="" style="">
        <li>
          <input type="checkbox" class="checked">
          <span class="span">5% or More</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">10% or More</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">20% or More</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">30% or More</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">50% or More</span>
        </li>
        <li>
          <input type="checkbox" class="checked">
          <span class="span">60% or More</span>
        </li>
      </ul>
      </div>
    </div>

    <script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }
    </script>
    <script type="text/javascript">

    var women=document.getElementsByClassName("womensck");
    var men  =document.getElementsByClassName("mensck");
    var kid  =document.getElementsByClassName("kidsck");
    if(women == true){
          document.getElementsByClassName("womensfoot").style.display="block";
    }

      function wochange(){
        if($(".womensck").is(":checked")){
          $(".womensfoot").show();
            $(".discount").show();
        }
        else {
            $(".womensfoot").hide();
              $(".discount").hide();
        }
      }
      function menchange(){
        if($(".mensck").is(":checked")){
          $(".mensfoot").show();
            $(".discount").show();

        }
        else {
            $(".mensfoot").hide();
              $(".discount").hide();
        }
      }
      function kidchange(){
        if($(".kidsck").is(":checked")){
          $(".kidsfoot").show();
          $(".discount").show();

        }
        else {
            $(".kidsfoot").hide();
              $(".discount").hide();
        }
      }

    </script>
  </body>
</html>
<?php
// getting all values
$sql = "SELECT * from  item ";
$Result=$conn->query($sql);
if ($Result->num_rows > 0) {
   while($row = $Result->fetch_assoc()) {
     echo "<div class='thumbnail' style='float:left' >";
      echo "<img src ='admin/uploads/$row[ItemImage]' class='img-thumbnail' style='width:200px;height:150px'>";
       echo "<div class='caption'> <p> Desc: ".$row['ItemDescription']." Price: ".$row['ItemPrice']."rs</p></div></div>";
   }
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
