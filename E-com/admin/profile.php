  <!-- After Login Page-->
<?php
session_start();
if(!isset($_SESSION["key"]))
{
  echo "<script>alert('Security breach')</script>";
  echo "<script>location.href='index.php'</script>";
  exit;
}
$currtime = time();
if($currtime - $_SESSION['start'] > 60000 ){
  echo "<script>alert('Time Expired')</script>";
  echo "<script>location.href='index.php'</script>";
 }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>This is your Website</h1>
    <a href="logout.php">logout</a>

  </body>
</html>
