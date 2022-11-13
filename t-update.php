<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-10">
         <?php
         $id = $_GET['id'];
         $semester = $_GET['sem'];

			function check_sem($semester){
				if($semester == "1st"){
					return $tblsem = "tbl_1stsem";
				}
				else if($semester == "2nd"){
					return $tblsem = "tbl_2ndsem";
				}
				else if($semester == "3rd"){
					return $tblsem = "tbl_3rdsem";
				}
				else if($semester == "4th"){
					return $tblsem = "tbl_4thsem";
				}
				else{}
			}
			// sql for stud data
			function get_stud_data($connect,$iD){
				$sql = "SELECT * FROM tbl_stud_sem WHERE id = '$iD'";
				$result = $connect->query($sql);
				if ($result->num_rows > 0) {
					return $result->fetch_assoc();
				}
			
			}

			$stud_data = get_stud_data($connect, $id);
			$grades_check = $stud_data['Grades'];
			$stud_name = $stud_data['Student'];
			$teach_name = $stud_data['Teacher'];
			$stud_subj = $stud_data['Subject'];

			if($grades_check == "0" || $grades_check == ""){
				$message = "Add Grade";
			}
			else{
				$message = "Update Grade";
			}
            
         ?>
			<h1><?php echo $message; ?></h1>
			<table class="table table-bordered">
			    <form method="post">
						<tbody>
							<tr>
								<th>Grades</th>
								<td><input type="text" class="form-control" name="grades" value="<?php echo $grades_check; ?>"></td>
							</tr>
							<tr>
								<td colspan="2">
									<a href="teacher.php"><button type="button" class="btn btn-sm btn-danger">Back</button></a>
									<input type="submit" name="submit" class="btn btn-sm btn-primary pull-right" value="Update">
								</td>
							</tr>
						</tbody>
				</form>
			</table>
			<?php
			if(isset($_REQUEST['submit'])) {
				$grades	= $_POST['grades'];
				// update or add grade to tbl_stud_sem
				$query = "UPDATE tbl_stud_sem SET Grades = '$grades' WHERE id = '$id'";
				if(mysqli_query($connect, $query))
				{
					$tblsem = check_sem($semester);
					// update or add to tbl_sems
					$query1 = "UPDATE $tblsem SET Grades = '$grades' WHERE Stud_Name = '$stud_name' and Teach_Name ='$teach_name' and Subject = '$stud_subj'";
					if(mysqli_query($connect, $query1)){
						if($grades_check == "0" || $grades_check == ""){
							echo '<script>alert("Student Grade Added")</script>';
							echo '<script>window.location.href = "teacher.php";</script>';
						}
						else{
							echo '<script>alert("Student Grade Updated")</script>';
							echo '<script>window.location.href = "teacher.php";</script>';
						}
						// header("Location: teacher.php");
					}
				}
			}
			else{
				// echo '<script>alert("Database Error Connection")</script>';
			}
			?>
		</div>
	</div>
</body>
</html>