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
	public function insert(){
		if (isset($_POST['submit'])) {
			if (isset($_POST['email'])&&isset($_POST['password'])) {
				if (!empty($_POST['email'])&&!empty($_POST['password'])) {
					$email = $_POST['email'];
					$password = $_POST['password'];
					$query = "INSERT INTO `user` (`id`, `email`, `password`) VALUES ('', '$email', '$password');";
					if ($sql = $this->conn->query($query)) {
						echo "<script>alert('Successfully added data');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
				else{
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = 'index.php';</script>";
				}
			}
			else{
				echo "<script>alert('empty');</script>";
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
}
?>