<?php
session_start();
ob_start();
$id = isset($_SESSION['id']);
if ($id==false) {
  echo "<script>alert('Login first');</script>";
  echo "<script>window.location.href = 'login.php';</script>";
}
else{
session_destroy();
echo "<script>alert('Logout successfuly!');</script>";
echo "<script>window.location.href = 'login.php';</script>";
}
?>