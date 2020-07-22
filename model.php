<?php
class Model{
	private $server = "localhost";
	private $username = "root";
	private $password = "";
	private $db = "oopphp";
	private $conn;
	public function __construct(){
		try{
			$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
		} catch (Exception $e){
			echo "Connection failed" . $e->getMessage();
		}
	}
	public function register(){
		if (isset($_POST['register'])) {
			if (isset($_POST['email'])&&isset($_POST['password'])) {
				if (!empty($_POST['email'])&&!empty($_POST['password'])) {
					$email = $_POST['email'];
					$password = $_POST['password'];
					$query = "INSERT INTO `user` (`id`, `email`, `password`) VALUES ('', '$email', '$password');";
					if ($sql = $this->conn->query($query)) {
						echo "<script>alert('User successfully registered');</script>";
						echo "<script>window.location.href = 'login.php';</script>";
					}
				}
				else{
					echo "<script>alert('Please fill up the informations');</script>";
					echo "<script>window.location.href = 'index.php';</script>";
				}
			}
			else{
				echo "<script>alert('Please fill up the informations');</script>";
				echo "<script>window.location.href = 'index.php';</script>";
			}
		}
	}
	public function fetch(){
		$data = null;
		$query = "SELECT * FROM `user`";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function delete($id){
		$query = "DELETE FROM user where id = '$id'";
		if ($sql = $this->conn->query($query)) {
			return true;
		}
		else{
			return false;
		}
	}
	public function fetch_single($id){
		$data = null;
		$query = "SELECT * FROM user WHERE id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
			$data = $row;
		}
		}
		return $data;
	}
	public function edit($id){
		$data = null;
		$query = "SELECT * FROM user WHERE id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}
	public function update($data){
			$query = "UPDATE user SET email='$data[email]', password='$data[password]' WHERE id='$data[id]'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}
			else{
				return false;
			}
	}
	public function login(){
			if (isset($_POST['login'])) {
			if (isset($_POST['email'])&&isset($_POST['password'])) {
				if (!empty($_POST['email'])&&!empty($_POST['password'])) {
					$email = $_POST['email'];
					$password = $_POST['password'];
					$query = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
					$sql = $this->conn->query($query);
					$rowCount = $sql->num_rows;
					if ($rowCount) {
						$data = $sql->fetch_assoc();
						$_SESSION['id'] = $data['id'];
						$_SESSION['id'] = true;
						echo "<script>alert('Welcome!');</script>";
						echo "<script>window.location.href = 'home.php';</script>";
					}
					else{
					echo "<script>alert('Email and password are not matched');</script>";
					echo "<script>window.location.href = 'login.php';</script>";
				}
				}
				else{
					echo "<script>alert('Email or password field is empty');</script>";
					echo "<script>window.location.href = 'login.php';</script>";
				}
			}
			else{
				echo "<script>alert('Email and password are not matched');</script>";
				echo "<script>window.location.href = 'login.php';</script>";
			}
		}
	}
}
?>