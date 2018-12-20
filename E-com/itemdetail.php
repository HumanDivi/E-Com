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
  <body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="e-com";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Chec
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// main shit here
$Id = intval($_GET['itemid']); // intval is for getting integer value
$sql = "SELECT * FROM item WHERE ItemId=$Id";
$Result=$conn->query($sql);
if ($Result->num_rows > 0) {
   while($row = $Result->fetch_assoc()) {
     echo "<div class='thumbnail' style='float:left' >";
      echo "<img src ='admin/uploads/$row[ItemImage]' class='img-thumbnail' style='width:200px;height:150px'>";
       echo "<div class='caption'> <p> Description: ".$row['ItemDescription']."<br> Price: ".$row['ItemPrice']."rs </p></div></div>";

   }
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
 ?>
</body>
</html>
