<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Data</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
      
	
      <div class="container">
		<div class="col-md-10">
         <form method='post' action="" style="padding-top: 50px;">
            <input type="submit" value="Logout" name="btn_logout" class="btn btn-sm btn-danger" >
            <!-- <button type="button" class="btn btn-sm btn-danger" style="float: right;" name="btn_logout">Log out</button></a> -->
         </form>

         <?php
			// return to login if no session
				if (empty($_SESSION['username'])) {
					header("Location: s-login.php");
				}
				$loggedUser = $_SESSION['username'];
				

			// set logout session
            if(isset($_POST['btn_logout'])){
               session_destroy();
					echo '<script>alert("Account Logout!")</script>';
               echo '<script>window.location.href = "s-login.php";</script>';
            }
				
				// sql for stud data
				function get_stud_data($connect,$loggedUser){
					$sql = "SELECT * FROM tbl_student WHERE username = '$loggedUser'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						return $result->fetch_assoc();
					}
				}
				// sql for stud per sem
				function get_stud_sem($connect,$Name){
					$sql = "SELECT * FROM tbl_stud_sem WHERE Student= '$Name'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						return $result->fetch_assoc();
					}
				}
         ?>
			<!-- <h1>View Data</h1> -->
         <?php

				// get stud data
				$stud_data = get_stud_data($connect, $loggedUser);
				$Name = $stud_data['Name'];
            $Stud_iD = $stud_data['Stud_iD'];
				
				// get stud sem
				$stud_sem = get_stud_sem($connect, $Name);
				$Sem = $stud_sem['Semester'] ?? null;
				if($Sem == null){
					$Sem = "4th Semester";
				}
				else{
					$Sem = $stud_sem['Semester'];
				}
				
         ?>
         <h1><?php echo $Name; ?></h1>
			<p><?php echo $Sem; ?></p>

			<table class="table table-bordered">
			    <thead>
					<tr>
						<th>Subjects</th>
						<th>Grades</th>
						<th>Teacher</th>
					</tr>
				</thead>
				<tbody>
				
            <?php
				$sql = "SELECT * FROM tbl_stud_sem where Student ='".$Name."' and Semester = '$Sem'";
				$exe = mysqli_query($connect, $sql);
				while($fet=mysqli_fetch_assoc($exe)) {
				?>
					<tr>
						<td><?php echo $fet['Subject']; ?></td>
						<td><?php echo $fet['Grades']; ?></td>
						<td><?php echo $fet['Teacher']; ?></td>
						</td>
					</tr>
				<?php 
				} 
				?>
				</tbody>
			</table>
         <!-- <a href="select.php"><button type="button" class="btn btn-sm btn-danger">Back</button></a> -->
		</div>
	</div>
</body>
</html>