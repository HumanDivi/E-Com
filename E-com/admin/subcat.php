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

     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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

      echo "<select name='maincat'>";
if ($Result->num_rows > 0) {
   while($row = $Result->fetch_assoc()) {
     $name = $row['CategoryName'];
     $id =$row['MainCatID'];
     echo "<option value='$id'>$name</option>";
   }
     echo "</select>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

 ?>
     <select name="womsubcat">
    <option value="Casuals">Casuals</option>
    <option value="Heels">Heels</option>
    <option value="Wedding">Wedding</option>
    <option value="Ethnic">Ethnic</option>
    <option value="Sports">Sports</option>
    <option value="Formal">Formal</option>
    </select>
     <div class="form-group form-check">
       <label class="form-check-label">

       </label>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
 </div>

 </body>
 </html>
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $subcatname=test_input($_POST['womsubcat']);
     $maincatid=test_input($_POST['maincat']);

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
     // inserting
     $insert = "INSERT INTO subcategory (SubCategoryName, MainCategory) VALUES ('$subcatname','$maincatid')";
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
