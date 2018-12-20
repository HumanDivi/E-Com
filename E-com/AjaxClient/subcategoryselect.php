<?php
header("Content-Type: application/json; charset=UTF-8");
include("../config.php") ;
// getting variable from producttwo.php
$subcatvalue = $_GET['subcat'];
$sql = "SELECT * from  subcategory where MainCategory='$subcatvalue' ";
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
