<!-- inserting Item webpage into sql-->
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
$sql = "SELECT * from  maincategory ";
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

$conn->close();
 ?>
 <div class="form-group">
   <select id="Subcategory" name="Subcategory" >

   </select>
 </div>
 <script>

   $(function(){
    $('.maincat').trigger('change'); //This event will fire the change event.
    $('.maincat').change(function(){
        var data= $(this).val();
        // clearing all <option>
        $('#Subcategory')
            .find('option')
            .remove()
            .end()
            .append('<option value="whatever">Select Sub Category</option>')
            .val('whatever')
        ;
        var myarray = [];
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
              myObj = JSON.parse(this.responseText);
              // alert(myObj.SubCategoryName);
              // document.write(myObj.SubCategoryName);
              // code to make a <select>
          i=0;
              for (x in myObj) {
                var z = document.createElement("option");
                myarray[i] = myObj[x].SubCategoryName;
                z.setAttribute("value", myarray[i]);
                var t = document.createTextNode(myarray[i]);
                z.appendChild(t);
                    document.getElementById("Subcategory").appendChild(z);
                    i++;
              }
            //  document.write(txt);
             }
         };
    //   document.write(data);
         xmlhttp.open("GET", "Ajax/select.php?maincat=" +data , true); // email is a variable and input value is stored in it.Means email=input
         xmlhttp.send();
    });
});

 </script>
 <div class="form-group">
   <label for="t1">Item Name:</label><input type="text" class="form-control" value=""  name="t1" id="t1" required>
 </div>
 <div class="form-group">
   <label for="t2">Item Description :</label><input type="text" class="form-control" value=""  name="t2" id="t2" required>
 </div>
 <div class="form-group">
   <label for="t3"> Item Price :</label><input type="text" class="form-control" value=""  name="t3" id="t3" required>
 </div>
 <div class="form-group">
  <label for="fileToUpload">Upload Image : </label><input type="file" class="form-control" name="fileToUpload" id="fileToUpload"><br>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
 </div>

 </body>
 </html>
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $subcatname=test_input($_POST['Subcategory']);
     $itemName=test_input($_POST['t1']);
     $itemDesc=test_input($_POST['t2']);
     $itemPrice=test_input($_POST['t3']);
     $maincatid=test_input($_POST['maincat']);

    include("../config.php") ;

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
             // only if the image passes all the reqirements the data base is uploaded
             $image=$_FILES["fileToUpload"]["name"];
             // inserting
             $insert = "INSERT INTO item (`ItemName`, `ItemDescription`, `ItemPrice`, `ItemImage`, `SubCategoryName` , `MainCategory`) VALUES ('$itemName','$itemDesc','$itemPrice','$image','$subcatname','$maincatid')";
             if( $conn->query($insert)===TRUE){
                 echo "<script>alert('Successfully added to database');</script>";
             } else{
                 echo "Error: " . $insert . "<br>" . $conn->error;
             }
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
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
