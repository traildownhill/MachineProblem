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
	<div class="container" style="padding-top:50px;">
		<a href="s-login.php"><button type="button" class="btn btn-sm btn-dark">Login</button></a>
		<a href="index.php"><button type="button" class="btn btn-sm btn-dark">Home</button></a>
		<div class="col-md-10">
			<h1>Create Student Account</h1>
			<p>*Fill out all fields</p>
			<form method="post" name="insertForm" class="form-horizontal">
				<table class="table table-striped table-bordered">
					<tr>
						<td><label class="control-label" for="student_name">Student Name:</label></td>
						<td><input type="text" class="form-control" name="name" required></td>
					</tr>					
					<tr>
						<td><label class="control-label" for="student_name">Semester:</label></td>
						<td><input type="text" class="form-control" name="sem" placeholder ="1st/ 2nd/ 3rd/ 4th Semester" required></td>
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
				$ermsg;
			function check_sem($semester){
				if($semester == "1st Semester"){
					return $tblsem = "tbl_1stsem";
				}
				else if($semester == "2nd Semester"){
					return $tblsem = "tbl_2ndsem";
				}
				else if($semester == "3rd Semester"){
					return $tblsem = "tbl_3rdsem";
				}
				else if($semester == "4th Semester"){
					return $tblsem = "tbl_4thsem";
				}
				else{}
			}

			if(isset($_POST['submit'])) {
				// check if empty
				$name = isset($_POST['name']) && $_POST['name']!="";
				$username = isset($_POST['username']) && $_POST['username']!="";
				$semester = isset($_POST['sem']) && $_POST['sem']!="";
				$password = isset($_POST['password']) && $_POST['password']!="";

				if ($name && $username && $password && $semester){
					// 
					$name = $_POST['name'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					$semester = $_POST['sem'];

					$sql = "SELECT * FROM tbl_student WHERE username = '$username'";
					$result = mysqli_query($connect,$sql);
					$count = mysqli_fetch_array($result);
					// check account is already exist
					if($count >= 1) {
						echo '<script>alert("Account Already Exist")</script>';
					}
					else{
						$query = "INSERT INTO tbl_student VALUES ('','$name','$username','".md5($password)."')";
						if(mysqli_query($connect, $query))
						{
							// get all teacher to assign 
							$sql = "SELECT * FROM tbl_teacher";
							$exe = mysqli_query($connect, $sql);
							while($fet=mysqli_fetch_assoc($exe)){
								$T_iD = $fet['Teach_iD'];
								$T_name = $fet['Name'];
								$T_subj = $fet['Subject'];

								$data = check_sem($semester);

								$sql1 	= "INSERT INTO tbl_stud_sem values('','$name','$T_name','$T_subj','$semester','')";
								$exe1 	= mysqli_query($connect, $sql1);

								$sql2 	= "INSERT INTO $data values('','','$T_iD','$T_subj','','$name','$T_name')";
								$exe2 	= mysqli_query($connect, $sql2);
							}
							echo '<script>alert("Student Created")</script>';
							echo '<script>window.location.href = "s-login.php";</script>';
						}
						else{
							echo '<script>alert("Database Erro Connection")</script>';
						}
					}
				}				
			}
			?>
		</div>
	</div>
</body>
</html>