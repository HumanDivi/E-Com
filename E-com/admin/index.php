<?php
session_start();
if(isset($_SESSION["rem"])){ // check if user has pressed the checkbox for remember me
  $_SESSION["key"] = "ok";
    echo "<script>location.href='profile.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <label for="t1">Email:</label><input type="email" class="form-control" value=""  name="t1" id="t1">
      </div>
      <div class="form-group">
        <label for="t2">Password:</label><input type="password" class="form-control" value=""  name="t2" id="t2">
      </div>
      <div class="form-group">
          <label class=""><input class="" type="checkbox" name="ck"  value="remeber">Remember me</label>
      </div>
      <br>
        <input type="submit" name="" value="Login" class="btn btn-primary"><br>

    </form>
  </body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input ($_POST['t1']);
  $pass =  test_input($_POST['t2']);
  $remeber ="";
  if(isset($_POST['ck'])){
    $remeber =$_POST['ck'];
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db="e-com";

  $conn = new mysqli($servername, $username, $password,$db);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM admin WHERE Email='$email' AND Password='$pass'";
  $result=$conn->query($sql);

  if ($result ->num_rows > 0) {
      $_SESSION["key"] = "ok";
      $_SESSION['start'] = time(); // Taking now logged in time.
      if($remeber=="remeber"){
      $_SESSION["rem"] = "ok";
      }
      echo "<script>alert('Successfully login');</script>"; // using javascript in php
      //header('Location:profile.php');   // getting back to previous table //header doesnt allow the other things to run
      echo "<script>location.href='profile.php'</script>";

  } else {
      echo "<script>alert('Error: User does not exist');</script>" ;
  }
$conn->close();
}
  // this function removes any unwanted charachters space etc. at run time to avoid hacking, wont remove special characters from the inputboxes
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>
