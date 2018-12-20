<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
   <div class="container">

     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<?php
// SQl use  starts here
$servername = "localhost";
$username = "root";
$password = "";
$db="e-com";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// printing <select> from maincategory table
$sql = "SELECT * from  subcategory ";
$Result=$conn->query($sql);


echo "<div class='category'>
    <h3 class='.col-md-4 .col-sm-4'>Footware</h3>
    <ul  class='.col-md-4 .col-sm-4'>
      <li>
        <input class='womensck' type='checkbox' value='1' onchange='wochange()'/>
        <span class='span' >Women's Footware</span>
      </li>
      <li>
        <input class='mensck' type='checkbox'  value='1' onchange='menchange()'/>
        <span class='span' >Men's Footware</span>
      </li>
      <li>
        <input class='kidsck' type='checkbox'  value='1' onchange='kidchange()'/>
        <span class='span' >Kid's Footware</span>
      </li>
    </ul>
</div>";


if ($Result->num_rows > 0) {
   while($row = $Result->fetch_assoc()) {
     $name = $row['SubCategoryName'];
     $mainid = $row['MainCategory'];
     $mainname = "";
     if($mainid == 1){

      echo "<div class='womensfoot' style='display:none '><select name='subcat'>";
       echo "<option value='$id'>".$name."</option>";
     }else if($mainid == 2){
        $mainname = "Mens ";
     }else{
         $mainname = "Kids ";
     }
     $id =$row['SubCatID'];
  //   echo "<option value='$id'>".$mainname.$name."</option>";
   }
     echo "</select></div>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<script>function wochange(){
  if($('.womensck').is(':checked')){
    $('.womensfoot').show();

  }
  else {
      $('.womensfoot').hide();

  }
}</script>";
$conn->close();

 ?>
 <div class="form-group">
   <label for="t1">Item Name:</label><input type="text" class="form-control" value=""  name="t1" id="t1">
 </div>
 <div class="form-group">
   <label for="t2">Item Description :</label><input type="text" class="form-control" value=""  name="t2" id="t2">
 </div>
 <div class="form-group">
   <label for="t3"> Item Price :</label><input type="text" class="form-control" value=""  name="t3" id="t3">
 </div>
 
  <label for="fileToUpload">Upload Image : </label><input type="file" class="form-control" name="fileToUpload" id="fileToUpload"><br>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
 </div>

 </body>
 </html>
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $subcatname=test_input($_POST['subcat']);
     $itemName=test_input($_POST['t1']);
     $itemDesc=test_input($_POST['t2']);
     $itemPrice=test_input($_POST['t3']);


     // SQl use  starts here
     $servername = "localhost";
     $username = "root";
     $password = "";
     $db="e-com";
     // Create connection
     $conn = new mysqli($servername, $username, $password,$db);

     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $target_dir = "uploads/";
     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     // Check if image file is a actual image or fake imagE
     //if(isset($_POST["submit"]) && isset($_FILES['file'])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         if($check !== false) {
             echo "File is an image - " . $check["mime"] . ".";
             $uploadOk = 1;
         } else {
             echo "File is not an image.";
             $uploadOk = 0;
         }
     //}
     // Check if file already exists
     if (file_exists($target_file)) {
         echo "Sorry, file already exists.";
         $uploadOk = 0;
     }
     // Check file size
     if ($_FILES["fileToUpload"]["size"] > 100000000000) {
         echo "Sorry, your file is too large.";
         $uploadOk = 0;
     }
     // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
     }
     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
         echo "Sorry, your file was not uploaded.";
     // if everything is ok, try to upload file
     } else {
         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
             echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
     }

     $image=$_FILES["fileToUpload"]["name"];


     // inserting
     $insert = "INSERT INTO item (`ItemName`, `ItemDescription`, `ItemPrice`, `ItemImage`, `SubCategoryName`) VALUES ('$itemName','$itemDesc','$itemPrice','$image','$subcatname')";
     if( $conn->query($insert)===TRUE){
         echo "<script>alert('Successfully added to database');</script>";
     } else{
         echo "Error: " . $insert . "<br>" . $conn->error;
     }
     $conn->close();
 }
 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
 ?>
