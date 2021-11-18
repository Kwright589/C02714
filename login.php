<!DOCTYPE html>
<html> 
<head>
	<title>Login</title>
</head>
<body>
    <div class="container"> </div>
    <h1>Login</h1>


<form method="POST" action="login.php"> 
Email:<br><input type="text" name="email" id="email"/>
<br>
Password:<br><input type="password" name="password" id="password"/>
<br>
<input type="submit" name="submit" value="Login"/>
</form>

<?php
include 'connect.php';
if (isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $mysqli->prepare("SELECT * FROM users WHERE Email =?");
$stmt->bind_param('s',$email);

$stmt =execute();
$user =$stmt->get_result()->fetch_assoc();

if(!empty($user['Email'])) {
	if (password_verify($password, $user['Password'])) {
	    echo "<p>Login Succesful</p>";
	    session_start();
	    $_SESSION['login'] = TRUE;
	    $_SESSION['user'] = $user['Email'];
	}else{
		    echo "<p>Login Failed</p>"; //the user exists but password is wrong
		 }
    }else{
		    echo"<p>This user does not exist</p>"; //the user dosent exist
		}
	$stmt->close();
	$mysqli->close();
		  
		  session_start();
		  if($_SESSION['login']===TRUE)
		  {
			  echo "<p>Welcome ".$_SESSION['user'];</p>
		  }
		  else
		  {
			  header("Location: login.php");
	      }
	      
	      
	      
?>
</div>
</body>
</html>
