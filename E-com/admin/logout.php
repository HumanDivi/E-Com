<?php
session_start();
if(!isset($_SESSION["key"]))
{
  echo "<script>alert('Security breach')</script>";
  echo "<script>location.href='index.php'</script>";
  exit;
}
else{
  // remove all session variables
session_unset();
// destroy the session
session_destroy();
echo "<script>alert('LogOut Successfully')</script>";
echo "<script>location.href='index.php'</script>";
}
?>
