<?php 
require_once('db.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<a href="t-login.php"><button type="button" class="btn btn-sm btn-dark">Login</button></a>
	<a href="index.php"><button type="button" class="btn btn-sm btn-dark">Home</button></a>
		<div class="col-md-10">
			<h1>Create Teacher Account</h1>
			<p>*Fill out all fields</p>
			<form method="post" name="insertForm" class="form-horizontal">
				<table class="table table-striped table-bordered">
					<tr>
						<td><label class="control-label" for="student_name">Teacher Name:</label></td>
						<td><input type="text" class="form-control" name="name" required></td>
					</tr>					
					<tr>
						<td><label class="control-label" for="student_name">Subject</label></td>
						<td><input type="text" class="form-control" name="subject" required></td>
					</tr>					
					<tr>
						<td><label class="control-label" for="student_age">Username:</label></td>
						<td><input type="text" class="form-control" name="username" required></td>
					</tr>
					<tr>
						<td><label class="control-label" for="student_course">Password</label></td>
						<td><input type="password" class="form-control" name="password" required></td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="text-center">
								<input type="submit" class="btn btn-primary" name="submit">
							</div>
						</td>
					</tr>
				</table>
			</form>
			<?php
			function check_subject($connect, $subject){
				$sql = "SELECT * FROM tbl_teacher WHERE Subject = '$subject'";
				$result = $connect->query($sql);
				
				return $result;
			} 

			if(isset($_POST['submit'])) {
				$name = isset($_POST['name']) && $_POST['name']!="";
				$subject = isset($_POST['subject']) && $_POST['subject']!="";
				$username = isset($_POST['username']) && $_POST['username']!="";
				$password = isset($_POST['password']) && $_POST['password']!="";

				if ($name && $username && $password && $subject){
					// 
					$name 	= $_POST['name'];
					$subject 	= $_POST['subject'];
					$username 	= $_POST['username'];
					$password = $_POST['password'];

					$sql = "SELECT * FROM tbl_teacher WHERE username = '$username'";
					$result = mysqli_query($connect,$sql);
					$count = mysqli_fetch_array($result);
					// check account is already exist
					if($count >= 1) {
						echo '<script>alert("Account Already Exist")</script>';
					}
					else{

						$query = "INSERT INTO tbl_teacher VALUES ('','$name','$subject','$username','".md5($password)."')";
						if(mysqli_query($connect, $query))
						{
							echo '<script>alert("Succesfully Created New Account")</script>';
							echo '<script>window.location.href = "t-login.php";</script>';
						}
						else{
							echo '<script>alert("Database Error Connection")</script>';
						}
					}
				}
			}
			?>
		</div>
	</div>
</body>
</html>