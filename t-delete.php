<?php
require_once('db.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tbl_stud_sem WHERE  iD = $id";
$exe	= mysqli_query($connect, $sql);
if($exe) {
	echo '<script>alert("Student Grade Updated")</script>';
	echo '<script>window.location.href = "teacher.php";</script>';
} else {
	echo "Error : " . mysqli_error($con);
}
?>