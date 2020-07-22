<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post" style="padding: 30px;">
  <?php
  include "model.php";
  $model = new Model();
  $id = $_REQUEST['id'];
  $row = $model->edit($id);

  if (isset($_POST['update'])) {
      if (isset($_POST['email'])&&isset($_POST['password'])) {
        if (!empty($_POST['email'])&&!empty($_POST['password'])) {
          $data['id'] = $id;
          $data['email'] = $_POST['email'];
          $data['password'] = $_POST['password'];
          $update = $model->update($data);
          if ($update) {
            echo "<script>alert('Successfully updated data');</script>";
            echo "<script>window.location.href = 'records.php';</script>";
          }
          else{
            echo "<script>alert('Failed to update');</script>";
            echo "<script>window.location.href = 'edit.php';</script>";
          }
      }
      else{
        echo "<script>alert('empty');</script>";
        header("Location: edit.php?id=$id");
      }
    }
  }

  ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="<?php echo $row['email']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" value="<?php echo $row['password']?>" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</body>
</html>