<?php
   include "db.php";

    $ermsg='';      
   if(isset($_POST['submit'])){     
      $username = mysqli_real_escape_string($connect,$_POST['username']);
      $password = mysqli_real_escape_string($connect,$_POST['password']);
       
      $sql = "SELECT * FROM tbl_student WHERE username = '$username'";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      if($count == 1) {
        $hash = $row['password'];
        $name = $row['Name'];
        $user_name = $row['username'];

        
        if($_POST['username'] === $user_name && (md5($password) === $hash)){
          
          $_SESSION['id'] = $row['Stud_iD'];
          $_SESSION['username'] = $username;
          $_SESSION['name'] = $row['Name'];
          
          header("location: student.php");
        }
        else{
          $ermsg = "Username and Password Not Match!";
          
        }
      }
      else{
        $ermsg="No Account Found!";
      }
   }
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <!-- Required meta tags --> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <title>Login</title> 
</head> 
<body> 

<div class="container" style="padding-top:50px;">
  <a href="index.php"><button type="button" class="btn btn-sm btn-dark">Home</button></a>
		<?php 
		if(isset($ermsg) && !empty($ermsg)) {
			echo '<div class="alert alert-danger" role="alert">'.$ermsg.'</div>';
		}
		?>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Student's Login</h3>
			</div>
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
                  <a href="s-new.php">Register</a>
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


  <!-- Optional JavaScript --> <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body> 
</html>