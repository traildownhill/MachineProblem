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
         </form>
         <?php
				if (empty($_SESSION['username'])) {
					header("Location: t-login.php");
				}
				
				$loggedUser = $_SESSION['username'];
            

				if(isset($_POST['btn_logout'])){
               session_destroy();
					echo '<script>alert("Account Logout!")</script>';
               echo '<script>window.location.href = "t-login.php";</script>';
            }

				// sql for stud data
				function get_teach_data($connect,$loggedUser){
					$sql = "SELECT * FROM tbl_teacher WHERE username = '$loggedUser'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						return $result->fetch_assoc();
					}
				}
				// sql for stud per sem
				function get_teach_sem($connect,$Name){
					$sql = "SELECT * FROM tbl_stud_sem WHERE Teacher= '$Name'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						return $result->fetch_assoc();
					}
				}
         ?>
			<!-- <h1>View Data</h1> -->
         <?php
				//  Get Logged Details
            $teach_data = get_teach_data($connect, $loggedUser);
				$teachName = $teach_data['Name'];
            $teachSubj = $teach_data['Subject'];
            $teachiD = $teach_data['Teach_iD'];
         ?>
         <h1><?php echo $teachName; ?></h1>
			<h3><?php echo $teachSubj ?></h3>
			
			<!--  -->
			<form  method="POST" style="padding-bottom: 10px;">
				<input type="submit" class="btn btn-sm btn-info" value="1st Sem" name="1sem">
				<input type="submit" class="btn btn-sm btn-info" value="2nd Sem" name="2sem">
				<input type="submit" class="btn btn-sm btn-info" value="3rd Sem" name="3sem">
				<input type="submit" class="btn btn-sm btn-info" value="4th Sem" name="4sem">
			</form>
			<!--  -->
			<div id="1stSem">
				<table class="table table-bordered">
			    <thead>
					<tr>
						<th>Student</th>
						<th>Semester</th>
						<th>Grade</th>
						<th>Action</th>
						
					</tr>
					</thead>
					<tbody>
				
					<?php
					$Semester = "";
					
					if (isset($_POST["1sem"]))
					{
						$Semester = "1st Semester";
						$sem_iD = "1st";
					}
					else if (isset($_POST["2sem"]))
					{
						$Semester = "2nd Semester";
						$sem_iD = "2nd";
					}
					else if (isset($_POST["3sem"]))
					{
						$Semester = "3rd Semester";
						$sem_iD = "3rd";
					}
					else if (isset($_POST["4sem"]))
					{
						$Semester = "4th Semester";
						$sem_iD = "4th";
					}

					// Get all Enlisted Student 
					$sql = "SELECT * FROM tbl_stud_sem where Teacher = '$teachName' and Semester ='$Semester'";
					$exe = mysqli_query($connect, $sql);
					while($fet=mysqli_fetch_assoc($exe)) {
						$studName = $fet['Student'];
						$iD = $fet['iD'];
						$studGrades = $fet['Grades'];
						$studSem = $fet['Semester'];

						?>
						<tr>
							<td><?php echo $studName; ?></td>
							<td><?php echo $studSem; ?></td>
							<td><?php echo $studGrades; ?></td>
							<td>
								<a href="t-update.php?id=<?php echo $fet['iD']; ?>&sem=<?php echo $sem_iD; ?>"><button type="button" class="btn btn-xs btn-info">Add/Edit</button></a>
								<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete_<?php echo $iD;?>">Delete</button>
							</td>
						</tr>	
					<?php
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<div class="modal fade" id="delete_<?php echo $iD;?>" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete Section</h4>
      </div>
      <div class="modal-body">
        <h3>Are you sure you want to delete?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="t-delete.php?id=<?php echo $iD;?>"><button type="button" class="btn btn-danger">Yes</button></a>
      </div>
    </div>
  </div>
</div>
</body>
</html>