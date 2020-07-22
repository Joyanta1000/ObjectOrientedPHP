<?php 
session_start();
ob_start();
$id = isset($_SESSION['id']);
if ($id==false) {
	echo "<script>alert('Email and password are not matched');</script>";
	echo "<script>window.location.href = 'login.php';</script>";
}
else{
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="padding: 20px; position: absolute;
  		right: 0;
  		width: 100px;
  		height: 120px;"><a href="logout.php" style="text-decoration: none;" class="badge badge-danger">Logout</a></div>
	<div style="padding: 20px;"><a href="records.php" style="text-decoration: none;" class="badge badge-info">Records</a></div>
</body>
</html>
<?php
}
?>