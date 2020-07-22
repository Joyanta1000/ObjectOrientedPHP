<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div style="padding: 30px;">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
session_start();
ob_start();
$id = isset($_SESSION['id']);
if ($id==false) {
  echo "<script>alert('Login first');</script>";
  echo "<script>window.location.href = 'login.php';</script>";
}
else{
    include 'model.php';
    $model = new Model();
    $rows = $model->fetch();
    $i = 1;
    if (!empty($rows)) {
      foreach ($rows as $row) {
    ?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['password'];?></td>
      <td><a href="read.php?id=<?php echo $row['id'];?>" class="badge badge-info">Read</a><a href="edit.php?id=<?php echo $row['id'];?>" class="badge badge-success">Edit</a><a href="delete.php?id=<?php echo $row['id'];?>" class="badge badge-danger">Delete</a></td>
    </tr>
    <?php
    }
    }
    else{
      echo "No data";
    }
  }
    ?>
  </tbody>
</table>
<br>
  <br>
  <div><a href="home.php" style="text-decoration: none;">Back to home</a></div>
</div>
</body>
</html>