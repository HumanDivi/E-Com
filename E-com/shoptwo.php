<!-- make categories using select*   -->
<?php
$page=0;
if(isset($_GET['page']))
{
  $page=$_GET['page'];
}
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
    .font{
        color: #181c27;
        margin-bottom: 20px;
        font-size: 1.1em;
        font-weight: 600;
    }
    .slidecontainer {
        width: 100%;
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
    .thumbnail{
      padding: 5px;
    }
    ul:not(.pagination){
      list-style-type: none
    }
    li:not(.page-item) {
      padding-left: 2em;
      text-indent: -3.5em;
    }
    </style>
    <body>
  <div class="container-fluid " style="width:20%;position:fixed">
    <div class="row">
      <div class=".col-md-6 .col-sm-4">
        <span class="font">Price Range</span>
        <div class="slidecontainer">
          <input type="range" min="1" max="900" value="450" class="slider" id="myRange">
          <p>Value: <span id="demo"></span></p>
        </div>
      </div>
    </div>
  <div class="row">
    <div class=".col-md-6 .col-sm-4">
      <a href="#demot" class="text-primary" data-toggle="collapse"><span class="font">Footware</span></a>
      <div id="demot" class="collapse">
        <ul  class="" style="">
          <li>
            <input class="maincheck" type="checkbox" value="1" />
            <span class="span" >Women's Footware</span>
          </li>
          <li>
            <input class="maincheck "type="checkbox"  value="2" />
            <span class="span" >Men's Footware</span>
          </li>
          <li>
            <input class="maincheck " type="checkbox"  value="3" />
            <span class="span" >Kid's Footware</span>
          </li>
        </ul>
      </div>
    </div>
  </div>

<div class="row" >
  <div class="subcategory .col-md-6 .col-sm-4" id="subcategory">

  </div>
</div>
</div>
<script>

  $(function(){
   $('.maincheck').is('checked'); //This event will fire the change event.
   $('.maincheck').change(function(){
       var data= $(this).val();
       $('.subcategory')
           .find('h3')
           .remove()
       ;
    //   clearing all <input>

       $('.subcategory')
           .find('input')
        //   .find('label')
           .remove()
           .end()
          .append('<h3 class="font">Category</h3>')
           .val('whatever')
       ;
       $('label[for=subcatname]').remove(); //deleting label
  // $('.maincheck').prop('checked', false); //removing checked mark on checkbox
       var myarray = [];
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             myObj = JSON.parse(this.responseText);
         i=0;
         var ul=document.createElement('ul');
         document.getElementById("subcategory").appendChild(ul);

             for (x in myObj) {
               var li = document.createElement('li');
               var z = document.createElement('input');
               z.type = "checkbox";
               z.className = "subcatname";
               z.id = "subcatname";
               //makinglabel for the checkbox
               var label = document.createElement('label');
               label.htmlFor = "subcatname";
               myarray[i] = myObj[x].SubCategoryName;
               z.setAttribute("value", myarray[i]);
               var t = document.createTextNode(myarray[i]);
              // z.appendChild(t);
               label.appendChild(t);
               li.appendChild(z);
               ul.appendChild(li);
               document.getElementById("subcategory").appendChild(z);
               document.getElementById("subcategory").appendChild(label);
                   i++;
             }

           //  document.write(txt);
            }
        };
   //   document.write(data);
        xmlhttp.open("GET", "AjaxClient/subcategoryselect.php?subcat=" +data , true); // email is a variable and input value is stored in it.Means email=input
        xmlhttp.send();
   });
});

</script>
    <!-- // preference -->
    <!-- discounts -->
    <div class="discount" style="display:none" >
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

<div class="container-fluid" style="float:right;width:80%">
  <div class="row" >
    <div class=".col-md-6 .col-sm-6" id="productimg">
      <?php
      include("config.php") ;
      // getting all values
      $sql = "SELECT * from  item ";
      $Result=$conn->query($sql);
      $count= 1;
      if ($Result->num_rows > 0) {
         while($row = $Result->fetch_assoc()) {
           if($count<=10){
           }
           else if($count>=10 && $count<=20){
           }
           echo "<div class='thumbnail' style='float:left' >";
           echo "<img src ='admin/uploads/$row[ItemImage]' class='img-thumbnail' style='width:200px;height:150px'>";
           echo "<div class='caption'> <p>".$row['ItemName']."<br>Description: ".$row['ItemDescription']."<br> Price: ".$row['ItemPrice']."rs <br><a href='itemdetail.php?itemid=$row[ItemId]'>buy</a></p></div></div>";
   // calling the sae page but with a different id when u click on pagenumber. Here put set and GET_ method to get value
           $count++;
         }

      }
      else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
       ?>
  </div>
</div>
  <div class="row">
    <div class=".col-md-12 .col-sm-12">
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
        <?php
        include("config.php") ;
        // getting all values
        // get initial value of $page. if 0 value then the page has opened for the first posix_time
        // if $page =0 then show 10 images. ifpage=1 then show 10 more
        $sql = "SELECT * from  item ";
        $Result=$conn->query($sql);
        $count= 1;
        if ($Result->num_rows > 0) {

           while($row = $Result->fetch_assoc()) {
             //echo '<li class="page-item "><a class="page-link" href="javascript:void(0);">'.$count.'</a></li>';
            $count++;
           }
           // make pagination by getting data from sql nd print next 10 or waterver number of images on the page
           echo '<li class="page-item "><a class="page-link" href="<a href="shoptwo.php?page=1">1</a></li>';
           echo '<li class="page-item "><a class="page-link" href="javascript:void(0);">2</a></li>';
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
         ?>



        <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
     </ul>
  </div>
 </div>
</div>
    <script>
    // script for price slider
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;
    slider.oninput = function() {
      output.innerHTML = this.value;
    }
    </script>

    <script type="text/javascript">
/*    var maincategory=document.getElementsByClassName("maincheck");
    //var men  =document.getElementsByClassName("mensck");
    //var kid  =document.getElementsByClassName("kidsck");
    //if(maincategory == true){
      //    document.getElementsByClassName("subcategory").style.display="block";
  //  }

      function change(){
        if($(".maincategory").is(":checked")){
          $(".subcategory").show();
            $(".discount").show();
        }
        else {
            $(".womensfoot").hide();
              $(".discount").hide();
        }
      }*/
    </script>

</body>
</html>
