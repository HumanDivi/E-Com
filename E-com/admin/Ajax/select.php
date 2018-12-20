<?php
header("Content-Type: application/json; charset=UTF-8");
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
// getting variable from producttwo.php
$mainid = $_GET['maincat'];
$sql = "SELECT * from  subcategory where MainCategory='$mainid' ";
$Result=$conn->query($sql);

$myarray = array();
if ($Result->num_rows > 0) {
   $myarray = $Result->fetch_all(MYSQLI_ASSOC);
   echo json_encode($myarray);
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
 ?>
